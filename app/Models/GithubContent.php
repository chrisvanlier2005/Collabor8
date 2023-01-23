<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GithubContent extends Model
{
    use HasFactory;
    protected $fillable = [
        "path",
        "type",
        "name",
        "size",
        "content",
        "repository_id",
        "repository"
    ];

}
