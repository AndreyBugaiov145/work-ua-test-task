<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $fillable = ['origen_url', 'created_url', 'expired_at'];

    public $timestamps = true;

    public function histories()
    {
        return $this->hasMany(UrlHistory::class);
    }

    public function getExpiredAtLocalAttribute()
    {
        return Carbon::parse($this->expired_at)->timezone('Europe/Kyiv');
    }
}
