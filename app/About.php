<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name_en',
        'first_name_ru',
        'last_name_en',
        'last_name_ru',
        'birthday',
        'residence_en',
        'residence_ru',
        'email',
        'phone',
        'skype',
        'wechat',
        'description_en',
        'description_ru',
        'photo',
        'cv',
        'dev_status_en',
        'dev_status_ru',
        'facebook',
        'linkedin',
        'github'
    ];

    public static function uploadPhoto($photo)
    {
        $fileNameToStore = time().'.'.$photo->getClientOriginalExtension();
        $fileNameToStore = $photo->store('about-files', 's3');

        return env('AWS_URL').'/'.$fileNameToStore;
    }
}
