<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(){
        if (Auth::check()) {
            return redirect('/');
        }
        return view('Frontend.Pages.login');
    }
    public function register(){
        if (Auth::check()) {
            return redirect('/');
        }
        return view('Frontend.Pages.registered');
    }

    public function submit_register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
        if($validator->fails()){
            $messages = $validator->messages();
            $alertMessage = $messages->first();

            return back()->with([
                'alert' => [
                    'type'=>'danger',
                    'message'=>$alertMessage
                ]
            ]);
        }

        try {
            DB::beginTransaction();
                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $request->password,
                ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with([
                'alert' => [
                    'type'=>'danger',
                    'type'=>'ada kesalahan '.$th->getMessage(),
                ]
                ]);
        }

        return redirect('/login')->with([
            'alert' => [
                'type'=>'success',
                'message'=>'Registrasi Berhasil Silahkan Login.',
            ]
        ]);

    }

    public function proces_login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/'); 
        }          
        
        return redirect('/');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
