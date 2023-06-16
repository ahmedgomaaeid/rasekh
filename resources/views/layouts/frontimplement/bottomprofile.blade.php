<span id="bbapp-title" style="display: none;">Ahmed Eid</span>
    <script type="text/javascript">
        document.addEventListener('contextmenu', event => event.preventDefault());

    </script>

    <script>
        jQuery(document).ready(function() {
            jQuery(".field_type_telephone").each(function() {
                var $this = jQuery(this)
                    , field_id = $this.find('.input_mask_details').data('field_id')
                    , pmask = $this.find('.input_mask_details').data('val');

                if (field_id && pmask) {
                    jQuery('#' + field_id).mask(pmask).bind('keypress', function(e) {
                        if (e.which == 13) {
                            jQuery(this).blur();
                        }
                    });
                }
            });
        });

    </script>

    <script type="text/javascript">
        (function() {
            var c = document.body.className;
            c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
            document.body.className = c;
        })();

    </script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/moment.min.js.download" id="bp-moment-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/ar.min.js.download" id="bp-moment-locale-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/livestamp.min.js.download" id="bp-livestamp-js"></script>
    <script type="text/javascript" id="bp-livestamp-js-after">
        jQuery(function() {
            moment.locale('ar.min');
        });

    </script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/jquery.mask.min.js.download" id="jquery-mask-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/underscore.min.js.download" id="underscore-js"></script>
    <script type="text/javascript" id="wp-util-js-extra">
        /* <![CDATA[ */
        var _wpUtilSettings = {
            "ajax": {
                "url": "\/wp-admin\/admin-ajax.php"
            }
        };
        /* ]]> */

    </script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/wp-util.min.js.download" id="wp-util-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/regenerator-runtime.min.js.download" id="regenerator-runtime-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/wp-polyfill.min.js.download" id="wp-polyfill-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/hooks.min.js.download" id="wp-hooks-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/i18n.min.js.download" id="wp-i18n-js"></script>
    <script type="text/javascript" id="wp-i18n-js-after">
        wp.i18n.setLocaleData({
            'text direction\u0004ltr': ['rtl']
        });

    </script>
    <script type="text/javascript" id="bp-nouveau-js-extra">
        /* <![CDATA[ */
        var BP_Nouveau = {
            "ajaxurl": "https:\/\/watad.me\/wp-admin\/admin-ajax.php"
            , "only_admin_notice": "As you are the only organizer of this group, you cannot leave it. You can either delete the group or promote another member to be an organizer first and then leave the group."
            , "is_friend_confirm": "Are you sure you want to remove your connection with this member?"
            , "confirm": "Are you sure?"
            , "confirm_delete_set": "Are you sure you want to delete this set? This cannot be undone."
            , "show_x_comments": "View previous comments"
            , "unsaved_changes": "Your profile has unsaved changes. If you leave the page, the changes will be lost."
            , "object_nav_parent": "#buddypress"
            , "empty_field": "New Field"
            , "close": "Close"
            , "objects": {
                "0": "activity"
                , "1": "members"
                , "4": "xprofile"
                , "9": "messages"
                , "10": "settings"
                , "11": "notifications"
                , "12": "search"
            }
            , "nonces": {
                "activity": "3858054441"
                , "members": "b76b36254d"
                , "xprofile": "91c4ac794a"
                , "messages": "eccc641943"
                , "settings": "efcf2c3df9"
                , "notifications": "4b6c833c4a"
                , "search": "44b51e3edb"
            }
            , "nonce": {
                "bp_moderation_content_nonce": "58d767f861"
            }
            , "current": {
                "message_user_id": 227740
            }
            , "archived_threads": []
            , "activity": {
                "params": {
                    "user_id": 227740
                    , "object": "user"
                    , "backcompat": false
                    , "post_nonce": "bbbe6e2ed7"
                    , "post_draft_nonce": "ad1f708b77"
                    , "excluded_hosts": []
                    , "user_can_post": true
                    , "is_activity_edit": false
                    , "displayed_user_id": 227740
                    , "errors": {
                        "empty_post_update": "Sorry, Your update cannot be empty."
                        , "post_fail": "An error occurred while saving your post."
                        , "media_fail": "To change the media type, remove existing media from your post."
                    }
                    , "avatar_url": "https:\/\/secure.gravatar.com\/avatar\/?s=96&d=mm&r=g"
                    , "avatar_width": 150
                    , "avatar_height": 150
                    , "user_display_name": "Ahmed Eid"
                    , "user_domain": "https:\/\/watad.me\/members\/ahmedeid\/"
                    , "avatar_alt": "Profile photo of Ahmed Eid"
                    , "draft_activity": ""
                    , "access_control_settings": {
                        "can_create_activity": true
                        , "can_create_activity_media": true
                        , "can_create_activity_document": true
                    }
                }
                , "strings": {
                    "whatsnewPlaceholder": "Share what's on your mind, Ahmed Eid..."
                    , "whatsnewLabel": "Post what&#039;s new"
                    , "whatsnewpostinLabel": "Post in"
                    , "postUpdateButton": "Post"
                    , "updatePostButton": "Update Post"
                    , "cancelButton": "\u0625\u0644\u063a\u0627\u0621"
                    , "commentLabel": "%d Comment"
                    , "commentsLabel": "%d Comments"
                    , "loadingMore": "Loading..."
                    , "discardButton": "Discard Draft"
                }
            }
        };
        var BB_Nouveau_Presence = {
            "heartbeat_enabled": "1"
            , "presence_interval": "60"
            , "rest_nonce": "fef1b54984"
        };
        /* ]]> */

    </script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/buddypress-nouveau.min.js.download" id="bp-nouveau-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/jquery.guillotine.min.js.download" id="guillotine-js-js"></script>
    <script type="text/javascript" id="heartbeat-js-extra">
        /* <![CDATA[ */
        var heartbeatSettings = {
            "ajaxurl": "\/wp-admin\/admin-ajax.php"
            , "nonce": "d9fad9ff28"
        };
        /* ]]> */

    </script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/heartbeat.min.js.download" id="heartbeat-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/core.min.js.download" id="jquery-ui-core-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/mouse.min.js.download" id="jquery-ui-mouse-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/sortable.min.js.download" id="jquery-ui-sortable-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/buddypress-xprofile.min.js.download" id="bp-nouveau-xprofile-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/menu.min.js.download" id="jquery-ui-menu-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/dom-ready.min.js.download" id="wp-dom-ready-js"></script>
    <script type="text/javascript" id="wp-a11y-js-translations">
        (function(domain, translations) {
            var localeData = translations.locale_data[domain] || translations.locale_data.messages;
            localeData[""].domain = domain;
            wp.i18n.setLocaleData(localeData, domain);
        })("default", {
            "translation-revision-date": "2022-11-04 13:58:35+0000"
            , "generator": "GlotPress\/4.0.0-alpha.3"
            , "domain": "messages"
            , "locale_data": {
                "messages": {
                    "": {
                        "domain": "messages"
                        , "plural-forms": "nplurals=6; plural=(n == 0) ? 0 : ((n == 1) ? 1 : ((n == 2) ? 2 : ((n % 100 >= 3 && n % 100 <= 10) ? 3 : ((n % 100 >= 11 && n % 100 <= 99) ? 4 : 5))));"
                        , "lang": "ar"
                    }
                    , "Notifications": ["\u0627\u0644\u0625\u0634\u0639\u0627\u0631\u0627\u062a"]
                }
            }
            , "comment": {
                "reference": "wp-includes\/js\/dist\/a11y.js"
            }
        });

    </script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/a11y.min.js.download" id="wp-a11y-js"></script>
    <script type="text/javascript" id="jquery-ui-autocomplete-js-extra">
        /* <![CDATA[ */
        var uiAutocompleteL10n = {
            "noResults": "\u0644\u0627 \u062a\u0648\u062c\u062f \u0646\u062a\u0627\u0626\u062c."
            , "oneResult": "\u0646\u062a\u064a\u062c\u0629 \u0648\u0627\u062d\u062f\u0629 \u062a\u0645 \u0627\u0644\u0639\u062b\u0648\u0631 \u0639\u0644\u064a\u0647\u0627\u060c \u0627\u0633\u062a\u062e\u062f\u0645 \u0645\u0641\u0627\u062a\u064a\u062d \u0627\u0644\u0623\u0633\u0647\u0645 \u0644\u0644\u0623\u0639\u0644\u0649 \u0648\u0627\u0644\u0623\u0633\u0641\u0644 \u0644\u0644\u062a\u0635\u0641\u062d."
            , "manyResults": "%d \u0646\u062a\u064a\u062c\u0629 \u062a\u0645 \u0627\u0644\u0639\u062b\u0648\u0631 \u0639\u0644\u064a\u0647\u0627\u060c \u0627\u0633\u062a\u062e\u062f\u0645 \u0645\u0641\u0627\u062a\u064a\u062d \u0627\u0644\u0623\u0633\u0647\u0645 \u0644\u0644\u0623\u0639\u0644\u0649 \u0648\u0627\u0644\u0623\u0633\u0641\u0644 \u0644\u0644\u062a\u0635\u0641\u062d."
            , "itemSelected": "\u062a\u0645 \u062a\u062d\u062f\u064a\u062f \u0627\u0644\u0639\u0646\u0635\u0631."
        };
        /* ]]> */

    </script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/autocomplete.min.js.download" id="jquery-ui-autocomplete-js"></script>
    <script type="text/javascript" id="bp-nouveau-search-js-extra">
        /* <![CDATA[ */
        var BP_SEARCH = {
            "nonce": "064d93a100"
            , "action": "bp_search_ajax"
            , "debug": "1"
            , "ajaxurl": "https:\/\/watad.me\/wp-admin\/admin-ajax.php"
            , "loading_msg": "Loading suggestions..."
            , "enable_ajax_search": "1"
            , "per_page": "5"
            , "autocomplete_selector": ".header-search-wrap .search-form"
            , "form_selector": ".widget_search .search-form"
            , "forums_autocomplete": ""
        };
        /* ]]> */

    </script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/buddypress-search.min.js.download" id="bp-nouveau-search-js"></script>
    <script type="text/javascript" id="crisp-js-before">
        window.$crisp = [];
        CRISP_RUNTIME_CONFIG = {
            locale: 'ar'
        };
        CRISP_WEBSITE_ID = '370ff10b-e5d2-41eb-a827-feb97decbbc8';
        $crisp.push(['set', 'user:email', 'pahmedgomaaeid@gmail.com']);
        $crisp.push(['set', 'user:nickname', 'Ahmed Eid']);
        $crisp.push(['set', 'user:nickname', 'Ahmed Eid']);
        $crisp.push(['set', 'session:data', [
            [
                ['country', 'EG']
                , ['shipping_country', 'EG']
            ]
        ]]);

    </script>
    <script type="text/javascript" async="" src="{{route('index')}}/profileassets/l.js.download" id="crisp-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/slick.min.js.download" id="jquery-slick-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/exad-script.min.js.download" id="exad-main-script-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/elementor.js.download" id="learndash-course-grid-elementor-compatibility-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/jquery.blockUI.min.js.download" id="jquery-blockui-js"></script>
    <script type="text/javascript" id="wc-add-to-cart-js-extra">
        /* <![CDATA[ */
        var wc_add_to_cart_params = {
            "ajax_url": "\/wp-admin\/admin-ajax.php"
            , "wc_ajax_url": "\/?wc-ajax=%%endpoint%%&elementor_page_id=0"
            , "i18n_view_cart": "\u0639\u0631\u0636 \u0627\u0644\u0633\u0644\u0629"
            , "cart_url": "https:\/\/watad.me\/cart\/"
            , "is_cart": ""
            , "cart_redirect_after_add": "yes"
        };
        /* ]]> */

    </script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/add-to-cart.min.js.download" id="wc-add-to-cart-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/js.cookie.min.js.download" id="js-cookie-js"></script>
    <script type="text/javascript" id="woocommerce-js-extra">
        /* <![CDATA[ */
        var woocommerce_params = {
            "ajax_url": "\/wp-admin\/admin-ajax.php"
            , "wc_ajax_url": "\/?wc-ajax=%%endpoint%%&elementor_page_id=0"
        };
        /* ]]> */

    </script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/woocommerce.min.js.download" id="woocommerce-js"></script>
    <script type="text/javascript" id="wc-cart-fragments-js-extra">
        /* <![CDATA[ */
        var wc_cart_fragments_params = {
            "ajax_url": "\/wp-admin\/admin-ajax.php"
            , "wc_ajax_url": "\/?wc-ajax=%%endpoint%%&elementor_page_id=0"
            , "cart_hash_key": "wc_cart_hash_e030c4ce4d93b10d06955a90a69b3632"
            , "fragment_name": "wc_fragments_e030c4ce4d93b10d06955a90a69b3632"
            , "request_timeout": "5000"
        };
        /* ]]> */

    </script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/cart-fragments.min.js.download" id="wc-cart-fragments-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/main.js.download" id="buddyboss_appaction-js"></script>
    <script type="text/javascript" id="learndash-front-js-extra">
        /* <![CDATA[ */
        var ldVars = {
            "postID": "24946"
            , "videoReqMsg": "\u064a\u062c\u0628 \u0639\u0644\u064a\u0643 \u0645\u0634\u0627\u0647\u062f\u0629 \u0627\u0644\u0641\u064a\u062f\u064a\u0648 \u0642\u0628\u0644 \u0627\u0644\u0648\u0635\u0648\u0644 \u0625\u0644\u0649 \u0647\u0630\u0627 \u0627\u0644\u0645\u062d\u062a\u0648\u0649"
            , "ajaxurl": "https:\/\/watad.me\/wp-admin\/admin-ajax.php"
        };
        /* ]]> */

    </script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/learndash.js.download" id="learndash-front-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/imagesloaded.min.js.download" id="imagesloaded-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/masonry.min.js.download" id="masonry-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/menu.js.download" id="boss-menu-js-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/fitvids.js.download" id="boss-fitvids-js-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/slick.min.js(1).download" id="boss-slick-js-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/panelslider.min.js.download" id="boss-panelslider-js-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/sticky-kit.js.download" id="boss-sticky-js-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/jssocials.min.js.download" id="boss-jssocials-js-js"></script>
    <script type="text/javascript" id="buddyboss-theme-main-js-js-extra">
        /* <![CDATA[ */
        var bs_data = {
            "jm_ajax": "https:\/\/watad.me\/jm-ajax\/"
            , "ajaxurl": "https:\/\/watad.me\/wp-admin\/admin-ajax.php"
            , "show_notifications": ""
            , "show_messages": ""
            , "facebook_label": "Share on Facebook"
            , "twitter_label": "Tweet"
            , "translation": {
                "comment_posted": "Your comment has been posted."
                , "comment_btn_loading": "Please Wait..."
                , "choose_a_file_label": "Choose a file"
            }
            , "learndash": {
                "nonce_get_courses": "83fabdb77f"
                , "course_archive_url": "https:\/\/watad.me\/courses\/"
            }
        };
        /* ]]> */

    </script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/main.js(1).download" id="buddyboss-theme-main-js-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/validate.min.js.download" id="boss-validate-js-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/magnific-popup.js.download" id="bp-nouveau-magnific-popup-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/select2.full.min.js.download" id="select2-js-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/progressbar.min.js.download" id="progressbar-js-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/mousewheel.min.js.download" id="mousewheel-js-js"></script>
    <script type="text/javascript" id="buddyboss-theme-learndash-js-js-extra">
        /* <![CDATA[ */
        var BBTHEME_LEARNDASH_FRONT_VIDEO = {
            "hide_wrapper": "show"
            , "video_progression_enabled": "off"
            , "video_type": ""
        };
        /* ]]> */

    </script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/learndash.min.js.download" id="buddyboss-theme-learndash-js-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/bb-woocommerce.min.js.download" id="buddyboss-theme-woocommerce-js-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/elementor.min.js.download" id="buddyboss-theme-elementor-js-js"></script>
    <script type="text/javascript" src="{{route('index')}}/profileassets/plugins.min.js.download" id="buddyboss-theme-plugins-js-js"></script>

    <!--fv-flowplayer-footer-->

    <script>
        jQuery(document).ready(function() {
            //Your codes strat from here

            //add buttons on swarimfy video player
            (function($) {
                setTimeout(function() {
                    var $incrementButton = $("<div>").addClass("vjs-speed vjs-speed-increment vjs-menu-button vjs-control").attr({
                        "aria-haspopup": "true"
                        , "role": "button"
                    }).append($("<div>").addClass("vjs-control-content").append($("<span>").addClass("vjs-control-text").html("Increment")), $("<div>").addClass("vjs-speed-value").html("<<"));
                    var $decrementButton = $("<div>").addClass("vjs-speed vjs-speed-decrement vjs-menu-button vjs-control").attr({
                        "aria-haspopup": "true"
                        , "role": "button"
                    }).append($("<div>").addClass("vjs-control-content").append($("<span>").addClass("vjs-control-text").html("Decrement")), $("<div>").addClass("vjs-speed-value").html(">>"));

                    $incrementButton.insertBefore(".vjs-playback-rate");
                    $decrementButton.insertBefore(".vjs-playback-rate");

                    $(".vjs-speed-increment").off("click").on("click", function(event) {
                        var vid = $(this).parent().parent().children("video")[0];
                        vid.currentTime += 10;
                        if (vid.currentTime > vid.duration) {
                            vid.pause();
                            vid.currentTime = 0;
                        }
                    });
                    $(".vjs-speed-decrement").off("click").on("click", function(event) {
                        var vid = $(this).parent().parent().children("video")[0];
                        vid.currentTime -= 10;
                        if (vid.currentTime < 0) {
                            vid.pause();
                            vid.currentTime = 0;
                        }
                    });
                }, 5000);
            })(jQuery);

            //Popup Cookie redirection script

            (function($) {
                $.Cookie = {
                    Set: function(c_name, value, exdays, domain) {
                        var exdate = new Date();
                        exdate.setDate(exdate.getDate() + exdays);
                        var c_value = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toUTCString() + "; path=/" + (domain ? "; domain=" + domain : ""));
                        document.cookie = c_name + "=" + c_value;
                    }
                    , Get: function(c_name) {
                        var i, x, y, ARRcookies = document.cookie.split(";");
                        for (i = 0; i < ARRcookies.length; i++) {
                            x = ARRcookies[i].substr(0, ARRcookies[i].indexOf("="));
                            y = ARRcookies[i].substr(ARRcookies[i].indexOf("=") + 1);
                            x = x.replace(/^s+|s+$/g, "");
                            if (x == c_name) {
                                return y;
                            }
                        }
                    }
                    , SetWithoutEscape: function(c_name, value, exdays) {
                        var exdate = new Date();
                        exdate.setDate(exdate.getDate() + exdays);
                        var c_value = value + ((exdays == null) ? "" : "; expires=" + exdate.toUTCString() + "; path=/");
                        document.cookie = c_name + "=" + c_value;
                    }
                    , Delete: function(c_name) {
                        document.cookie = c_name + "=; expires=Sun, 29-Sep-1900 13:39:28 GMT; path=/";
                    }
                };

                var beforeFunction = function() {};
                var headers = {};
                var data = {};

                var successFunction = function(request, result) {
                    if (result != "EXCEPTION") {
                        if (result == "REDIRECT") {
                            location.href = "http://lb.watad.me";
                        } else {
                            var countryCode = result; //$("#hfCountryCode").val();
                            if (countryCode) {
                                countryCode = countryCode.toLowerCase();
                                if (countryCode == "lb") //lebanono
                                {
                                    //show popup
                                    var countryChoosedByUser = $.Cookie.Get("CountryChoosed");

                                    if (countryChoosedByUser) // the user choose a country then don't display the popup
                                    {
                                        // do nothing
                                    } else {
                                        $("body").append($("<button>").attr({
                                            "class": "open-redirect-popup hidden"
                                            , "style": "display: none !important;"
                                        }));
                                        $("#hrfLB").off("click").on("click", function(event) {
                                            $.Cookie.Set("CountryChoosed", "lb", 1500, location.hostname.substring(location.hostname.lastIndexOf(".", location.hostname.lastIndexOf(".") - 1) + 1));
                                            location.href = "http://lb.watad.me";
                                        });
                                        $("#hrfJO").off("click").on("click", function(event) {
                                            $("#hrfJO").parents(".cp-modal-content").next().click(); // close the popup
                                        });
                                        setTimeout(function() {
                                            $(".open-redirect-popup").click(); // to show popup
                                        }, 1500);
                                    }
                                }
                            } else {
                                // no value check why geoip is not working
                            }
                        }
                    }
                }

                function errorFunction(xhr, textStatus, errorThrown, headers, data) {

                }
                sendRequest(beforeFunction, headers, data, successFunction, errorFunction, "/WatadGetCountry.php", "GET");


                function sendRequest(BeforeSendFunc, headers, data, SuccessFunc, ErrorFunc, _url, method) {
                    var abort = $.ajax({
                        type: method
                        , async: true
                        , beforeSend: BeforeSendFunc()
                        , url: _url
                        , headers: headers
                        , data: data
                        , cache: false,
                        //dataType: "json",
                        success: function(result, xhr, request) {
                            SuccessFunc(request, result);
                        }
                        , error: function(xhr, textStatus, errorThrown) {
                            ErrorFunc(xhr, textStatus, errorThrown, headers, data);
                        }
                    });

                    return abort;
                }
            })(jQuery);
        });

    </script><!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="" src="{{route('index')}}/profileassets/js"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-88044097-2');

    </script>




    <p id="a11y-speak-intro-text" class="a11y-speak-intro-text" style="position: absolute;margin: -1px;padding: 0;height: 1px;width: 1px;overflow: hidden;clip: rect(1px, 1px, 1px, 1px);-webkit-clip-path: inset(50%);clip-path: inset(50%);border: 0;word-wrap: normal !important;" hidden="hidden">الإشعارات</p>
    <div id="a11y-speak-assertive" class="a11y-speak-region" style="position: absolute;margin: -1px;padding: 0;height: 1px;width: 1px;overflow: hidden;clip: rect(1px, 1px, 1px, 1px);-webkit-clip-path: inset(50%);clip-path: inset(50%);border: 0;word-wrap: normal !important;" aria-live="assertive" aria-relevant="additions text" aria-atomic="true"></div>
    <div id="a11y-speak-polite" class="a11y-speak-region" style="position: absolute;margin: -1px;padding: 0;height: 1px;width: 1px;overflow: hidden;clip: rect(1px, 1px, 1px, 1px);-webkit-clip-path: inset(50%);clip-path: inset(50%);border: 0;word-wrap: normal !important;" aria-live="polite" aria-relevant="additions text" aria-atomic="true"></div>
    <ul id="ui-id-1" tabindex="0" class="ui-menu ui-widget ui-widget-content ui-autocomplete ui-front" unselectable="on" style="display: none;"></ul>
    <div role="status" aria-live="assertive" aria-relevant="additions" class="ui-helper-hidden-accessible"></div>
    <script>
        var returnedSuggestion = ''
        let editor, doc, cursor, line, pos
        document.addEventListener("keydown", (event) => {
            setTimeout(() => {
                editor = event.target.closest('.CodeMirror');
                if (editor) {
                    doc = editor.CodeMirror.getDoc()
                    cursor = doc.getCursor()
                    line = doc.getLine(cursor.line)
                    pos = {
                        line: cursor.line
                        , ch: line.length
                    }
                    if (event.key == "Enter") {
                        var query = doc.getRange({
                            line: Math.max(0, cursor.line - 10)
                            , ch: 0
                        }, {
                            line: cursor.line
                            , ch: 0
                        })
                        window.postMessage({
                            source: 'getSuggestion'
                            , payload: {
                                data: query
                            }
                        })
                        //displayGrey(query)
                    } else if (event.key == "ArrowRight") {
                        acceptTab(returnedSuggestion)
                    }
                }
            }, 0)
        })

        function acceptTab(text) {
            if (suggestionDisplayed) {
                doc.replaceRange(text, pos)
                suggestionDisplayed = false
            }
        }

        function displayGrey(text) {
            var element = document.createElement('span')
            element.innerText = text
            element.style = 'color:grey'
            var lineIndex = pos.line;
            editor.getElementsByClassName('CodeMirror-line')[lineIndex].appendChild(element)
            suggestionDisplayed = true
        }
        window.addEventListener('message', (event) => {
            if (event.source !== window) return
            if (event.data.source == 'return') {
                returnedSuggestion = event.data.payload.data
                displayGrey(event.data.payload.data)
            }
        })

    </script>
    <div aria-live="polite" class="crisp-client">
        <div class="cc-cbqy">
            <div class="cc-2xrx">
                <style type="text/css">
                    .crisp-client *:focus-visible {
                        outline-color: #522841 !important;
                    }

                    .crisp-client .cc-1m7s .cc-43er {
                        color: #FFFFFF !important;
                    }

                    .crisp-client .cc-1m7s .cc-1dea {
                        color: #A55082 !important;
                    }

                    .crisp-client .cc-1m7s .cc-12kx {
                        background-color: #FFFFFF !important;
                    }

                    .crisp-client .cc-1m7s .cc-o3lf {
                        background-color: #522841 !important;
                    }

                    .crisp-client .cc-1m7s .cc-1jlu {
                        background-color: #8c446e !important;
                    }

                    .crisp-client .cc-1m7s .cc-qvio {
                        background-color: #A55082 !important;
                    }

                    .crisp-client .cc-1m7s .cc-qvio *:focus-visible {
                        outline-color: #F0F2F5 !important;
                    }

                    .crisp-client .cc-1m7s .cc-918l {
                        background-color: #F8F3FA !important;
                    }

                    .crisp-client .cc-1m7s .cc-1gvp {
                        background-color: #F0F2F5 !important;
                    }

                    .crisp-client .cc-1m7s .cc-1idk {
                        border-color: #FFFFFF !important;
                    }

                    .crisp-client .cc-1m7s .cc-1yqf,
                    .crisp-client .cc-1m7s .cc-16s6:hover {
                        border-color: #A55082 !important;
                    }

                    .crisp-client .cc-1m7s .cc-1v5g {
                        border-color: rgba(165, 80, 130, 0.2) !important;
                    }

                    .crisp-client .cc-1m7s .cc-101z {
                        border-bottom-color: #A55082 !important;
                    }

                    .crisp-client .cc-1m7s .cc-1xhq::placeholder {
                        color: #ba5a92 !important;
                    }

                    .crisp-client .cc-1m7s .cc-fpp2::placeholder {
                        color: #ba5a92 !important;
                    }

                    .crisp-client .cc-1m7s .cc-xl8d,
                    .crisp-client .cc-1m7s .cc-xl8d:active,
                    .crisp-client .cc-1m7s .cc-12vm:hover .cc-988o,
                    .crisp-client .cc-1m7s .cc-12vm .cc-988o:active {
                        background: #522841 !important;
                    }

                    .crisp-client .cc-1m7s .cc-sywj,
                    .crisp-client .cc-1m7s .cc-1gkp:hover,
                    .crisp-client .cc-1m7s .cc-17qg[data-active="true"] .cc-8tya {
                        background: #7b3c61 !important;
                    }

                    .crisp-client .cc-1m7s .cc-xl8d:hover,
                    .crisp-client .cc-1m7s .cc-sywj:hover,
                    .crisp-client .cc-1m7s .cc-1gkp:active {
                        background: #6b3454 !important;
                    }

                    .crisp-client .cc-1m7s .cc-sywj:active {
                        background: #522841 !important;
                    }

                    .crisp-client .cc-1m7s .cc-1eud:hover .cc-1wyd {
                        background: #7b3c61 !important;
                    }

                    .crisp-client .cc-1m7s .cc-1eud .cc-1wyd:active {
                        background: #6b3454 !important;
                    }

                    .crisp-client .cc-1m7s .cc-n25y,
                    .crisp-client .cc-1m7s .cc-1oot:hover .cc-1rul,
                    .crisp-client .cc-1m7s .cc-1oot .cc-1rul:active {
                        background: #A55082 !important;
                    }

                    .crisp-client .cc-1m7s .cc-n25y:hover {
                        background: #8c446e !important;
                    }

                    .crisp-client .cc-1m7s .cc-n25y:active {
                        background: #7b3c61 !important;
                    }

                    .crisp-client .cc-1m7s .cc-1opo::selection,
                    .crisp-client .cc-1m7s .cc-1opo *::selection {
                        color: #1c293b !important;
                        background-color: #bc5b94 !important;
                    }

                </style>
            </div>
            <div class="cc-1q75">
                <style type="text/css">
                    .crisp-client .cc-1m7s {
                        z-index: 1000000;
                    }

                </style>
            </div>
        </div>