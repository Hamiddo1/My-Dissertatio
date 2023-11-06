<?php
// Assuming you have started the session
session_start();

require_once "data/connection.php"; // Include the database connection file


if (isset($_SESSION['username'])) {
    $sessionUsername = $_SESSION['username'];

    $query = "SELECT username, profileimage , amount FROM userslogin WHERE username = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $sessionUsername);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $fetchedUsername = $row['username'];
        $profileImage = $row['profileimage'];
		$amount = $row['amount'];

      
    }

    $stmt->close();
}


?>


<!doctype html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Password Awareness Hub</title>
    <meta name='robots' content='noindex, nofollow' />
    <link rel='dns-prefetch' href='//fonts.googleapis.com' />
    <link rel="alternate" type="application/rss+xml" title="WhizCyber &raquo; Feed" href="https://designingmedia.com/whizcyber/feed/" />
    <link rel="alternate" type="application/rss+xml" title="WhizCyber &raquo; Comments Feed" href="https://designingmedia.com/whizcyber/comments/feed/" />
    <script type="text/javascript">
        window._wpemojiSettings = {
            "baseUrl": "https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/72x72\/",
            "ext": ".png",
            "svgUrl": "https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/svg\/",
            "svgExt": ".svg",
            "source": {
                "concatemoji": "https:\/\/designingmedia.com\/whizcyber\/wp-includes\/js\/wp-emoji-release.min.js?ver=6.3.1"
            }
        };
        /*! This file is auto-generated */
        ! function(i, n) {
            var o, s, e;

            function c(e) {
                try {
                    var t = {
                        supportTests: e,
                        timestamp: (new Date).valueOf()
                    };
                    sessionStorage.setItem(o, JSON.stringify(t))
                } catch (e) {}
            }

            function p(e, t, n) {
                e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(t, 0, 0);
                var t = new Uint32Array(e.getImageData(0, 0, e.canvas.width, e.canvas.height).data),
                    r = (e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(n, 0, 0), new Uint32Array(e.getImageData(0, 0, e.canvas.width, e.canvas.height).data));
                return t.every(function(e, t) {
                    return e === r[t]
                })
            }

            function u(e, t, n) {
                switch (t) {
                    case "flag":
                        return n(e, "\ud83c\udff3\ufe0f\u200d\u26a7\ufe0f", "\ud83c\udff3\ufe0f\u200b\u26a7\ufe0f") ? !1 : !n(e, "\ud83c\uddfa\ud83c\uddf3", "\ud83c\uddfa\u200b\ud83c\uddf3") && !n(e, "\ud83c\udff4\udb40\udc67\udb40\udc62\udb40\udc65\udb40\udc6e\udb40\udc67\udb40\udc7f", "\ud83c\udff4\u200b\udb40\udc67\u200b\udb40\udc62\u200b\udb40\udc65\u200b\udb40\udc6e\u200b\udb40\udc67\u200b\udb40\udc7f");
                    case "emoji":
                        return !n(e, "\ud83e\udef1\ud83c\udffb\u200d\ud83e\udef2\ud83c\udfff", "\ud83e\udef1\ud83c\udffb\u200b\ud83e\udef2\ud83c\udfff")
                }
                return !1
            }

            function f(e, t, n) {
                var r = "undefined" != typeof WorkerGlobalScope && self instanceof WorkerGlobalScope ? new OffscreenCanvas(300, 150) : i.createElement("canvas"),
                    a = r.getContext("2d", {
                        willReadFrequently: !0
                    }),
                    o = (a.textBaseline = "top", a.font = "600 32px Arial", {});
                return e.forEach(function(e) {
                    o[e] = t(a, e, n)
                }), o
            }

            function t(e) {
                var t = i.createElement("script");
                t.src = e, t.defer = !0, i.head.appendChild(t)
            }
            "undefined" != typeof Promise && (o = "wpEmojiSettingsSupports", s = ["flag", "emoji"], n.supports = {
                everything: !0,
                everythingExceptFlag: !0
            }, e = new Promise(function(e) {
                i.addEventListener("DOMContentLoaded", e, {
                    once: !0
                })
            }), new Promise(function(t) {
                var n = function() {
                    try {
                        var e = JSON.parse(sessionStorage.getItem(o));
                        if ("object" == typeof e && "number" == typeof e.timestamp && (new Date).valueOf() < e.timestamp + 604800 && "object" == typeof e.supportTests) return e.supportTests
                    } catch (e) {}
                    return null
                }();
                if (!n) {
                    if ("undefined" != typeof Worker && "undefined" != typeof OffscreenCanvas && "undefined" != typeof URL && URL.createObjectURL && "undefined" != typeof Blob) try {
                        var e = "postMessage(" + f.toString() + "(" + [JSON.stringify(s), u.toString(), p.toString()].join(",") + "));",
                            r = new Blob([e], {
                                type: "text/javascript"
                            }),
                            a = new Worker(URL.createObjectURL(r), {
                                name: "wpTestEmojiSupports"
                            });
                        return void(a.onmessage = function(e) {
                            c(n = e.data), a.terminate(), t(n)
                        })
                    } catch (e) {}
                    c(n = f(s, u, p))
                }
                t(n)
            }).then(function(e) {
                for (var t in e) n.supports[t] = e[t], n.supports.everything = n.supports.everything && n.supports[t], "flag" !== t && (n.supports.everythingExceptFlag = n.supports.everythingExceptFlag && n.supports[t]);
                n.supports.everythingExceptFlag = n.supports.everythingExceptFlag && !n.supports.flag, n.DOMReady = !1, n.readyCallback = function() {
                    n.DOMReady = !0
                }
            }).then(function() {
                return e
            }).then(function() {
                var e;
                n.supports.everything || (n.readyCallback(), (e = n.source || {}).concatemoji ? t(e.concatemoji) : e.wpemoji && e.twemoji && (t(e.twemoji), t(e.wpemoji)))
            }))
        }((window, document), window._wpemojiSettings);
    </script>
    <style type="text/css">
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 0.07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    <link rel='stylesheet' id='wp-block-library-css' href='https://designingmedia.com/whizcyber/wp-includes/css/dist/block-library/style.min.css?ver=6.3.1' type='text/css' media='all' />
    <style id='safe-svg-svg-icon-style-inline-css' type='text/css'>
        .safe-svg-cover {
            text-align: center
        }

        .safe-svg-cover .safe-svg-inside {
            display: inline-block;
            max-width: 100%
        }

        .safe-svg-cover svg {
            height: 100%;
            max-height: 100%;
            max-width: 100%;
            width: 100%
        }
    </style>
    <link rel='stylesheet' id='wc-blocks-style-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/wc-blocks.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-active-filters-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/active-filters.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-add-to-cart-form-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/add-to-cart-form.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-packages-style-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/packages-style.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-all-products-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/all-products.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-all-reviews-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/all-reviews.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-attribute-filter-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/attribute-filter.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-breadcrumbs-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/breadcrumbs.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-catalog-sorting-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/catalog-sorting.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-customer-account-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/customer-account.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-featured-category-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/featured-category.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-featured-product-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/featured-product.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-mini-cart-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/mini-cart.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-price-filter-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/price-filter.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-product-add-to-cart-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/product-add-to-cart.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-product-button-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/product-button.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-product-categories-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/product-categories.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-product-image-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/product-image.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-product-image-gallery-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/product-image-gallery.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-product-query-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/product-query.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-product-results-count-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/product-results-count.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-product-reviews-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/product-reviews.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-product-sale-badge-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/product-sale-badge.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-product-search-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/product-search.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-product-sku-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/product-sku.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-product-stock-indicator-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/product-stock-indicator.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-product-summary-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/product-summary.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-product-title-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/product-title.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-rating-filter-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/rating-filter.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-reviews-by-category-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/reviews-by-category.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-reviews-by-product-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/reviews-by-product.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-product-details-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/product-details.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-single-product-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/single-product.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-stock-filter-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/stock-filter.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-cart-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/cart.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-checkout-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/checkout.css?ver=10.6.5' type='text/css' media='all' />
    <link rel='stylesheet' id='wc-blocks-style-mini-cart-contents-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/packages/woocommerce-blocks/build/mini-cart-contents.css?ver=10.6.5' type='text/css' media='all' />
    <style id='classic-theme-styles-inline-css' type='text/css'>
        /*! This file is auto-generated */

        .wp-block-button__link {
            color: #fff;
            background-color: #32373c;
            border-radius: 9999px;
            box-shadow: none;
            text-decoration: none;
            padding: calc(.667em + 2px) calc(1.333em + 2px);
            font-size: 1.125em
        }

        .wp-block-file__button {
            background: #32373c;
            color: #fff;
            text-decoration: none
        }

    </style>
    <style id='global-styles-inline-css' type='text/css'>
        body {
            --wp--preset--color--black: #000000;
            --wp--preset--color--cyan-bluish-gray: #abb8c3;
            --wp--preset--color--white: #ffffff;
            --wp--preset--color--pale-pink: #f78da7;
            --wp--preset--color--vivid-red: #cf2e2e;
            --wp--preset--color--luminous-vivid-orange: #ff6900;
            --wp--preset--color--luminous-vivid-amber: #fcb900;
            --wp--preset--color--light-green-cyan: #7bdcb5;
            --wp--preset--color--vivid-green-cyan: #00d084;
            --wp--preset--color--pale-cyan-blue: #8ed1fc;
            --wp--preset--color--vivid-cyan-blue: #0693e3;
            --wp--preset--color--vivid-purple: #9b51e0;
            --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
            --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
            --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
            --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
            --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
            --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
            --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
            --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
            --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
            --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
            --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
            --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
            --wp--preset--font-size--small: 13px;
            --wp--preset--font-size--medium: 20px;
            --wp--preset--font-size--large: 36px;
            --wp--preset--font-size--x-large: 42px;
            --wp--preset--spacing--20: 0.44rem;
            --wp--preset--spacing--30: 0.67rem;
            --wp--preset--spacing--40: 1rem;
            --wp--preset--spacing--50: 1.5rem;
            --wp--preset--spacing--60: 2.25rem;
            --wp--preset--spacing--70: 3.38rem;
            --wp--preset--spacing--80: 5.06rem;
            --wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
            --wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);
            --wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);
            --wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1), 6px 6px rgba(0, 0, 0, 1);
            --wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);
        }

        :where(.is-layout-flex) {
            gap: 0.5em;
        }

        :where(.is-layout-grid) {
            gap: 0.5em;
        }

        body .is-layout-flow>.alignleft {
            float: left;
            margin-inline-start: 0;
            margin-inline-end: 2em;
        }

        body .is-layout-flow>.alignright {
            float: right;
            margin-inline-start: 2em;
            margin-inline-end: 0;
        }

        body .is-layout-flow>.aligncenter {
            margin-left: auto !important;
            margin-right: auto !important;
        }

        body .is-layout-constrained>.alignleft {
            float: left;
            margin-inline-start: 0;
            margin-inline-end: 2em;
        }

        body .is-layout-constrained>.alignright {
            float: right;
            margin-inline-start: 2em;
            margin-inline-end: 0;
        }

        body .is-layout-constrained>.aligncenter {
            margin-left: auto !important;
            margin-right: auto !important;
        }

        body .is-layout-constrained> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            max-width: var(--wp--style--global--content-size);
            margin-left: auto !important;
            margin-right: auto !important;
        }

        body .is-layout-constrained>.alignwide {
            max-width: var(--wp--style--global--wide-size);
        }

        body .is-layout-flex {
            display: flex;
        }

        body .is-layout-flex {
            flex-wrap: wrap;
            align-items: center;
        }

        body .is-layout-flex>* {
            margin: 0;
        }

        body .is-layout-grid {
            display: grid;
        }

        body .is-layout-grid>* {
            margin: 0;
        }

        :where(.wp-block-columns.is-layout-flex) {
            gap: 2em;
        }

        :where(.wp-block-columns.is-layout-grid) {
            gap: 2em;
        }

        :where(.wp-block-post-template.is-layout-flex) {
            gap: 1.25em;
        }

        :where(.wp-block-post-template.is-layout-grid) {
            gap: 1.25em;
        }

        .has-black-color {
            color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-color {
            color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-color {
            color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-color {
            color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-color {
            color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-color {
            color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-color {
            color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-color {
            color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-color {
            color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-color {
            color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-color {
            color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-color {
            color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-background-color {
            background-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-background-color {
            background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-background-color {
            background-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-background-color {
            background-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-background-color {
            background-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-background-color {
            background-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-background-color {
            background-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-background-color {
            background-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-background-color {
            background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-background-color {
            background-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-border-color {
            border-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-border-color {
            border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-border-color {
            border-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-border-color {
            border-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-border-color {
            border-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-border-color {
            border-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-border-color {
            border-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-border-color {
            border-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-border-color {
            border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-border-color {
            border-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
            background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
        }

        .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
            background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
        }

        .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-orange-to-vivid-red-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
        }

        .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
            background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
        }

        .has-cool-to-warm-spectrum-gradient-background {
            background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
        }

        .has-blush-light-purple-gradient-background {
            background: var(--wp--preset--gradient--blush-light-purple) !important;
        }

        .has-blush-bordeaux-gradient-background {
            background: var(--wp--preset--gradient--blush-bordeaux) !important;
        }

        .has-luminous-dusk-gradient-background {
            background: var(--wp--preset--gradient--luminous-dusk) !important;
        }

        .has-pale-ocean-gradient-background {
            background: var(--wp--preset--gradient--pale-ocean) !important;
        }

        .has-electric-grass-gradient-background {
            background: var(--wp--preset--gradient--electric-grass) !important;
        }

        .has-midnight-gradient-background {
            background: var(--wp--preset--gradient--midnight) !important;
        }

        .has-small-font-size {
            font-size: var(--wp--preset--font-size--small) !important;
        }

        .has-medium-font-size {
            font-size: var(--wp--preset--font-size--medium) !important;
        }

        .has-large-font-size {
            font-size: var(--wp--preset--font-size--large) !important;
        }

        .has-x-large-font-size {
            font-size: var(--wp--preset--font-size--x-large) !important;
        }

        .wp-block-navigation a:where(:not(.wp-element-button)) {
            color: inherit;
        }

        :where(.wp-block-post-template.is-layout-flex) {
            gap: 1.25em;
        }

        :where(.wp-block-post-template.is-layout-grid) {
            gap: 1.25em;
        }

        :where(.wp-block-columns.is-layout-flex) {
            gap: 2em;
        }

        :where(.wp-block-columns.is-layout-grid) {
            gap: 2em;
        }

        .wp-block-pullquote {
            font-size: 1.5em;
            line-height: 1.6;
        }
    </style>
    <link rel='stylesheet' id='contact-form-7-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=5.8' type='text/css' media='all' />
    <link rel='stylesheet' id='woocommerce-layout-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/assets/css/woocommerce-layout.css?ver=8.0.2' type='text/css' media='all' />
    <link rel='stylesheet' id='woocommerce-smallscreen-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/assets/css/woocommerce-smallscreen.css?ver=8.0.2' type='text/css' media='only screen and (max-width: 768px)' />
    <link rel='stylesheet' id='woocommerce-general-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/assets/css/woocommerce.css?ver=8.0.2' type='text/css' media='all' />
    <style id='woocommerce-inline-inline-css' type='text/css'>
        .woocommerce form .form-row .required {
            visibility: visible;
        }
    </style>
    <link rel='stylesheet' id='whizcyber-font-css' href='//fonts.googleapis.com/css?family=Raleway%3A300%2C400%2C500%2C600%7CRaleway%3A600%2C700%26display%3Dswap&#038;ver=1696774212' type='text/css' media='all' />
    <link rel='stylesheet' id='animate-css' href='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/css/animate.css?ver=1696774212' type='text/css' media='all' />
    <link rel='stylesheet' id='bootstrap-css' href='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/css/bootstrap.min.css?ver=1696774212' type='text/css' media='all' />
    <link rel='stylesheet' id='font-awesome-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/elementor/assets/lib/font-awesome/css/font-awesome.min.css?ver=4.7.0' type='text/css' media='all' />
    <link rel='stylesheet' id='jquery-ui-css' href='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/css/jquery-ui.min.css?ver=1696774212' type='text/css' media='all' />
    <link rel='stylesheet' id='flaticon-css' href='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/css/flaticon.css?ver=1696774212' type='text/css' media='all' />
    <link rel='stylesheet' id='magnific-popup-css' href='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/css/magnific-popup.css?ver=1696774212' type='text/css' media='all' />
    <link rel='stylesheet' id='nice-select-css' href='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/css/nice-select.css?ver=1696774212' type='text/css' media='all' />
    <link rel='stylesheet' id='slick-css' href='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/css/slick.css?ver=1696774212' type='text/css' media='all' />
    <link rel='stylesheet' id='whizcyber-style-css' href='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/style.css?ver=6.3.1' type='text/css' media='all' />
    <link rel='stylesheet' id='load-fa-pro-css' href='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/fonts/fontawesome-pro-v5.css?ver=6.3.1' type='text/css' media='all' />
    <link rel='stylesheet' id='load-fa-css' href='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/fonts/fontawesome-v6.css?ver=6.3.1' type='text/css' media='all' />
    <link rel='stylesheet' id='roboto-font-css' href='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/fonts/roboto.css?ver=6.3.1' type='text/css' media='all' />
    <link rel='stylesheet' id='whizcyber-owl-carousel-css' href='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/css/owl.carousel.min.css?ver=6.3.1' type='text/css' media='all' />
    <link rel='stylesheet' id='whizcyber-style-css-css' href='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/css/whizcyber.css?ver=6.3.1' type='text/css' media='all' />
    <link rel='stylesheet' id='whizcyber-responsive-css-css' href='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/css/whizcyber-responsive.css?ver=6.3.1' type='text/css' media='all' />
    <link rel='stylesheet' id='header-style-css' href='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/css/style.css?ver=1696774212' type='text/css' media='all' />
    <link rel='stylesheet' id='responsive-css' href='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/css/responsive.css?ver=1696774212' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-icons-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.min.css?ver=5.21.0' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-frontend-css' href='https://designingmedia.com/whizcyber/wp-content/uploads/elementor/css/custom-frontend-lite.min.css?ver=1693228030' type='text/css' media='all' />
    <link rel='stylesheet' id='swiper-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/elementor/assets/lib/swiper/v8/css/swiper.min.css?ver=8.4.5' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-post-7-css' href='https://designingmedia.com/whizcyber/wp-content/uploads/elementor/css/post-7.css?ver=1693228030' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-global-css' href='https://designingmedia.com/whizcyber/wp-content/uploads/elementor/css/global.css?ver=1693228030' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-post-4983-css' href='https://designingmedia.com/whizcyber/wp-content/uploads/elementor/css/post-4983.css?ver=1693228042' type='text/css' media='all' />
    <link rel='stylesheet' id='blog-post-css-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/akd-essentials/widgets//assets/blog.css?ver=6.3.1' type='text/css' media='all' />
    <link rel='stylesheet' id='google-fonts-1-css' href='https://fonts.googleapis.com/css?family=Titillium+Web%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&#038;display=swap&#038;ver=6.3.1'
        type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-icons-shared-0-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/elementor/assets/lib/font-awesome/css/fontawesome.min.css?ver=5.15.3' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-icons-fa-brands-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/elementor/assets/lib/font-awesome/css/brands.min.css?ver=5.15.3' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-icons-fa-solid-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/elementor/assets/lib/font-awesome/css/solid.min.css?ver=5.15.3' type='text/css' media='all' />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-includes/js/jquery/jquery.min.js?ver=3.7.0' id='jquery-core-js'></script>
    <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.4.1' id='jquery-migrate-js'></script>
    <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-content/plugins/akd-essentials/myscript.js?ver=6.3.1' id='my_custom_script-js'></script>
    <link rel="https://api.w.org/" href="https://designingmedia.com/whizcyber/wp-json/" />
    <link rel="alternate" type="application/json" href="https://designingmedia.com/whizcyber/wp-json/wp/v2/pages/4983" />
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://designingmedia.com/whizcyber/xmlrpc.php?rsd" />
    <meta name="generator" content="WordPress 6.3.1" />
    <meta name="generator" content="WooCommerce 8.0.2" />
    <link rel="canonical" href="https://designingmedia.com/whizcyber/" />
    <link rel='shortlink' href='https://designingmedia.com/whizcyber/' />
    <link rel="alternate" type="application/json+oembed" href="https://designingmedia.com/whizcyber/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fdesigningmedia.com%2Fwhizcyber%2F" />
    <link rel="alternate" type="text/xml+oembed" href="https://designingmedia.com/whizcyber/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fdesigningmedia.com%2Fwhizcyber%2F&#038;format=xml" />
    <noscript><style>.woocommerce-product-gallery{ opacity: 1 !important; }</style></noscript>
    <meta name="generator" content="Elementor 3.15.3; features: e_dom_optimization, e_optimized_assets_loading, e_optimized_css_loading, additional_custom_breakpoints; settings: css_print_method-external, google_font-enabled, font_display-swap">
    <link rel="icon" href="https://designingmedia.com/whizcyber/wp-content/uploads/2023/07/favicon-1.jpg" sizes="32x32" />
    <link rel="icon" href="https://designingmedia.com/whizcyber/wp-content/uploads/2023/07/favicon-1.jpg" sizes="192x192" />
    <link rel="apple-touch-icon" href="https://designingmedia.com/whizcyber/wp-content/uploads/2023/07/favicon-1.jpg" />
    <meta name="msapplication-TileImage" content="https://designingmedia.com/whizcyber/wp-content/uploads/2023/07/favicon-1.jpg" />
</head>

<body class="home page-template page-template-elementor_header_footer page page-id-4983 wp-custom-logo theme-Whizcyber woocommerce-no-js elementor-default elementor-template-full-width elementor-kit-7 elementor-page elementor-page-4983">
    <style>
        /* Preloader Styles */
        .preloader {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(1, 14, 37, 0.951);
            width: 100%;
            height: 100vh;
            position: fixed;
            inset: 0;
            z-index: 99999999999;
        }
        
        .preloader .thumb {
            width: 180px;
            height: 180px;
        }
        
        .preloader .thumb img {
            width: 100%;
            height: 100%;
            -o-object-fit: contain;
            object-fit: contain;
            animation: durat 9s linear infinite;
        }
        
        @keyframes durat {
            0% {
                transform: rotate(360deg);
            }
        }
    </style>

    <div class="preloader">
        <div class="">
            <img src="logo.png" alt="preloader">
        </div>
    </div>
    <script>
        // JavaScript to hide the preloader when the page is fully loaded
        window.addEventListener('load', function () {
            var preloader = document.querySelector('.preloader');
            preloader.style.display = 'none';
        });
    </script>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary">Skip to content</a>

        <!-- navbar start -->
        <div class="navbar-area navbar-area-2 style-2 extra-margin-top">

            <div class="body-overlay" id="body-overlay"></div>
            <div class="search-popup" id="search-popup">
                <form role="search" method="get" class="search-form" action="https://designingmedia.com/whizcyber/">
                    <input type="text" class="search-field" placeholder="Search here..." value="" name="s" required>
                    <button type="submit" class="search-submit">
        <i class="fa fa-search"></i>
    </button>
                </form>
            </div>

            <!-- navbar start -->
            <div class="navbar-area navbar-area-2 style-2 extra-margin-top">
                <nav class="navbar navbar-area navbar-expand-lg nav-transparent">
                    <div class="container nav-container nav-white">
                        <div class="responsive-mobile-menu">
                            <div class="logo">
                                <a href="index.html" class="custom-logo-link" rel="home" aria-current="page"><img width="184" height="50" src="logo.png" class="custom-logo" alt="WhizCyber" decoding="async" /></a>                                </div>
                        </div>
                        
                    </div>
                </nav>
            </div>


            <div id="content" class="site-content">
                <div class="breadcrumb-area breadcrumb-bg only-front-page breadcrumb-spacing style-1">
                </div>
                <div data-elementor-type="wp-page" data-elementor-id="4983" class="elementor elementor-4983">
                    <section class="elementor-section elementor-top-section elementor-element elementor-element-a3cf2eb elementor-section-full_width elementor-section-stretched elementor-section-height-default elementor-section-height-default" data-id="a3cf2eb" data-element_type="section"
                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;navigation&quot;:&quot;both&quot;}">
                        <div class="elementor-container elementor-column-gap-no">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-8d523e5" data-id="8d523e5" data-element_type="column" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-2094641 elementor-widget__width-auto elementor-absolute elementor-hidden-tablet elementor-hidden-mobile elementor-hidden-laptop elementor-invisible elementor-widget elementor-widget-image" data-id="2094641"
                                        data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;_animation&quot;:&quot;bounceIn&quot;,&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="image.default">
                                        <div class="elementor-widget-container">
                                            <style>
                                                /*! elementor - v3.15.0 - 20-08-2023 */

                                                .elementor-widget-image {
                                                    text-align: center
                                                }

                                                .elementor-widget-image a {
                                                    display: inline-block
                                                }

                                                .elementor-widget-image a img[src$=".svg"] {
                                                    width: 48px
                                                }

                                                .elementor-widget-image img {
                                                    vertical-align: middle;
                                                    display: inline-block
                                                }
                                            </style> <img decoding="async" fetchpriority="high" width="227" height="273" src="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/left-circle-hero-1.png" class="attachment-full size-full wp-image-174"
                                                alt="" /> </div>
                                    </div>
                                    <div class="elementor-element elementor-element-d22531d elementor-widget__width-auto elementor-absolute elementor-widget elementor-widget-image" data-id="d22531d" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;navigation&quot;:&quot;both&quot;}"
                                        data-widget_type="image.default">
                                        <div class="elementor-widget-container">
                                            <img decoding="async" width="1307" height="792" src="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/dots-vector-background-1.png" class="attachment-full size-full wp-image-446" alt="" srcset="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/dots-vector-background-1.png 1307w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/dots-vector-background-1-600x364.png 600w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/dots-vector-background-1-300x182.png 300w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/dots-vector-background-1-1024x621.png 1024w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/dots-vector-background-1-768x465.png 768w"
                                                sizes="(max-width: 1307px) 100vw, 1307px" /> </div>
                                    </div>
                                    <section class="elementor-section elementor-inner-section elementor-element elementor-element-3838dd2 elementor-section-height-min-height elementor-section-full_width elementor-section-content-middle elementor-reverse-mobile elementor-section-height-default"
                                        data-id="3838dd2" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;navigation&quot;:&quot;both&quot;}">
                                        <div class="elementor-container elementor-column-gap-no">
                                            <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-85a6473 elementor-hidden-tablet elementor-hidden-mobile" data-id="85a6473" data-element_type="column" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-a559103 elementor-grid-1 elementor-widget__width-auto elementor-shape-rounded e-grid-align-center elementor-invisible elementor-widget elementor-widget-social-icons" data-id="a559103" data-element_type="widget"
                                                        data-settings="{&quot;_animation&quot;:&quot;slideInLeft&quot;,&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="social-icons.default">
                                                        <div class="elementor-widget-container">
                                                            <style>
                                                                /*! elementor - v3.15.0 - 20-08-2023 */

                                                                .elementor-widget-social-icons.elementor-grid-0 .elementor-widget-container,
                                                                .elementor-widget-social-icons.elementor-grid-mobile-0 .elementor-widget-container,
                                                                .elementor-widget-social-icons.elementor-grid-tablet-0 .elementor-widget-container {
                                                                    line-height: 1;
                                                                    font-size: 0
                                                                }

                                                                .elementor-widget-social-icons:not(.elementor-grid-0):not(.elementor-grid-tablet-0):not(.elementor-grid-mobile-0) .elementor-grid {
                                                                    display: inline-grid
                                                                }

                                                                .elementor-widget-social-icons .elementor-grid {
                                                                    grid-column-gap: var(--grid-column-gap, 5px);
                                                                    grid-row-gap: var(--grid-row-gap, 5px);
                                                                    grid-template-columns: var(--grid-template-columns);
                                                                    justify-content: var(--justify-content, center);
                                                                    justify-items: var(--justify-content, center)
                                                                }

                                                                .elementor-icon.elementor-social-icon {
                                                                    font-size: var(--icon-size, 25px);
                                                                    line-height: var(--icon-size, 25px);
                                                                    width: calc(var(--icon-size, 25px) + (2 * var(--icon-padding, .5em)));
                                                                    height: calc(var(--icon-size, 25px) + (2 * var(--icon-padding, .5em)))
                                                                }

                                                                .elementor-social-icon {
                                                                    --e-social-icon-icon-color: #fff;
                                                                    display: inline-flex;
                                                                    background-color: #69727d;
                                                                    align-items: center;
                                                                    justify-content: center;
                                                                    text-align: center;
                                                                    cursor: pointer
                                                                }

                                                                .elementor-social-icon i {
                                                                    color: var(--e-social-icon-icon-color)
                                                                }

                                                                .elementor-social-icon svg {
                                                                    fill: var(--e-social-icon-icon-color)
                                                                }

                                                                .elementor-social-icon:last-child {
                                                                    margin: 0
                                                                }

                                                                .elementor-social-icon:hover {
                                                                    opacity: .9;
                                                                    color: #fff
                                                                }

                                                                .elementor-social-icon-android {
                                                                    background-color: #a4c639
                                                                }

                                                                .elementor-social-icon-apple {
                                                                    background-color: #999
                                                                }

                                                                .elementor-social-icon-behance {
                                                                    background-color: #1769ff
                                                                }

                                                                .elementor-social-icon-bitbucket {
                                                                    background-color: #205081
                                                                }

                                                                .elementor-social-icon-codepen {
                                                                    background-color: #000
                                                                }

                                                                .elementor-social-icon-delicious {
                                                                    background-color: #39f
                                                                }

                                                                .elementor-social-icon-deviantart {
                                                                    background-color: #05cc47
                                                                }

                                                                .elementor-social-icon-digg {
                                                                    background-color: #005be2
                                                                }

                                                                .elementor-social-icon-dribbble {
                                                                    background-color: #ea4c89
                                                                }

                                                                .elementor-social-icon-elementor {
                                                                    background-color: #d30c5c
                                                                }

                                                                .elementor-social-icon-envelope {
                                                                    background-color: #ea4335
                                                                }

                                                                .elementor-social-icon-facebook,
                                                                .elementor-social-icon-facebook-f {
                                                                    background-color: #3b5998
                                                                }

                                                                .elementor-social-icon-flickr {
                                                                    background-color: #0063dc
                                                                }

                                                                .elementor-social-icon-foursquare {
                                                                    background-color: #2d5be3
                                                                }

                                                                .elementor-social-icon-free-code-camp,
                                                                .elementor-social-icon-freecodecamp {
                                                                    background-color: #006400
                                                                }

                                                                .elementor-social-icon-github {
                                                                    background-color: #333
                                                                }

                                                                .elementor-social-icon-gitlab {
                                                                    background-color: #e24329
                                                                }

                                                                .elementor-social-icon-globe {
                                                                    background-color: #69727d
                                                                }

                                                                .elementor-social-icon-google-plus,
                                                                .elementor-social-icon-google-plus-g {
                                                                    background-color: #dd4b39
                                                                }

                                                                .elementor-social-icon-houzz {
                                                                    background-color: #7ac142
                                                                }

                                                                .elementor-social-icon-instagram {
                                                                    background-color: #262626
                                                                }

                                                                .elementor-social-icon-jsfiddle {
                                                                    background-color: #487aa2
                                                                }

                                                                .elementor-social-icon-link {
                                                                    background-color: #818a91
                                                                }

                                                                .elementor-social-icon-linkedin,
                                                                .elementor-social-icon-linkedin-in {
                                                                    background-color: #0077b5
                                                                }

                                                                .elementor-social-icon-medium {
                                                                    background-color: #00ab6b
                                                                }

                                                                .elementor-social-icon-meetup {
                                                                    background-color: #ec1c40
                                                                }

                                                                .elementor-social-icon-mixcloud {
                                                                    background-color: #273a4b
                                                                }

                                                                .elementor-social-icon-odnoklassniki {
                                                                    background-color: #f4731c
                                                                }

                                                                .elementor-social-icon-pinterest {
                                                                    background-color: #bd081c
                                                                }

                                                                .elementor-social-icon-product-hunt {
                                                                    background-color: #da552f
                                                                }

                                                                .elementor-social-icon-reddit {
                                                                    background-color: #ff4500
                                                                }

                                                                .elementor-social-icon-rss {
                                                                    background-color: #f26522
                                                                }

                                                                .elementor-social-icon-shopping-cart {
                                                                    background-color: #4caf50
                                                                }

                                                                .elementor-social-icon-skype {
                                                                    background-color: #00aff0
                                                                }

                                                                .elementor-social-icon-slideshare {
                                                                    background-color: #0077b5
                                                                }

                                                                .elementor-social-icon-snapchat {
                                                                    background-color: #fffc00
                                                                }

                                                                .elementor-social-icon-soundcloud {
                                                                    background-color: #f80
                                                                }

                                                                .elementor-social-icon-spotify {
                                                                    background-color: #2ebd59
                                                                }

                                                                .elementor-social-icon-stack-overflow {
                                                                    background-color: #fe7a15
                                                                }

                                                                .elementor-social-icon-steam {
                                                                    background-color: #00adee
                                                                }

                                                                .elementor-social-icon-stumbleupon {
                                                                    background-color: #eb4924
                                                                }

                                                                .elementor-social-icon-telegram {
                                                                    background-color: #2ca5e0
                                                                }

                                                                .elementor-social-icon-thumb-tack {
                                                                    background-color: #1aa1d8
                                                                }

                                                                .elementor-social-icon-tripadvisor {
                                                                    background-color: #589442
                                                                }

                                                                .elementor-social-icon-tumblr {
                                                                    background-color: #35465c
                                                                }

                                                                .elementor-social-icon-twitch {
                                                                    background-color: #6441a5
                                                                }

                                                                .elementor-social-icon-twitter {
                                                                    background-color: #1da1f2
                                                                }

                                                                .elementor-social-icon-viber {
                                                                    background-color: #665cac
                                                                }

                                                                .elementor-social-icon-vimeo {
                                                                    background-color: #1ab7ea
                                                                }

                                                                .elementor-social-icon-vk {
                                                                    background-color: #45668e
                                                                }

                                                                .elementor-social-icon-weibo {
                                                                    background-color: #dd2430
                                                                }

                                                                .elementor-social-icon-weixin {
                                                                    background-color: #31a918
                                                                }

                                                                .elementor-social-icon-whatsapp {
                                                                    background-color: #25d366
                                                                }

                                                                .elementor-social-icon-wordpress {
                                                                    background-color: #21759b
                                                                }

                                                                .elementor-social-icon-xing {
                                                                    background-color: #026466
                                                                }

                                                                .elementor-social-icon-yelp {
                                                                    background-color: #af0606
                                                                }

                                                                .elementor-social-icon-youtube {
                                                                    background-color: #cd201f
                                                                }

                                                                .elementor-social-icon-500px {
                                                                    background-color: #0099e5
                                                                }

                                                                .elementor-shape-rounded .elementor-icon.elementor-social-icon {
                                                                    border-radius: 10%
                                                                }

                                                                .elementor-shape-circle .elementor-icon.elementor-social-icon {
                                                                    border-radius: 50%
                                                                }
                                                            </style>
                                                            <div class="elementor-social-icons-wrapper elementor-grid">
                                                                <span class="elementor-grid-item">
					<a class="elementor-icon elementor-social-icon elementor-social-icon-facebook-f elementor-animation-grow elementor-repeater-item-5aff44b" href="#" target="_blank">
						<span class="elementor-screen-only">Facebook-f</span>
                                                                <i class="fab fa-facebook-f"></i> </a>
                                                                </span>
                                                                <span class="elementor-grid-item">
					<a class="elementor-icon elementor-social-icon elementor-social-icon-twitter elementor-animation-grow elementor-repeater-item-6e12330" href="#" target="_blank">
						<span class="elementor-screen-only">Twitter</span>
                                                                <i class="fab fa-twitter"></i> </a>
                                                                </span>
                                                                <span class="elementor-grid-item">
					<a class="elementor-icon elementor-social-icon elementor-social-icon-instagram elementor-animation-grow elementor-repeater-item-1c34585" href="#" target="_blank">
						<span class="elementor-screen-only">Instagram</span>
                                                                <i class="fab fa-instagram"></i> </a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-6d45949" data-id="6d45949" data-element_type="column" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-a11bbad elementor-widget elementor-widget-heading" data-id="a11bbad" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="heading.default">
                                                        <div class="elementor-widget-container">
                                                            <style>
                                                                /*! elementor - v3.15.0 - 20-08-2023 */

                                                                .elementor-heading-title {
                                                                    padding: 0;
                                                                    margin: 0;
                                                                    line-height: 1
                                                                }

                                                                .elementor-widget-heading .elementor-heading-title[class*=elementor-size-]>a {
                                                                    color: inherit;
                                                                    font-size: inherit;
                                                                    line-height: inherit
                                                                }

                                                                .elementor-widget-heading .elementor-heading-title.elementor-size-small {
                                                                    font-size: 15px
                                                                }

                                                                .elementor-widget-heading .elementor-heading-title.elementor-size-medium {
                                                                    font-size: 19px
                                                                }

                                                                .elementor-widget-heading .elementor-heading-title.elementor-size-large {
                                                                    font-size: 29px
                                                                }

                                                                .elementor-widget-heading .elementor-heading-title.elementor-size-xl {
                                                                    font-size: 39px
                                                                }

                                                                .elementor-widget-heading .elementor-heading-title.elementor-size-xxl {
                                                                    font-size: 59px
                                                                }
                                                            </style>
                                                            <h1 class="elementor-heading-title elementor-size-default">Empowering Secure Mobile Banking!
                                                            </h1>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-50aee53 elementor-widget elementor-widget-text-editor" data-id="50aee53" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="text-editor.default">
                                                        <div class="elementor-widget-container">
                                                            <style>
                                                                /*! elementor - v3.15.0 - 20-08-2023 */

                                                                .elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap {
                                                                    background-color: #69727d;
                                                                    color: #fff
                                                                }

                                                                .elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap {
                                                                    color: #69727d;
                                                                    border: 3px solid;
                                                                    background-color: transparent
                                                                }

                                                                .elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap {
                                                                    margin-top: 8px
                                                                }

                                                                .elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap-letter {
                                                                    width: 1em;
                                                                    height: 1em
                                                                }

                                                                .elementor-widget-text-editor .elementor-drop-cap {
                                                                    float: left;
                                                                    text-align: center;
                                                                    line-height: 1;
                                                                    font-size: 50px
                                                                }

                                                                .elementor-widget-text-editor .elementor-drop-cap-letter {
                                                                    display: inline-block
                                                                }
                                                            </style> Dedicated to empowering you with the knowledge and tools needed to safeguard yourself online </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-176ec5c elementor-widget__width-auto elementor-widget elementor-widget-button" data-id="176ec5c" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="button.default">
                                                        <div class="elementor-widget-container">
                                                            <div class="elementor-button-wrapper">
                                                                <a class="elementor-button elementor-button-link elementor-size-sm elementor-animation-float" href="https://client.passwordawarenesshub.com/register">
						<span class="elementor-button-content-wrapper">
						<span class="elementor-button-text">Our Webtools</span>
		</span>
					</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-6dc5905 elementor-widget__width-auto elementor-widget elementor-widget-button" data-id="6dc5905" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="button.default">
                                                        <div class="elementor-widget-container">
                                                            <div class="elementor-button-wrapper">
                                                                <a class="elementor-button elementor-button-link elementor-size-sm elementor-animation-float" href="quiz.html">
						<span class="elementor-button-content-wrapper">
						<span class="elementor-button-text">Test Your Cybersecurity IQ</span>
		</span>
					</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-2dd95ea" data-id="2dd95ea" data-element_type="column" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-b6c4dfe elementor-widget__width-auto elementor-invisible elementor-widget elementor-widget-image" data-id="b6c4dfe" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slideInRight&quot;,&quot;navigation&quot;:&quot;both&quot;}"
                                                        data-widget_type="image.default">
                                                        <div class="elementor-widget-container">
                                                            <img decoding="async" width="601" height="668" src="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/right-image-hero-1.png" class="attachment-full size-full wp-image-217" alt="" srcset="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/right-image-hero-1.png 601w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/right-image-hero-1-270x300.png 270w"
                                                                sizes="(max-width: 601px) 100vw, 601px" /> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </section>
                    
                    <section class="elementor-section elementor-top-section elementor-element elementor-element-d721444 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="d721444" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;navigation&quot;:&quot;both&quot;}">
                        <div class="elementor-container elementor-column-gap-no">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-45132e4" data-id="45132e4" data-element_type="column" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-a9adcb3 elementor-widget__width-auto elementor-absolute elementor-hidden-tablet elementor-hidden-mobile elementor-invisible elementor-widget elementor-widget-image" data-id="a9adcb3" data-element_type="widget"
                                        data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;_animation&quot;:&quot;bounceIn&quot;,&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="image.default">
                                        <div class="elementor-widget-container">
                                            <img decoding="async" loading="lazy" width="351" height="272" src="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/right-circle-1.png" class="attachment-full size-full wp-image-714" alt="" srcset="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/right-circle-1.png 351w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/right-circle-1-300x232.png 300w"
                                                sizes="(max-width: 351px) 100vw, 351px" /> </div>
                                    </div>
                                    <div class="elementor-element elementor-element-f8c1e64 elementor-widget__width-auto elementor-absolute elementor-widget elementor-widget-image" data-id="f8c1e64" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;navigation&quot;:&quot;both&quot;}"
                                        data-widget_type="image.default">
                                        <div class="elementor-widget-container">
                                            <img decoding="async" loading="lazy" width="956" height="825" src="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/about-dot-vector-1.png" class="attachment-full size-full wp-image-883" alt="" srcset="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/about-dot-vector-1.png 956w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/about-dot-vector-1-600x518.png 600w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/about-dot-vector-1-300x259.png 300w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/about-dot-vector-1-768x663.png 768w"
                                                sizes="(max-width: 956px) 100vw, 956px" /> </div>
                                    </div>
                                    <section class="elementor-section elementor-inner-section elementor-element elementor-element-48b5bff elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="48b5bff" data-element_type="section"
                                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;navigation&quot;:&quot;both&quot;}">
                                        <div style="text-align: center;">
                                            <img src="gif.gif" alt="Image Description" style="border-radius: 2%; max-width: 400px;">
                                        </div>
                                        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-30f5f10" data-id="30f5f10" data-element_type="column" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-a8064ec elementor-widget elementor-widget-heading" data-id="a8064ec" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="heading.default">
                                                        <div class="elementor-widget-container">
                                                            <h6 class="elementor-heading-title elementor-size-default"></h6>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-ea647e3 elementor-widget elementor-widget-heading" data-id="ea647e3" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="heading.default">
                                                        <div class="elementor-widget-container">
                                                            <h2 class="elementor-heading-title elementor-size-default"></h2>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-966c814 elementor-widget elementor-widget-text-editor" data-id="966c814" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="text-editor.default">
                                                        <div class="elementor-widget-container">
                                                            Navigating the digital world can be challenging, with online risks at every turn. Let us become your ally, providing essential tools to help you stay safe online. Explore a range of security solutions and gain the confidence to protect your digital presence. </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-dbcb0f6 elementor-align-left elementor-widget__width-auto elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="dbcb0f6" data-element_type="widget"
                                                        data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="icon-list.default">
                                                        <div class="elementor-widget-container">
                                                            <link rel="stylesheet" href="https://designingmedia.com/whizcyber/wp-content/uploads/elementor/css/custom-widget-icon-list.min.css?ver=1693228042">
                                                            <ul class="">
                                                                <li class="">
                                                                    <span class="">
							<i aria-hidden="true" class=""></i>						</span>
                                                                    <span class="">Password generator</span>
                                                                </li>
                                                                <li class="">
                                                                    <span class="">
							<i aria-hidden="true" class=""></i>						</span>
                                                                    <span class="">Password strength checker</span>
                                                                </li>
                                                                <li class="">
                                                                    <span class="">
							<i aria-hidden="true" class=""></i>						</span>
                                                                    <span class="">IP Lookup</span>
                                                                </li>
                                                                <li class="">
                                                                    <span class="">
							<i aria-hidden="true" class=""></i>						</span>
                                                                    <span class="">Whois Lookup</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-54a241d elementor-align-left elementor-widget__width-auto elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="54a241d" data-element_type="widget"
                                                        data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="icon-list.default">
                                                        <div class="elementor-widget-container">
                                                            <ul class="">
                                                                <li class="">
                                                                    <span class="">
							<i aria-hidden="true" class=""></i>						</span>
                                                                    <span class="">DNS Lookup</span>
                                                                </li>
                                                                <li class="">
                                                                    <span class="">
							<i aria-hidden="true" class=""></i>						</span>
                                                                    <span class="">SSL Lookup</span>
                                                                </li>
                                                                <li class="">
                                                                    <span class="">
							<i aria-hidden="true" class=""></i>						</span>
                                                                    <span class="">Safe URL checker</span>
                                                                </li>
                                                                <li class="">
                                                                    <span class="">
							<i aria-hidden="true" class=""></i>						</span>
                                                                    <span class="">And much more additional tools</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </section>
                    
                    <section class="elementor-section elementor-top-section elementor-element elementor-element-376aa10 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="376aa10" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;navigation&quot;:&quot;both&quot;}">
                        <div class="elementor-container elementor-column-gap-no">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-e68dabe" data-id="e68dabe" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;navigation&quot;:&quot;both&quot;}">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-background-overlay"></div>
                                    <div class="elementor-element elementor-element-f52977d elementor-widget__width-auto elementor-absolute elementor-widget elementor-widget-image" data-id="f52977d" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;navigation&quot;:&quot;both&quot;}"
                                        data-widget_type="image.default">
                                        <div class="elementor-widget-container">
                                            <img decoding="async" loading="lazy" width="1192" height="795" src="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/who-we-are-vector-1.png" class="attachment-full size-full wp-image-1158" alt="" srcset="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/who-we-are-vector-1.png 1192w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/who-we-are-vector-1-600x400.png 600w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/who-we-are-vector-1-300x200.png 300w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/who-we-are-vector-1-1024x683.png 1024w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/who-we-are-vector-1-768x512.png 768w"
                                                sizes="(max-width: 1192px) 100vw, 1192px" /> </div>
                                    </div>
                                    <div class="elementor-element elementor-element-4f11123 elementor-widget__width-auto elementor-absolute elementor-widget elementor-widget-image" data-id="4f11123" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;navigation&quot;:&quot;both&quot;}"
                                        data-widget_type="image.default">
                                        <div class="elementor-widget-container">
                                            <img decoding="async" loading="lazy" width="924" height="1057" src="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/what-we-do-vector-1.png" class="attachment-full size-full wp-image-1184" alt="" srcset="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/what-we-do-vector-1.png 924w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/what-we-do-vector-1-600x686.png 600w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/what-we-do-vector-1-262x300.png 262w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/what-we-do-vector-1-895x1024.png 895w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/what-we-do-vector-1-768x879.png 768w"
                                                sizes="(max-width: 924px) 100vw, 924px" /> </div>
                                    </div>
                                    <div class="elementor-element elementor-element-c26e47d elementor-widget__width-auto elementor-absolute elementor-hidden-tablet elementor-hidden-mobile elementor-invisible elementor-widget elementor-widget-image" data-id="c26e47d" data-element_type="widget"
                                        data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;_animation&quot;:&quot;bounceIn&quot;,&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="image.default">
                                        <div class="elementor-widget-container">
                                            <img decoding="async" fetchpriority="high" width="227" height="273" src="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/left-circle-hero-1.png" class="attachment-full size-full wp-image-174" alt="" />                                            </div>
                                    </div>
                                    <div class="elementor-element elementor-element-ba62017 elementor-widget__width-auto elementor-absolute elementor-hidden-tablet elementor-hidden-mobile elementor-invisible elementor-widget elementor-widget-image" data-id="ba62017" data-element_type="widget"
                                        data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;_animation&quot;:&quot;bounceIn&quot;,&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="image.default">
                                        <div class="elementor-widget-container">
                                            <img decoding="async" loading="lazy" width="351" height="272" src="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/what-we-do-right-bottom-circle-1.png" class="attachment-full size-full wp-image-1208" alt="" srcset="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/what-we-do-right-bottom-circle-1.png 351w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/what-we-do-right-bottom-circle-1-300x232.png 300w"
                                                sizes="(max-width: 351px) 100vw, 351px" /> </div>
                                    </div>
                                    <section class="elementor-section elementor-inner-section elementor-element elementor-element-f8b2d6a elementor-reverse-mobile elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="f8b2d6a" data-element_type="section"
                                        data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                        <div class="elementor-container elementor-column-gap-no">
                                            <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-10870ce" data-id="10870ce" data-element_type="column" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-3bd5e63 elementor-invisible elementor-widget elementor-widget-heading" data-id="3bd5e63" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slideInLeft&quot;,&quot;navigation&quot;:&quot;both&quot;}"
                                                        data-widget_type="heading.default">
                                                        <div class="elementor-widget-container">
                                                            <h6 class="elementor-heading-title elementor-size-default"></h6>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-7bd3d12 elementor-widget elementor-widget-heading" data-id="7bd3d12" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="heading.default">
                                                        <div class="elementor-widget-container">
                                                            <h2 class="elementor-heading-title elementor-size-default">In today's digital age, your mobile banking security starts with a strong password.</h2>
                                                        </div>
                                                    </div>
                                                    

                                                    <div class="elementor-element elementor-element-7122660 elementor-widget elementor-widget-text-editor" data-id="7122660" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="text-editor.default">
                                                        <div class="elementor-widget-container">
                                                            Your password is the first line of defense in protecting your mobile banking information. Weak passwords are like an open door for cybercriminals. They can lead to unauthorized access, financial loss, and identity theft. </div>
                                                    </div>
                                                    <section class="elementor-section elementor-inner-section elementor-element elementor-element-46dee9b text-spacing elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="46dee9b" data-element_type="section"
                                                        data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                                        <div class="elementor-container elementor-column-gap-no">
                                                            <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-25174f0" data-id="25174f0" data-element_type="column" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                                    <div class="elementor-element elementor-element-2b1cbcf elementor-widget__width-auto elementor-widget elementor-widget-counter" data-id="2b1cbcf" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="counter.default">
                                                                        <div class="elementor-widget-container">
                                                                            <style>
                                                                                /*! elementor - v3.15.0 - 20-08-2023 */

                                                                                .elementor-counter .elementor-counter-number-wrapper {
                                                                                    display: flex;
                                                                                    font-size: 69px;
                                                                                    font-weight: 600;
                                                                                    line-height: 1
                                                                                }

                                                                                .elementor-counter .elementor-counter-number-prefix,
                                                                                .elementor-counter .elementor-counter-number-suffix {
                                                                                    flex-grow: 1;
                                                                                    white-space: pre-wrap
                                                                                }

                                                                                .elementor-counter .elementor-counter-number-prefix {
                                                                                    text-align: right
                                                                                }

                                                                                .elementor-counter .elementor-counter-number-suffix {
                                                                                    text-align: left
                                                                                }

                                                                                .elementor-counter .elementor-counter-title {
                                                                                    text-align: center;
                                                                                    font-size: 19px;
                                                                                    font-weight: 400;
                                                                                    line-height: 2.5
                                                                                }
                                                                            </style>
                                                                            
                                                                            <div class="elementor-button-wrapper">
                                                                                <a class="elementor-button elementor-button-link elementor-size-sm elementor-animation-float" href="https://client.passwordawarenesshub.com/password_generator">
                                        <span class="elementor-button-content-wrapper">
                                        <span class="elementor-button-text">Use Our Password Generator</span>
                        </span>
                                    </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                        </div>
                                                        
                                                    </section>
                                                </div>
                                            </div>
                                            <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-fa1d7fe" data-id="fa1d7fe" data-element_type="column" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-60f8239 elementor-widget__width-auto elementor-invisible elementor-widget elementor-widget-image" data-id="60f8239" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slideInRight&quot;,&quot;navigation&quot;:&quot;both&quot;}"
                                                        data-widget_type="image.default">
                                                        <div class="elementor-widget-container">
                                                            <img decoding="async" loading="lazy" width="564" height="631" src="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/who-we-are-image-1.png" class="attachment-full size-full wp-image-1122" alt="" srcset="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/who-we-are-image-1.png 564w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/who-we-are-image-1-268x300.png 268w"
                                                                sizes="(max-width: 564px) 100vw, 564px" /> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <section class="elementor-section elementor-inner-section elementor-element elementor-element-8bd08d6 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="8bd08d6" data-element_type="section" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                        <div class="elementor-container elementor-column-gap-no">
                                            <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-6906839" data-id="6906839" data-element_type="column" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-4046eb4 elementor-widget__width-auto elementor-invisible elementor-widget elementor-widget-image" data-id="4046eb4" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slideInLeft&quot;,&quot;navigation&quot;:&quot;both&quot;}"
                                                        data-widget_type="image.default">
                                                        <div class="elementor-widget-container">
                                                            <img decoding="async" loading="lazy" width="507" height="596" src="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/what-we-do-image-1.png" class="attachment-full size-full wp-image-1195" alt="" srcset="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/what-we-do-image-1.png 507w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/what-we-do-image-1-255x300.png 255w"
                                                                sizes="(max-width: 507px) 100vw, 507px" /> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-9f56d16" data-id="9f56d16" data-element_type="column" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-308857d elementor-invisible elementor-widget elementor-widget-heading" data-id="308857d" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slideInRight&quot;,&quot;navigation&quot;:&quot;both&quot;}"
                                                        data-widget_type="heading.default">
                                                        <div class="elementor-widget-container">
                                                            <h6 class="elementor-heading-title elementor-size-default"></h6>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-dc4220e elementor-widget elementor-widget-heading" data-id="dc4220e" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="heading.default">
                                                        <div class="elementor-widget-container">
                                                            <h2 class="elementor-heading-title elementor-size-default">User Behavior Analysis</h2>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-e3d8ac1 elementor-widget elementor-widget-text-editor" data-id="e3d8ac1" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="text-editor.default">
                                                        <div class="elementor-widget-container">
                                                            Understanding how users behave when it comes to password protection is crucial for enhancing security measures. By analyzing specific patterns and trends, we can better anticipate potential security threats and take proactive measures to protect our digital assets. The following are outcomes of a survey i've conducted with 160 participants</div>
                                                    </div>
                                                    <section class="elementor-section elementor-inner-section elementor-element elementor-element-8de2996 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="8de2996" data-element_type="section" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                                        <div class="elementor-container elementor-column-gap-no">
                                                            <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-c18de75" data-id="c18de75" data-element_type="column" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                                    <div class="elementor-element elementor-element-146ec4b elementor-position-left elementor-widget-tablet__width-auto elementor-vertical-align-top elementor-invisible elementor-widget elementor-widget-image-box" data-id="146ec4b" data-element_type="widget"
                                                                        data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="image-box.default">
                                                                        <div class="elementor-widget-container">
                                                                            <style>
                                                                                .elementor-widget-image-box .elementor-image-box-content {
                                                                                    width: 100%
                                                                                }

                                                                                @media (min-width:768px) {
                                                                                    .elementor-widget-image-box.elementor-position-left .elementor-image-box-wrapper,
                                                                                    .elementor-widget-image-box.elementor-position-right .elementor-image-box-wrapper {
                                                                                        display: flex
                                                                                    }
                                                                                    .elementor-widget-image-box.elementor-position-right .elementor-image-box-wrapper {
                                                                                        text-align: right;
                                                                                        flex-direction: row-reverse
                                                                                    }
                                                                                    .elementor-widget-image-box.elementor-position-left .elementor-image-box-wrapper {
                                                                                        text-align: left;
                                                                                        flex-direction: row
                                                                                    }
                                                                                    .elementor-widget-image-box.elementor-position-top .elementor-image-box-img {
                                                                                        margin: auto
                                                                                    }
                                                                                    .elementor-widget-image-box.elementor-vertical-align-top .elementor-image-box-wrapper {
                                                                                        align-items: flex-start
                                                                                    }
                                                                                    .elementor-widget-image-box.elementor-vertical-align-middle .elementor-image-box-wrapper {
                                                                                        align-items: center
                                                                                    }
                                                                                    .elementor-widget-image-box.elementor-vertical-align-bottom .elementor-image-box-wrapper {
                                                                                        align-items: flex-end
                                                                                    }
                                                                                }

                                                                                @media (max-width:767px) {
                                                                                    .elementor-widget-image-box .elementor-image-box-img {
                                                                                        margin-left: auto !important;
                                                                                        margin-right: auto !important;
                                                                                        margin-bottom: 15px
                                                                                    }
                                                                                }

                                                                                .elementor-widget-image-box .elementor-image-box-img {
                                                                                    display: inline-block
                                                                                }

                                                                                .elementor-widget-image-box .elementor-image-box-title a {
                                                                                    color: inherit
                                                                                }

                                                                                .elementor-widget-image-box .elementor-image-box-wrapper {
                                                                                    text-align: center
                                                                                }

                                                                                .elementor-widget-image-box .elementor-image-box-description {
                                                                                    margin: 0
                                                                                }
                                                                            </style>
                                                                            <div class="elementor-image-box-wrapper">
                                                                                <figure class="elementor-image-box-img"><img decoding="async" loading="lazy" width="51" height="59" src="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/what-we-do-protect-image-1.png" class="elementor-animation-grow attachment-full size-full wp-image-1245"
                                                                                        alt="" /></figure>
                                                                                <div class="elementor-image-box-content">
                                                                                    <h5 class="elementor-image-box-title">Mobile Banking App Users</h5>
                                                                                    <p class="elementor-image-box-description">100% of survey participants use mobile bank apps</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-a2bb2ee" data-id="a2bb2ee" data-element_type="column" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                                    <div class="elementor-element elementor-element-f272688 elementor-position-left elementor-widget-tablet__width-auto elementor-vertical-align-top elementor-invisible elementor-widget elementor-widget-image-box" data-id="f272688" data-element_type="widget"
                                                                        data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="image-box.default">
                                                                        <div class="elementor-widget-container">
                                                                            <div class="elementor-image-box-wrapper">
                                                                                <figure class="elementor-image-box-img"><img decoding="async" loading="lazy" width="51" height="59" src="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/what-we-do-protect-image-1.png" class="elementor-animation-grow attachment-full size-full wp-image-1245"
                                                                                        alt="" /></figure>
                                                                                <div class="elementor-image-box-content">
                                                                                    <h5 class="elementor-image-box-title">Frequency of use of Mobile Bank Apps</h5>
                                                                                    <p class="elementor-image-box-description">32.19% use multiple times daily, 46.58% use daily, 21.23% use several times a week, 0.00% use once a week, 0.00% use less than once a week</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                    
                                                    <section class="elementor-section elementor-inner-section elementor-element elementor-element-0d5c52b elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="0d5c52b" data-element_type="section" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                                        <div class="elementor-container elementor-column-gap-no">
                                                            <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-4d2f036" data-id="4d2f036" data-element_type="column" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                                    <div class="elementor-element elementor-element-14d156a elementor-position-left elementor-widget-tablet__width-auto elementor-vertical-align-top elementor-invisible elementor-widget elementor-widget-image-box" data-id="14d156a" data-element_type="widget"
                                                                        data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="image-box.default">
                                                                        <div class="elementor-widget-container">
                                                                            <div class="elementor-image-box-wrapper">
                                                                                <figure class="elementor-image-box-img"><img decoding="async" loading="lazy" width="51" height="59" src="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/what-we-do-protect-image-1.png" class="elementor-animation-grow attachment-full size-full wp-image-1245"
                                                                                        alt="" /></figure>
                                                                                <div class="elementor-image-box-content">
                                                                                    <h5 class="elementor-image-box-title">Response of users regarding importance they attribute to password protection</h5>
                                                                                    <p class="elementor-image-box-description">17.14% indicates it is not at all important, 0.00% indicate slightly important, 0.00% indicate moderately important, 42.68% indicate very important, 40.00% indicate extremely important.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-8e4a3fa" data-id="8e4a3fa" data-element_type="column" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                                    <div class="elementor-element elementor-element-b3a8185 elementor-position-left elementor-widget-tablet__width-auto elementor-vertical-align-top elementor-invisible elementor-widget elementor-widget-image-box" data-id="b3a8185" data-element_type="widget"
                                                                        data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="image-box.default">
                                                                        <div class="elementor-widget-container">
                                                                            <div class="elementor-image-box-wrapper">
                                                                                <figure class="elementor-image-box-img"><img decoding="async" loading="lazy" width="51" height="59" src="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/what-we-do-protect-image-1.png" class="elementor-animation-grow attachment-full size-full wp-image-1245"
                                                                                        alt="" /></figure>
                                                                                <div class="elementor-image-box-content">
                                                                                    <h5 class="elementor-image-box-title">Password usage for multiple accounts</h5>
                                                                                    <p class="elementor-image-box-description">34.38% use different passwords across accounts, 23.13% do not.Additionally 42.50% chose maybe suggesting uncertainty.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                    <section class="elementor-section elementor-inner-section elementor-element elementor-element-0d5c52b elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="0d5c52b" data-element_type="section" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                                        <div class="elementor-container elementor-column-gap-no">
                                                            <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-4d2f036" data-id="4d2f036" data-element_type="column" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                                    <div class="elementor-element elementor-element-14d156a elementor-position-left elementor-widget-tablet__width-auto elementor-vertical-align-top elementor-invisible elementor-widget elementor-widget-image-box" data-id="14d156a" data-element_type="widget"
                                                                        data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="image-box.default">
                                                                        <div class="elementor-widget-container">
                                                                            <div class="elementor-image-box-wrapper">
                                                                                <figure class="elementor-image-box-img"><img decoding="async" loading="lazy" width="51" height="59" src="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/what-we-do-protect-image-1.png" class="elementor-animation-grow attachment-full size-full wp-image-1245"
                                                                                        alt="" /></figure>
                                                                                <div class="elementor-image-box-content">
                                                                                    <h5 class="elementor-image-box-title">How frequently users change password</h5>
                                                                                    <p class="elementor-image-box-description">18.75% change passwords every few weeks, 21.53% change every few months, 27.08% change once or twice a year, 0.69% change less than once a year and 31.94% never change their password.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-8e4a3fa" data-id="8e4a3fa" data-element_type="column" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                                    <div class="elementor-element elementor-element-b3a8185 elementor-position-left elementor-widget-tablet__width-auto elementor-vertical-align-top elementor-invisible elementor-widget elementor-widget-image-box" data-id="b3a8185" data-element_type="widget"
                                                                        data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="image-box.default">
                                                                        <div class="elementor-widget-container">
                                                                            <div class="elementor-image-box-wrapper">
                                                                                <figure class="elementor-image-box-img"><img decoding="async" loading="lazy" width="51" height="59" src="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/what-we-do-protect-image-1.png" class="elementor-animation-grow attachment-full size-full wp-image-1245"
                                                                                        alt="" /></figure>
                                                                                <div class="elementor-image-box-content">
                                                                                    <h5 class="elementor-image-box-title">Awareness on any specific password protection measures</h5>
                                                                                    <p class="elementor-image-box-description">74.38% indicated being aware of specific password protection measures, 16.88% reported not being aware, 8.75% chose "maybe", and no participant selected "probably yes".</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                        
                    </section>
                    <section class="elementor-section elementor-inner-section elementor-element elementor-element-f8b2d6a elementor-reverse-mobile elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="f8b2d6a" data-element_type="section"
                                        data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                        <div class="elementor-container elementor-column-gap-no">
                                            <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-10870ce" data-id="10870ce" data-element_type="column" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-3bd5e63 elementor-invisible elementor-widget elementor-widget-heading" data-id="3bd5e63" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;slideInLeft&quot;,&quot;navigation&quot;:&quot;both&quot;}"
                                                        data-widget_type="heading.default">
                                                        <div class="elementor-widget-container">
                                                            <h6 class="elementor-heading-title elementor-size-default"></h6>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-7bd3d12 elementor-widget elementor-widget-heading" data-id="7bd3d12" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="heading.default">
                                                        <div class="elementor-widget-container">
                                                            <h2 class="elementor-heading-title elementor-size-default">App Design Recommendations: Enhancing Mobile Banking Security</h2>
                                                        </div>
                                                    </div>
                                                    

                                                    <div class="elementor-element elementor-element-7122660 elementor-widget elementor-widget-text-editor" data-id="7122660" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="text-editor.default">
                                                        <div class="elementor-widget-container">
                                                            The design of a mobile banking app plays a significant role in ensuring the security of users' financial information. </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-7122660 elementor-widget elementor-widget-text-editor" data-id="7122660" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="text-editor.default">
                                                        <div class="elementor-widget-container">
                                                            At PasswordAwarenessHub.com, we've compiled a set of recommendations to help app developers create a secure and user-friendly experience. </div>
                                                    </div>
                                                    <br></br>
                                                    <div class="elementor-element elementor-element-7122660 elementor-widget elementor-widget-text-editor" data-id="7122660" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="text-editor.default">
                                                        <div class="elementor-widget-container">
                                                            1. Intuitive Password Management </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-7122660 elementor-widget elementor-widget-text-editor" data-id="7122660" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="text-editor.default">
                                                        <div class="elementor-widget-container">
                                                            2. Biometric Authentication Integration </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-7122660 elementor-widget elementor-widget-text-editor" data-id="7122660" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="text-editor.default">
                                                        <div class="elementor-widget-container">
                                                            3. Two-Factor Authentication (2FA) Implementation </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-7122660 elementor-widget elementor-widget-text-editor" data-id="7122660" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="text-editor.default">
                                                        <div class="elementor-widget-container">
                                                            4. Password Expiry Notifications </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-7122660 elementor-widget elementor-widget-text-editor" data-id="7122660" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="text-editor.default">
                                                        <div class="elementor-widget-container">
                                                            5. Account Lockout Policies </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-7122660 elementor-widget elementor-widget-text-editor" data-id="7122660" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="text-editor.default">
                                                        <div class="elementor-widget-container">
                                                            6. Secure Communication Protocols </div>
                                                    </div>
                                                    
                                                    <section class="elementor-section elementor-inner-section elementor-element elementor-element-46dee9b text-spacing elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="46dee9b" data-element_type="section"
                                                        data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                                        <div class="elementor-container elementor-column-gap-no">
                                                            <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-25174f0" data-id="25174f0" data-element_type="column" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                                    <div class="elementor-element elementor-element-2b1cbcf elementor-widget__width-auto elementor-widget elementor-widget-counter" data-id="2b1cbcf" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="counter.default">
                                                                        <div class="elementor-widget-container">
                                                                            <style>
                                                                                /*! elementor - v3.15.0 - 20-08-2023 */

                                                                                .elementor-counter .elementor-counter-number-wrapper {
                                                                                    display: flex;
                                                                                    font-size: 69px;
                                                                                    font-weight: 600;
                                                                                    line-height: 1
                                                                                }

                                                                                .elementor-counter .elementor-counter-number-prefix,
                                                                                .elementor-counter .elementor-counter-number-suffix {
                                                                                    flex-grow: 1;
                                                                                    white-space: pre-wrap
                                                                                }

                                                                                .elementor-counter .elementor-counter-number-prefix {
                                                                                    text-align: right
                                                                                }

                                                                                .elementor-counter .elementor-counter-number-suffix {
                                                                                    text-align: left
                                                                                }

                                                                                .elementor-counter .elementor-counter-title {
                                                                                    text-align: center;
                                                                                    font-size: 19px;
                                                                                    font-weight: 400;
                                                                                    line-height: 2.5
                                                                                }
                                                                            </style>
                                                                           
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                        </div>
                                                        
                                                    </section>
                                                </div>
                                            </div>
                                            <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-fa1d7fe" data-id="fa1d7fe" data-element_type="column" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    
                                    <section class="elementor-section elementor-top-section elementor-element elementor-element-d721444 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="d721444" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;navigation&quot;:&quot;both&quot;}">
                        <div class="elementor-container elementor-column-gap-no">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-45132e4" data-id="45132e4" data-element_type="column" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-a9adcb3 elementor-widget__width-auto elementor-absolute elementor-hidden-tablet elementor-hidden-mobile elementor-invisible elementor-widget elementor-widget-image" data-id="a9adcb3" data-element_type="widget"
                                        data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;_animation&quot;:&quot;bounceIn&quot;,&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="image.default">
                                        <div class="elementor-widget-container">
                                            <img decoding="async" loading="lazy" width="351" height="272" src="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/right-circle-1.png" class="attachment-full size-full wp-image-714" alt="" srcset="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/right-circle-1.png 351w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/right-circle-1-300x232.png 300w"
                                                sizes="(max-width: 351px) 100vw, 351px" /> </div>
                                    </div>
                                    <div class="elementor-element elementor-element-f8c1e64 elementor-widget__width-auto elementor-absolute elementor-widget elementor-widget-image" data-id="f8c1e64" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;navigation&quot;:&quot;both&quot;}"
                                        data-widget_type="image.default">
                                        <div class="elementor-widget-container">
                                            <img decoding="async" loading="lazy" width="956" height="825" src="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/about-dot-vector-1.png" class="attachment-full size-full wp-image-883" alt="" srcset="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/about-dot-vector-1.png 956w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/about-dot-vector-1-600x518.png 600w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/about-dot-vector-1-300x259.png 300w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/about-dot-vector-1-768x663.png 768w"
                                                sizes="(max-width: 956px) 100vw, 956px" /> </div>
                                    </div>
                                    <section class="elementor-section elementor-inner-section elementor-element elementor-element-48b5bff elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="48b5bff" data-element_type="section"
                                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;navigation&quot;:&quot;both&quot;}">
                                        <div style="text-align: center;">
                                            <img src="imp.png" alt="Image Description" style="border-radius: 2%; max-width: 400px;">
                                        </div>
                                        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-30f5f10" data-id="30f5f10" data-element_type="column" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-a8064ec elementor-widget elementor-widget-heading" data-id="a8064ec" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="heading.default">
                                                        <div class="elementor-widget-container">
                                                            <h6 class="elementor-heading-title elementor-size-default"></h6>
                                                        </div>
                                                    </div>
                                                    <br></br>
                                                    <div class="elementor-element elementor-element-ea647e3 elementor-widget elementor-widget-heading" data-id="ea647e3" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="heading.default">
                                                        <div class="elementor-widget-container">
                                                            <h2 class="elementor-heading-title elementor-size-default">Importance of Strong Passwords</h2>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-966c814 elementor-widget elementor-widget-text-editor" data-id="966c814" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="text-editor.default">
                                                        <div class="elementor-widget-container">
                                                            In the digital realm, your password serves as the ultimate gatekeeper, protecting your valuable information from prying eyes and cybercriminals. Here's why strong passwords are crucial </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-dbcb0f6 elementor-align-left elementor-widget__width-auto elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="dbcb0f6" data-element_type="widget"
                                                        data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="icon-list.default">
                                                        <div class="elementor-widget-container">
                                                            <link rel="stylesheet" href="https://designingmedia.com/whizcyber/wp-content/uploads/elementor/css/custom-widget-icon-list.min.css?ver=1693228042">
                                                            <ul class="">
                                                                <li class="">
                                                                    <span class="">
							<i aria-hidden="true" class=""></i>						</span>
                                                                    <span class="">Guard Your Privacy: A strong password ensures that your personal data, emails, and financial accounts remain private and secure. It's the first line of defense against unauthorized access.</span>
                                                                </li>
                                                                <li class="">
                                                                    <span class="">
							<i aria-hidden="true" class=""></i>						</span>
                                                                    <span class="">Thwart Hacking Attempts: Strong passwords make it exponentially harder for hackers to crack your accounts through brute force attacks or guesswork.</span>
                                                                </li>
                                                                <li class="">
                                                                    <span class="">
							<i aria-hidden="true" class=""></i>						</span>
                                                                    <span class="">Prevent Identity Theft: Your online identity is valuable. Strong passwords are your shield against identity theft, helping you maintain control over your digital persona.</span>
                                                                </li>
                                                                <li class="">
                                                                    <span class="">
							<i aria-hidden="true" class=""></i>						</span>
                                                                    <span class="">Safeguard Financial Assets: In the world of online banking and transactions, a strong password is your best ally in protecting your hard-earned money from cyber threats.</span>
                                                                </li>
                                                                <li class="">
                                                                    <span class="">
							<i aria-hidden="true" class=""></i>						</span>
                                                                    <span class="">Preserve Reputation: A compromised account can lead to reputation damage, especially if your personal or professional contacts are affected. Strong passwords help maintain trust.</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    
                                    </section>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="elementor-section elementor-top-section elementor-element elementor-element-d721444 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="d721444" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;navigation&quot;:&quot;both&quot;}">
                        <div class="elementor-container elementor-column-gap-no">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-45132e4" data-id="45132e4" data-element_type="column" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-a9adcb3 elementor-widget__width-auto elementor-absolute elementor-hidden-tablet elementor-hidden-mobile elementor-invisible elementor-widget elementor-widget-image" data-id="a9adcb3" data-element_type="widget"
                                        data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;_animation&quot;:&quot;bounceIn&quot;,&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="image.default">
                                        <div class="elementor-widget-container">
                                            <img decoding="async" loading="lazy" width="351" height="272" src="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/right-circle-1.png" class="attachment-full size-full wp-image-714" alt="" srcset="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/right-circle-1.png 351w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/right-circle-1-300x232.png 300w"
                                                sizes="(max-width: 351px) 100vw, 351px" /> </div>
                                    </div>
                                    <div class="elementor-element elementor-element-f8c1e64 elementor-widget__width-auto elementor-absolute elementor-widget elementor-widget-image" data-id="f8c1e64" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;navigation&quot;:&quot;both&quot;}"
                                        data-widget_type="image.default">
                                        <div class="elementor-widget-container">
                                            <img decoding="async" loading="lazy" width="956" height="825" src="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/about-dot-vector-1.png" class="attachment-full size-full wp-image-883" alt="" srcset="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/about-dot-vector-1.png 956w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/about-dot-vector-1-600x518.png 600w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/about-dot-vector-1-300x259.png 300w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/about-dot-vector-1-768x663.png 768w"
                                                sizes="(max-width: 956px) 100vw, 956px" /> </div>
                                    </div>
                                    <section class="elementor-section elementor-inner-section elementor-element elementor-element-48b5bff elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="48b5bff" data-element_type="section"
                                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;navigation&quot;:&quot;both&quot;}">
                                        <div style="text-align: center;">
                                            <img src="rsk.png" alt="Image Description" style="border-radius: 2%; max-width: 400px;">
                                        </div>
                                        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-30f5f10" data-id="30f5f10" data-element_type="column" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-a8064ec elementor-widget elementor-widget-heading" data-id="a8064ec" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="heading.default">
                                                        <div class="elementor-widget-container">
                                                            <h6 class="elementor-heading-title elementor-size-default"></h6>
                                                        </div>
                                                    </div>
                                                    <br></br>
                                                    <div class="elementor-element elementor-element-ea647e3 elementor-widget elementor-widget-heading" data-id="ea647e3" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="heading.default">
                                                        <div class="elementor-widget-container">
                                                            <h2 class="elementor-heading-title elementor-size-default">Risks of Weak Passwords</h2>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-966c814 elementor-widget elementor-widget-text-editor" data-id="966c814" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="text-editor.default">
                                                        <div class="elementor-widget-container">
                                                            The perils of weak passwords are real and can have severe consequences </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-dbcb0f6 elementor-align-left elementor-widget__width-auto elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="dbcb0f6" data-element_type="widget"
                                                        data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="icon-list.default">
                                                        <div class="elementor-widget-container">
                                                            <link rel="stylesheet" href="https://designingmedia.com/whizcyber/wp-content/uploads/elementor/css/custom-widget-icon-list.min.css?ver=1693228042">
                                                            <ul class="">
                                                                <li class="">
                                                                    <span class="">
							<i aria-hidden="true" class=""></i>						</span>
                                                                    <span class="">Easy Target for Hackers: Weak passwords, such as "123456" or "password," are the low-hanging fruit for hackers, inviting unauthorized access.</span>
                                                                </li>
                                                                <li class="">
                                                                    <span class="">
							<i aria-hidden="true" class=""></i>						</span>
                                                                    <span class="">Data Breaches: Weak passwords can result in data breaches, exposing sensitive information to cybercriminals and potentially leading to financial losses.</span>
                                                                </li>
                                                                <li class="">
                                                                    <span class="">
							<i aria-hidden="true" class=""></i>						</span>
                                                                    <span class="">Account Hijacking: Cybercriminals can take over your accounts, impersonate you, and wreak havoc on your personal and professional life.</span>
                                                                </li>
                                                                <li class="">
                                                                    <span class="">
							<i aria-hidden="true" class=""></i>						</span>
                                                                    <span class="">Loss of Privacy: Weak passwords put your private conversations, emails, and personal data at risk of exposure to unintended individuals.</span>
                                                                </li>
                                                                <li class="">
                                                                    <span class="">
							<i aria-hidden="true" class=""></i>						</span>
                                                                    <span class="">Financial Loss: Weak passwords in online banking and shopping accounts can lead to financial losses as cybercriminals exploit vulnerabilities.</span>
                                                                </li>
                                                                <li class="">
                                                                    <span class="">
							<i aria-hidden="true" class=""></i>						</span>
                                                                    <span class="">Compromised Reputation: Falling victim to a hack can harm your reputation, both personally and professionally, leading to trust issues with contacts.</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    
                                    </section>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="elementor-section elementor-top-section elementor-element elementor-element-d721444 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="d721444" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;navigation&quot;:&quot;both&quot;}">
                        <div class="elementor-container elementor-column-gap-no">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-45132e4" data-id="45132e4" data-element_type="column" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-a9adcb3 elementor-widget__width-auto elementor-absolute elementor-hidden-tablet elementor-hidden-mobile elementor-invisible elementor-widget elementor-widget-image" data-id="a9adcb3" data-element_type="widget"
                                        data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;_animation&quot;:&quot;bounceIn&quot;,&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="image.default">
                                        <div class="elementor-widget-container">
                                            <img decoding="async" loading="lazy" width="351" height="272" src="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/right-circle-1.png" class="attachment-full size-full wp-image-714" alt="" srcset="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/right-circle-1.png 351w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/right-circle-1-300x232.png 300w"
                                                sizes="(max-width: 351px) 100vw, 351px" /> </div>
                                    </div>
                                    <div class="elementor-element elementor-element-f8c1e64 elementor-widget__width-auto elementor-absolute elementor-widget elementor-widget-image" data-id="f8c1e64" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;navigation&quot;:&quot;both&quot;}"
                                        data-widget_type="image.default">
                                        <div class="elementor-widget-container">
                                            <img decoding="async" loading="lazy" width="956" height="825" src="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/about-dot-vector-1.png" class="attachment-full size-full wp-image-883" alt="" srcset="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/about-dot-vector-1.png 956w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/about-dot-vector-1-600x518.png 600w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/about-dot-vector-1-300x259.png 300w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/about-dot-vector-1-768x663.png 768w"
                                                sizes="(max-width: 956px) 100vw, 956px" /> </div>
                                    </div>
                                    <section class="elementor-section elementor-inner-section elementor-element elementor-element-48b5bff elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="48b5bff" data-element_type="section"
                                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;navigation&quot;:&quot;both&quot;}">
                                        <div style="text-align: center;">
                                            <img src="me.webp" alt="Image Description" style="border-radius: 2%; max-width: 400px;">
                                        </div>
                                        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-30f5f10" data-id="30f5f10" data-element_type="column" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-a8064ec elementor-widget elementor-widget-heading" data-id="a8064ec" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="heading.default">
                                                        <div class="elementor-widget-container">
                                                            <h6 class="elementor-heading-title elementor-size-default"></h6>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-ea647e3 elementor-widget elementor-widget-heading" data-id="ea647e3" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="heading.default">
                                                        <div class="elementor-widget-container">
                                                            <h2 class="elementor-heading-title elementor-size-default">About Me</h2>
                                                        </div>
                                                    </div>
                                                    <br></br>
                                                    <div class="elementor-element elementor-element-966c814 elementor-widget elementor-widget-text-editor" data-id="966c814" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="text-editor.default">
                                                        <div class="elementor-widget-container">
                                                            I'm Abdolhamid Opeyemi Omotoso, an MSc Computing student of the University of Sunderland. I'm interested in solving problems regarding passwords and promoting the adoption of secure password practices </div>
                                                    </div>
                                                    
                                                    
                                    </section>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="elementor-section elementor-top-section elementor-element elementor-element-d721444 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="d721444" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;navigation&quot;:&quot;both&quot;}">
                        <div class="elementor-container elementor-column-gap-no">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-45132e4" data-id="45132e4" data-element_type="column" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-a9adcb3 elementor-widget__width-auto elementor-absolute elementor-hidden-tablet elementor-hidden-mobile elementor-invisible elementor-widget elementor-widget-image" data-id="a9adcb3" data-element_type="widget"
                                        data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;_animation&quot;:&quot;bounceIn&quot;,&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="image.default">
                                        <div class="elementor-widget-container">
                                            <img decoding="async" loading="lazy" width="351" height="272" src="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/right-circle-1.png" class="attachment-full size-full wp-image-714" alt="" srcset="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/right-circle-1.png 351w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/right-circle-1-300x232.png 300w"
                                                sizes="(max-width: 351px) 100vw, 351px" /> </div>
                                    </div>
                                    <div class="elementor-element elementor-element-f8c1e64 elementor-widget__width-auto elementor-absolute elementor-widget elementor-widget-image" data-id="f8c1e64" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;navigation&quot;:&quot;both&quot;}"
                                        data-widget_type="image.default">
                                        <div class="elementor-widget-container">
                                            <img decoding="async" loading="lazy" width="956" height="825" src="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/about-dot-vector-1.png" class="attachment-full size-full wp-image-883" alt="" srcset="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/about-dot-vector-1.png 956w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/about-dot-vector-1-600x518.png 600w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/about-dot-vector-1-300x259.png 300w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/about-dot-vector-1-768x663.png 768w"
                                                sizes="(max-width: 956px) 100vw, 956px" /> </div>
                                    </div>
                                    <section class="elementor-section elementor-inner-section elementor-element elementor-element-48b5bff elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="48b5bff" data-element_type="section"
                                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;navigation&quot;:&quot;both&quot;}">
                                        <div style="text-align: center;">
                                            <img src="feedback.png" alt="Image Description" style="border-radius: 2%; max-width: 400px;">
                                        </div>
                                        <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-30f5f10" data-id="30f5f10" data-element_type="column" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-a8064ec elementor-widget elementor-widget-heading" data-id="a8064ec" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="heading.default">
                                                        <div class="elementor-widget-container">
                                                            <h6 class="elementor-heading-title elementor-size-default"></h6>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-ea647e3 elementor-widget elementor-widget-heading" data-id="ea647e3" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="heading.default">
                                                        <div class="elementor-widget-container">
                                                            <h2 class="elementor-heading-title elementor-size-default">We Value Your Feedback!</h2>
                                                        </div>
                                                    </div>
                                                    <br></br>
                                                    <div class="elementor-element elementor-element-966c814 elementor-widget elementor-widget-text-editor" data-id="966c814" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="text-editor.default">
                                                        <div class="elementor-widget-container">
                                                            Thank you for visiting our website! We would like to know how our platform has contributed to enhancing your mobile banking password security awareness. Your insights are invaluable and will aid us in continually improving our services. Please take a moment to share your thoughts. </div>
                                                    </div>
                                                    <div class="elementor-button-wrapper">
                                                                                <a class="elementor-button elementor-button-link elementor-size-sm elementor-animation-float" href="https://passwordawarenesshub.com/feedback">
                                        <span class="elementor-button-content-wrapper">
                                        <span class="elementor-button-text">Give Feedback!</span>
                        </span>
                                    </a>
                                                                            </div>
                                                    
                                                    
                                    </section>
                                    
                                </div>
                            </div>
                        </div>
                    </section>
                    
                    
                    <section class="elementor-section elementor-top-section elementor-element elementor-element-540105e elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="540105e" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;navigation&quot;:&quot;both&quot;}">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-01bb38e" data-id="01bb38e" data-element_type="column" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-c3a0c95 elementor-widget__width-auto elementor-absolute elementor-hidden-tablet elementor-hidden-mobile elementor-invisible elementor-widget elementor-widget-image" data-id="c3a0c95" data-element_type="widget"
                                        data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;_animation&quot;:&quot;bounceIn&quot;,&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="image.default">
                                        <div class="elementor-widget-container">
                                            <img decoding="async" loading="lazy" width="351" height="272" src="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/what-we-do-right-bottom-circle-1.png" class="attachment-full size-full wp-image-1208" alt="" srcset="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/what-we-do-right-bottom-circle-1.png 351w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/what-we-do-right-bottom-circle-1-300x232.png 300w"
                                                sizes="(max-width: 351px) 100vw, 351px" /> </div>
                                    </div>
                                    <div class="elementor-element elementor-element-9510a17 elementor-widget__width-auto elementor-absolute elementor-widget elementor-widget-image" data-id="9510a17" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;navigation&quot;:&quot;both&quot;}"
                                        data-widget_type="image.default">
                                        <div class="elementor-widget-container">
                                            <img decoding="async" loading="lazy" width="949" height="863" src="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/send-us-message-vector-dot-1.png" class="attachment-full size-full wp-image-2083" alt="" srcset="https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/send-us-message-vector-dot-1.png 949w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/send-us-message-vector-dot-1-600x546.png 600w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/send-us-message-vector-dot-1-300x273.png 300w, https://designingmedia.com/whizcyber/wp-content/uploads/2022/10/send-us-message-vector-dot-1-768x698.png 768w"
                                                sizes="(max-width: 949px) 100vw, 949px" /> </div>
                                    </div>
                                    <section class="elementor-section elementor-inner-section elementor-element elementor-element-64b6513 form-outer elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="64b6513" data-element_type="section" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                        <div class="elementor-container elementor-column-gap-no">
                                            <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-463235b" data-id="463235b" data-element_type="column" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-42f50ae elementor-widget elementor-widget-heading" data-id="42f50ae" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="heading.default">
                                                        <div class="elementor-widget-container">
                                                            <h6 class="elementor-heading-title elementor-size-default"></h6>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-abae2e9 elementor-widget elementor-widget-heading" data-id="abae2e9" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="heading.default">
                                                        <div class="elementor-widget-container">
                                                            <h2 class="elementor-heading-title elementor-size-default">Send me a Message</h2>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-0e66f33 form-inner elementor-widget elementor-widget-shortcode" data-id="0e66f33" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="shortcode.default">
                                                        <div class="elementor-widget-container">
                                                            <div class="elementor-shortcode">
                                                                <div class="wpcf7 no-js" id="wpcf7-f3932-p3969-o1" lang="en-US" dir="ltr">
                                                                    <div class="screen-reader-response">
                                                                        <p role="status" aria-live="polite" aria-atomic="true"></p>
                                                                        <ul></ul>
                                                                    </div>
                                                                    <form action="mailer.php" method="post" class="wpcf7-form init" aria-label="Contact form" novalidate="novalidate" data-status="init">
                                                                        <div style="display: none;">
                                                                            <input type="hidden" name="_wpcf7" value="3932" />
                                                                            <input type="hidden" name="_wpcf7_version" value="5.8" />
                                                                            <input type="hidden" name="_wpcf7_locale" value="en_US" />
                                                                            <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f3932-p3969-o1" />
                                                                            <input type="hidden" name="_wpcf7_container_post" value="3969" />
                                                                            <input type="hidden" name="_wpcf7_posted_data_hash" value="" />
                                                                        </div>
                                                                        <div class="main">
                                                                            <div class="main1">
                                                                                <p><span class="wpcf7-form-control-wrap" data-name="your-name"><input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Name:" value="" type="text" name="your-name" /></span>
                                                                                </p>
                                                                            </div>
                                                                            <div class="main2">
                                                                                <p><span class="wpcf7-form-control-wrap" data-name="your-phone"><input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required name-field" aria-required="true" aria-invalid="false" placeholder="Phone:" value="" type="text" name="your-phone" /></span>
                                                                                </p>
                                                                            </div>
                                                                            <div class="main22">
                                                                                <p><span class="wpcf7-form-control-wrap" data-name="your-email"><input size="40" class="wpcf7-form-control wpcf7-email wpcf7-validates-as-required wpcf7-text wpcf7-validates-as-email name-field" aria-required="true" aria-invalid="false" placeholder="Email:" value="" type="email" name="your-email" /></span>
                                                                                </p>
                                                                            </div>
                                                                            <div class="main3">
                                                                                <p><span class="wpcf7-form-control-wrap" data-name="your-message"><textarea cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea message" aria-invalid="false" placeholder="Message:" name="your-message"></textarea></span>
                                                                                </p>
                                                                            </div>
                                                                            <div class="main4">
                                                                                <p><input class="wpcf7-form-control wpcf7-submit has-spinner" type="submit" value="Submit Now" />
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="wpcf7-response-output" aria-hidden="true"></div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <div data-elementor-type="page" data-elementor-id="3934" class="elementor elementor-3934">
                    <section class="elementor-section elementor-top-section elementor-element elementor-element-2108eafb elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="2108eafb" data-element_type="section" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                        <div class="elementor-container elementor-column-gap-no">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-577b012a" data-id="577b012a" data-element_type="column" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <section class="elementor-section elementor-inner-section elementor-element elementor-element-57ac1000 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="57ac1000" data-element_type="section" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                        <div class="elementor-container elementor-column-gap-no">
                                            <div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-19ecd206" data-id="19ecd206" data-element_type="column" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-1d6a4664 elementor-widget elementor-widget-image" data-id="1d6a4664" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="image.default">
                                                        <div class="elementor-widget-container">
                                                            <a href="#">
							<img width="184" height="50" src="logo.png" class="attachment-full size-full wp-image-55" alt="" loading="lazy" />								</a>
                                                        </div>
                                                    </div>
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-33c3fefc elementor-hidden-tablet elementor-hidden-mobile" data-id="33c3fefc" data-element_type="column" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-5e0aead2 elementor-widget elementor-widget-heading" data-id="5e0aead2" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="heading.default">
                                                        <div class="elementor-widget-container">
                                                            <h4 class="elementor-heading-title elementor-size-default">Contact Info</h4>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-66109af elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="66109af" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}"
                                                        data-widget_type="icon-list.default">
                                                        <div class="elementor-widget-container">
                                                            <ul class="elementor-icon-list-items">
                                                                <li class="elementor-icon-list-item">
                                                                    <span class="elementor-icon-list-icon">
							<i aria-hidden="true" class="fas fa-phone-alt"></i>						</span>
                                                                    <span class="elementor-icon-list-text">+61 3 8376 6284</span>
                                                                </li>
                                                                <li class="elementor-icon-list-item">
                                                                    <span class="elementor-icon-list-icon">
							<i aria-hidden="true" class="fas fa-envelope"></i>						</span>
                                                                    <span class="elementor-icon-list-text">Info@whizcyber.om</span>
                                                                </li>
                                                                <li class="elementor-icon-list-item">
                                                                    <span class="elementor-icon-list-icon">
							<i aria-hidden="true" class="fas fa-map-marker"></i>						</span>
                                                                    <span class="elementor-icon-list-text">21 King Street Melbourne, 3000, Australia</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <section class="elementor-section elementor-inner-section elementor-element elementor-element-3037fdf4 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="3037fdf4" data-element_type="section" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                        <div class="elementor-container elementor-column-gap-no">
                                            <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-1d59869b" data-id="1d59869b" data-element_type="column" data-settings="{&quot;navigation&quot;:&quot;both&quot;}">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div class="elementor-element elementor-element-1514d543 elementor-widget elementor-widget-text-editor" data-id="1514d543" data-element_type="widget" data-settings="{&quot;navigation&quot;:&quot;both&quot;}" data-widget_type="text-editor.default">
                                                        <div class="elementor-widget-container">
                                                            <p>Password Awareness Hub copyright © 2023. All Rights Reserved.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <!-- footer area start -->
            <footer class="footer-area style-3" style="background-image :url( );  background-color: ">

                <div class="footer-bottom">
                    <div class="container">
                        <div class="row">


                            <div class="col-lg-12 text-center">
                                <p class="copyright">
                                    Copyright &copy; Whizcyber 2023. All rights reserved </p>
                            </div>

                        </div>
                    </div>
                </div>
            </footer>
            <!-- footer area end -->
        </div>
        <!-- #page -->

        <script>
            (function() {
                function maybePrefixUrlField() {
                    const value = this.value.trim()
                    if (value !== '' && value.indexOf('http') !== 0) {
                        this.value = 'http://' + value
                    }
                }

                const urlFields = document.querySelectorAll('.mc4wp-form input[type="url"]')
                for (let j = 0; j < urlFields.length; j++) {
                    urlFields[j].addEventListener('blur', maybePrefixUrlField)
                }
            })();
        </script>
        <script type="text/javascript">
            (function() {
                var c = document.body.className;
                c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
                document.body.className = c;
            })();
        </script>
        <link rel='stylesheet' id='elementor-post-3934-css' href='https://designingmedia.com/whizcyber/wp-content/uploads/elementor/css/post-3934.css?ver=1693228043' type='text/css' media='all' />
        <link rel='stylesheet' id='e-animations-css' href='https://designingmedia.com/whizcyber/wp-content/plugins/elementor/assets/lib/animations/animations.min.css?ver=3.15.3' type='text/css' media='all' />
        <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-content/plugins/contact-form-7/includes/swv/js/index.js?ver=5.8' id='swv-js'></script>
        <script type='text/javascript' id='contact-form-7-js-extra'>
            /* <![CDATA[ */
            var wpcf7 = {
                "api": {
                    "root": "https:\/\/designingmedia.com\/whizcyber\/wp-json\/",
                    "namespace": "contact-form-7\/v1"
                }
            };
            /* ]]> */
        </script>
        <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-content/plugins/contact-form-7/includes/js/index.js?ver=5.8' id='contact-form-7-js'></script>
        <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min.js?ver=2.7.0-wc.8.0.2' id='jquery-blockui-js'></script>
        <script type='text/javascript' id='wc-add-to-cart-js-extra'>
            /* <![CDATA[ */
            var wc_add_to_cart_params = {
                "ajax_url": "\/whizcyber\/wp-admin\/admin-ajax.php",
                "wc_ajax_url": "\/whizcyber\/?wc-ajax=%%endpoint%%",
                "i18n_view_cart": "View cart",
                "cart_url": "https:\/\/designingmedia.com\/whizcyber\/cart\/",
                "is_cart": "",
                "cart_redirect_after_add": "no"
            };
            /* ]]> */
        </script>
        <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min.js?ver=8.0.2' id='wc-add-to-cart-js'></script>
        <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min.js?ver=2.1.4-wc.8.0.2' id='js-cookie-js'></script>
        <script type='text/javascript' id='woocommerce-js-extra'>
            /* <![CDATA[ */
            var woocommerce_params = {
                "ajax_url": "\/whizcyber\/wp-admin\/admin-ajax.php",
                "wc_ajax_url": "\/whizcyber\/?wc-ajax=%%endpoint%%"
            };
            /* ]]> */
        </script>
        <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min.js?ver=8.0.2' id='woocommerce-js'></script>
        <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/js/bootstrap.min.js?ver=1.5.9' id='bootstrap-js-js'></script>
        <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/js/slick.min.js?ver=1.5.9' id='slick-js-js'></script>
        <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/js/wow.min.js?ver=1.1.3' id='wow-js-js'></script>
        <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/js/waypoints.min.js?ver=4.0.1' id='waypoint-js-js'></script>
        <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/js/jquery.counterup.min.js?ver=1.6.2' id='counter-js-js'></script>
        <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/js/jquery.magnific-popup.min.js?ver=1.6.2' id='magnific-js-js'></script>
        <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/js/imagesloaded.pkgd.min.js?ver=4.1.4' id='imgloaded-js-js'></script>
        <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/js/slick-animation.js?ver=1.6.2' id='slick-animation-js'></script>
        <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/js/vendor.js?ver=1.6.2' id='vendor-js'></script>
        <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/js/main.js?ver=1696774212' id='main-js-js'></script>
        <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/js/jquery-1.8.3.js?ver=1.0.0' id='jquery-1.8.3-js'></script>
        <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/js/jquery.cycle.all.js?ver=6.3.1' id='jquery.cycle.all-js'></script>
        <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/js/jquery.slicknav.js?ver=6.3.1' id='jquery.slicknav-js'></script>
        <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/js/slider.js?ver=6.3.1' id='slider-js'></script>
        <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/js/jquery-ui-1.9.2.custom.min.js?ver=6.3.1' id='custom.min-js'></script>
        <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/js/jquery.effects.core.min.js?ver=6.3.1' id='effects.core-js'></script>
        <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/js/scripts.js?ver=6.3.1' id='scripts-js'></script>
        <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/js/owl.carousel.js?ver=6.3.1' id='owl_crousel1-js'></script>
        <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/js/owl.carousel.min.js?ver=6.3.1' id='owl_crousel_min-js'></script>
        <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/js/serviceslider.js?ver=6.3.1' id='serviceslider-js-js'></script>
        <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/js/carousel.js?ver=6.3.1' id='carousel-js'></script>
        <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/js/custom.js?ver=6.3.1' id='custom-js-js'></script>
        <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-content/plugins/elementor/assets/lib/jquery-numerator/jquery-numerator.min.js?ver=0.2.1' id='jquery-numerator-js'></script>
        <script type='text/javascript' defer src='https://designingmedia.com/whizcyber/wp-content/plugins/mailchimp-for-wp/assets/js/forms.js?ver=4.9.6' id='mc4wp-forms-api-js'></script>
        <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-content/plugins/elementor/assets/js/webpack.runtime.min.js?ver=3.15.3' id='elementor-webpack-runtime-js'></script>
        <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-content/plugins/elementor/assets/js/frontend-modules.min.js?ver=3.15.3' id='elementor-frontend-modules-js'></script>
        <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-content/plugins/elementor/assets/lib/waypoints/waypoints.min.js?ver=4.0.2' id='elementor-waypoints-js'></script>
        <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-includes/js/jquery/ui/core.min.js?ver=1.13.2' id='jquery-ui-core-js'></script>
        <script id="elementor-frontend-js-before" type="text/javascript">
            var elementorFrontendConfig = {
                "environmentMode": {
                    "edit": false,
                    "wpPreview": false,
                    "isScriptDebug": false
                },
                "i18n": {
                    "shareOnFacebook": "Share on Facebook",
                    "shareOnTwitter": "Share on Twitter",
                    "pinIt": "Pin it",
                    "download": "Download",
                    "downloadImage": "Download image",
                    "fullscreen": "Fullscreen",
                    "zoom": "Zoom",
                    "share": "Share",
                    "playVideo": "Play Video",
                    "previous": "Previous",
                    "next": "Next",
                    "close": "Close",
                    "a11yCarouselWrapperAriaLabel": "Carousel | Horizontal scrolling: Arrow Left & Right",
                    "a11yCarouselPrevSlideMessage": "Previous slide",
                    "a11yCarouselNextSlideMessage": "Next slide",
                    "a11yCarouselFirstSlideMessage": "This is the first slide",
                    "a11yCarouselLastSlideMessage": "This is the last slide",
                    "a11yCarouselPaginationBulletMessage": "Go to slide"
                },
                "is_rtl": false,
                "breakpoints": {
                    "xs": 0,
                    "sm": 480,
                    "md": 768,
                    "lg": 1025,
                    "xl": 1440,
                    "xxl": 1600
                },
                "responsive": {
                    "breakpoints": {
                        "mobile": {
                            "label": "Mobile Portrait",
                            "value": 767,
                            "default_value": 767,
                            "direction": "max",
                            "is_enabled": true
                        },
                        "mobile_extra": {
                            "label": "Mobile Landscape",
                            "value": 880,
                            "default_value": 880,
                            "direction": "max",
                            "is_enabled": false
                        },
                        "tablet": {
                            "label": "Tablet Portrait",
                            "value": 1024,
                            "default_value": 1024,
                            "direction": "max",
                            "is_enabled": true
                        },
                        "tablet_extra": {
                            "label": "Tablet Landscape",
                            "value": 1200,
                            "default_value": 1200,
                            "direction": "max",
                            "is_enabled": false
                        },
                        "laptop": {
                            "label": "Laptop",
                            "value": 1366,
                            "default_value": 1366,
                            "direction": "max",
                            "is_enabled": true
                        },
                        "widescreen": {
                            "label": "Widescreen",
                            "value": 2400,
                            "default_value": 2400,
                            "direction": "min",
                            "is_enabled": false
                        }
                    }
                },
                "version": "3.15.3",
                "is_static": false,
                "experimentalFeatures": {
                    "e_dom_optimization": true,
                    "e_optimized_assets_loading": true,
                    "e_optimized_css_loading": true,
                    "additional_custom_breakpoints": true,
                    "e_swiper_latest": true,
                    "landing-pages": true,
                    "e_global_styleguide": true
                },
                "urls": {
                    "assets": "https:\/\/designingmedia.com\/whizcyber\/wp-content\/plugins\/elementor\/assets\/"
                },
                "swiperClass": "swiper",
                "settings": {
                    "page": [],
                    "editorPreferences": []
                },
                "kit": {
                    "active_breakpoints": ["viewport_mobile", "viewport_tablet", "viewport_laptop"],
                    "body_background_background": "classic",
                    "global_image_lightbox": "yes",
                    "lightbox_enable_counter": "yes",
                    "lightbox_enable_fullscreen": "yes",
                    "lightbox_enable_zoom": "yes",
                    "lightbox_enable_share": "yes",
                    "lightbox_title_src": "title",
                    "lightbox_description_src": "description"
                },
                "post": {
                    "id": 3969,
                    "title": "WhizCyber",
                    "excerpt": "",
                    "featuredImage": "https:\/\/designingmedia.com\/whizcyber\/wp-content\/uploads\/2023\/06\/blogpost33-1-1024x630.jpg"
                }
            };
        </script>
        <script type='text/javascript' src='https://designingmedia.com/whizcyber/wp-content/plugins/elementor/assets/js/frontend.min.js?ver=3.15.3' id='elementor-frontend-js'></script>
        <link rel="stylesheet" href="https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/css/style.css" type="text/css" media="all">
        <link rel="stylesheet" href="https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/css/responsive.css" type="text/css" media="all">
        <link rel="stylesheet" href="https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/css/style.css" type="text/css" media="all">
        <link rel="stylesheet" href="https://designingmedia.com/whizcyber/wp-content/themes/Whizcyber/assets/css/responsive.css" type="text/css" media="all">
</body>

</html>