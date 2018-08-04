<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $table = "themes";

    protected $fillable = [
        'title',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts() {
        return $this->hasMany('app\models\Post');
    }

}