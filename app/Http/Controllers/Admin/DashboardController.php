<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaints;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalComplaintPending = Complaints::where('status', "PENDING")->count();

        return view('pages.admin.dashboard', compact('totalComplaintPending'));
    }

}
