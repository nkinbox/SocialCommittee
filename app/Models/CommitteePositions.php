<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class CommitteePositions extends Model
{
    protected $table = "committee_positions";
    protected $primaryKey = "position_id";
    public $timestamps = false;
}
