<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    public function type(){
    	return \App\SystemType::where('id', $this->attributes['type_id'])->first();
    }

    public function config(){
    	return \App\Configuration::where('_id', $this->attributes['config_id'])->first();
    }
}
