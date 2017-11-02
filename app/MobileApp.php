<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MobileApp extends Model
{
    protected $table = 'applications';

    protected $keyType = 'string';

    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    public function downloads()
    {
        return $this->hasMany('App\AppDownload', 'app_id', 'id');
    }
}
