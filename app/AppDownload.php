<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppDownload extends Model
{
    protected $table = 'app_downloads';

    public function application()
    {
        return $this->hasOne('App\MobileApp', 'id', 'app_id');
    }
}
