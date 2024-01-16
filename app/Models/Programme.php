<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;


protected $fillable = [
        'prenom_candidat',
        'nom_candidat',
        'email_candidat',
        'fonction_candidat',
        'projet',
        'document',
    ];


}
