<?php


namespace App\Facade;


class Cart
{
    public function __construct()
    {
        if (!\session()->has('cart')) {
            \session()->put('cart', []);
        }
    }

    public function getTotal($shipping = null) {

        $cart = \session()->get('cart');

        if (empty($cart)) {
            return 0;
        }

        $sum = 0;
        foreach ($cart as $item) {
            /** @var CartItem $item */
            $sum += ($item->quantity * $item->price);
        }

        if (!is_null($shipping)) {
            $sum += $shipping;
        }
        return number_format($sum);
    }
    public function getQty()
    {
        return count(\session()->get('cart') ?? []);
    }

    public function add($id, $quantity, $name, $price, array $options = [])
    {
        if ($uniqueId = $this->checkExitCart($id)) {
            $cartItem = new CartItem($id, $name, $price, $quantity, $options);

            $item = [$cartItem->uniqueId => $cartItem];

            $cart = \session()->get('cart');

            $cart = array_merge($cart, $item);

            \session()->put('cart', $cart);
        } else {
            $this->update($uniqueId, $quantity);
        }
    }

    public function update($uniqueId, $quantity)
    {
        $cart = \session()->get('cart');
        
        $cart[$uniqueId]->quantity = $quantity;
        
        \session()->put('cart', $cart);
    }

    public function clear()
    {
        \session()->forget('cart');
    }

    public function delete($uniqueId)
    {
        $cart = \session()->get('cart');

        unset($cart[$uniqueId]);

        \session()->put('cart', $cart);
    }

    public function content()
    {
        return \session()->get('cart') ?? [];
    }

    private function checkExitCart($id)
    {
        $cart = \session()->get('cart');

        foreach ($cart as $uniqueId => $item) {
            /** @var CartItem $item */
            if ($id === $item->id) {
                return $uniqueId;
            }
        }
        return true;
    }
}
