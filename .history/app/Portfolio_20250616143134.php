<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Portfolio extends Model
{
    protected $fillable = ['image'];

    public function translations()
    {
        return $this->hasMany(Translation::class, 'row_id')->where('table_name', 'portfolio');
    }
}
