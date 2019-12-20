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

    public static function uploadScreenshots($screenshot)
    {
        $screenshotName = time().'.'.$screenshot->getClientOriginalExtension();
        $screenshotName = $screenshot->store('portfolio-screenshots', 's3');
        return [
            'id' => uniqid(''),
            'link' => env('AWS_URL').'/'.$screenshotName
        ];
    }
}
