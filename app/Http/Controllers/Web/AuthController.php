<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $inputs = $request->all();

        $endPoint = route('api.login');

        $response = Http::post($endPoint, [
            'email' => data_get($inputs, 'email'),
            'password' => data_get($inputs, 'password'),
        ]);

        $jsonData = json_decode($response->body(), true);

        if((data_get($jsonData, 'success') === true) && (data_get($jsonData, 'data.token')))
        {
            if(Auth::attempt(['email' =>data_get($inputs, 'email'), 'password' => data_get($inputs, 'password')])){
                return redirect('/')->withSuccess('success', 'Logged in successfully');
            }

        }else{
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
    }

    public function showRegister()
    {
        return view('auth.registration');
    }

    public function register(Request $request)
    {
        $inputs = $request->all();

        $endPoint = route('api.register');

        $response = Http::post($endPoint, [
            'name' => data_get($inputs, 'name'),
            'email' => data_get($inputs, 'email'),
            'password' => data_get($inputs, 'password'),
            'confirm_password' => data_get($inputs, 'confirm_password'),
        ]);

        $jsonData = json_decode($response->body(), true);

        if(data_get($jsonData, 'success') && (data_get($jsonData, 'success') == true))
        {
            Auth::attempt(['email' =>data_get($inputs, 'email'), 'password' => data_get($inputs, 'password')]);

            return redirect('/')->withSuccess('Login Successful');

        }else{
            return redirect()->back()->withInput($inputs)->withErrors( $jsonData['data']);
        }

    }

    public function logout() {

        Session::flush();
        Auth::logout();

        return redirect('login');
    }

}
