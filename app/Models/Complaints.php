<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Complaints extends Model
{


    protected $table = 'complaint';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'location',
        'description',
        'status',
        'closed_at'
    ];


    public function images():HasMany{
        return $this->hasMany(ComplaintsImage::class, 'complaint_id', 'id');
    }

    public function assignment() {
        return $this->hasOne(ComplaintsAssignment::class, 'complaint_id', 'id');
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id', "id");
    }
    
    public function category(): BelongsTo {
        return $this->belongsTo(DepartmentCategory::class, 'category_id', 'id');
    }

}
