<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Workers extends Model
{
    use Notifiable;
    protected $table = 'workers';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'username', 'phone', 'departmen_id'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function assignment(){
        return $this->hasMany(ComplaintsAssignment::class, "worker_id", 'id');
    }
}
