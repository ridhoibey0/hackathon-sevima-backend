<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ComplaintsAssignment extends Model
{
    protected $table = 'complaint_assignement';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['complaint_id', 'worker_id'];

    public function workers(): BelongsTo
    {
        return $this->belongsTo(Workers::class, 'worker_id', 'id');
    }
}
