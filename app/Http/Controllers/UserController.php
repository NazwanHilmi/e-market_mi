<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index(){
        if ($user = Auth::user()) {
            switch ($user->level) {
                case '1':
                    return redirect()->intended('/');
                    break;
                
                case 'value':
                    return redirect()->intended('pembelian');
                    break;
            }
        }
        return view('auth.login');
    }

    public function export(){
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    // public function cekLogin(AuthRequest $request){
    //     $credential = $request->only('email', 'password');
    //     // dd($credential);
    //     $request->session()->regenerate();
    //         if (Auth::attempt($credential)) {
    //             $user = Auth::user();
    //             switch ($user->level) {
    //                 case '1':
    //                     return redirect()->intended('/');
    //                     break;
                    
    //                 case 'value':
    //                     return redirect()->intended('pembelian');
    //                     break;
    //             }
    //             return redirect()->intended('/');
    //         }
    //         return back()->withErrors([
    //             'nofound' => 'Email or password is wrong'
    //         ])->onlyInput('email');
    // }
}
