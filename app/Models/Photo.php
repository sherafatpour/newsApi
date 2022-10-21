<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable= ['photo_path','photo_description','news_id'];

    function news(){
        return $this->belongsTo(News::class);
    }
}
