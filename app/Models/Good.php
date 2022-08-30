<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function tweets(){
        return $this->belongsTo(Tweets::class, "tweet_id", "id");
    }

}
