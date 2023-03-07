<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HobiModel extends Model
{
    use HasFactory;
    protected $table = 'hobi';
    protected $primaryKey = 'no';
    protected $keyType = 'string';
}
