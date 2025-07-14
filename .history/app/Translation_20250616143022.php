<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Portfolio;

class Translation extends Model
{
    protected $fillable = ['table_name', 'column_name', 'row_id', 'language', 'translated_text'];

    public function portfolio(): BelongsTo
    {
        return $this->belongsTo(Portfolio::class, 'row_id')->where('table_name', 'portfolio');
    }
}
