<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'cover',
        'template',
    ];

    public function getAll()
    {
        return self::orderBy('id', 'desc')->get();
    }
}
