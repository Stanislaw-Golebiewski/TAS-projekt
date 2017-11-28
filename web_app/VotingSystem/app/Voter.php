<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    protected $table = 'users';
    protected $data = ['id','whovote','name', 'surname','born','email','password', 'passport','voted'];
}
