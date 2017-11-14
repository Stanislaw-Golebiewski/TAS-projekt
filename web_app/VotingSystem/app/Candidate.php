<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = 'candidates';
    protected $data = ['id','name', 'surname', 'school', 'fraction','numberonlist','votes'];
}
