<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected  $fillable=[
        'title', 'post', 'excerpt', 'img1', 'img2', 'img3', 'img4','img5','img6','img7', 'id_cat','url'
    ];
}
