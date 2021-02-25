<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'text',
        'author',
        'img_path',
        'publication_date'
    ];

    //Relazione DB
    public function infoPost() {
        return $this->hasOne('App\InfoPost');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }

    public function images() {
        return $this->belongsToMany('App\Image', 'post_image');
    }
}
