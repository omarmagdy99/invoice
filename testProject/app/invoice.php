<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    protected $guarded=[];
    public function Section()
    {
        return $this->belongsTo('App\sections', 'section_id');
    }
    
}
