<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ExpenseDocuments extends Model
{
    protected $table = "expense_documents";
    protected $primaryKey = "sno";
    public $timestamps = false;
}
