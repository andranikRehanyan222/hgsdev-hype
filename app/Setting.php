<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Setting extends Model
{
	protected $table = 'settings';

	public static function kv()
	{
		$data = [];
		foreach (Setting::all() as $value) {
			$data[$value->name] = $value->text;
		}
		return $data;
	}
}
