<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'albumCover',
        'artistName',
        'albumName',
        'genre',
        'productionYear',
        'label',
        'songsList',
        'note'
    ];
}
