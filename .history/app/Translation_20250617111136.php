<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $fillable = ['table_name', 'column_name', 'row_id', 'language', 'translated_text'];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class, 'row_id')->where('table_name', 'portfolio');
    }
}
