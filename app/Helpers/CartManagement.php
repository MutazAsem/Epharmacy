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
            if ($item['product_id'] == $productId && $item['measurement_units_id'] == $productUnitId) {
                $existingItem = $key;
                break;
            }
        }
        if ($existingItem !== null) {
            $cartItems[$existingItem]['quantity']++;
            $cartItems[$existingItem]['total_product_price'] = $cartItems[$existingItem]['quantity'] * $cartItems[$existingItem]['unit_price'];
        } else {
            
            $product = Product::where('id', $productId)
                ->with('product_measuremen.product_unit')
                ->first(['id', 'name', 'image']);

            if ($product) {
                $unit = $product->product_measuremen->first(); // الحصول على أول وحدة قياس
                $cartItems[] = [
                    'product_id' => $productId,
                    'name' => $product->name,
                    'image' => $product->image,
                    'quantity' => 1,
                    'measurement_units_id' => $unit->product_unit->id,
                    'unitName' => $unit->product_unit->name,
                    'unit_price' => $unit->price,
                    'total_product_price' => $unit->price
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
            if ($item['product_id'] == $productId && $item['measurement_units_id'] == $productUnitId) {
                $existingItem = $key;
                break;
            }
        }
        if ($existingItem !== null) {
            $cartItems[$existingItem]['quantity'] = $quantity  + $cartItems[$existingItem]['quantity'];
            $cartItems[$existingItem]['total_product_price'] = $cartItems[$existingItem]['quantity'] * $cartItems[$existingItem]['unit_price'];
        } else {
            
            $product = Product::where('id', $productId)
                ->with('product_measuremen.product_unit')
                ->first(['id', 'name', 'image']);

            if ($product) {
                // $unit = $product->product_measuremen->first(); // الحصول على أول وحدة قياس
                $cartItems[] = [
                    'product_id' => $productId,
                    'name' => $product->name,
                    'image' => $product->image,
                    'quantity' => $quantity,
                    'measurement_units_id' => $productUnitId,
                    'unitName' => $selectedUnitName,
                    'unit_price' =>  $selectedPrice,
                    'total_product_price' => $selectedPrice * $quantity
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
            if ($item['product_id'] == $productId && $item['measurement_units_id'] == $productUnitId) {
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
            if ($item['product_id'] == $productId && $item['measurement_units_id'] == $productUnitId) {
                $cartItems[$key]['quantity']++;
                $cartItems[$key]['total_product_price'] = $cartItems[$key]['quantity'] * $cartItems[$key]['unit_price'];
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
            if ($item['product_id'] == $productId && $item['measurement_units_id'] == $productUnitId) {
                if ($cartItems[$key]['quantity'] > 1) {
                    $cartItems[$key]['quantity']--;
                    $cartItems[$key]['total_product_price'] = $cartItems[$key]['quantity'] * $cartItems[$key]['unit_price'];
                }
            }
        }
        self::addCartItemsToCookie($cartItems);

        return $cartItems;
    }


    // calculate grand total
    static public function calculateGrandTotal($item)
    {
        return array_sum(array_column($item, 'total_product_price'));
    }
}
