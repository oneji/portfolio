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
        $screenshotName = $screenshot->store('uploads/portfolio-screenshots', ['disk' => 'my_files']);
        return $screenshotName;
    }
}
