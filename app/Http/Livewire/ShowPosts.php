<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
 

class ShowPosts extends Component
{
    public $posts = [];
    public $count;

    public function mount() {
        $this->fetchPosts();
    }

    public function fetchPosts() {
        $posts = [];
        for($i = 0; $i < 5; $i ++) {
            $posts[] = $this->fetchAPI();            
        }
        $this->posts = $posts;
    }
    
    public function fetchAPI() {        
        try {
            //code...
            $res = Http::get('https://api.kanye.rest/')->json();
            
            if(isset($res) && isset($res['quote'])) {
                return $res['quote'];            
            }
        } catch (Exception $ex) {
            return '';
        }
        
    }

    public function render()
    {
        return view('livewire.show-posts', [
            'posts' => $this->posts
        ]);
    }

    public function updatingCount($value) {
        $this->fetchPosts();
        \Log::info($value);
    }
    public function refreshPosts() {
        $this->fetchPosts();
    }

   
}
