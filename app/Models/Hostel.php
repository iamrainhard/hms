<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hostel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'gender',
        'rooms',
        'capacity',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function requests()
    {
        return $this->hasMany(Request::class);
    }

    public function therooms()
    {
        return $this->hasMany(Room::class);
    }
}
