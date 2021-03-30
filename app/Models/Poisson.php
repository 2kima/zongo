<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poisson extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'prix','qte_stock','images'];
}
