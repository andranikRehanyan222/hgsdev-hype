<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use App\Product as Product;
use App\Account as Account;

class Order extends Model
{
	protected $table = 'orders';

    public function account()
    {
        return $this->belongsTo('App\Account', 'id_account');
    }
    
    public function user()
    {
        return $this->belongsTo('App\user', 'id_user');
    }
}
