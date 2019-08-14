<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    public $timestamps = false;

    public static function getInfo()
    {
        return self::join('countries', 'education.country_id', '=', 'countries.id')
                    ->select('education.*', 'countries.country_name')
                    ->orderBy('education.id', 'desc')
                    ->get();
    }
}
