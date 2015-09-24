<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicesTypesMapping extends Model
{
	protected $table = 'services_types_mapping';
	protected $hidden = array('created_at','updated_at','deleted_at');
	public $timestamps = false;
}
