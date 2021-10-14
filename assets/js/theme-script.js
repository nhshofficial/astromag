jQuery(function(e) {
    "use strict";

    function t() {
        var t = e(window).width();
        if (e(".entry-content").length) var l = e(".entry-content").offset().left;
        else l = 0;
        e(".full-bleed-section").css({
            position: "relative",
            left: "-" + l + "px",
            "box-sizing": "border-box",
            width: t
        })
    }
    e(".comment-reply-link").addClass("btn btn-primary"), 
    e("#commentsubmit").addClass("btn btn-primary"), 
    e(".widget_search input.search-field").addClass("form-control"), 
    e(".widget_search input.search-submit").addClass("btn btn-default"), 
    e(".variations_form .variations .value > select").addClass("form-control"), 
    e("nav.post-navigation > div.nav-links").addClass("frow justify-between mb-10"), 
    e("nav.posts-navigation > div.nav-links").addClass("frow justify-between mb-10"), 
    e(".widget_rss ul").addClass("media-list"), 
    e(".widget_meta ul, .widget_recent_entries ul, .widget_archive ul, .widget_categories ul, .widget_nav_menu ul, .widget_pages ul, .widget_product_categories ul").addClass("nav flex-column"), 
    e(".widget_meta ul li, .widget_recent_entries ul li, .widget_archive ul li, .widget_categories ul li, .widget_nav_menu ul li, .widget_pages ul li, .widget_product_categories ul li").addClass("nav-item"), 
    e(".widget_meta ul li a, .widget_recent_entries ul li a, .widget_archive ul li a, .widget_categories ul li a, .widget_nav_menu ul li a, .widget_pages ul li a, .widget_product_categories ul li a").addClass("nav-link"), 
    e(".widget_recent_comments ul#recentcomments").css("list-style", "none").css("padding-left", "0"), 
    e(".widget_recent_comments ul#recentcomments li").css("padding", "5px 15px"), 
    e("table#wp-calendar").addClass("table table-striped"), 
    e(".wpcf7-form-control").not(".wpcf7-submit, .wpcf7-acceptance, .wpcf7-file, .wpcf7-radio").addClass("form-control"), 
    e(".wpcf7-submit").addClass("btn btn-primary"), 
    e(".woocommerce-Input--text, .woocommerce-Input--email, .woocommerce-Input--password").addClass("form-control"), 
    e(".woocommerce-Button.button").addClass("btn btn-primary mt-2").removeClass("button"), e("ul.dropdown-menu [data-toggle=dropdown]").on("click", function(t) {
        t.preventDefault(), t.stopPropagation(), e(this).parent().siblings().removeClass("open"), e(this).parent().toggleClass("open")
    }), 
    e("#customer_details .col-1").addClass("col-12").removeClass("col-1"), 
    e("#customer_details .col-2").addClass("col-12").removeClass("col-2"), 
    e(".woocommerce-MyAccount-content .col-1").addClass("col-12").removeClass("col-1"), 
    e(".woocommerce-MyAccount-content .col-2").addClass("col-12").removeClass("col-2"), t(), 
    e(window).resize(function() {
        t()
    }), e(".page-scroller").on("click", function(t) {
        t.preventDefault();
        var l = this.hash,
            o = e(l);
        e("html, body").animate({
            scrollTop: o.offset().top
        }, 1e3, "swing")
    })
});