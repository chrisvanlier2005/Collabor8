<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Team extends Model
{
    use HasFactory;
    public function teamUser() : HasOne
    {
        return $this->hasOne(TeamUser::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'team_users', 'team_id', 'user_id');
    }

    public function message(){
        return $this->hasMany(TeamMessage::class);
    }
}
