<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function getReport(){
        return $this->belongsTo(Report::class, 'issue_id', 'id');
    }
}
