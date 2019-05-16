<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
	protected $table = 'products';
	protected $casts = [
        'addons' => 'array',
    ];
protected static function boot()
{
    parent::boot();

    // Order by name ASC
    static::addGlobalScope('order', function (Builder $builder) {
        $builder->orderBy('is_deleted', 'asc');
        $builder->orderBy('cost', 'asc');
    });
}

    function addons()
    {
    	return json_decode($this->addons);
    }
}
