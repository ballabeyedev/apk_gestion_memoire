<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Memoire extends Authenticatable
{
    public $timestamps = false;

    use Notifiable;

    protected $fillable =
    [
        'titre',
        'auteur',
        'date_soutenance',
        'filiere',
        'pdf_path'
    ];

}
