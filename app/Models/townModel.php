<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class townModel extends Model
{
    use HasFactory;
    protected $table = 'town_tb';
    public $timestamps= false;
    protected $fillable = ['id','name_town','province_town','island_town','abroad','latitude','longtitude' ];
}
