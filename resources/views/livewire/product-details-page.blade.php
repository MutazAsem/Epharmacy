<div style="margin-top: 40px">
    <!-- SHOP DETAILS AREA START -->
    <div class="ltn__shop-details-area pb-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="ltn__shop-details-inner mb-60">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="ltn__shop-details-img-gallery">
                                    <div class="ltn__shop-details-large-img">
                                        <div class="single-large-img">
                                            <img src="{{ url('storage', $product->image) }}" alt="{{ $product->name }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="modal-product-info shop-details-info pl-0">

                                    <h3>{{ $product->name }}</h3>
                                    <div class="modal-product-meta ltn__product-details-menu-1">
                                        <ul>
                                            <li>
                                                <strong>Categories:</strong>
                                                <span>
                                                    {{ $product->product_category->name }}
                                                </span>
                                            </li>
                                            <li>
                                                <strong>Made in:</strong>
                                                <span>
                                                    {{ $product->made_in }}
                                                </span>
                                            </li>
                                            <li>
                                                <strong>Effective Material:</strong>
                                                <span>
                                                    {{ $product->effective_material }}
                                                </span>
                                            </li>

                                            <li>
                                                <strong>Manufacture company:</strong>
                                                <span>
                                                    {{ $product->manufacture_company }}
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="modal-product-meta ltn__product-details-menu-1">
                                        <hr>
                                        <h4>Unit Price</h4>
                                        <hr>
                                        @if ($productPrice->product_measuremen->isNotEmpty())
                                            @php
                                                $firstMeasurementUnit = $productPrice->product_measuremen;
                                            @endphp
                                            @foreach ($firstMeasurementUnit as $pro)
                                                <div class="product-price" style="font-size: 25px;"
                                                    wire:key="{{ $pro->id }}">
                                                    {{-- <label>
                                                        <input type="radio" name="unit" value="{{ $pro->price }}"
                                                            wire:model="selectedPrice"
                                                            wire:change="updateProductUnit({{ $pro->product_unit->id }}, '{{ $pro->product_unit->name }}')"
                                                            required>
                                                        ${{ $pro->price }} - {{ $pro->product_unit->name }}
                                                    </label><br> --}}
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="unit" name="unit" class="custom-control-input" value="{{ $pro->price }}"
                                                        wire:model="selectedPrice"
                                                        wire:change="updateProductUnit({{ $pro->product_unit->id }}, '{{ $pro->product_unit->name }}')">
                                                        <label class="custom-control-label" for="unit">${{ $pro->price }} - {{ $pro->product_unit->name }}</label>
                                                      </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="ltn__product-details-menu-2">
                                        <ul>
                                            <li>
                                                {{-- <div class="cart-plus-minus">
                                                    <input type="text" wire:model="quantity" name="qtybutton"
                                                        class="cart-plus-minus-box" >
                                                </div> --}}
                                                <div class="quantity-control" style="display: flex; align-items: center;">
                                                    <button class="btn btn-primary" wire:click='decrementQty' style="margin: 0; padding: .375rem .75rem;">-</button>
                                                    <input type="number"  wire:model="quantity" class="form-control quantity-input mx-2"  style="width: 70px; text-align: center;" readonly>
                                                    <button class="btn btn-primary" wire:click='incrementQty' style="margin: 0; padding: .375rem .75rem;">+</button>
                                                </div>
                                                <br>
                                                

                                            </li>
                                            <li>
                                                <a wire:click.prevent='addToCart({{ $product->id }})' href="#"
                                                    class="theme-btn-1 btn btn-effect-1" title="Add to Cart"
                                                    data-bs-toggle="modal" data-bs-target="#add_to_cart_modal"
                                                    @if(!$selectedPrice) disabled="disabled" style="pointer-events: none; opacity: 0.5; cursor: not-allowed;" @endif>
                                                    <i class="fas fa-shopping-cart"></i>
                                                    <span wire:loading.remove
                                                        wire:target='addToCart({{ $product->id }})'>ADD TO CART</span>
                                                    <span wire:loading
                                                        wire:target='addToCart({{ $product->id }} )'>Adding TO CART</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Shop Tab End -->
                </div>

                <div class="col-lg-4">
                    <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
                        <!-- Top Rated Product Widget -->
                        <div class="widget ltn__top-rated-product-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Alternative products</h4>
                            <ul>
                                @foreach ($productAlternativ as $alternativ)
                                    <li>
                                        <div class="top-rated-product-item clearfix" wire:key="{{ $alternativ->id }}">
                                            <div class="top-rated-product-img">
                                                <a wire:navigate href="{{ route('productDetails', ['id' => $alternativ->id]) }}"><img src="{{ url('storage', $alternativ->image) }}"
                                                        alt="{{ $alternativ->name }}"></a>
                                            </div>
                                            <div class="top-rated-product-info">
                                                <h6><a wire:navigate href="{{ route('productDetails', ['id' => $alternativ->id]) }}">{{ $alternativ->name }}</a>
                                                </h6>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Banner Widget -->
                    </aside>
                </div>

                <!-- Shop Tab Start -->
                <div class="ltn__shop-details-tab-inner ltn__shop-details-tab-inner-2" dir="rtl">
                    <div class="ltn__shop-details-tab-menu">
                        <div class="nav">
                            <a class="active show" data-bs-toggle="tab" href="#liton_tab_details_1_1">الوصف</a>

                            @if ($product->type)
                                <a data-bs-toggle="tab" href="#liton_tab_details_1_2" class="">النوع</a>
                            @endif

                            @if ($product->indications)
                                <a data-bs-toggle="tab" href="#liton_tab_details_1_3" class="">دواعي
                                    الإستعمال</a>
                            @endif

                            @if ($product->dosage)
                                <a data-bs-toggle="tab" href="#liton_tab_details_1_4" class="">الجرعة</a>
                            @endif

                            @if ($product->side_effects)
                                <a data-bs-toggle="tab" href="#liton_tab_details_1_5" class="">الآثار
                                    جانبية</a>
                            @endif

                            @if ($product->contraindications)
                                <a data-bs-toggle="tab" href="#liton_tab_details_1_6" class="">الموانع</a>
                            @endif

                            @if ($product->packaging)
                                <a data-bs-toggle="tab" href="#liton_tab_details_1_7" class="">التعبئة
                                    والتغليف</a>
                            @endif

                            @if ($product->storage)
                                <a data-bs-toggle="tab" href="#liton_tab_details_1_8" class="">التخزين</a>
                            @endif


                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_tab_details_1_1">
                            <div class="ltn__shop-details-tab-content-inner">
                                <p>{{ $product->description }}</p>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="liton_tab_details_1_2">
                            <div class="ltn__shop-details-tab-content-inner">
                                <p>{{ $product->type }}</p>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="liton_tab_details_1_3">
                            <div class="ltn__shop-details-tab-content-inner">
                                <p>{{ $product->indications }}</p>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="liton_tab_details_1_4">
                            <div class="ltn__shop-details-tab-content-inner">
                                <p>{{ $product->dosage }}</p>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="liton_tab_details_1_5">
                            <div class="ltn__shop-details-tab-content-inner">
                                <p>{{ $product->side_effects }}</p>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="liton_tab_details_1_6">
                            <div class="ltn__shop-details-tab-content-inner">
                                <p>{{ $product->contraindications }}</p>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="liton_tab_details_1_7">
                            <div class="ltn__shop-details-tab-content-inner">
                                <p>{{ $product->packaging }}</p>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="liton_tab_details_1_8">
                            <div class="ltn__shop-details-tab-content-inner">
                                <p>{{ $product->storage }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SHOP DETAILS AREA END -->


    <!-- PRODUCT SLIDER AREA END -->
</div>
