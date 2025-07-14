<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['image'];

    public function translations()
    {
        return $this->hasMany(Translation::class, 'row_id')->where('table_name', 'services');
    }
}
