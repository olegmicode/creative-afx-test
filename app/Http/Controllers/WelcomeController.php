<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client as GuzzleHttpClient;
use Illuminate\Support\Facades\Http as HTTPClient;


class WelcomeController extends Controller
{
    public function index() {
        if (Auth::check()) {
            return view('frontend.welcome');
        } else {
            return view('frontend.login');            
        }
    }
    
    public function login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $data = $request->all();
        $password = $data['password'];
        $email = $data['email'];
        
        
        $attributes = [
            'email'=> $email, 
            'password'=> $password
        ];
        if (Auth::attempt($attributes)) {
            $request->session()->regenerate();
            return redirect('/');
        };
    }
    
    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();     
        return redirect('/');
    }

    protected function fetchOnePost() {
        try {
            //code...
            // $res = HTTPClient::get('https://api.kanye.rest/')->json();
            $res = HTTPClient::get('https://api.kanye.rest/text');
            dd ($res);
            
            if(isset($res) && isset($res['quote'])) {
                return $res['quote'];            
            }
        } catch (\Exception $ex) {
        }        
        return 'failed';
    }

    public function fetchFivePosts(Request $request) {
        // get the request      
        $result = $this->fetchOnePost();
        dd($result);
        
        return $result;
    }
}
