<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "users";

    protected $fillable = [
        "name"
    ];

    public function posts() {
        return $this->hasMany('app\models\Post');
    }
}