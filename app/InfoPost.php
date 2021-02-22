<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoPost extends Model
{
     /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */

     protected $fillable = [
        'post_id',
        'post_status',
        'comment_status'

     ];

    public $timestamps = false;

    //Relazione DB
    public function post() {
        return $this->belongsTo('App\Post');
    }
}
