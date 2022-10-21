<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['title','description','photo_id','user_id'];


    function users(){
        return $this->belongsTo(User::class);
    }

    function photos(){
        return $this->hasMany(Photo::class);
    }
function comments(){
        return $this->hasMany(Comment::class);
    }
}
