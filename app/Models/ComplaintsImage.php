<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ComplaintsImage extends Model
{


    protected $table = 'complaint_images';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'photos',
        'complaint_id',
        'category',
    ];

}
