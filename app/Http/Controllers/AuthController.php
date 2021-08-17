<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function me(){
        return [
            'Nama' => 'Thoriq',
            'NIS' => 12973121837,
            'Kelas' => 'XII RPL 3'
        ];
    }
}
