<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staf extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'idLibrary',
        'password',
        'email',
        'no_telpon',
        'level',
        'address',
    ];

    protected $table = 'staf';

    protected $hidden = [
        'password',
    ];
}
