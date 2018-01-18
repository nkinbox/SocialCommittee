<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ECSDocuments extends Model
{
    protected $table = "ecs_documents";
    protected $primaryKey = "sno";
    public $timestamps = false;
    protected $fillable = [
        'document_name', 'esc_id', 'file_name'
    ];
}
