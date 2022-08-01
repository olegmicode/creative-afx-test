<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http as HTTPClient;
use App\Helpers\WelcomeApi;

class WelcomeController extends Controller
{
    public function __construct() {
        $this->welcomeApi = new WelcomeApi();
    }

    public function index() {
        if (Auth::check()) {
            return view('frontend.welcome');
        } else {
            return view('frontend.login');            
        }
    }
    
    public function login(Request $request) {
        if($this->loginAction($request)) {
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

       public function fetchFivePosts(Request $request) {        
        return response()->json($this->welcomeApi->fetchInFivePosts());        
    }
    protected function loginAction(Request $request) {
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
        return Auth::attempt($attributes);
    }

    public function getToken(Request $request) {
        if (Auth::check() || $this->loginAction($request)) {
            $token = $request->user()->createToken('test-token'); 
            return ['token' => $token->plainTextToken];
        }
        return redirect('/');
    }    
}
