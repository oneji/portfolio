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
        'dev_status'
    ];

    public static function uploadPhoto($photo)
    {
        $fileNameToStore = time().'.'.$photo->getClientOriginalExtension();
        $fileNameToStore = $photo->store('uploads', ['disk' => 'my_files']);

        return $fileNameToStore;
    }
}
