<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";

    protected $fillable = [
        'content',
        'user_id',
        'theme_id',
    ];

    public function user() {
        return $this->belongsTo('app\models\User');
    }

    public function theme() {
        return $this->belongsTo('app\models\Theme');
    }

}