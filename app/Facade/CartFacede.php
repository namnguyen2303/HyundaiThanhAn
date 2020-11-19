<?php


namespace App\Facade;


use Illuminate\Support\Facades\Facade;

/**
 * @method static add($id, $quantity, $name, $price, array $options = [])
 * @method static update($uniqueId, $quantity);
 * @method static getTotal($shipping = null);
 * @method static getQty();
 * @method static clear();
 * @method static delete($uniqueId);
 * @method static content();
 *
 * @see Cart
 */
class CartFacede extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Cart::class;
    }
}
