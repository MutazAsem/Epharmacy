<?php

namespace App\Helpers;

use App\Models\Product;
use Illuminate\Support\Facades\Cookie;

class CartManagement
{


    // add item to cart 
    static public function addItemToCart($productId , $productUnitId)
    {
        $cartItems = self::getAllCartItemsFromCookie();

        $existingItem = null;

        foreach ($cartItems as $key => $item) {
            if ($item['productId'] == $productId && $item['unitId'] == $productUnitId) {
                $existingItem = $key;
                break;
            }
        }
        if ($existingItem !== null) {
            $cartItems[$existingItem]['quantity']++;
            $cartItems[$existingItem]['totalAmount'] = $cartItems[$existingItem]['quantity'] * $cartItems[$existingItem]['unitAmount'];
        } else {
            
            $product = Product::where('id', $productId)
                ->with('product_measuremen.product_unit')
                ->first(['id', 'name', 'image']);

            if ($product) {
                $unit = $product->product_measuremen->first(); // الحصول على أول وحدة قياس
                $cartItems[] = [
                    'productId' => $productId,
                    'name' => $product->name,
                    'image' => $product->image,
                    'quantity' => 1,
                    'unitId' => $unit->product_unit->id,
                    'unitName' => $unit->product_unit->name,
                    'unitAmount' => $unit->price,
                    'totalAmount' => $unit->price
                ];
            }
        }

        self::addCartItemsToCookie($cartItems);
        return $cartItems;
    }


     // add item to cart with Qty
    static public function addItemToCartWithQty($productId , $quantity , $productUnitId, $selectedUnitName ,  $selectedPrice)
    {
        $cartItems = self::getAllCartItemsFromCookie();

        $existingItem = null;

        foreach ($cartItems as $key => $item) {
            if ($item['productId'] == $productId && $item['unitId'] == $productUnitId) {
                $existingItem = $key;
                break;
            }
        }
        if ($existingItem !== null) {
            $cartItems[$existingItem]['quantity'] = $quantity  + $cartItems[$existingItem]['quantity'];
            $cartItems[$existingItem]['totalAmount'] = $cartItems[$existingItem]['quantity'] * $cartItems[$existingItem]['unitAmount'];
        } else {
            
            $product = Product::where('id', $productId)
                ->with('product_measuremen.product_unit')
                ->first(['id', 'name', 'image']);

            if ($product) {
                // $unit = $product->product_measuremen->first(); // الحصول على أول وحدة قياس
                $cartItems[] = [
                    'productId' => $productId,
                    'name' => $product->name,
                    'image' => $product->image,
                    'quantity' => $quantity,
                    'unitId' => $productUnitId,
                    'unitName' => $selectedUnitName,
                    'unitAmount' =>  $selectedPrice,
                    'totalAmount' => $selectedPrice * $quantity
                ];
            }
        }

        self::addCartItemsToCookie($cartItems);
        return $cartItems;
        
    }

    // remove item from cart
    static public function removeItemFromCart($productId , $productUnitId)
    {
        $cartItems = self::getAllCartItemsFromCookie();

        foreach ($cartItems as $key => $item) {
            if ($item['productId'] == $productId && $item['unitId'] == $productUnitId) {
                unset($cartItems[$key]);
            }
        }

        self::addCartItemsToCookie($cartItems);

        return $cartItems;
    }


    // add cart items to cookie
    static public function addCartItemsToCookie($cartItems)
    {
        Cookie::queue('cartItems', json_encode($cartItems), 60 * 24 * 30);
    }


    // clear cart items from cookie
    static public function clearCartItemsFromCookie()
    {
        Cookie::queue(Cookie::forget('cartItems'));
    }


    // get all cart items from cookie
    static public function getAllCartItemsFromCookie()
    {
        $cartItems = json_decode(Cookie::get('cartItems'), true);

        if (!$cartItems) {
            $cartItems = [];
        }

        return $cartItems;
    }


    // increment item quantity
    static public function incrementQuantityToCartItem($productId , $productUnitId)
    {
        $cartItems = self::getAllCartItemsFromCookie();

        foreach ($cartItems as $key => $item) {
            if ($item['productId'] == $productId && $item['unitId'] == $productUnitId) {
                $cartItems[$key]['quantity']++;
                $cartItems[$key]['totalAmount'] = $cartItems[$key]['quantity'] * $cartItems[$key]['unitAmount'];
            }
        }

        self::addCartItemsToCookie($cartItems);
        return $cartItems;
    }


    // decrement item quantity
    static public function decrementQuantityToCartItem($productId , $productUnitId)
    {
        $cartItems = self::getAllCartItemsFromCookie();
        foreach ($cartItems as $key => $item) {
            if ($item['productId'] == $productId && $item['unitId'] == $productUnitId) {
                if ($cartItems[$key]['quantity'] > 1) {
                    $cartItems[$key]['quantity']--;
                    $cartItems[$key]['totalAmount'] = $cartItems[$key]['quantity'] * $cartItems[$key]['unitAmount'];
                }
            }
        }
        self::addCartItemsToCookie($cartItems);

        return $cartItems;
    }


    // calculate grand total
    static public function calculateGrandTotal($item)
    {
        return array_sum(array_column($item, 'totalAmount'));
    }
}
