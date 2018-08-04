<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $table = "themes";

    protected $fillable = [
        'title',
    ];

    public function posts() {
        return $this->hasMany('app\models\Post');
    }

}