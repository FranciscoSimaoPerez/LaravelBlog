<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // Table name
    protected $table = 'articles';
    // Primary key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}
