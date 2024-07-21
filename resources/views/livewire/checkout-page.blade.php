<div style="margin-top: 40px">
    <!-- WISHLIST AREA START -->
    <div class="ltn__checkout-area mb-105">
        <form wire:submit.prevent='placeOrder' action="#">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ltn__checkout-inner">
                            <div class="ltn__checkout-single-content mt-50">
                                <h4 class="title-2">Billing Details</h4>
                                <div class="ltn__checkout-single-content-info">
                                    <h6>Personal Information</h6>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">First Name</label>
                                            <div class="input-item input-item-name ltn__custom-icon">
                                                <input type="text" wire:model='name' name="name"
                                                    value="{{ $client->name }}" placeholder="First name" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Last Name</label>
                                            <div class="input-item input-item-name ltn__custom-icon">
                                                <input type="text" wire:model='last_name' name="last_name"
                                                    value="{{ $client->last_name }}" placeholder="Last name" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Email</label>
                                            <div class="input-item input-item-email ltn__custom-icon">
                                                <input type="email" wire:model='email' name="email"
                                                    value="{{ $client->email }}" placeholder="email address" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Mobile</label>
                                            <div class="input-item input-item-phone ltn__custom-icon">
                                                <input type="text" name="mobile" wire:model='mobile'
                                                    value="{{ $client->mobile }}" placeholder="phone number" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-">
                                            <h6>Address</h6>
                                            <div class="input-item">
                                                <select class="nice-select" wire:model='address'>
                                                    <option  value="">Select Address</option>
                                                    @foreach ($addresses as $address)
                                                        <option value="{{ $address->id }}">{{ $address->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('address')
                                                    <div style="color: red">{{ $message }} <br><br></div>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                    <h6>Order Notes (optional)</h6>
                                    <div class="input-item input-item-textarea ltn__custom-icon">
                                        <input type="text" wire:model.live='note' name="note"
                                            placeholder="Notes about your order, e.g. special notes for delivery."></input>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Payment methods">
                                        <input type="radio" class="btn-check" name="payment_method"
                                            id="payment_method1" autocomplete="off" wire:model.live='payment_method'
                                            value="Paiement when recieving" checked>
                                        <label class="btn btn-outline-success" for="payment_method1">
                                            <i class="bi bi-cash-coin"></i> Paiement when receiving
                                        </label>

                                        <input type="radio" class="btn-check" name="payment_method"
                                            id="payment_method2" autocomplete="off" wire:model.live='payment_method'
                                            value="Payment via wallet">
                                        <label class="btn btn-outline-secondary" for="payment_method2">
                                            <i class="bi bi-wallet"></i> Payment via wallet
                                        </label>
                                        @error('payment_method')
                                        <div style="color: red">{{ $message }}</div>
                                    @enderror
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">

                    </div>
                    <div class="col-lg-6">
                        <div class="shoping-cart-total mt-50">
                            <h4 class="title-2">Cart Totals</h4>
                            <table class="table">
                                <tbody>
                                    @foreach ($cartItems as $item)
                                        <tr wire:key={{ $item['product_id'] }}>
                                            <td>{{ $item['name'] }} <strong>X {{ $item['quantity'] }}</strong></td>
                                            <td>${{ $item['total_product_price'] }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td><strong>Order Total</strong></td>
                                        <td><strong>${{ $grandTotal }}</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Place order</button>
            </div>
        </form>
    </div>
</div>
<!-- WISHLIST AREA START -->
</div>
