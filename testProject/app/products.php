<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{

     protected $guarded=[];

    public function Section()
    {
        return $this->belongsTo('App\sections', 'sectionId');
    }
}
