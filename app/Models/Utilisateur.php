<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Utilisateur extends Authenticatable
{
    public $timestamps = false;

    use Notifiable;
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];


    protected $fillable = [
        'prenom',
        'nom',
        'email',
        'password',
        'statut',
        'numero', // Assurez-vous que ce champ est aussi défini dans votre table si vous l'utilisez
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
