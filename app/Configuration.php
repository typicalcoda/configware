<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Configuration extends Eloquent
{
    protected $collection = 'configs';
    protected $connection = 'mongodb';

    public function models(){
    	return $this->attributes['models'];
    }
}
