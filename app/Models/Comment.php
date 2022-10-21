<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=['comment','news_id','user_id'];


    function users(){
        return $this->belongsTo(User::class);
    }

    function news(){
        return $this->belongsTo(News::class);
    }


}
