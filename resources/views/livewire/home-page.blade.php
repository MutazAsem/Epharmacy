 <div>
     <!-- SLIDER AREA START (slider-3) -->
     <div class="ltn__slider-area ltn__slider-3  section-bg-1">
         <div class="ltn__slide-one-active slick-slide-arrow-1 slick-slide-dots-1">

             <!-- ltn__slide-item -->
             @foreach ($articles as $article)
                 <div class="ltn__slide-item ltn__slide-item-2  ltn__slide-item-3-normal--- ltn__slide-item-3 bg-image bg-overlay-theme-black-60---"
                     data-bs-bg="{{ url('storage', $article->image) }}" wire:key="{{ $article->id }}">
                     <div class="ltn__slide-item-inner  text-right text-end">
                         <div class="container">
                             <div class="row">
                                 <div class="col-lg-12 align-self-center">
                                     <div class="slide-item-info">
                                         <div class="slide-item-info-inner ltn__slide-animation">
                                             {{-- <h6 class="slide-sub-title white-color--- animated"><span>
                                                <i class="fas fa-syringe"></i></span> 100% genuine Products</h6> --}}
                                             <h1 class="slide-title animated ">{{ $article->title }}</h1>
                                             <div class="slide-brief animated clamp-text">
                                                 <p>{{ $article->content }}</p>
                                             </div>
                                             <div class="btn-wrapper animated">
                                                 <a wire:navigate
                                                     href="{{ route('articleDetails', ['id' => $article->id]) }}"
                                                     class="theme-btn-1 btn btn-effect-1">Read More</a>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             @endforeach

             <!--  -->
         </div>
     </div>
     <!-- SLIDER AREA END -->

     <!-- CATEGORY AREA START -->
     <div class="ltn__category-area section-bg-1-- pt-50 pb-90">
         <div class="container">
             <div class="row ltn__category-slider-active-six slick-arrow-1 border-bottom">
                 <div class="col-12">
                     <div class="ltn__category-item ltn__category-item-6 text-center">
                         <div class="ltn__category-item-img">
                             <a wire:navigate href="#">
                                 <i class="fas fa-notes-medical"></i>
                             </a>
                         </div>
                         <div class="ltn__category-item-name">
                             <h6><a wire:navigate href="shop.html">General Medicines <br> أدوية عامة</a></h6>
                         </div>
                     </div>
                 </div>
                 <div class="col-12">
                     <div class="ltn__category-item ltn__category-item-6 text-center">
                         <div class="ltn__category-item-img">
                             <a wire:navigate href="shop.html">
                                 <i class="fas fa-box-tissue"></i>
                             </a>
                         </div>
                         <div class="ltn__category-item-name">
                             <h6><a wire:navigate href="shop.html">Makeup <br> مكياج</a></h6>
                         </div>
                     </div>
                 </div>
                 <div class="col-12">
                     <div class="ltn__category-item ltn__category-item-6 text-center">
                         <div class="ltn__category-item-img">
                             <a wire:navigate href="shop.html">
                                 <i class="fas fa-pump-medical"></i>
                             </a>
                         </div>
                         <div class="ltn__category-item-name">
                             <h6><a wire:navigate href="shop.html">Cosmetics <br> مستحضرات تجميل</a></h6>
                         </div>
                     </div>
                 </div>
                 {{-- <div class="col-12">
                     <div class="ltn__category-item ltn__category-item-6 text-center">
                         <div class="ltn__category-item-img">
                             <a wire:navigate href="shop.html">
                                 <i class="fas fa-bong"></i>
                             </a>
                         </div>
                         <div class="ltn__category-item-name">
                             <h6><a wire:navigate href="shop.html">General Medicines <br> أدوية عامة</a></h6>
                         </div>
                     </div>
                 </div> --}}
                 <div class="col-12">
                     <div class="ltn__category-item ltn__category-item-6 text-center">
                         <div class="ltn__category-item-img">
                             <a wire:navigate href="shop.html">
                                 <i class="fas fa-tooth"></i>
                             </a>
                         </div>
                         <div class="ltn__category-item-name">
                             <h6><a wire:navigate href="shop.html">Personal Care Products <br> منتجات العناية
                                     الشخصية</a></h6>
                         </div>
                     </div>
                 </div>
                 <div class="col-12">
                     <div class="ltn__category-item ltn__category-item-6 text-center">
                         <div class="ltn__category-item-img">
                             <a wire:navigate href="shop.html">
                                 <i class="fas fa-microscope"></i>
                             </a>
                         </div>
                         <div class="ltn__category-item-name">
                             <h6><a wire:navigate href="shop.html">Medical Supplies <br> مستلزمات طبية</a></h6>
                         </div>
                     </div>
                 </div>
                 <div class="col-12">
                     <div class="ltn__category-item ltn__category-item-6 text-center">
                         <div class="ltn__category-item-img">
                             <a wire:navigate href="shop.html">
                                 <i class="fas fa-syringe"></i>
                             </a>
                         </div>
                         <div class="ltn__category-item-name">
                             <h6><a wire:navigate href="shop.html">Antibiotics <br> مضادات الحيوية</a></h6>
                         </div>
                     </div>
                 </div>
                 <div class="col-12">
                     <div class="ltn__category-item ltn__category-item-6 text-center">
                         <div class="ltn__category-item-img">
                             <a wire:navigate href="shop.html">
                                 <i class="fas fa-stethoscope"></i>
                             </a>
                         </div>
                         <div class="ltn__category-item-name">
                             <h6><a wire:navigate href="shop.html">Special Medications <br> أدوية خاصة</a></h6>
                         </div>
                     </div>
                 </div>
                 <div class="col-12">
                     <div class="ltn__category-item ltn__category-item-6 text-center">
                         <div class="ltn__category-item-img">
                             <a wire:navigate href="shop.html">
                                 <i class="fas fa-hand-holding-medical"></i>
                             </a>
                         </div>
                         <div class="ltn__category-item-name">
                             <h6><a wire:navigate href="shop.html">First aid kits <br> أدوات الإسعافات الأولية</a></h6>
                         </div>
                     </div>
                 </div>
                 <div class="col-12">
                     <div class="ltn__category-item ltn__category-item-6 text-center">
                         <div class="ltn__category-item-img">
                             <a wire:navigate href="shop.html">
                                 <i class="fas fa-procedures"></i>
                             </a>
                         </div>
                         <div class="ltn__category-item-name">
                             <h6><a wire:navigate href="shop.html">Pain Killers <br> مسكنات الألم</a></h6>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- CATEGORY AREA END -->

     <!-- PRODUCT AREA START (product-item-3) -->
     <div class="ltn__product-area ltn__product-gutter  no-product-ratting pt-85 pb-70">
         <div class="container">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="section-title-area ltn__section-title-2 text-center">
                         <h1 class="section-title">Leatest Products</h1>
                     </div>
                 </div>
             </div>
             <div class="row">

                 <div class="col-lg-9">
                     <div class="row ltn__tab-product-slider-one-active--- slick-arrow-1">
                         <!-- ltn__product-item -->
                         @foreach ($products as $product)
                         <div class="col-lg-3--- col-md-4 col-sm-6 col-6" wire:key="{{ $product->id }}">
                             <div class="ltn__product-item ltn__product-item-2 text-left">
                                 <div class="product-img">
                                     <a wire:navigate href="#"><img src="{{ url('storage', $product->image) }}"
                                             alt="{{ $product->name }}"></a>
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
                                                 <a wire:navigate href="#" title="Add to Cart"
                                                     data-bs-toggle="modal" data-bs-target="#add_to_cart_modal">
                                                     <i class="fas fa-shopping-cart"></i>
                                                 </a>
                                             </li>
                                         </ul>
                                     </div>
                                 </div>
                                 <div class="product-info">
                                     <h2 class="product-title"><a wire:navigate
                                             href="{{ route('productDetails', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                     </h2>
                                     @if ($product->product_measuremen->isNotEmpty())
                                         @php
                                             $firstMeasurementUnit = $product->product_measuremen->first();
                                         @endphp
                                         <div class="product-measurement">
                                             <div class="product-measurement-unit">
                                                 Unit: {{ $firstMeasurementUnit->product_unit->name }}
                                             </div>
                                             <div class="product-price">
                                                 Price: ${{ $firstMeasurementUnit->price }}
                                             </div>
                                         </div>
                                     @endif
                                 </div>
                             </div>
                         </div>
                         @endforeach
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- PRODUCT AREA END -->

     <!-- FEATURE AREA START ( Feature - 3) -->
     <div class="ltn__feature-area section-bg-1 mt-90 pt-30 pb-30 mt--65---">
         <div class="container">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="ltn__feature-item-box-wrap ltn__feature-item-box-wrap-2 ltn__border--- section-bg-1">
                         <div class="ltn__feature-item ltn__feature-item-8">
                             <div class="ltn__feature-icon">
                                 <img src="{{ asset('client/img/icons/svg/8-trolley.svg') }}" alt="#">
                             </div>
                             <div class="ltn__feature-info">
                                 <h4>Free shipping</h4>
                                 <p>On all orders</p>
                             </div>
                         </div>
                         <div class="ltn__feature-item ltn__feature-item-8">
                             <div class="ltn__feature-icon">
                                 <img src="{{ asset('client/img/icons/svg/9-money.svg') }}" alt="#">
                             </div>
                             <div class="ltn__feature-info">
                                 <h4>15 days returns</h4>
                                 <p>Moneyback guarantee</p>
                             </div>
                         </div>
                         <div class="ltn__feature-item ltn__feature-item-8">
                             <div class="ltn__feature-icon">
                                 <img src="{{ asset('client/img/icons/svg/10-credit-card.svg') }}" alt="#">
                             </div>
                             <div class="ltn__feature-info">
                                 <h4>Secure checkout</h4>
                                 <p>Protected</p>
                             </div>
                         </div>
                         <div class="ltn__feature-item ltn__feature-item-8">
                             <div class="ltn__feature-icon">
                                 <img src="{{ asset('client/img/icons/svg/11-gift-card.svg') }}" alt="#">
                             </div>
                             <div class="ltn__feature-info">
                                 <h4>Offer & gift here</h4>
                                 <p>On all orders over</p>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- FEATURE AREA END -->

     <!-- BLOG AREA START (blog-3) -->
     <div class="ltn__blog-area pt-115 pb-45">
         <div class="container">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="section-title-area ltn__section-title-2--- text-center">
                         <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color d-none">News & Blogs</h6>
                         <h1 class="section-title">Leatest Blogs</h1>
                     </div>
                 </div>
             </div>
             <div class="row  ltn__blog-slider-one-active slick-arrow-1 ltn__blog-item-3-normal">
                 <!-- Blog Item -->
                 @foreach ($articles as $article)
                 <div class="col-lg-12" wire:key="{{ $article->id }}">
                     <div class="ltn__blog-item ltn__blog-item-3">
                         <div class="ltn__blog-img">
                             <a wire:navigate href="#"><img
                                     src="{{ url('storage', $article->image) }}" alt="{{ $article->title }}"></a>
                         </div>
                         <div class="ltn__blog-brief">
                             <div class="ltn__blog-meta">
                                 <ul>
                                     <li class="ltn__blog-author">
                                         <a wire:navigate href="#"><i class="far fa-user"></i>by: {{ $article->writer->name }}</a>
                                     </li>
                                 </ul>
                             </div>
                             <h3 class="ltn__blog-title"><a href="#">{{ $article->title }}</a></h3>
                             <div class="ltn__blog-meta-btn">
                                 <div class="ltn__blog-meta">
                                     <ul>
                                         <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>{{ $article->created_at }}
                                         </li>
                                     </ul>
                                 </div>
                                 <div class="ltn__blog-btn">
                                     <a wire:navigate href="{{ route('articleDetails', ['id' => $article->id]) }}">Read More</a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 @endforeach
                 <!--  -->
             </div>
         </div>
     </div>
     <!-- BLOG AREA END -->
 </div>
