<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_number',
        'hostel_id',
        'capacity',
    ];

    public function hostel()
    {
        return $this->belongsTo(Hostel::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
