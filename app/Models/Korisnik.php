<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Korisnik extends Model
{
    public $table = 'korisniks';
    public $fillable = ['ime', 'email', 'lozinka', 'created_at'];
}
