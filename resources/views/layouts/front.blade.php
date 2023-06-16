<!DOCTYPE html>
<!-- saved from url=(0017)https://watad.me/ -->
<html dir="rtl" lang="ar">
@include('sweetalert::alert')
@yield('title')

@if(Auth::guard('student')->check())
<body class="home-page bp-nouveau rtl home page-template page-template-page-fullwidth-content page-template-page-fullwidth-content-php page page-id-28880 logged-in theme-buddyboss-theme exclusive-addons-elementor woocommerce-no-js buddyboss-theme bb-template-v1 bb-buddypanel bb-buddypanel-left buddypanel-logo-off  header-style-1  menu-style-standard sticky-header mkb-desktop mkb-rtl mkb-version-1-6-8 bptk_bb bp-search elementor-default elementor-kit-329762 elementor-page elementor-page-28880 no-js learndash-theme">
@include('layouts.main.sidebar')
@else
<body class="home-page bp-nouveau rtl home page-template page-template-page-fullwidth-content page-template-page-fullwidth-content-php page page-id-28880 theme-buddyboss-theme exclusive-addons-elementor woocommerce-js buddyboss-theme bb-template-v1 buddypanel-logo-off header-style-1 menu-style-standard sticky-header mkb-desktop mkb-rtl mkb-version-1-6-8 bptk_bb bp-search elementor-default elementor-kit-329762 elementor-page elementor-page-28880 learndash-theme js bb-page-loaded e--ua-blink e--ua-chrome e--ua-webkit" data-elementor-device-mode="desktop" data-new-gr-c-s-check-loaded="14.1079.0" data-gr-ext-installed="">
@endif
    <div id="page" class="site">
    <style>
    .elementor-button
    {
        color:#5e4949 !important;
    }
    .elementor-button:focus {
        background-color: #798777 !important;
        color: white !important;
    }
    .elementor-button:hover
    {
        background-color: #A2B29F !important;
    }
    .btn-join
    {
        border-bottom: 1px solid #A2B29F !important;
        color: #5e4949 !important;
        background-color: #BDD2B6 !important;
    }
    .elementor-28880 .elementor-element.elementor-element-dd684b6:not(.elementor-motion-effects-element-type-background), .elementor-28880 .elementor-element.elementor-element-dd684b6>.elementor-motion-effects-container>.elementor-motion-effects-layer
    {
        background-image: url('{{route('index')}}/webassets/qwe.png') !important;
    }
    </style>

        @include('layouts.main.header')
        
        @yield('content')

        <footer class="footer-bottom bb-footer style-2">
            <div class="container flex">
                <div class="footer-bottom-left">
                    <div class="footer-logo-wrap">
                        <a class="footer-logo" href="{{route('index')}}" rel="home">
                            <img src="{{route('index')}}/webassets/loggg.png" class="attachment-full size-full" alt="" loading="lazy"> </a>
                    </div>
                    <div class="copyright">
                        <div>جميع الحقوق محفوظة لراسخ - © {{date("Y")}}</div>
                    </div>
                </div>
                <div class="footer-bottom-right push-right">
                    <ul class="footer-socials">
                        <li><a href="https://www.facebook.com/watadtawjihi" target="_blank" data-balloon-pos="up" data-balloon="facebook"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="https://www.instagram.com/watadme/" target="_blank" data-balloon-pos="up" data-balloon="instagram"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="https://twitter.com/WatadTawjihi" target="_blank" data-balloon-pos="up" data-balloon="twitter"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="https://www.youtube.com/channel/UCAESH-bUEmwpQXkfhEEXjZw" target="_blank" data-balloon-pos="up" data-balloon="youtube"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                    <div class="footer-desc">
                        <div><a href="https://watad.me/terms-of-service/">شروط الخدمة و سياسة الخصوصية</a></div>
                        <div><img src="{{route('index')}}/webassets/Visa-Mastercard-logos-footer.png" alt="Visa &amp; Mastercard Logos"></div>
                    </div>
                </div>
            </div>
        </footer>

    </div><!-- #page -->


    @include('layouts.frontimplement.bottomindex')
    @yield('bottom')


    <!-- plugin=object-cache-pro client=phpredis metric#hits=42258 metric#misses=103 metric#hit-ratio=99.8 metric#bytes=2171515 metric#prefetches=934 metric#store-reads=102 metric#store-writes=1 metric#store-hits=964 metric#store-misses=63 metric#sql-queries=92 metric#ms-total=769.96 metric#ms-cache=17.33 metric#ms-cache-median=0.09 metric#ms-cache-ratio=2.2 -->
    <p id="a11y-speak-intro-text" class="a11y-speak-intro-text" style="position: absolute;margin: -1px;padding: 0;height: 1px;width: 1px;overflow: hidden;clip: rect(1px, 1px, 1px, 1px);-webkit-clip-path: inset(50%);clip-path: inset(50%);border: 0;word-wrap: normal !important;" hidden="hidden">الإشعارات</p>
    <div id="a11y-speak-assertive" class="a11y-speak-region" style="position: absolute;margin: -1px;padding: 0;height: 1px;width: 1px;overflow: hidden;clip: rect(1px, 1px, 1px, 1px);-webkit-clip-path: inset(50%);clip-path: inset(50%);border: 0;word-wrap: normal !important;" aria-live="assertive" aria-relevant="additions text" aria-atomic="true"></div>
    <div id="a11y-speak-polite" class="a11y-speak-region" style="position: absolute;margin: -1px;padding: 0;height: 1px;width: 1px;overflow: hidden;clip: rect(1px, 1px, 1px, 1px);-webkit-clip-path: inset(50%);clip-path: inset(50%);border: 0;word-wrap: normal !important;" aria-live="polite" aria-relevant="additions text" aria-atomic="true"></div>
    <ul id="ui-id-1" tabindex="0" class="ui-menu ui-widget ui-widget-content ui-autocomplete ui-front" unselectable="on" style="display: none;"></ul>
    <div role="status" aria-live="assertive" aria-relevant="additions" class="ui-helper-hidden-accessible"></div>
    @livewireScripts
</body>
<grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>
</html>
