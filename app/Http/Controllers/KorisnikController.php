<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Korisnik;

class KorisnikController extends Controller
{
    public function listAllKorisniks() {
        $korisnici = Korisnik::all(); # SELECT * FROM korisniks;
        return view('korisniks', ["korisnici" => $korisnici]);

    }
}
