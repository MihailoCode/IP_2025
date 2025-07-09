<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Korisnik extends Model
{
    public $table = 'korisnici';
    public $fillable = ['ime', 'email', 'lozinka', 'created_at'];
}
