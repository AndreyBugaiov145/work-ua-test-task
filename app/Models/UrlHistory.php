<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UrlHistory extends Model
{
    protected $fillable = [
        'url_id',
        'ip',
        'user_agent',
        'visited_at',
    ];

    public $timestamps = false;

    protected $casts = [
        'visited_at' => 'datetime',
    ];

    public function url()
    {
        return $this->belongsTo(Url::class);
    }
}
