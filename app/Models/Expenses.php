<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    protected $table = "expenses";
    protected $primaryKey = "expense_id";
    public $timestamps = false;
}
