<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterTutorial extends Model
{
    use HasFactory;

    protected $table = 'master_tutorials'; 

    protected $fillable = [
        'judul',
        'kode_matkul',
        'url_presentation',
        'url_finished',
        'unique_identifier_presentation',
        'unique_identifier_finished',
        'creator_email',
    ];

    public function details()
    {
        return $this->hasMany(DetailTutorial::class, 'master_tutorial_id');
    }
}
