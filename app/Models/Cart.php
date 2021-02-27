<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public $products = null;
    public $totalQuantity = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->products = $oldCart->products;
            $this->totalQuantity = $oldCart->totalQuantity;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function session()
    {
        return $this->belongsTo(Session::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function add($product)
    {
        $storedProduct = ['quantity' => 0, 'price' => $product->price, 'product' => $product];

        if ($this->products) {
            if (array_key_exists($product->id, $this->products)) {
                $storedProduct = $this->products[$product->id];
            }
        }

        $storedProduct['quantity']++;
        $storedProduct['price'] = $product->price * $storedProduct['quantity'];

        $this->products[$product->id] = $storedProduct;
        $this->totalQuantity++;
        $this->totalPrice += $product->price;
    }

    public function remove($product)
    {
        $storedProduct = [
            'quantity' => $product['quantity'],
            'price' => $product->price,
            'product' => $product
        ];

        if ($this->products) {
            if (array_key_exists($product->id, $this->products)) {
                $storedProduct = $this->products[$product->id];
            }
        }

        $storedProduct['price'] = $product->price * $storedProduct['quantity'];

        $this->totalQuantity -= $storedProduct['quantity'];
        $this->totalPrice -= $storedProduct['price'];
        unset($this->products[$product->id]);
    }
}
