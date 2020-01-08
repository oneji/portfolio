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
        'title_en',
        'title_ru',
        'subtitle_en',
        'subtitle_ru',
        'link',
        'cover_image',
        'description_en',
        'description_ru'
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
