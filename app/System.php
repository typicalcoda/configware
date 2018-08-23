<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    public function Types(){
    	$type_ids = \App\TypeRelationship::where("system_id", $this->attributes['id'])->get();
    	return \App\SystemType::whereIn('id', $type_ids)->get();
    }
}
