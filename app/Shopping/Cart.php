<?php
namespace App\Shopping;

    class Cart
    {
        // Client buy items which store it
        Public $items = null;

        // Client buy items total price which default 0
        public $totalPrice = 0;

        // Client buy items total quantity which default 0
        public $totalQuantity = 0;

        function addToCart($product,$id)
        {
            $storeItem = ['qty'=> 0, 'price'=> $product->price, 'title' => $product->title];

            if($this->items)
                if(array_key_exists($id,$this->items))
                    $storeItem = $this->items[$id];

            $this->totalPrice += $product->price;
            $this->totalQuantity ++;
            $storeItem['qty'] ++;
            
            $this->items[$id] = $storeItem;
        }

    }



?>
