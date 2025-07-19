<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Complaints;
use App\Models\ComplaintsAssignment;
use App\Models\ComplaintsImage;
use App\Models\User;
use App\Models\Workers;
use App\Notifications\TelegramNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use NotificationChannels\Telegram\Telegram;

class ComplaintsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'location' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $complaint = Complaints::create([
                'user_id' => Auth::user()->id,
                'category_id' => $request->input('category_id'),
                'location' => $request->input('location'),
                'description' => $request->input('description'),
                'status' => 'PENDING',
            ]);
            if ($request->file('imageProof')) {
                $files = $request->file('imageProof');
                foreach ($files as $file) {
                    $data = [
                        'complaint_id' => $complaint->id,
                        'category' => 'proof',
                    ];
                    $data['photos'] = $file->store('assets/complaint/proof', 'public');
                    ComplaintsImage::create($data);
                }
            }
            if ($request->file('imageSelfie')) {
                $files = $request->file('imageSelfie');
                foreach ($files as $file) {
                    $data = [
                        'complaint_id' => $complaint->id,
                        'category' => 'selfie',
                    ];
                    $data['photos'] = $file->store('assets/complaint/selfie', 'public');
                    ComplaintsImage::create($data);
                }
            }

            $worker = Workers::where('departmen_id', 2)->inRandomOrder()->first();
            if ($worker) {
                $assignment = ComplaintsAssignment::create([
                    'worker_id' => $worker->id,
                    'complaint_id' => $complaint->id
                ]);
            }

            $data = [
                "location" => $complaint->location,
                "description" => $complaint->description
            ];
            $worker->notify(new TelegramNotification($data));
            DB::commit();

            return response(
                [
                    'success' => true,
                    'message' => 'Berhasil Membuat Laporan',
                ],
                201
            );
        } catch (\Exception $e) {
            DB::rollBack();

            return response(
                [
                    'success' => false,
                    'message' => 'Terjadi Kesalahan',
                ],
                500,
            );
        }
    }

    public function history()
    {
        $user = Auth::user();

        $complaints = Complaints::with("assignment.workers", "user", "category")->where('user_id', $user->id)->get();

        $response = [
            'success' => true,
            'data' => $complaints,
            'message' => 'Berhasil ambil data',
        ];

        return response($response, 200);
    }
}
