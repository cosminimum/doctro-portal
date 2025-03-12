<?php
if ( class_exists( 'BoldThemesFramework' ) && isset( BoldThemesFramework::$crush_vars ) ) {
	$boldthemes_crush_vars = apply_filters( 'boldthemes_crush_vars', BoldThemesFramework::$crush_vars );
}
if ( class_exists( 'BoldThemesFramework' ) && isset( BoldThemesFramework::$crush_vars_def ) ) {
	$boldthemes_crush_vars_def = BoldThemesFramework::$crush_vars_def;
}
if ( isset( $boldthemes_crush_vars['accentColor'] ) ) {
	$accentColor = $boldthemes_crush_vars['accentColor'];
} else {
	$accentColor = "#01cab8";
}
if ( isset( $boldthemes_crush_vars['alternateColor'] ) ) {
	$alternateColor = $boldthemes_crush_vars['alternateColor'];
} else {
	$alternateColor = "#142958";
}
if ( isset( $boldthemes_crush_vars['bodyFont'] ) ) {
	$bodyFont = $boldthemes_crush_vars['bodyFont'];
} else {
	$bodyFont = "Source Sans Pro";
}
if ( isset( $boldthemes_crush_vars['menuFont'] ) ) {
	$menuFont = $boldthemes_crush_vars['menuFont'];
} else {
	$menuFont = "Inter";
}
if ( isset( $boldthemes_crush_vars['headingFont'] ) ) {
	$headingFont = $boldthemes_crush_vars['headingFont'];
} else {
	$headingFont = "Inter";
}
if ( isset( $boldthemes_crush_vars['headingSuperTitleFont'] ) ) {
	$headingSuperTitleFont = $boldthemes_crush_vars['headingSuperTitleFont'];
} else {
	$headingSuperTitleFont = "Inter";
}
if ( isset( $boldthemes_crush_vars['headingSubTitleFont'] ) ) {
	$headingSubTitleFont = $boldthemes_crush_vars['headingSubTitleFont'];
} else {
	$headingSubTitleFont = "Inter";
}
if ( isset( $boldthemes_crush_vars['buttonFont'] ) ) {
	$buttonFont = $boldthemes_crush_vars['buttonFont'];
} else {
	$buttonFont = "Inter";
}
if ( isset( $boldthemes_crush_vars['logoHeight'] ) ) {
	$logoHeight = $boldthemes_crush_vars['logoHeight'];
} else {
	$logoHeight = "80";
}
if ( isset( $boldthemes_crush_vars['stickyLogoHeight'] ) ) {
	$stickyLogoHeight = $boldthemes_crush_vars['stickyLogoHeight'];
} else {
	$stickyLogoHeight = "65";
}
$accentColorDark = CssCrush\fn__l_adjust( $accentColor." -15" );$accentColorVeryDark = CssCrush\fn__l_adjust( $accentColor." -35" );$accentColorVeryVeryDark = CssCrush\fn__l_adjust( $accentColor." -42" );$accentColorLight = CssCrush\fn__a_adjust( $accentColor." -30" );$accentColorLighter = CssCrush\fn__a_adjust( $accentColor." -50" );$alternateColorDark = CssCrush\fn__l_adjust( $alternateColor." -15" );$alternateColorVeryDark = CssCrush\fn__l_adjust( $alternateColor." -25" );$alternateColorLight = CssCrush\fn__a_adjust( $alternateColor." -40" );$alternateColorLighter = CssCrush\fn__a_adjust( $alternateColor." -50" );$css_override = sanitize_text_field(".bb_fix{--accent-color: {$accentColor};}
:root{
    --accent-color: {$accentColor};
    --alternate-color: {$alternateColor};}
select,
input{font-family: \"{$bodyFont}\",Arial,Helvetica,sans-serif;}
body{font-family: \"{$bodyFont}\",Arial,Helvetica,sans-serif;}
h1,
h2,
h3,
h4,
h5,
h6{font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
blockquote{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.bt-content-holder table td.product-name{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
body.btHeadlineOverlay_alternate .btPageHeadline:before{background-color: {$alternateColorLight};}
body.btHeadlineOverlay_accent .btPageHeadline:before{background-color: {$accentColorLight};}
.bt-no-search-results .bt_bb_port #searchform input[type='submit']{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;}
.mainHeader{
    font-family: \"{$menuFont}\",Arial,Helvetica,sans-serif;}
.menuPort{
    font-family: \"{$menuFont}\",Arial,Helvetica,sans-serif;}
.menuPort nav > ul > li > a{line-height: {$logoHeight}px;}
.btTextLogo{
    line-height: {$logoHeight}px;
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.bt-logo-area .logo img{height: {$logoHeight}px;}
body.btMenuHorizontal .subToggler{
    line-height: {$logoHeight}px;}
.btMenuHorizontal .topBarInMenu{
    height: {$logoHeight}px;}
.btStickyHeaderActive.btMenuHorizontal .mainHeader .bt-logo-area .logo img,
.btStickyHeaderActive.btMenuFullScreenCenter .mainHeader .bt-logo-area .logo img{height: {$stickyLogoHeight}px;}
.btStickyHeaderActive.btMenuHorizontal .mainHeader .bt-logo-area .btTextLogo,
.btStickyHeaderActive.btMenuFullScreenCenter .mainHeader .bt-logo-area .btTextLogo{
    line-height: {$stickyLogoHeight}px;}
.btStickyHeaderActive.btMenuHorizontal .mainHeader .bt-logo-area .menuPort nav > ul > li > a,
.btStickyHeaderActive.btMenuHorizontal .mainHeader .bt-logo-area .menuPort nav > ul > li > .subToggler,
.btStickyHeaderActive.btMenuFullScreenCenter .mainHeader .bt-logo-area .menuPort nav > ul > li > a,
.btStickyHeaderActive.btMenuFullScreenCenter .mainHeader .bt-logo-area .menuPort nav > ul > li > .subToggler{line-height: {$stickyLogoHeight}px;}
.btStickyHeaderActive.btMenuHorizontal .mainHeader .bt-logo-area .topBarInMenu,
.btStickyHeaderActive.btMenuFullScreenCenter .mainHeader .bt-logo-area .topBarInMenu{height: {$stickyLogoHeight}px;}
.btMenuHorizontal .topBarInLogoArea{
    height: {$logoHeight}px;}
.btMenuFullScreenCenter .topBarInLogoArea{height: {$logoHeight}px;}
.btPagination{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;}
.btPrevNextNav .btPrevNext .btPrevNextItem .btPrevNextTitle{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.btPrevNextNav .btPrevNext .btPrevNextItem .btPrevNextDir{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt-comments-box .commentTxt p.edit-link,
.bt-comments-box .commentTxt p.reply{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;}
.bt-comments-box .comment-navigation a,
.bt-comments-box .comment-navigation span{
    font-family: \"{$headingSubTitleFont}\",Arial,Helvetica,sans-serif;}
a#cancel-comment-reply-link{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;}
.bt-comment-submit .btnInnerText{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;}
.widget_calendar table caption{font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.widget_rss li a.rsswidget{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.widget_rss li .rss-date{
    font-family: \"{$headingSubTitleFont}\",Arial,Helvetica,sans-serif;}
.widget_rss li cite{
    font-family: \"{$headingSubTitleFont}\",Arial,Helvetica,sans-serif;}
.widget_shopping_cart .total{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.menuPort .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetIcon span.cart-contents,
.topTools .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetIcon span.cart-contents,
.topBarInLogoArea .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetIcon span.cart-contents{font: normal 10px/1 \"{$menuFont}\";}
.widget_recent_reviews li a .product-title{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.widget_recent_reviews li .reviewer{font-family: \"{$headingSubTitleFont}\",Arial,Helvetica,sans-serif;}
.btBox .tagcloud a,
.btTags ul a{
    font-family: \"{$bodyFont}\",Arial,Helvetica,sans-serif;}
.topBarInMenu .btIconWidgetContent .btIconWidgetTitle{font-family: \"{$bodyFont}\",Arial,Helvetica,sans-serif;}
.topBarInMenu .btIconWidgetContent .btIconWidgetText{font-family: \"{$bodyFont}\",Arial,Helvetica,sans-serif;}
.btSearchInner.btFromTopBox .btSearchInnerClose .bt_bb_icon:hover a.bt_bb_icon_holder{color: {$accentColorDark};}
.bt_bb_divider{
    max-height: {$logoHeight}px;}
.btMenuVertical .bt_bb_divider{
    max-width: {$logoHeight}px;}
.bt_bb_headline .bt_bb_headline_superheadline{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_headline.bt_bb_subheadline .bt_bb_headline_subheadline{
    font-family: \"{$headingSubTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_button .bt_bb_button_text{font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_service .bt_bb_service_content .bt_bb_service_content_supertitle{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_service .bt_bb_service_content .bt_bb_service_content_title{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_service .bt_bb_service_content .bt_bb_service_content_text{font-family: \"{$bodyFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_progress_bar .bt_bb_progress_bar_text_above span{
    font-family: \"{$bodyFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_color_scheme_accent.bt_bb_progress_bar .bt_bb_progress_bar_bg_cover .bt_bb_progress_bar_bg{background-color: {$accentColorLighter};}
.bt_bb_color_scheme_alternate.bt_bb_progress_bar .bt_bb_progress_bar_bg_cover .bt_bb_progress_bar_bg{background-color: {$alternateColorLighter};}
.bt_bb_latest_posts .bt_bb_latest_posts_item .bt_bb_latest_posts_item_content .bt_bb_latest_posts_item_meta > span{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_latest_posts .bt_bb_latest_posts_item .bt_bb_latest_posts_item_content .bt_bb_latest_posts_read_more a{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_masonry_post_grid .bt_bb_post_grid_filter .bt_bb_post_grid_filter_item{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_masonry_post_grid .bt_bb_grid_item .bt_bb_grid_item_inner .bt_bb_grid_item_post_content .bt_bb_grid_item_category > a{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_masonry_post_grid .bt_bb_grid_item .bt_bb_grid_item_inner .bt_bb_grid_item_post_content .bt_bb_grid_item_category .post-categories{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_tabs ul.bt_bb_tabs_header li .bt_bb_tab_title{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_counter_holder .bt_bb_counter span.onedigit{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_price_list .bt_bb_price_list_title{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_price_list .bt_bb_price_list_price{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_accordion .bt_bb_accordion_item .bt_bb_accordion_item_title{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_progress_bar_advanced .container .bt_bb_progress_bar_advanced_text{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.wpcf7-form .wpcf7-submit{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif !important;}
.btContactForm .btContactLabel{font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_testimonial .bt_bb_testimonial_text span{
    font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_interactive_image_item_dot .bt_bb_interactive_image_item_dot_tooltip .bt_bb_interactive_image_item_dot_tooltip_title{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.bt_bb_interactive_image_item .bt_bb_interactive_image_item_content .bt_bb_interactive_image_item_title{
    font-family: \"{$headingSuperTitleFont}\",Arial,Helvetica,sans-serif;}
.products ul li.product .btWooShopLoopItemInner .price,
ul.products li.product .btWooShopLoopItemInner .price{
    font-family: \"{$headingSubTitleFont}\",Arial,Helvetica,sans-serif;}
.products ul li.product .btWooShopLoopItemInner a.button,
ul.products li.product .btWooShopLoopItemInner a.button{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;}
.products ul li.product .btWooShopLoopItemInner .added_to_cart,
ul.products li.product .btWooShopLoopItemInner .added_to_cart{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;}
.products ul li.product .onsale,
ul.products li.product .onsale{
    background: {$alternateColor};}
div.product .onsale{
    background: {$alternateColor};}
table.shop_table thead th{font-family: \"{$headingFont}\",Arial,Helvetica,sans-serif;}
.woocommerce .btSidebar a.button,
.woocommerce .bt-content a.button,
.woocommerce-page .btSidebar a.button,
.woocommerce-page .bt-content a.button,
.woocommerce .btSidebar input[type=\"submit\"],
.woocommerce .bt-content input[type=\"submit\"],
.woocommerce-page .btSidebar input[type=\"submit\"],
.woocommerce-page .bt-content input[type=\"submit\"],
.woocommerce .btSidebar button[type=\"submit\"],
.woocommerce .bt-content button[type=\"submit\"],
.woocommerce-page .btSidebar button[type=\"submit\"],
.woocommerce-page .bt-content button[type=\"submit\"],
.woocommerce .btSidebar input.button,
.woocommerce .bt-content input.button,
.woocommerce-page .btSidebar input.button,
.woocommerce-page .bt-content input.button,
.woocommerce .btSidebar input.alt:hover,
.woocommerce .bt-content input.alt:hover,
.woocommerce-page .btSidebar input.alt:hover,
.woocommerce-page .bt-content input.alt:hover,
.woocommerce .btSidebar a.button.alt:hover,
.woocommerce .bt-content a.button.alt:hover,
.woocommerce-page .btSidebar a.button.alt:hover,
.woocommerce-page .bt-content a.button.alt:hover,
.woocommerce .btSidebar .button.alt:hover,
.woocommerce .bt-content .button.alt:hover,
.woocommerce-page .btSidebar .button.alt:hover,
.woocommerce-page .bt-content .button.alt:hover,
.woocommerce .btSidebar button.alt:hover,
.woocommerce .bt-content button.alt:hover,
.woocommerce-page .btSidebar button.alt:hover,
.woocommerce-page .bt-content button.alt:hover,
div.woocommerce a.button,
div.woocommerce input[type=\"submit\"],
div.woocommerce button[type=\"submit\"],
div.woocommerce input.button,
div.woocommerce input.alt:hover,
div.woocommerce a.button.alt:hover,
div.woocommerce .button.alt:hover,
div.woocommerce button.alt:hover{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;}
p.demo_store{
    background-color: {$alternateColor};}
.btQuoteBooking .btContactNext{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;}
.btQuoteBooking .btContactSubmit{
    font-family: \"{$buttonFont}\",Arial,Helvetica,sans-serif;}
", array() );