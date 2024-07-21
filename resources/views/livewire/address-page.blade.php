<div style="margin-top: 40px">

    <div class="ltn__checkout-area mb-105">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__checkout-inner">

                        <div class="ltn__checkout-single-content mt-50">
                            <h4 class="title-2">Address Details</h4>
                            <div class="ltn__checkout-single-content-info">
                                <form wire:submit.prevent='store' action="#">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-item input-item-name ">
                                                <input type="text" name="ltn__name" placeholder="Address Name"
                                                    wire:model='name'>
                                            </div>
                                            @error('name')
                                                <div style="color: red">{{ $message }} <br><br></div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-item input-item-name ltn__custom-icon">
                                                <select class="nice-select" wire:model='city'>
                                                    <option value="">Select City</option>
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city }}">{{ $city }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('city')
                                                <div style="color: red">{{ $message }} <br><br></div>
                                            @enderror
                                        </div>
                                        <h6>Address Description</h6>
                                        <div class="input-item input-item-textarea ltn__custom-icon">
                                            <textarea name="ltn__message" placeholder="Write Address Description here." wire:model='description'></textarea>
                                        </div>
                                        @error('description')
                                            <div style="color: red">{{ $message }} <br><br></div>
                                        @enderror
                                        <div class="input-item input-item-name ">
                                            <input type="text" name="ltn__name" placeholder="Address Link"
                                                wire:model='addressLink'>
                                        </div>
                                        @error('addressLink')
                                            <div style="color: red">{{ $message }} <br><br></div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="ltn__checkout-payment-method mt-50">

                                            <button class="btn theme-btn-1 btn-effect-1 text-uppercase"
                                                type="submit">Save Address</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
