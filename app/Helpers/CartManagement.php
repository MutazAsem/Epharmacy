<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Cookie;

class CartManagement{
    

    // add item to cart 


    // remove item from cart

    // add cart items to cookie
    static public function addCartItemsToCookie ($cartItems){
        Cookie::queue('cartItems', json_encode($cartItems), 60 * 24 * 30);
    }


    // clear cart items from cookie
    static public function clearCartItemsFromCookie () {
        Cookie::queue(Cookie::forget('cartItems'));
    }


    // get all cart items from cookie
    static public function getAllCartItemsFromCookie () {
        $cartItems = json_decode(Cookie::get('cartItems') , true);

        if (!$cartItems){
            $cartItems = [];
        }

        return $cartItems;
    }


    // increment item quantity

    // decrement item quantity

    // calculate grand total
}