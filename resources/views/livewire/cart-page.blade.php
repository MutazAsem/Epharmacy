<div style="margin-top: 40px">
    <!-- SHOPING CART AREA START -->
    <div class="liton__shoping-cart-area mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping-cart-inner">
                        {{-- <div class="shoping-cart-table table-responsive"> --}}
                        <div class=" table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Unit Name</th>
                                        <th scope="col">Unit Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Subtotal</th>
                                        <th scope="col">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($cartItems as $item)
                                        <tr wire:key="{{ $item['productId'] }}">
                                            <td class="">{{ $loop->iteration }}</td>
                                            <td class="cart-product-image">
                                                <a href="{{ route('productDetails', ['id' => $item['productId']]) }}"><img
                                                        src="{{ url('storage', $item['image']) }}"
                                                        alt="{{ $item['name'] }}"></a>
                                            </td>
                                            <td class="cart-product-info">
                                                <h4><a wire:navigate href="{{ route('productDetails', ['id' => $item['productId']]) }}">{{ $item['name'] }}</a></h4>
                                            </td>
                                            <td class="cart-product-price">${{ $item['unitName'] }}</td>
                                            <td class="cart-product-price">{{ $item['unitAmount'] }}</td>
                                            <td class="cart-product-quantity">
                                                {{-- <div class="cart-plus-minus">
                                                    <input type="text" value="{{ $item['quantity'] }}"
                                                        name="qtybutton" class="cart-plus-minus-box">
                                                </div> --}}
                                                <div class="quantity-control" style="display: flex; align-items: center;">
                                                    <button class="btn btn-primary" wire:click='decrementQty({{ $item['productId'] }}, {{ $item['unitId'] }})' style="margin: 0; padding: .375rem .75rem;">-</button>
                                                    <input type="number" value="{{ $item['quantity'] }}"  class="form-control quantity-input mx-2"  style="width: 70px; text-align: center;">
                                                    <button class="btn btn-primary" wire:click='incrementQty({{ $item['productId'] }}, {{ $item['unitId'] }})' style="margin: 0; padding: .375rem .75rem;">+</button>
                                                </div>
                                            </td>
                                            <td class="cart-product-subtotal">${{ $item['totalAmount'] }}</td>
                                            <td class="cart-product-remove">
                                                <a wire:click='removeItem({{ $item['productId'] }} , {{ $item['unitId'] }})'
                                                    href="#"><i class="fa fa-close" style="font-size:36px;color:red"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">No items available in cart! <br> <a wire:navigate href="{{ url('/shop')}}" > <button type="button" class="btn btn-primary"> Add Items</button></a></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="shoping-cart-total mt-50">
                            
                            @if ($cartItems)
                            <h4>Cart Total</h4>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td><strong><h4>Order Total Price</h4></strong></td>
                                        <td><strong><h4>${{$grandTotal}}</h4></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="btn-wrapper text-right">
                                {{-- wire:click='clearCart()' --}}
                                <a wire:click='clearCart()' href="#" class="theme-btn-1 btn btn-effect-1">Proceed
                                    to checkout</a>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SHOPING CART AREA END -->
</div>
