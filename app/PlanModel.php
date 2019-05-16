<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanModel extends Model
{
	protected $table = 'plans';
	protected $guarded = [];

	public function admin_update($data)
	{
		$this->name = $data->input('name');
		$this->price = $data->input('price');
		$this->price_ = $data->input('');
		$this->name = $data->input('');
		return $this->save();
	}


}
