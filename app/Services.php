<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
	protected $table = 'services';
	protected $hidden = array('created_at','updated_at','deleted_at');
}
