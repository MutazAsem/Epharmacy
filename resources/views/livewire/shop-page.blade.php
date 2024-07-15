<div style="margin-top: 40px">
    <!-- PRODUCT DETAILS AREA START -->
    <div class="ltn__product-area ltn__product-gutter mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="ltn__shop-options">
                        <ul>
                            <li>
                                <div class="ltn__grid-list-tab-menu ">
                                    <div class="nav">
                                        <a class="active show" data-bs-toggle="tab" href="#liton_product_grid"><i
                                                class="fas fa-th-large"></i></a>
                                        <a data-bs-toggle="tab" href="#liton_product_list"><i
                                                class="fas fa-list"></i></a>
                                    </div>
                                </div>
                            </li>
                            {{-- <li>
                                <div class="short-by text-center">
                                    <select wire:model.live="sort" class="nice-select">
                                        <option>Default Sorting</option>
                                        <option value="latest">Sort by new Latest</option>
                                        <option value="">Sort by price: low to high</option>
                                        <option value="">Sort by price: high to low</option>
                                    </select>
                                </div>
                            </li> --}}
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_product_grid">
                            <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                <div class="row">
                                    @foreach ($products as $product)
                                        <div class="col-xl-4 col-sm-6 col-6" wire:key="{{ $product->id }}">
                                            <div class="ltn__product-item ltn__product-item-3 text-center">
                                                <div class="product-img">
                                                    <a wire:navigate
                                                        href="{{ route('productDetails', ['id' => $product->id]) }}">
                                                        <img src="{{ url('storage', $product->image) }}"
                                                            alt="{{ $product->name }}">
                                                    </a>
                                                    <div class="product-hover-action">
                                                        <ul>
                                                            <li>
                                                                <a wire:navigate
                                                                    href="{{ route('productDetails', ['id' => $product->id]) }}"
                                                                    title="Quick View" data-bs-toggle="modal"
                                                                    data-bs-target="#quick_view_modal">
                                                                    <i class="far fa-eye"></i>
                                                                </a>
                                                            </li>
                                                            {{-- <li>
                                                                <a wire:click.prevent='addToCart({{ $product->id }})'
                                                                    href="#" title="Add to Cart"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#add_to_cart_modal">
                                                                    <i class="fas fa-shopping-cart" wire:loading.remove
                                                                        wire:target='addToCart({{ $product->id }})'></i>
                                                                    <span wire:loading
                                                                        wire:target='addToCart({{ $product->id }})'>Adding</span>
                                                                </a>
                                                            </li> --}}
                                                            @if ($product->product_measuremen->isNotEmpty())
                                                                @php
                                                                    $firstMeasurementUnit = $product->product_measuremen->first();
                                                                    $unitid=$firstMeasurementUnit->product_unit->id
                                                                @endphp
                                                            @endif
                                                            <li>
                                                                <a wire:click.prevent='addToCart({{ $product->id }}, {{ $unitid }})'
                                                                    href="#" title="Add to Cart"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#add_to_cart_modal">
                                                                    <i class="fas fa-shopping-cart" wire:loading.remove
                                                                        wire:target='addToCart({{ $product->id }}, {{ $unitid }})'></i>
                                                                    <span wire:loading
                                                                        wire:target='addToCart({{ $product->id }}, {{ $unitid }})'>Adding</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <h2 class="product-title">
                                                        <a wire:navigate
                                                            href="{{ route('productDetails', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                                    </h2>
                                                    {{-- <div class="product-description">
                                                        {{ $product->description }}
                                                    </div> --}}
                                                    @if ($product->product_measuremen->isNotEmpty())
                                                        @php
                                                            $firstMeasurementUnit = $product->product_measuremen->first();
                                                        @endphp
                                                        <input type="hidden" wire:model.defer="productUnitId"
                                                            value="{{ $firstMeasurementUnit->product_unit->id }}">
                                                        <div class="product-measurement">
                                                            <div class="product-measurement-unit">
                                                                Unit: {{ $firstMeasurementUnit->product_unit->name }}
                                                            </div>
                                                            <div class="product-price">
                                                                Price: ${{ $firstMeasurementUnit->price }}
                                                                <input type="hidden" wire:model='productUnitId'
                                                                    value="{{ $firstMeasurementUnit->product_unit->id }}">
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <!--  -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="liton_product_list">
                            <div class="ltn__product-tab-content-inner ltn__product-list-view">
                                <div class="row">
                                    <!-- ltn__product-item -->
                                    @foreach ($products as $product)
                                        <div class="col-lg-12" wire:key="{{ $product->id }}">
                                            <div class="ltn__product-item ltn__product-item-3">
                                                <div class="product-img">
                                                    <a wire:navigate
                                                        href="{{ route('productDetails', ['id' => $product->id]) }}">
                                                        <img src="{{ url('storage', $product->image) }}"
                                                            alt="{{ $product->name }}">
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <h2 class="product-title">
                                                        <a wire:navigate
                                                            href="{{ route('productDetails', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                                    </h2>
                                                    @if ($product->product_measuremen->isNotEmpty())
                                                        @php
                                                            $firstMeasurementUnit = $product->product_measuremen->first();
                                                        @endphp
                                                        <div class="product-price">
                                                            Price: ${{ $firstMeasurementUnit->price }}
                                                        </div>
                                                        <div class="product-measurement-unit">
                                                            Unit: {{ $firstMeasurementUnit->product_unit->name }}
                                                            {{-- <input type="hidden" wire:model="productUnitId"
                                                                value="{{ $firstMeasurementUnit->product_unit->id }}"> --}}
                                                        </div>
                                                    @endif
                                                    <div class="product-brief">
                                                        <p>{{ $product->description }}</p>
                                                    </div>
                                                    <div class="product-hover-action">
                                                        <ul>
                                                            <li>
                                                                <a wire:navigate
                                                                    href="{{ route('productDetails', ['id' => $product->id]) }}"
                                                                    title="Quick View" data-bs-toggle="modal"
                                                                    data-bs-target="#quick_view_modal">
                                                                    <i class="far fa-eye"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a wire:click.prevent='addToCart({{ $product->id }})'
                                                                    href="#" title="Add to Cart"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#add_to_cart_modal">
                                                                    <i class="fas fa-shopping-cart" wire:loading.remove
                                                                        wire:target='addToCart({{ $product->id }})'></i>
                                                                    <span wire:loading
                                                                        wire:target='addToCart({{ $product->id }})'>Adding</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    <!--  -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ltn__pagination-area text-center">
                        {{ $products->links('pagination::bootstrap-5') }}
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
                        <!-- Category Widget -->
                        <div class="widget ltn__menu-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Product categories</h4>
                            <ul>
                                {{-- @foreach ($categories as $cat)      
                                <li><a wire:navigate href="portfolio-details.html">{{  $cat->name }} <span>
                                    <i class="fas fa-long-arrow-alt-right"></i></span></a>
                                </li>
                                @endforeach --}}
                                @foreach ($categories as $cat)
                                    <div class="form-check" wire:key="{{ $cat->id }}">
                                        <input class="form-check-input" type="checkbox" value="{{ $cat->id }}"
                                            id="cat-{{ $cat->id }}" wire:model.live="selectedCategories">
                                        <label class="form-check-label" for="cat-{{ $cat->id }}">
                                            {{ $cat->name }}
                                        </label>
                                    </div>
                                @endforeach

                            </ul>
                        </div>
                        <!-- Price Filter Widget -->
                        {{-- <div class="widget ltn__price-filter-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Filter by price</h4>
                            <div class="price_filter">
                                <div class="price_slider_amount">
                                    <input type="submit" value="Your range:" />
                                    <input type="text" class="amount" name="price" placeholder="Add Your Price" />
                                </div>
                                <div class="slider-range"></div>
                            </div>
                        </div> --}}
                        <!-- Price Filter Widget -->
                        {{-- <div class="widget ltn__price-filter-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Filter by price</h4>
                            <div class="price_filter">
                                <div class="price_slider_amount">
                                    <input type="rang" max="1000" value="1000" step="10" />
                                    <input type="text" class="amount" name="price" placeholder="Add Your Price"
                                        wire:model="minPrice" />
                                    <input type="text" class="amount" name="price" placeholder="Add Your Price"
                                        wire:model="maxPrice" />
                                </div>
                            </div>
                        </div> --}}
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT DETAILS AREA END -->
</div>
