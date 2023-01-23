<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GithubRepository extends Model
{
    use HasFactory;
    protected $fillable = [
        "github_user_id",
        "github_id",
        "name",
        "full_name",
        "private",
        "description",
        "language",
        "subscribers_count",
        "network_count"
    ];

    public function githubUser()
    {
        return $this->belongsTo(GithubUser::class, "github_user_id", "id");
    }

}
