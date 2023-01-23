<?php

namespace App\Services;

use App\Models\GithubContent;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class GithubService
{
    private $key; // github api key
    private $base_url = "https://api.github.com";

    private $cache_time = 60 * 30; // 30 minutes
    private $base_headers = [
        "Accept" => "application/vnd.github.v3+json",
        "Content-Type" => "application/json",
        "Authorization" => "Bearer "
    ];

    public function __construct()
    {
        $this->key = config("services.github.key");
        $this->base_headers["Authorization"] .= $this->key;
    }

    public function getRepositoriesFromUser($username)
    {
        return Cache::remember("github_repositories_" . $username, $this->cache_time, function () use ($username) {
            $response = Http::withHeaders($this->base_headers)->get($this->base_url . "/users/" . $username . "/repos");
            $collection = $response->collect();
            // remove the unnecessary data
            $collection = $collection->map(function ($item) {
                $item = collect($item);
                return $item->forget([
                    "html_url",
                    "forks_url",
                    "keys_url",
                    "collaborators_url",
                    "teams_url",
                    "hooks_url",
                    "issue_events_url",
                    "events_url",
                    "assignees_url",
                    "branches_url",
                    "tags_url",
                    "blobs_url",
                    "git_tags_url",
                    "git_refs_url",
                    "trees_url",
                    "statuses_url",
                    "languages_url",
                    "stargazers_url",
                    "contributors_url",
                    "subscribers_url",
                    "subscription_url",
                    "commits_url",
                    "git_commits_url",
                    "comments_url",
                    "issue_comment_url",
                    "contents_url",
                    "compare_url",
                    "merges_url",
                    "archive_url",
                    "downloads_url",
                    "issues_url",
                    "pulls_url",
                    "milestones_url",
                    "notifications_url",
                    "labels_url",
                    "releases_url",
                    "deployments_url",
                ]);
            });
            return $collection->toArray();
        });
    }

    public function getRepositoryFromUser($username, $repository_name)
    {


        return Cache::remember("github_repository_" . $username . "_" . $repository_name, 60 * 60, function () use ($username, $repository_name) {
            $response = Http::withHeaders($this->base_headers)->get($this->base_url . "/repos/" . $username . "/" . $repository_name);
            return $response->json();
        });

    }

    public function getContentsFromRepository($username, $repository_name)
    {
        $response = Http::withHeaders($this->base_headers)->get($this->base_url . "/repos/" . $username . "/" . $repository_name . "/contents");
        return $response->json();
    }

    public function getContentFromRepository($username, $repository, $path)
    {
        return Cache::remember("github_content_" . $username . "_" . $repository . "_" . $path, $this->cache_time, function () use ($username, $repository, $path) {
            $response = Http::withHeaders($this->base_headers)->get($this->base_url . "/repos/" . $username . "/" . $repository . "/contents/" . $path);
            $response = $response->json();
            return $response;
        });

    }

    public function getUser($username)
    {
        return Cache::remember("github_user_" . $username, $this->cache_time, function () use ($username) {
            $response = Http::withHeaders($this->base_headers)->get($this->base_url . "/users/" . $username);
            $response = $response->json();
            return $response;
        });

    }

    public function getUsers($usernameSearch)
    {
        return Cache::remember("github_users_" . $usernameSearch, $this->cache_time, function () use ($usernameSearch) {
            $response = Http::withHeaders($this->base_headers)->get($this->base_url . "/search/users?q=" . $usernameSearch . "&per_page=10");
            $response = $response->json();
            return $response;
        });
    }


}

