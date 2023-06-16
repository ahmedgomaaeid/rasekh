<span id="bbapp-title" style="display: none;">اولويات العمليات ومجموعات الاعداد</span>
    <script type="text/javascript">
        document.addEventListener('contextmenu', event => event.preventDefault());

    </script>

    <div class="bptk-report-modal bptk-report-closed" id="bptk-report-modal">


        <div class="bptk-report-modal-inner" id="bptk-report-modal-inner">
            <div class="bptk-report-modal-inner-header">
                <h4>New Report</h4>
                <h4 class="bptk-report-close-button" id="bptk-report-close-button">Close</h4>
            </div>
            <input type="hidden" id="bptk-reported-id" value="">
            <input type="hidden" id="bptk-reporter-id" value="227740">
            <input type="hidden" id="bptk-activity-type">
            <input type="hidden" id="bptk-item-id">
            <input type="hidden" id="bptk-link">
            <input type="hidden" id="bptk-meta">
            <select name="bptk-report-type" id="bptk-report-type" class="postform">
                <option value="-1">What type of report is this?</option>
                <option class="level-0" value="153">Misleading or scam</option>
                <option class="level-0" value="152">Offensive</option>
                <option class="level-0" value="151">Spam</option>
                <option class="level-0" value="154">Violent or abusive</option>
            </select>
            <textarea rows="5" placeholder="Please give as much detail as possible" name="bptk-desc" id="bptk-desc"></textarea>

            <button class="button" id="bptk-report-submit" name="submit" data-nonce="bd45f3e0ba">Send</button>
            <p id="bptk-report-modal-response"></p>

        </div>
    </div>
    <div class="bptk-report-modal-overlay bptk-report-closed" id="bptk-report-modal-overlay">
    </div>

    <script type="text/javascript">
        (function() {
            var c = document.body.className;
            c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
            document.body.className = c;
        })();

    </script>
    <script type="text/javascript" src="{{route('index')}}/webassets/jquery.caret.min.js.download" id="jquery-caret-js"></script>
    <script type="text/javascript" src="{{route('index')}}/webassets/jquery.atwho.min.js.download" id="jquery-atwho-js"></script>
    <script type="text/javascript" id="bp-mentions-js-extra">
        /* <![CDATA[ */
        var BP_Mentions_Options = {
            "selectors": [".bp-suggestions", "#comments form textarea", ".wp-editor-area", ".bbp-the-content"]
            , "insert_tpl": "@${ID}"
            , "display_tpl": "<li data-value=\"@${ID}\"><img src=\"${image}\" \/><span class=\"username\">@${ID}<\/span><small>${name}<\/small><\/li>"
            , "extra_options": []
        };
        /* ]]> */

    </script>
    <script type="text/javascript" src="{{route('index')}}/webassets/mentions.min.js.download" id="bp-mentions-js"></script>
    <script type="text/javascript" src="{{route('index')}}/webassets/underscore.min.js.download" id="underscore-js"></script>
    <script type="text/javascript" id="wp-util-js-extra">
        /* <![CDATA[ */
        var _wpUtilSettings = {
            "ajax": {
                "url": "\/wp-admin\/admin-ajax.php"
            }
        };
        /* ]]> */

    </script>
    <script type="text/javascript" src="{{route('index')}}/webassets/wp-util.min.js.download" id="wp-util-js"></script>
    <script type="text/javascript" src="{{route('index')}}/webassets/regenerator-runtime.min.js.download" id="regenerator-runtime-js"></script>
    <script type="text/javascript" src="{{route('index')}}/webassets/wp-polyfill.min.js.download" id="wp-polyfill-js"></script>
    <script type="text/javascript" src="{{route('index')}}/webassets/hooks.min.js.download" id="wp-hooks-js"></script>
    <script type="text/javascript" src="{{route('index')}}/webassets/i18n.min.js.download" id="wp-i18n-js"></script>
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
                "activity": "c3241b0f8e"
                , "members": "745bcbf02c"
                , "xprofile": "c053fe5b82"
                , "messages": "30059ee0d2"
                , "settings": "bf94beed5d"
                , "notifications": "8b2eade1a0"
                , "search": "bc38f0d8df"
            }
            , "nonce": {
                "bp_moderation_content_nonce": "d3f47e1a87"
            }
            , "activity": {
                "params": {
                    "user_id": 227740
                    , "object": "user"
                    , "backcompat": false
                    , "post_nonce": "255c562c50"
                    , "post_draft_nonce": "af32e39ed6"
                    , "excluded_hosts": []
                    , "user_can_post": true
                    , "is_activity_edit": false
                    , "displayed_user_id": 0
                    , "errors": {
                        "empty_post_update": "Sorry, Your update cannot be empty."
                        , "post_fail": "An error occurred while saving your post."
                        , "media_fail": "To change the media type, remove existing media from your post."
                    }
                    , "avatar_url": "https:\/\/www.gravatar.com\/avatar\/18c09435dd06ec766fd8ade4631cf4d7?s=150&#038;r=g&#038;d=mm"
                    , "avatar_width": 150
                    , "avatar_height": 150
                    , "user_display_name": "Ahmed Eid"
                    , "user_domain": "https:\/\/watad.me\/members\/ahmedeid\/"
                    , "avatar_alt": "Profile photo of Ahmed Eid"
                    , "objects": {
                        "profile": {
                            "text": "Post in: Profile"
                            , "autocomplete_placeholder": ""
                            , "priority": 5
                        }
                    }
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
        /* ]]> */

    </script>
    <script type="text/javascript" src="{{route('index')}}/webassets/buddypress-nouveau.min.js.download" id="bp-nouveau-js"></script>
    <script type="text/javascript" src="{{route('index')}}/webassets/jquery.guillotine.min.js.download" id="guillotine-js-js"></script>
    <script type="text/javascript" src="{{route('index')}}/webassets/comment-reply.min.js.download" id="comment-reply-js"></script>
    <script type="text/javascript" id="heartbeat-js-extra">
        /* <![CDATA[ */
        var heartbeatSettings = {
            "ajaxurl": "\/wp-admin\/admin-ajax.php"
            , "nonce": "06902dd5b2"
        };
        /* ]]> */

    </script>
    <script type="text/javascript" src="{{route('index')}}/webassets/heartbeat.min.js.download" id="heartbeat-js"></script>
    <script type="text/javascript" src="{{route('index')}}/webassets/core.min.js.download" id="jquery-ui-core-js"></script>
    <script type="text/javascript" src="{{route('index')}}/webassets/menu.min.js.download" id="jquery-ui-menu-js"></script>
    <script type="text/javascript" src="{{route('index')}}/webassets/dom-ready.min.js.download" id="wp-dom-ready-js"></script>
    <script type="text/javascript" id="wp-a11y-js-translations">
        (function(domain, translations) {
            var localeData = translations.locale_data[domain] || translations.locale_data.messages;
            localeData[""].domain = domain;
            wp.i18n.setLocaleData(localeData, domain);
        })("default", {
            "translation-revision-date": "2022-05-30 06:19:33+0000"
            , "generator": "GlotPress\/4.0.0-alpha.1"
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
    <script type="text/javascript" src="{{route('index')}}/webassets/a11y.min.js.download" id="wp-a11y-js"></script>
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
    <script type="text/javascript" src="{{route('index')}}/webassets/autocomplete.min.js.download" id="jquery-ui-autocomplete-js"></script>
    <script type="text/javascript" id="bp-nouveau-search-js-extra">
        /* <![CDATA[ */
        var BP_SEARCH = {
            "nonce": "9c3195ef62"
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
    <script type="text/javascript" src="{{route('index')}}/webassets/buddypress-search.min.js.download" id="bp-nouveau-search-js"></script>
    <script type="text/javascript" id="s3bubble-drm-frontend-scripts-js-extra">
        /* <![CDATA[ */
        var s3bubble_drm_frontend_scripts = {
            "ajax": "https:\/\/watad.me\/wp-admin\/admin-ajax.php"
            , "nonce": "3761496db5"
            , "options": {
                "widevine_uri": ""
                , "playready_uri": ""
                , "fairplay_uri": ""
                , "use_iframes": "on"
                , "show_dynamic_watermark": "on"
                , "s3bubble_block_attempt": "on"
                , "s3bubble_woo_membership_page": " "
                , "s3bubble_woo_advert_product": ""
                , "s3bubble_remove_powered_by": "on"
                , "s3bubble_show_debug_information": "on"
                , "s3bubble_player_themes": "clean"
            }
            , "logging_url": "https:\/\/watad.me\/login\/?redirect_to=https%3A%2F%2Fwatad.me%2Fcourses%2F%25d8%25a7%25d9%2584%25d8%25b1%25d9%258a%25d8%25a7%25d8%25b6%25d9%258a%25d8%25a7%25d8%25aa-%25d8%25a7%25d9%2584%25d8%25b9%25d9%2584%25d9%2585%25d9%258a-%25d8%25a7%25d9%2584%25d9%2581%25d8%25b5%25d9%2584-%25d8%25a7%25d9%2584%25d8%25a7%25d9%2588%25d9%2584-2005%2Flessons%2F%25d8%25a7%25d9%2588%25d9%2584%25d9%2588%25d9%258a%25d8%25a7%25d8%25aa-%25d8%25a7%25d9%2584%25d8%25b9%25d9%2585%25d9%2584%25d9%258a%25d8%25a7%25d8%25aa-%25d9%2588%25d9%2585%25d8%25ac%25d9%2585%25d9%2588%25d8%25b9%25d8%25a7%25d8%25aa-%25d8%25a7%25d9%2584%25d8%25a7%25d8%25b9%25d8%25af%25d8%25a7%25d8%25af%2F"
            , "logo": "https:\/\/watad.me\/wp-content\/plugins\/drm-protected-video-streaming\/dist\/images\/powered.png"
            , "language": {
                "no_code": "ERROR: Code is a required option"
                , "no_div": "ERROR: Please make sure your html div has a unique id element"
                , "old_plugin_title": "VERY IMPORTANT!"
                , "old_plugin_description": "You have another S3Bubble plugin installed please remove it, the DRM plugin will not work with this plugin. You should be using one plugin called (AWS Protected DRM Video Streaming)."
                , "force_login_title": "Login Required"
                , "force_login_description": "Please login to view this video."
                , "blocked_title": "Blocked"
                , "blocked_description": "You have tried to remove the watermark! User blocked contact admin."
                , "console_open_title": "Error"
                , "console_open_description": "This video will not play with devtools open user logged! Please close devtools to enjoy our content."
                , "login_para": "If you already own this video please log in."
                , "error": "Information"
                , "error_message": "This media is not ready yet."
                , "error_message_live": "Live Stream Will Start In."
                , "error_message_start": "Click To Start Stream"
                , "error_code": "Code"
                , "purchased": "Purchased"
                , "login": "Login"
                , "drm_error": "You're browser does not have the features required to play this media"
                , "audio": "Audio"
                , "subtitles": "Subtitles\/CC"
                , "quality": "Quality"
                , "speed": "Speed"
                , "loading": "Loading..."
                , "back": "Back"
                , "captions_off": "Captions Off"
                , "default_audio": "Default Audio"
                , "settings": "Settings"
            }
            , "player_lang": {
                "locale": "ar"
                , "Play": "Play"
                , "Pause": "Pause"
                , "Replay": "Replay"
                , "Fullscreen": "Fullscreen"
                , "Non-Fullscreen": "Exit Fullscreen"
                , "Mute": "Mute"
                , "Unmute": "Unmute"
                , "Playback Rate": "Playback Rate"
                , "Subtitles": "Subtitles"
                , "subtitles off": "subtitles off"
                , "Captions": "Captions"
                , "captions off": "captions off"
                , "Chapters": "Chapters"
                , "Descriptions": "Descriptions"
                , "descriptions off": "descriptions off"
                , "Audio Track": "Audio Track"
                , "Volume Level": "Volume Level"
                , "You aborted the media playback": "You aborted the media playback"
                , "A network error caused the media download to fail part-way.": "A network error caused the media download to fail part-way."
                , "The media could not be loaded, either because the server or network failed or because the format is not supported.": "The media could not be loaded, either because the server or network failed or because the format is not supported."
                , "The media playback was aborted due to a corruption problem or because the media used features your browser did not support.": "The media playback was aborted due to a corruption problem or because the media used features your browser did not support."
                , "No compatible source was found for this media.": "No compatible source was found for this media."
                , "The media is encrypted and we do not have the keys to decrypt it.": "The media is encrypted and we do not have the keys to decrypt it."
                , "Play Video": "Play Video"
                , "captions settings": "captions settings"
                , "subtitles settings": "subtitles settings"
                , "descriptions settings": "descriptions settings"
                , "Text": "Text"
                , "White": "White"
                , "Black": "Black"
                , "Red": "Red"
                , "Green": "Green"
                , "Blue": "Blue"
                , "Yellow": "Yellow"
                , "Magenta": "Magenta"
                , "Cyan": "Cyan"
                , "Background": "Background"
                , "Window": "Window"
                , "Transparent": "Transparent"
                , "Semi-Transparent": "Semi-Transparent"
                , "Opaque": "Opaque"
                , "Font Size": "Font Size"
                , "Text Edge Style": "Text Edge Style"
                , "None": "None"
                , "Raised": "Raised"
                , "Depressed": "Depressed"
                , "Uniform": "Uniform"
                , "Dropshadow": "Dropshadow"
                , "Font Family": "Font Family"
                , "Proportional Sans-Serif": "Proportional Sans-Serif"
                , "Monospace Sans-Serif": "Monospace Sans-Serif"
                , "Proportional Serif": "Proportional Serif"
                , "Monospace Serif": "Monospace Serif"
                , "Casual": "Casual"
                , "Script": "Script"
                , "Small Caps": "Small Caps"
                , "Reset": "Reset"
                , "restore all settings to the default values": "restore all settings to the default values"
                , "Done": "Done"
                , "Caption Settings Dialog": "Caption Settings Dialog"
                , "Beginning of dialog window. Escape will cancel and close the window.": "Beginning of dialog window. Escape will cancel and close the window."
                , "End of dialog window.": "End of dialog window."
                , "Picture-in-Picture": "Picture in Picture"
                , "Open Chromecast menu": "Chromecast"
            }
        };
        /* ]]> */

    </script>
    <script type="text/javascript" src="{{route('index')}}/webassets/s3drm.min.js.download" id="s3bubble-drm-frontend-scripts-js"></script>
    <script type="text/javascript" src="{{route('index')}}/webassets/slick.min.js.download" id="jquery-slick-js"></script>
    <script type="text/javascript" src="{{route('index')}}/webassets/exad-script.min.js.download" id="exad-main-script-js"></script>
    <script type="text/javascript" src="{{route('index')}}/webassets/learndash_pager.min.js.download" id="learndash_pager_js-js"></script>
    <script type="text/javascript" id="learndash_template_script_js-js-extra">
        /* <![CDATA[ */
        var sfwd_data = {
            "json": "{\"ajaxurl\":\"https:\\\/\\\/watad.me\\\/wp-admin\\\/admin-ajax.php\"}"
        };
        /* ]]> */

    </script>
    <script type="text/javascript" src="{{route('index')}}/webassets/learndash_template_script.min.js.download" id="learndash_template_script_js-js"></script>
    <script type="text/javascript" src="{{route('index')}}/webassets/jquery.blockUI.min.js.download" id="jquery-blockui-js"></script>
    <script type="text/javascript" id="wc-add-to-cart-js-extra">
        /* <![CDATA[ */
        var wc_add_to_cart_params = {
            "ajax_url": "\/wp-admin\/admin-ajax.php"
            , "wc_ajax_url": "\/?wc-ajax=%%endpoint%%&elementor_page_id=1067706"
            , "i18n_view_cart": "\u0639\u0631\u0636 \u0627\u0644\u0633\u0644\u0629"
            , "cart_url": "https:\/\/watad.me\/cart\/"
            , "is_cart": ""
            , "cart_redirect_after_add": "yes"
        };
        /* ]]> */

    </script>
    <script type="text/javascript" src="{{route('index')}}/webassets/add-to-cart.min.js.download" id="wc-add-to-cart-js"></script>
    <script type="text/javascript" src="{{route('index')}}/webassets/js.cookie.min.js.download" id="js-cookie-js"></script>
    <script type="text/javascript" id="woocommerce-js-extra">
        /* <![CDATA[ */
        var woocommerce_params = {
            "ajax_url": "\/wp-admin\/admin-ajax.php"
            , "wc_ajax_url": "\/?wc-ajax=%%endpoint%%&elementor_page_id=1067706"
        };
        /* ]]> */

    </script>
    <script type="text/javascript" src="{{route('index')}}/webassets/woocommerce.min.js.download" id="woocommerce-js"></script>
    <script type="text/javascript" id="wc-cart-fragments-js-extra">
        /* <![CDATA[ */
        var wc_cart_fragments_params = {
            "ajax_url": "\/wp-admin\/admin-ajax.php"
            , "wc_ajax_url": "\/?wc-ajax=%%endpoint%%&elementor_page_id=1067706"
            , "cart_hash_key": "wc_cart_hash_e030c4ce4d93b10d06955a90a69b3632"
            , "fragment_name": "wc_fragments_e030c4ce4d93b10d06955a90a69b3632"
            , "request_timeout": "5000"
        };
        /* ]]> */

    </script>
    <script type="text/javascript" src="{{route('index')}}/webassets/cart-fragments.min.js.download" id="wc-cart-fragments-js"></script>
    <script type="text/javascript" src="{{route('index')}}/webassets/main.js.download" id="buddyboss_appaction-js"></script>
    <script type="text/javascript" id="learndash-front-js-extra">
        /* <![CDATA[ */
        var ldVars = {
            "postID": "1067706"
            , "videoReqMsg": "\u064a\u062c\u0628 \u0639\u0644\u064a\u0643 \u0645\u0634\u0627\u0647\u062f\u0629 \u0627\u0644\u0641\u064a\u062f\u064a\u0648 \u0642\u0628\u0644 \u0627\u0644\u0648\u0635\u0648\u0644 \u0625\u0644\u0649 \u0647\u0630\u0627 \u0627\u0644\u0645\u062d\u062a\u0648\u0649"
            , "ajaxurl": "https:\/\/watad.me\/wp-admin\/admin-ajax.php"
        };
        /* ]]> */

    </script>
    <script type="text/javascript" src="{{route('index')}}/webassets/learndash.js.download" id="learndash-front-js"></script>
    <script type="text/javascript" id="bp_toolkit-js-extra">
        /* <![CDATA[ */
        var bptk_ajax_settings = {
            "ajaxurl": "https:\/\/watad.me\/wp-admin\/admin-ajax.php"
            , "error": "Sorry, something went wrong. Please try again or refresh the page."
        };
        /* ]]> */

    </script>
    <script type="text/javascript" src="{{route('index')}}/webassets/bp-toolkit-public.js.download" id="bp_toolkit-js"></script>
    <script type="text/javascript" src="{{route('index')}}/webassets/imagesloaded.min.js.download" id="imagesloaded-js"></script>
    <script type="text/javascript" src="{{route('index')}}/webassets/masonry.min.js.download" id="masonry-js"></script>
    <script type="text/javascript" src="{{route('index')}}/webassets/menu.js.download" id="boss-menu-js-js"></script>
    <script type="text/javascript" src="{{route('index')}}/webassets/fitvids.js.download" id="boss-fitvids-js-js"></script>
    <script type="text/javascript" src="{{route('index')}}/webassets/slick.min.js(1).download" id="boss-slick-js-js"></script>
    <script type="text/javascript" src="{{route('index')}}/webassets/panelslider.min.js.download" id="boss-panelslider-js-js"></script>
    <script type="text/javascript" src="{{route('index')}}/webassets/sticky-kit.js.download" id="boss-sticky-js-js"></script>
    <script type="text/javascript" src="{{route('index')}}/webassets/jssocials.min.js.download" id="boss-jssocials-js-js"></script>
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
                "nonce_get_courses": "27766023a1"
                , "course_archive_url": "https:\/\/watad.me\/courses\/"
            }
        };
        /* ]]> */

    </script>
    <script type="text/javascript" src="{{route('index')}}/webassets/main.js(1).download" id="buddyboss-theme-main-js-js"></script>
    <script type="text/javascript" src="{{route('index')}}/webassets/validate.min.js.download" id="boss-validate-js-js"></script>
    <script type="text/javascript" src="{{route('index')}}/webassets/magnific-popup.js.download" id="bp-nouveau-magnific-popup-js"></script>
    <script type="text/javascript" src="{{route('index')}}/webassets/select2.full.min.js.download" id="select2-js-js"></script>
    <script type="text/javascript" src="{{route('index')}}/webassets/progressbar.min.js.download" id="progressbar-js-js"></script>
    <script type="text/javascript" src="{{route('index')}}/webassets/mousewheel.min.js.download" id="mousewheel-js-js"></script>
    <script type="text/javascript" id="buddyboss-theme-learndash-js-js-extra">
        /* <![CDATA[ */
        var BBTHEME_LEARNDASH_FRONT_VIDEO = {
            "hide_wrapper": "hide"
            , "video_progression_enabled": "off"
            , "video_type": ""
        };
        /* ]]> */

    </script>
    <script type="text/javascript" src="{{route('index')}}/webassets/learndash.min.js.download" id="buddyboss-theme-learndash-js-js"></script>
    <script type="text/javascript" src="{{route('index')}}/webassets/learndash-sidebar.min.js.download" id="buddyboss-theme-learndash-sidebar-js-js"></script>
    <script type="text/javascript" src="{{route('index')}}/webassets/bb-woocommerce.min.js.download" id="buddyboss-theme-woocommerce-js-js"></script>
    <script type="text/javascript" src="{{route('index')}}/webassets/elementor.min.js.download" id="buddyboss-theme-elementor-js-js"></script>
    <script type="text/javascript" src="{{route('index')}}/webassets/plugins.min.js.download" id="buddyboss-theme-plugins-js-js"></script>
    <script type="text/javascript" id="minerva-kb/js-js-extra">
        /* <![CDATA[ */
        var MinervaKB = {
            "ajaxUrl": "https:\/\/watad.me\/wp-admin\/admin-ajax.php"
            , "siteUrl": "https:\/\/watad.me"
            , "platform": "desktop"
            , "info": {
                "isSingle": false
                , "isPost": false
                , "isRTL": true
            }
            , "nonce": {
                "nonce": "c52ade8b29"
                , "nonceKey": "minerva_kb_ajax_nonce"
            }
            , "settings": {
                "show_like_message": false
                , "show_dislike_message": false
                , "enable_feedback": false
                , "single_template": "theme"
                , "feedback_mode": "dislike"
                , "feedback_email_on": false
                , "track_search_with_results": false
                , "ga_good_search_category": "Knowledge Base"
                , "ga_good_search_action": "Search success"
                , "ga_good_search_value": ""
                , "track_search_without_results": false
                , "ga_bad_search_category": "Knowledge Base"
                , "ga_bad_search_action": "Search fail"
                , "ga_bad_search_value": ""
                , "track_article_likes": false
                , "ga_like_category": "Knowledge Base"
                , "ga_like_action": "Article like"
                , "ga_like_label": "article_id"
                , "ga_like_value": ""
                , "track_article_dislikes": false
                , "ga_dislike_category": "Knowledge Base"
                , "ga_dislike_action": "Article dislike"
                , "ga_dislike_label": "article_id"
                , "ga_dislike_value": ""
                , "track_article_feedback": false
                , "ga_feedback_category": "Knowledge Base"
                , "ga_feedback_action": "Article feedback"
                , "ga_feedback_label": "article_id"
                , "ga_feedback_value": ""
                , "search_delay": "1000"
                , "live_search_show_excerpt": false
                , "active_search_groups": ["kb"]
                , "live_search_use_post": false
                , "show_back_to_top": true
                , "scrollspy_switch": false
                , "toc_in_content_disable": false
                , "article_fancybox": true
                , "article_sidebar": "left"
                , "article_sidebar_sticky": false
                , "article_sidebar_sticky_top": {
                    "unit": "em"
                    , "size": "3"
                }
                , "article_sidebar_sticky_min_width": {
                    "unit": "px"
                    , "size": "1025"
                }
                , "back_to_top_position": "inline"
                , "back_to_top_text": "\u0625\u0644\u0649 \u0627\u0644\u0623\u0639\u0644\u0649 "
                , "show_back_to_top_icon": true
                , "back_to_top_icon": "fa-long-arrow-up"
                , "back_to_site_top": false
                , "toc_scroll_offset": {
                    "unit": "px"
                    , "size": "0"
                }
                , "search_mode": "nonblocking"
                , "search_needle_length": "3"
                , "search_request_fe_cache": true
                , "live_search_disable_mobile": false
                , "live_search_disable_tablet": false
                , "live_search_disable_desktop": false
                , "faq_filter_open_single": false
                , "faq_slow_animation": false
                , "faq_toggle_mode": false
                , "faq_enable_pages": false
                , "content_tree_widget_open_active_branch": true
                , "toc_url_update": false
                , "faq_url_update": false
                , "faq_scroll_offset": {
                    "unit": "px"
                    , "size": "0"
                }
                , "toc_headings_exclude": ""
                , "antispam_failed_message": "Wrong security question answer, try again."
                , "submit_success_message": "Your content has been submitted, thank you!"
                , "submit_content_editor_skin": "snow"
                , "fh_show_delay": "3000"
                , "fh_display_mode": "auto"
                , "glossary_loader_icon": "fa-circle-o-notch"
                , "glossary_enable_pages": false
                , "glossary_scroll_offset": {
                    "unit": "px"
                    , "size": "0"
                }
                , "enable_posts_glossary_highlight": false
                , "blog_posts_glossary_highlight_selector": ".post.type-post"
            }
            , "i18n": {
                "no-results": "\u0644\u0627 \u0646\u062a\u0627\u0626\u062c "
                , "results": "\u0646\u062a\u0627\u0626\u062c "
                , "result": "\u0646\u062a\u064a\u062c\u0629 "
                , "questions": "\u0627\u0644\u0627\u0633\u0626\u0644\u0629 "
                , "question": "\u0633\u0624\u0627\u0644 "
                , "search_group_kb": "Knowledge Base"
                , "search_group_kb_topics": "Topics"
                , "search_group_faq": "FAQ"
                , "search_group_glossary": "Glossary"
                , "like_message_text": "<i class=\"fa fa-smile-o\"><\/i> Great!<br \/><strong>Thank you<\/strong> for your vote!"
                , "dislike_message_text": "Thank you for your vote!"
                , "feedback_label": "You can leave feedback:"
                , "feedback_email_label": "Your email (optional):"
                , "feedback_submit_label": "Send feedback"
                , "feedback_submit_request_label": "Sending..."
                , "feedback_info_text": "We will use your feedback to improve this article"
                , "feedback_sent_text": "Thank you for your feedback, we will do our best to fix this soon"
                , "submission_empty_title": "Title must not be empty"
                , "submission_empty_content": "Content must not be empty"
            }
            , "glossary": []
        };
        /* ]]> */

    </script>
    <script type="text/javascript" src="{{route('index')}}/webassets/minerva-kb.js.download" id="minerva-kb/js-js"></script>

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
    <script async="" src="{{route('index')}}/webassets/js"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-88044097-2');

    </script>