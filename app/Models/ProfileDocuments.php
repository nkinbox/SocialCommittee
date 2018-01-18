<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileDocuments extends Model
{
    protected $table = "profile_documents";
    protected $primaryKey = "sno";
    public $timestamps = false;
    protected $fillable = [
        'member_id', 'document_name', 'file_name'
    ];
}
