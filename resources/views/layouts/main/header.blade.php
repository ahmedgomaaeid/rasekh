<style>
.site-header a.header-cart-link span.count, .woocommerce span.onsale {
    background-color: #65905d;
}
.user-link img {
    width: 34px;
    height: 34px;
}
</style>
<header id="masthead" class="site-header site-header--bb">
    <div class="container site-header-container flex default-header">
        <a href="{{route('index')}}/#" class="bb-toggle-panel"><i class="fa-sharp fa-solid fa-bars"></i></a>

        <div id="site-logo" class="site-branding buddypanel_logo_display_off">
            <div class="site-title">
                <a href="{{route('index')}}" rel="home">
                    <img src="{{route('index')}}/webassets/loggg.png" class="bb-logo" alt="" loading="lazy"> </a>
            </div>
        </div>
        <nav id="site-navigation" class="main-navigation" data-menu-space="120">
            <div id="primary-navbar">
                <ul id="primary-menu" class="primary-menu">






                    <li id="menu-item-241612" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-241612 no-icon"><a href="{{route('index')}}" aria-current="page"><span>الصفحة الرئيسية</span></a></li>
                    <li id="menu-item-1508" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1508 no-icon"><a href="{{route('allCourses')}}"><span>جميع المواد</span></a></li>
                    <li id="menu-item-1509" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1509 no-icon"><a href="{{route('about')}}"><span>عن راسخ</span></a></li>
                    <li id="menu-item-25489" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-25489 no-icon"><a href="{{route('cards')}}"><span>نقاط بيع بطاقات راسخ</span></a></li>
                    <li id="menu-item-1506" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1506 no-icon"><a href="{{route('contact')}}"><span>اتصل بنا</span></a></li>
                    @if(Auth::guard('student')->check())
                    <li id="menu-item-1507" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1507 no-icon"><a href="{{route('myCourses')}}"><span>دوراتي</span></a></li>
                    @endif
                </ul>
                <div id="navbar-collapse" class="">
                    <a class="more-button" href="#"><i class="fa-solid fa-ellipsis"></i></a>
                    <div class="sub-menu">
                        <div class="wrapper">
                            <ul id="navbar-extend" class="sub-menu-inner"></ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div id="header-aside" class="header-aside name_and_avatar">
            <div class="header-aside-inner">

                @if(Request::segment(1) == "course" and Request::segment(3) == "lesson")
                <a href="#"
							id="bb-toggle-theme">
							<span class="sfwd-dark-mode" data-balloon-pos="down" data-balloon="الوضع الليلي"><i class="fa-solid fa-moon"></i></span>
							<span class="sfwd-light-mode" data-balloon-pos="down" data-balloon="الوضع النهاري"><i class="fa-solid fa-sun"></i></span>
						</a>
						<a href="#"
							class="header-maximize-link course-toggle-view" data-balloon-pos="down"
							data-balloon="إخفاء الفهرس"><i class="fa-solid fa-up-right-and-down-left-from-center"></i></a>
						<a href="#"
							class="header-minimize-link course-toggle-view" data-balloon-pos="down"
							data-balloon="إظهار الفهرس"><i class="fa-solid fa-down-left-and-up-right-to-center"></i></a>
                @else
                <div class="notification-wrap header-cart-link-wrap cart-wrap menu-item-has-children">
                    <a href="{{route('cart')}}" class="header-cart-link notification-link">
                        <span data-balloon-pos="down" data-balloon="سلة المشتريات">
                            <i class="fa fa-cart-shopping"></i>
                            @if(isset($_COOKIE['shopping_cart']))
                            <?php
                                        $cart_data = json_decode(Cookie::get('shopping_cart'), true);
                                    ?>
                            @if($cart_data != array())
                            <span class="count">{{count($cart_data)}}</span>
                            @endif
                            @endif
                        </span>
                    </a>
                    <section class="notification-dropdown">
                        <header class="notification-header">
                            <h2 class="title">Shopping Cart</h2>

                            <a href="{{route('cart')}}" class="header-view-cart-link">View Cart</a>
                        </header>
                        <div class="header-mini-cart">
                            @if(isset($_COOKIE['shopping_cart']))
                            <?php
                                        $cart_data = json_decode(stripslashes(Cookie::get('shopping_cart')));
                                        $total_price = 0;
                                    ?>
                            @if($cart_data != array())

                            <ul class="woocommerce-mini-cart cart_list product_list_widget ">
                                @foreach($cart_data as $item_id)
                                <?php 
                                            $item = getCourseData($item_id->item_id)
                                        ?>
                                <li class="woocommerce-mini-cart-item mini_cart_item">
                                    <a href="{{route('cart.removeItem',$item->id)}}" class="remove remove_from_cart_button" aria-label="إزالة هذا المنتج" data-product_id="1058603" data-cart_item_key="af375b6608ccb86fa2cd7bbc2d72d402" data-product_sku="">&times;</a> <a href="">
                                        <img width="300" height="180" src="

                                                @if($item->steacher->photo != null)
                                                    {{route('index')}}/assets/images/teachers/{{$item->steacher->photo}}
                                                @else
                                                    {{route('index')}}/assets/images/orders/10.jpg
                                                @endif
                                                
                                                " class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy" srcset="

                                                @if($item->steacher->photo != null)
                                                    {{route('index')}}/assets/images/teachers/{{$item->steacher->photo}}
                                                @else
                                                    {{route('index')}}/assets/images/orders/10.jpg
                                                @endif

                                                " sizes="(max-width: 300px) 100vw, 300px" />{{$item->steacher->name}}</a>
                                    <span class="quantity"><span class="woocommerce-Price-amount amount"><bdi>{{$item->price}} <span class="woocommerce-Price-currencySymbol"><i class="fa fa-shekel" style="font-size:13px; color:#9b9c9f;"></i></span></bdi></span></span> </li>
                                <?php
                                                $total_price += $item->price;
                                            ?>
                                @endforeach
                            </ul>
                            <p class="woocommerce-mini-cart__total total">
                                <strong>المجموع:</strong> <span class="woocommerce-Price-amount amount"><bdi>{{$total_price}} <span class="woocommerce-Price-currencySymbol"><i class="fa fa-shekel" style="font-size:13px; color:#9b9c9f;"></i></span></bdi></span> </p>


                            <p class="woocommerce-mini-cart__buttons buttons"><a href="{{route('cart')}}" class="button wc-forward">عرض السلة</a><a href="{{route('cart')}}" class="button checkout wc-forward">إتمام الطلب</a></p>

                            @else
                            <p class="woocommerce-mini-cart__empty-message">لا توجد منتجات في سلة المشتريات.</p>
                            @endif
                            @else
                            <p class="woocommerce-mini-cart__empty-message">لا توجد منتجات في سلة المشتريات.</p>
                            @endif

                        </div>
                    </section>
                </div>
                @endif
                @if (Auth::guard('student')->check())
                <div class="user-wrap user-wrap-container menu-item-has-children">
                    <a class="user-link" href="">
                        <span class="user-name">{{Auth::guard('student')->user()->name}}</span><i class="fa-solid fa-caret-down" style="font-size:18px;"></i>
                        @if(Auth::guard('student')->user()->photo == null)
                        <img alt='' src='https://www.gravatar.com/avatar/18c09435dd06ec766fd8ade4631cf4d7?s=100&#038;r=g&#038;d=mm' srcset='https://www.gravatar.com/avatar/18c09435dd06ec766fd8ade4631cf4d7?s=100&#038;r=g&#038;d=mm 2x' class='avatar avatar-100 photo' height='100' width='100' loading='lazy' /> </a>
                    @else
                    <img alt='' src='{{route('index')}}/assets/images/students/{{Auth::guard('student')->user()->photo}}' srcset='{{route('index')}}/assets/images/students/{{Auth::guard('student')->user()->photo}}' class='avatar avatar-100 photo' height='100' width='100' loading='lazy' /> </a>
                    @endif
                    <div class="sub-menu">
                        <div class="wrapper">
                            <ul class="sub-menu-inner">
                                <li>
                                    <a class="user-link">
                                        @if(Auth::guard('student')->user()->photo === null)
                                        <img alt='' src='https://www.gravatar.com/avatar/18c09435dd06ec766fd8ade4631cf4d7?s=100&#038;r=g&#038;d=mm' srcset='https://www.gravatar.com/avatar/18c09435dd06ec766fd8ade4631cf4d7?s=100&#038;r=g&#038;d=mm 2x' class='avatar avatar-100 photo' height='100' width='100' loading='lazy' /> <span>
                                            @else
                                            <img alt='' src='{{route('index')}}/assets/images/students/{{Auth::guard('student')->user()->photo}}' srcset='{{route('index')}}/assets/images/students/{{Auth::guard('student')->user()->photo}}' class='avatar avatar-100 photo' height='100' width='100' loading='lazy' /> <span>
                                                @endif
                                                <span class="user-name">{{Auth::guard('student')->user()->name}}</span>
                                                <span class="user-mention">{{Auth::guard('student')->user()->points}} شيكل</span>
                                            </span>
                                    </a>
                                </li>
                                <li id="wp-admin-bar-my-account-xprofile" class="menupop parent">
                                    <a class="ab-item" aria-haspopup="true" href="{{route('profile')}}">
                                        <span class="wp-admin-bar-arrow" aria-hidden="true"></span>الصفحة الشخصية </a>
                                </li>
                                <li id="wp-admin-bar-my-account-settings" class="menupop parent">
                                    <a class="ab-item" aria-haspopup="true" href="{{route('charging')}}">
                                        <span class="wp-admin-bar-arrow" aria-hidden="true"></span>النقاط </a>
                                </li>
                                <li id="wp-admin-bar-my-account-messages" class="menupop parent">
                                    <a class="ab-item" aria-haspopup="true" href="{{route('chats')}}">
                                        <span class="wp-admin-bar-arrow" aria-hidden="true"></span>الرسائل </a>
                                </li>
                                <li class="logout-link">
                                    <a href="{{route('logout')}}">
                                        تسجيل الخروج </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @else
                <div class="bb-header-buttons">
                    <a href="{{route('login')}}" class="button small outline signin-button link">تسجيل الدخول</a>

                    <a href="{{route('register')}}" class="button small signup">إنشاء حساب جديد</a>
                </div>
                @endif

            </div><!-- .header-aside-inner -->
        </div><!-- #header-aside -->
    </div>
    <div class="bb-mobile-header-wrapper bb-single-icon">
        <div class="bb-mobile-header flex align-items-center">
            <div class="bb-left-panel-icon-wrap">
                <a href="#" class="push-left bb-left-panel-mobile"><i class="fa-sharp fa-solid fa-bars"></i></a>
            </div>

            <div class="flex-1 mobile-logo-wrapper">

                <div class="site-title">

                    <a href="{{route('index')}}" rel="home">
                        <img src="{{route('index')}}/webassets/loggg.png" class="bb-mobile-logo" alt="" loading="lazy"> </a>

                </div>
            </div>
            @if( Request::segment(1) == "course" and Request::segment(3) == "lesson")
                <div class="header-aside">
												<a href="#" id="bb-toggle-theme">
						<span class="sfwd-dark-mode" data-balloon-pos="down" data-balloon="الوضع الليلي"><i class="fa-solid fa-moon"></i></span>
						<span class="sfwd-light-mode" data-balloon-pos="down" data-balloon="الوضع النهاري"><i class="fa-solid fa-sun"></i></span>
					</a>
					<a href="#" class="header-maximize-link course-toggle-view" data-balloon-pos="left" data-balloon="Hide Sidepanel"><i class="fa-solid fa-up-right-and-down-left-from-center"></i></a>
					<a href="#" class="header-minimize-link course-toggle-view" data-balloon-pos="left" data-balloon="Show Sidepanel"><i class="fa-solid fa-down-left-and-up-right-to-center"></i></a>
						</div>
            @else
                <div class="notification-wrap header-cart-link-wrap cart-wrap menu-item-has-children">
                    <a href="{{route('cart')}}" class="header-cart-link notification-link">
                        <span data-balloon-pos="down" data-balloon="سلة المشتريات">
                            <i class="fa fa-cart-shopping"></i>
                            @if(isset($_COOKIE['shopping_cart']))
                            <?php
                                        $cart_data = json_decode(Cookie::get('shopping_cart'), true);
                                    ?>
                            @if($cart_data != array())
                            <span class="count">{{count($cart_data)}}</span>
                            @endif
                            @endif
                        </span>
                    </a>
                    <section class="notification-dropdown">
                        <header class="notification-header">
                            <h2 class="title">Shopping Cart</h2>

                            <a href="{{route('cart')}}" class="header-view-cart-link">View Cart</a>
                        </header>
                        <div class="header-mini-cart">
                            @if(isset($_COOKIE['shopping_cart']))
                            <?php
                                        $cart_data = json_decode(stripslashes(Cookie::get('shopping_cart')));
                                        $total_price = 0;
                                    ?>
                            @if($cart_data != array())

                            <ul class="woocommerce-mini-cart cart_list product_list_widget ">
                                @foreach($cart_data as $item_id)
                                <?php 
                                            $item = getCourseData($item_id->item_id)
                                        ?>
                                <li class="woocommerce-mini-cart-item mini_cart_item">
                                    <a href="{{route('cart.removeItem',$item->id)}}" class="remove remove_from_cart_button" aria-label="إزالة هذا المنتج" data-product_id="1058603" data-cart_item_key="af375b6608ccb86fa2cd7bbc2d72d402" data-product_sku="">&times;</a> <a href="">
                                        <img width="300" height="180" src="

                                                @if($item->steacher->photo != null)
                                                    {{route('index')}}/assets/images/teachers/{{$item->steacher->photo}}
                                                @else
                                                    {{route('index')}}/assets/images/orders/10.jpg
                                                @endif
                                                
                                                " class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy" srcset="

                                                @if($item->steacher->photo != null)
                                                    {{route('index')}}/assets/images/teachers/{{$item->steacher->photo}}
                                                @else
                                                    {{route('index')}}/assets/images/orders/10.jpg
                                                @endif

                                                " sizes="(max-width: 300px) 100vw, 300px" />{{$item->steacher->name}}</a>
                                    <span class="quantity"><span class="woocommerce-Price-amount amount"><bdi>{{$item->price}} <span class="woocommerce-Price-currencySymbol"><i class="fa fa-shekel" style="font-size:13px; color:#9b9c9f;"></i></span></bdi></span></span> </li>
                                <?php
                                                $total_price += $item->price;
                                            ?>
                                @endforeach
                            </ul>
                            <p class="woocommerce-mini-cart__total total">
                                <strong>المجموع:</strong> <span class="woocommerce-Price-amount amount"><bdi>{{$total_price}} <span class="woocommerce-Price-currencySymbol"><i class="fa fa-shekel" style="font-size:13px; color:#9b9c9f;"></i></span></bdi></span> </p>


                            <p class="woocommerce-mini-cart__buttons buttons"><a href="{{route('cart')}}" class="button wc-forward">عرض السلة</a><a href="{{route('cart')}}" class="button checkout wc-forward">إتمام الطلب</a></p>

                            @else
                            <p class="woocommerce-mini-cart__empty-message">لا توجد منتجات في سلة المشتريات.</p>
                            @endif
                            @else
                            <p class="woocommerce-mini-cart__empty-message">لا توجد منتجات في سلة المشتريات.</p>
                            @endif

                        </div>
                    </section>
                </div>
            @endif
        </div>

        <div class="header-search-wrap">
            <div class="container">

                <form role="search" method="get" class="search-form" action="">
                    <label>
                        <span class="screen-reader-text">Search for:</span>
                        <input type="search" class="search-field-top ui-autocomplete-input" placeholder="بحث" value="" name="s" autocomplete="off">
                    </label>
                    <input type="hidden" name="bp_search" value="1"><input type="hidden" name="view" value="content"></form>
                <a data-balloon-pos="left" data-balloon="Close" href="#" class="close-search"><i class="fa-solid fa-xmark"></i></a>
            </div>
        </div>
    </div>

    <div class="bb-mobile-panel-wrapper left light closed">
        <div class="bb-mobile-panel-inner">
            <div class="bb-mobile-panel-header">
                @if(Auth::guard('student')->check())
                <div class="user-wrap">
                    <a>
                    @if(Auth::guard('student')->user()->photo != null)
                        <img src="{{route('index')}}/assets/images/students/{{Auth::guard('student')->user()->photo}}" class="avatar avatar-100 photo" height="100" width="100" loading="lazy" alt="user">
                    @else
                    <img alt="" src="https://www.gravatar.com/avatar/18c09435dd06ec766fd8ade4631cf4d7?s=100&amp;r=g&amp;d=mm" srcset="https://www.gravatar.com/avatar/18c09435dd06ec766fd8ade4631cf4d7?s=100&amp;r=g&amp;d=mm 2x" class="avatar avatar-100 photo" height="100" width="100" loading="lazy">
                    @endif
                    </a>
                    <div>
                        <a>
                            <span class="user-name">{{Auth::guard('student')->user()->name}}</span>
                        </a>
                        <div class="my-account-link"><a class="ab-item" aria-haspopup="true">{{Auth::guard('student')->user()->points}} شيكل</a></div>
                    </div>
                </div>
                @else
                <div class="logo-wrap">
                    <a href="{{route('index')}}" rel="home">
                        <img src="{{route('index')}}/webassets/loggg.png" class="bb-mobile-logo" alt="" loading="lazy"> </a>
                </div>
                @endif
                <a href="#" class="bb-close-panel"><i class="fa-solid fa-xmark"></i></a>
            </div>

            <nav class="main-navigation" data-menu-space="120">
                <ul id="menu-mobile-menu" class="bb-primary-menu mobile-menu buddypanel-menu side-panel-menu">
                    <li id="menu-item-1239548" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-1239548"><a href="{{route('index')}}"><i class="bb-icon-l bb-icon-file bb-custom-icon"></i><span class="link-text">الصفحة الرئيسية</span></a></li>
                    <li id="menu-item-1239550" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1239550"><a href="{{route('allCourses')}}"><i class="bb-icon-l bb-icon-file bb-custom-icon"></i><span class="link-text">جميع المواد</span></a></li>
                    <li id="menu-item-1239552" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1239552"><a href="{{route('about')}}"><i class="bb-icon-l bb-icon-file bb-custom-icon"></i><span class="link-text">عن راسخ</span></a></li>
                    <li id="menu-item-1239554" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1239554"><a href="{{route('cards')}}"><i class="bb-icon-l bb-icon-file bb-custom-icon"></i><span class="link-text">نقاط بيع بطاقات راسخ</span></a></li>
                    <li id="menu-item-1239555" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1239555"><a href="{{route('contact')}}"><i class="bb-icon-l bb-icon-file bb-custom-icon"></i><span class="link-text">اتصل بنا</span></a></li>
                    @if(Auth::guard('student')->check())
                    <li id="menu-item-1239557" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1239557"><a href="{{route('charging')}}"><i class="bb-icon-l bb-icon-file bb-custom-icon"></i><span class="link-text">النقاط</span></a></li>
                    <li id="menu-item-1239555" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1239555"><a href="{{route('logout')}}"><i class="bb-icon-l bb-icon-file bb-custom-icon"></i><span class="link-text">تسجيل الخروج</span></a></li>
                    @else
                    <li id="menu-item-1239562" class="bp-menu bp-login-nav menu-item menu-item-type-custom menu-item-object-custom menu-item-1239562"><a href="{{route('login')}}"><i class="fa-sharp fa-solid fa-right-to-bracket"></i><span>تسجيل الدخول</span></a></li>
                    <li id="menu-item-1239563" class="bp-menu bp-register-nav menu-item menu-item-type-custom menu-item-object-custom menu-item-1239563"><a href="{{route('register')}}"><i class="fa fa-clipboard-list"></i><span>إنشاء حساب جديد</span></a></li>
                    @endif
                </ul>
                @if(Auth::guard('student')->check())
                <hr>
                <ul id="menu-panelmenu" class="bb-primary-menu mobile-menu buddypanel-menu side-panel-menu">
                    <li class="bp-menu bp-profile-nav menu-item menu-item-type-custom menu-item-object-custom menu-item-24979"><a href="{{route('profile')}}" class="bb-menu-item" data-balloon-pos="right" data-balloon="الصفحة الشخصية"><i class="fa-solid fa-user"></i><span>الصفحة الشخصية</span></a></li>
                    <li class="bp-menu bp-messages-nav menu-item menu-item-type-custom menu-item-object-custom menu-item-24983"><a href="{{route('chats')}}" class="bb-menu-item" data-balloon-pos="right" data-balloon="الرسائل"><i class="fa-solid fa-message"></i><span>الرسائل</span></a></li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1239538"><a href="{{route('myCourses')}}" class="bb-menu-item" data-balloon-pos="right" data-balloon="دوراتي"><i class="fa-solid fa-graduation-cap"></i><span>دوراتي</span></a></li>
                </ul>
                @endif
            </nav>

        </div>
    </div>
</header>
