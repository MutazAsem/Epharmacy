     <!-- FOOTER AREA START -->
     <footer class="ltn__footer-area  ">
        <div class="footer-top-area  section-bg-2 plr--5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-about-widget">
                            <div class="footer-logo">
                                <div class="site-logo">
                                    <img src="{{ asset('client/img/logo.png') }}" alt="Logo" class="img-fluid w-25">
                                </div>
                            </div>
                            <p>Epharmacy
                                <br>
                                 هي منصة عبر الانترنت مخصصة لتلبية احتياجات العملاء 
                                من المنتجات الصيدلانية والرعاية الصحية</p>
                            
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-about-widget">
                            <div class="footer-address">
                                <ul>
                                    <li>
                                        <div class="footer-address-icon">
                                            <i class="icon-placeholder"></i>
                                        </div>
                                        <div class="footer-address-info">
                                            <p>اليمن,صنعاء, الحصبة</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="footer-address-icon">
                                            <i class="icon-call"></i>
                                        </div>
                                        <div class="footer-address-info">
                                            <p><a href="tel:+0123-456789">774743134</a></p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="footer-address-icon">
                                            <i class="icon-mail"></i>
                                        </div>
                                        <div class="footer-address-info">
                                            <p><a href="mailto:example@example.com">epharmacy@gmail.com</a></p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-menu-widget clearfix">
                            <h4 class="footer-title">Web Pages</h4>
                            <div class="footer-menu">
                                <ul>
                                    <li>
                                        <a wire:navigate href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li>
                                        <a wire:navigate href="{{ route('categories') }}">Categories</a>
                                    </li>
                                    <li>
                                        <a wire:navigate href="{{ route('shop') }}">Shop</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-menu-widget clearfix">
                            <h4 class="footer-title"><br></h4>
                            <div class="footer-menu">
                                <ul>
                                    <li>
                                        <a wire:navigate href="{{ route('articleGrid') }}">Articles</a>
                                    </li>
                                    <li>
                                        <a wire:navigate href="{{ route('about') }}">About</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ltn__copyright-area ltn__copyright-2 section-bg-7  plr--5">
            <div class="container-fluid ltn__border-top-2">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="ltn__copyright-design clearfix">
                            <p>All Rights Reserved @ Epharmacy <span class="current-year"></span></p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER AREA END -->
