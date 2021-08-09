<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImportDetail extends Model
{
    protected $guarded = [];

    public function import()
    {
        return $this->belongsTo(Import::class);
    }
}
