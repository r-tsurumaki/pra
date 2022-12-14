<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\User;

class Tweet extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
