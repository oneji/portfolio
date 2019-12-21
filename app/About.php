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
        'first_name',
        'last_name',
        'birthday',
        'residence',
        'email',
        'phone',
        'skype',
        'wechat',
        'description',
        'photo',
        'cv',
        'dev_status',
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
