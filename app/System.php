<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    public function type(){
    	return \App\SystemType::where('id', $this->attributes['type_id'])->get()[0];
    }
}
