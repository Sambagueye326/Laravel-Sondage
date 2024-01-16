<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;


// Dans le modèle Like.php
protected $fillable = ['user_id', 'liked_item_id', 'liked_item_type', 'like'];




}
