<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\User;

class Tweet extends Model
{
    use HasFactory;

    public function comment_user(){
        return $this->belongsTo(User::class);
    }
}
