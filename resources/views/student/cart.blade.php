<!DOCTYPE html>
<!-- saved from url=(0022)https://watad.me/cart/ -->
<html dir="rtl" lang="ar">
@include('layouts.frontimplement.topcart')

<body class="bp-nouveau rtl page-template-default page page-id-9 theme-buddyboss-theme exclusive-addons-elementor woocommerce-cart woocommerce-page woocommerce-js buddyboss-theme bb-template-v1 bb-buddypanel bb-buddypanel-left buddypanel-logo-off header-style-1 menu-style-standard sticky-header mkb-desktop mkb-rtl mkb-version-1-6-8 bptk_bb bp-search elementor-default elementor-kit-329762 learndash-theme js bb-page-loaded">

    @include('layouts.main.sidebar')
    <div id="page" class="site">


        @include('layouts.main.header');



        <div id="content" class="site-content">

            <div id="breadcrumbs" class="bb-yoast-breadcrumbs"><span><span><a href="https://watad.me/">الرئيسية</a> » <span class="breadcrumb_last" aria-current="page">سلة الشراء</span></span></span></div>
            <div class="container">
                <div class="bb-grid site-content-grid">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">


                            <article id="post-9" class="post-9 page type-page status-publish hentry default-fi">
                                <header class="entry-header">
                                    <h1 class="entry-title">سلة الشراء</h1>
                                </header>

                                <div class="entry-content">
                                    <div class="woocommerce">
                                        @if(isset($_COOKIE['shopping_cart']))
                                        <?php
                                                                $cart_data = json_decode(stripslashes(Cookie::get('shopping_cart')));
                                                                $total_price = 0;
                                                            ?>
                                        @if($cart_data != array())
                                        <form class="woocommerce-cart-form" action="" method="post">

                                            <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th class="product-remove">&nbsp;</th>
                                                        <th class="product-thumbnail">&nbsp;</th>
                                                        <th class="product-name">المنتج</th>
                                                        <th class="product-price">السعر</th>
                                                        <th class="product-quantity">الكمية</th>
                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    @foreach($cart_data as $item_id)
                                                    <?php 
                                                            $item = getCourseData($item_id->item_id)
                                                        ?>
                                                    <tr class="woocommerce-cart-form__cart-item cart_item">

                                                        <td class="product-remove">
                                                            <a href="{{route('cart.removeItem',$item->id)}}" class="remove" aria-label="إزالة هذا المنتج" data-product_id="1058603" data-product_sku="">&times;</a> </td>

                                                        <td class="product-thumbnail">
                                                            <a href=""><img width="300" height="180" src="
                                                                    @if($item->steacher->photo != null)
                                                                        {{route('index')}}/assets/images/teachers/{{$item->steacher->photo}}
                                                                    @else
                                                                        {{route('index')}}/assets/images/orders/10.jpg
                                                                    @endif
                                                                " sizes="(max-width: 300px) 100vw, 300px" /></a> </td>

                                                        <td class="product-name" data-title="المنتج">
                                                            <a href="">{{$item->steacher->name}}</a> </td>

                                                        <td class="product-price" data-title="السعر">
                                                            <span class="woocommerce-Price-amount amount"><bdi>{{$item->price}}<span class="woocommerce-Price-currencySymbol">شيكل</span></bdi></span> </td>

                                                    </tr>
                                                    <?php
                                                                        $total_price += $item->price;
                                                                    ?>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </form>


                                        <div class="cart-collaterals">
                                            <div class="cart_totals ">


                                                <h2>إجمالي سلة المشتريات</h2>

                                                <table cellspacing="0" class="shop_table shop_table_responsive">

                                                    <tr class="cart-subtotal">
                                                        <th>المجموع</th>
                                                        <td data-title="المجموع"><span class="woocommerce-Price-amount amount"><bdi>{{$total_price}}<span class="woocommerce-Price-currencySymbol">شيكل</span></bdi></span></td>
                                                    </tr>

                                                    <tr class="cart-subtotal">
                                                        <th>الرصيد المستخدم</th>
                                                        <td data-title="الرصيد"><span class="woocommerce-Price-amount amount"><bdi>@if($points>=$total_price) {{$total_price}} @else {{$points}} @endif<span class="woocommerce-Price-currencySymbol">شيكل</span></bdi></span></td>
                                                    </tr>




                                                    <tr class="order-total">
                                                        <th>الإجمالي</th>
                                                        <td data-title="الإجمالي"><strong><span class="woocommerce-Price-amount amount"><bdi>@if($points>=$total_price) 0 @else {{$total_price-$points}} @endif<span class="woocommerce-Price-currencySymbol">شيكل</span></bdi></span></strong> </td>
                                                    </tr>


                                                </table>

                                                <div class="wc-proceed-to-checkout">

                                                    <a href="{{route('pay')}}" class="checkout-button button alt wc-forward">
                                                        التقدم لإتمام الطلب</a>
                                                </div>


                                            </div>
                                        </div>
                                        @else
                                        <div class="woocommerce-notices-wrapper"></div>
                                        <p class="cart-empty woocommerce-info">سلة مشترياتك فارغة حاليًا.</p>
                                        <p class="return-to-shop">
                                            <a class="button wc-backward" href="{{route('allCourses')}}">
                                                العودة إلى المتجر </a>
                                        </p>
                                        @endif
                                        @else
                                        <div class="woocommerce-notices-wrapper"></div>
                                        <p class="cart-empty woocommerce-info">سلة مشترياتك فارغة حاليًا.</p>
                                        <p class="return-to-shop">
                                            <a class="button wc-backward" href="{{route('allCourses')}}">
                                                العودة إلى المتجر </a>
                                        </p>
                                        @endif
                                    </div>
                                    <span class="cp-load-after-post"></span>
                                </div><!-- .entry-content -->


                            </article>

                        </main><!-- #main -->
                    </div><!-- #primary -->



                    <div id="secondary" class="widget-area sm-grid-1-1">


                    </div><!-- #secondary -->




                </div><!-- .bb-grid -->
            </div><!-- .container -->
        </div><!-- #content -->



        

    </div><!-- #page -->


    @include('layouts.frontimplement.bottomcart')



    <!-- plugin=object-cache-pro client=phpredis metric#hits=37213 metric#misses=123 metric#hit-ratio=99.7 metric#bytes=4329007 metric#prefetches=448 metric#store-reads=167 metric#store-writes=2 metric#store-hits=527 metric#store-misses=85 metric#sql-queries=107 metric#ms-total=1177.70 metric#ms-cache=37.06 metric#ms-cache-median=0.11 metric#ms-cache-ratio=3.1 -->
    <p id="a11y-speak-intro-text" class="a11y-speak-intro-text" style="position: absolute;margin: -1px;padding: 0;height: 1px;width: 1px;overflow: hidden;clip: rect(1px, 1px, 1px, 1px);-webkit-clip-path: inset(50%);clip-path: inset(50%);border: 0;word-wrap: normal !important;" hidden="hidden">الإشعارات</p>
    <div id="a11y-speak-assertive" class="a11y-speak-region" style="position: absolute;margin: -1px;padding: 0;height: 1px;width: 1px;overflow: hidden;clip: rect(1px, 1px, 1px, 1px);-webkit-clip-path: inset(50%);clip-path: inset(50%);border: 0;word-wrap: normal !important;" aria-live="assertive" aria-relevant="additions text" aria-atomic="true"></div>
    <div id="a11y-speak-polite" class="a11y-speak-region" style="position: absolute;margin: -1px;padding: 0;height: 1px;width: 1px;overflow: hidden;clip: rect(1px, 1px, 1px, 1px);-webkit-clip-path: inset(50%);clip-path: inset(50%);border: 0;word-wrap: normal !important;" aria-live="polite" aria-relevant="additions text" aria-atomic="true"></div>
    <ul id="ui-id-1" tabindex="0" class="ui-menu ui-widget ui-widget-content ui-autocomplete ui-front" unselectable="on" style="display: none;"></ul>
    <div role="status" aria-live="assertive" aria-relevant="additions" class="ui-helper-hidden-accessible"></div>
</body>

</html>
