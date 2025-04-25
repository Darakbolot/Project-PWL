<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    protected $fillable = [
        'judul', 'kode_makul', 'url_presentation', 'url_finished',
        'creator_email', 'created_at', 'updated_at',
    ];

    public $timestamps = true;
}
