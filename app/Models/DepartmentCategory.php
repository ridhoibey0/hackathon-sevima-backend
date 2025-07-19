<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class DepartmentCategory extends Model
{


    protected $table = 'department_category';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

}
