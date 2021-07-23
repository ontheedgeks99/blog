<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{

    protected $primaryKey = 'portfolio_id';

    protected $fillable = ['portfolio_id','image','url','body'];

}
