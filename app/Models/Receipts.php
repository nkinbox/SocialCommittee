<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receipts extends Model
{
    protected $table = "receipts_documents";
    protected $primaryKey = "receipt_id";
    public $timestamps = false;
}
