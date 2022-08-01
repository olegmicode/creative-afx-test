<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client as GuzzleHttpClient;
use Illuminate\Support\Facades\Http as HTTPClient;


class WelcomeController extends Controller
{
    public function __construct() {
        $this->client = new \GuzzleHttp\Client();
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

    protected function fetchOnePost() {
        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', 'https://api.kanye.rest/text');
            $body = (string) $response->getBody(); 
            return $body;

        } catch (\Exception $ex) {
        }        
        return 'failed';
    }

    public function fetchFivePosts(Request $request) {        
        $posts_meta = array_fill(0, 5, " ");

        $this->result = [];
        

        $promises = array_map(function ($username) {
            $url = 'https://api.kanye.rest/text';
            return $this->client->requestAsync('GET', $url);
        }, $posts_meta);
        
        // Wait till all the requests are finished.
        \GuzzleHttp\Promise\all($promises)->then(function (array $responses) {
            $this->result = array_map(function ($response) {
                return (string) $response->getBody();
            }, $responses);
        })->wait();

        return response()->json($this->result);        
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
