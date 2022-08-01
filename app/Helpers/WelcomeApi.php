<?php
namespace App\Helpers;


class WelcomeApi {
  
  public $result = [];
  
  public function __construct() {
    $this->client = new \GuzzleHttp\Client();
    $this->posts_meta = array_fill(0, 5, " ");
  }

  public function fetchInFivePosts() {
    $this->result = [];        
    
    if(!isset($this->client)) {
      $this->client = new \GuzzleHttp\Client();
    }


    $promises = array_map(function ($username) {
        $url = 'https://api.kanye.rest/text';
        return $this->client->requestAsync('GET', $url);
    }, $this->posts_meta);
    
    // Wait till all the requests are finished.
    \GuzzleHttp\Promise\all($promises)->then(function (array $responses) {
        $this->result = array_map(function ($response) {
            return (string) $response->getBody();
        }, $responses);
    })->wait();
    return $this->result;
}
}