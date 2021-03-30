<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandesPoissons extends Model
{
    use HasFactory;
    protected $fillable = ['commande_id','poisson_id', 'quantity'];
}
