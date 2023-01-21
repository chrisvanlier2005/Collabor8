<?php
namespace App\Services;
use Illuminate\Support\Facades\Http;

class GithubService {
    private $key; // github api key
    private $base_url = "https://api.github.com";
    private $base_headers = [
        "Accept" => "application/vnd.github.v3+json",
        "Content-Type" => "application/json",
        "Authorization" => "Bearer "
    ];

    public function __construct(){
        $this->key = config("services.github.key");
        $this->base_headers["Authorization"] .= $this->key;
    }

    public function getRepositoriesFromUser($username){
        $response = Http::withHeaders($this->base_headers)->get($this->base_url."/users/".$username."/repos");
        return $response->json();
    }

    public function getRepositoryFromUser($username, $repository_name){
        $response = Http::withHeaders($this->base_headers)->get($this->base_url."/repos/".$username."/".$repository_name);
        //$response["contents"] = $this->getContentsFromRepository($username, $repository_name);
        return $response->json();
    }

    public function getContentsFromRepository($username, $repository_name){
        $response = Http::withHeaders($this->base_headers)->get($this->base_url."/repos/".$username."/".$repository_name."/contents");
        return $response->json();
    }

    public function getContentFromRepository($username, $repository, $path) {
        $response = Http::withHeaders($this->base_headers)->get($this->base_url."/repos/".$username."/".$repository."/contents/".$path);
        return $response->json();
    }

}
