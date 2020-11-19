<?php


namespace App\Facade;



class CartItem
{
    /**
     * The unique identifier of the cart item and its options.
     *
     * Used to identify shopping cart items with the same id, but with different
     * options (e.g. different color).
     *
     * @var string
     */
    public $uniqueId;
    /**
     * The identifier of the cart item.
     *
     * @var int|string
     */
    public $id;
    /**
     * The name of the cart item.
     *
     * @var string
     */
    public $name;
    /**
     * The price of the cart item.
     *
     * @var float
     */
    public $price;
    /**
     * The quantity for this cart item.
     *
     * @var int|float
     */
    public $quantity;
    /**
     * The options for this cart item.
     *
     * @var array
     */
    public $options;

    public function __construct($id, $name, $price, $quantity, array $options)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = (int) $price;
        $this->quantity = (int) $quantity;
        $this->options = $options;
        $this->uniqueId = $this->generateUniqueId();
    }

    /**
     * Generate a unique id for the cart item.
     *
     * @return string
     */
    protected function generateUniqueId()
    {
        ksort($this->options);
        return md5(time() . serialize($this->options));
    }
}
