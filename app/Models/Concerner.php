<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concerner extends Model
{
    //use HasFactory;
      protected $fillable = ['libelle','id_cmd','id_categorie_pois'];
}
