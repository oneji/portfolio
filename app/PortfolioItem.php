<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PortfolioItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'subtitle',
        'link',
        'cover_image',
        'description'
    ];

    public $timestamps = false;
}
