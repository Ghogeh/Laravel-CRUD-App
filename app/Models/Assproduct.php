<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assproduct extends Model
{
    use HasFactory;

    protected $table = 'assproducts';
    public $timestamps = true;

   

    protected $fillable = [
        'name',
        'students_id',
        'created_at',
        'projects_id',
        
    ];
}
