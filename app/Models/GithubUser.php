<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GithubUser extends Model
{
    protected $fillable = [
        "github_id",
        "login",
        "name",
        "avatar_url",
        "type",
        "bio",
        "public_repos",
        "public_gists"
    ];
    use HasFactory;

    public function repositories(){
        return $this->hasMany(GithubRepository::class, "github_user_id", "github_id");
    }
}
