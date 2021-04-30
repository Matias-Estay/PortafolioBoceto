<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    
    public function updatePassword(Request $request){
        // $this->validate($request, [
        //     'new_password' => 'required|string|min:8|different:actual_password',
        // ]);
        // dd($request);
        $pass = Hash::make($request->new_password);
        
        $affected = DB::table('users')
            ->where('email', $request->email)
            ->update(['password' => $pass, 'updated_at' => Carbon::now()]);
    }
}
