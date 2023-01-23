<?php
namespace App\Services;
use App\Models\GithubRepository;
use App\Models\GithubUser;
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
        $user = GithubUser::where("login", $username)->with("repositories")->first();
        if (!$user){
            $user = $this->getUser($username);
        }
        if ($user && $user->repositories->count() > 0) {
            return $user->repositories;
        }
        $response = Http::withHeaders($this->base_headers)->get($this->base_url."/users/".$username."/repos");
        $response = $response->json();
        $repositories = [];
        foreach ($response as $key => $value) {
            $repository = GithubRepository::firstOrCreate([
                "github_id" => $value["id"] ?? 0,
                "name" => $value["name"] ?? "No name",
                "full_name" => $value["full_name"] ?? "No full name",
                "description" => $value["description"] ?? "No description",
                "private" => $value["private"] ?? false,
                "github_user_id" => $value["owner"]["id"],
                "language" => $value["language"] ?? "No language",
                "network_count" => $value["network_count"] ?? 0,
                "subscribers_count" => $value["subscribers_count"] ?? 0,
            ]);
            $repositories[] = $repository;
        }
        return $repositories;
    }

    public function getRepositoryFromUser($username, $repository_name){
        if (GithubRepository::where("full_name", $username."/".$repository_name)->first()) {
            return GithubRepository::where("full_name", $username."/".$repository_name)->first();
        }
        $response = Http::withHeaders($this->base_headers)->get($this->base_url."/repos/".$username."/".$repository_name);
        $response = $response->json();

        $repository = GithubRepository::firstOrCreate([
            "github_id" => $response["id"],
            "name" => $response["name"],
            "full_name" => $response["full_name"],
            "description" => $response["description"],
            "private" => $response["private"],
            "github_user_id" => $response["owner"]["id"],
            "language" => $response["language"],
            "network_count" => $response["network_count"],
            "subscribers_count" => $response["subscribers_count"],
        ]);
        return $repository;
    }

    public function getContentsFromRepository($username, $repository_name){
        $response = Http::withHeaders($this->base_headers)->get($this->base_url."/repos/".$username."/".$repository_name."/contents");
        return $response->json();
    }

    public function getContentFromRepository($username, $repository, $path) {
        $response = Http::withHeaders($this->base_headers)->get($this->base_url."/repos/".$username."/".$repository."/contents/".$path);
        $response = $response->json();
        // base64 decode the content
        if ($response && isset($response["content"])) {
            $response["decoded_content"] = base64_decode($response["content"]);
            $response["repository"] = $repository;
        }
        // add the repository name to all the files
        else {
            foreach ($response as $key => $value) {
                $response[$key]["repository"] = $repository;
            }
        }
        return $response;
    }

    public function getUser($username){
        if (GithubUser::where("login", $username)->exists()) {
            return GithubUser::where("login", $username)->first();
        }

        $response = Http::withHeaders($this->base_headers)->get($this->base_url."/users/".$username);
        $response = $response->json();

        $user = GithubUser::firstOrCreate([
            "github_id" => $response["id"],
            "login" => $response["login"],
            "name" => $response["name"] ?? $response["login"],
            "avatar_url" => $response["avatar_url"],
            "type" => $response["type"],
            "bio" => $response["bio"],
            "public_repos" => $response["public_repos"],
            "public_gists" => $response["public_gists"],
        ]);
        return $user;
    }
    public function getUsers($usernameSearch){
        $response = Http::withHeaders($this->base_headers)->get($this->base_url."/search/users?q=".$usernameSearch."&per_page=10");
        $response = $response->json();
        return $response;
    }

}
