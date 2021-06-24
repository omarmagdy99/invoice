<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class invoice extends Model
{
    protected $guarded=[];
    use SoftDeletes;
    public function Section()
    {
        return $this->belongsTo('App\sections', 'section_id');
    }
    
}
