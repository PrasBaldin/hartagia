<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = ['project_name', 'image_1'];

    public function translations()
    {
        return $this->hasMany(Translation::class, 'row_id')->where('table_name', 'portfolio');
    }
}
