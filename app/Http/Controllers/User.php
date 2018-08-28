<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class User extends Controller
{
    public function index(){
        return view('editarcadastro')->with('user', Auth::user());
    }

    public function editarCadastro(Request $request){
        DB::table('users')
            ->where('id', Auth::user()['id'])
            ->update(['name' => $request['name'], 'email' => $request['email']]);
        return redirect()->route('home');
    }
}
