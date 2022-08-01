<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use App\Helpers\WelcomeApi;
 

class ShowPosts extends Component
{
    public $posts = [];
    public $count;

    public function mount() {
        
        $this->fetchPosts();
    }

    public function fetchPosts() {
        $welcomeApi = new WelcomeApi();
        $this->posts = $welcomeApi->fetchInFivePosts();   
    }
    

    public function render()
    {
        return view('livewire.show-posts', [
            'posts' => $this->posts
        ]);
    }

    public function updatingCount($value) {
        $this->fetchPosts();        
    }
    public function refreshPosts() {
        $this->fetchPosts();
    }

   
}
