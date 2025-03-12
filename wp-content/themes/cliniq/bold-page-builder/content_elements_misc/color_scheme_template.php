<?php

$custom_css = "


	/* Section
	---------------------------------------------------------------------------------------------------------------------------------------------------------------- */
	
/*	.bt_bb_section.bt_bb_color_scheme_{$scheme_id} {
		color: {$color_scheme[1]};
		background-color: {$color_scheme[2]};
	}
*/

	/* Column
	---------------------------------------------------------------------------------------------------------------------------------------------------------------- */
	
	.bt_bb_inner_color_scheme_{$scheme_id}.bt_bb_column .bt_bb_column_content {
		color: {$color_scheme[1]};
		background-color: {$color_scheme[2]};
	}


	/* Inner Column
	---------------------------------------------------------------------------------------------------------------------------------------------------------------- */
	
	.bt_bb_inner_color_scheme_{$scheme_id}.bt_bb_column_inner .bt_bb_column_inner_content {
		color: {$color_scheme[1]};
		background-color: {$color_scheme[2]};
	}


	/* Headline
	---------------------------------------------------------------------------------------------------------------------------------------------------------------- */
	
/*	.bt_bb_color_scheme_{$scheme_id}.bt_bb_headline {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_headline .bt_bb_headline_superheadline {
		color: {$color_scheme[2]};
	}
*/
	.bt_bb_headline.bt_bb_supertitle_color_scheme_{$scheme_id} .bt_bb_headline_superheadline {
		color: {$color_scheme[1]} !important;
	}

/*	.bt_bb_headline.bt_bb_dash_top_bottom.bt_bb_color_scheme_{$scheme_id} .bt_bb_headline_superheadline,
	.bt_bb_headline.bt_bb_dash_top.bt_bb_color_scheme_{$scheme_id} .bt_bb_headline_superheadline {
		color: {$color_scheme[1]};
	}
	.bt_bb_headline.bt_bb_dash_top_bottom.bt_bb_color_scheme_{$scheme_id} .bt_bb_headline_superheadline:before,
	.bt_bb_headline.bt_bb_dash_top.bt_bb_color_scheme_{$scheme_id} .bt_bb_headline_superheadline:before {
		background: {$color_scheme[2]};
	}
*/	
	.bt_bb_headline.bt_bb_dash_top_bottom.bt_bb_supertitle_color_scheme_{$scheme_id} .bt_bb_headline_superheadline,
	.bt_bb_headline.bt_bb_dash_top.bt_bb_supertitle_color_scheme_{$scheme_id} .bt_bb_headline_superheadline {
		color: {$color_scheme[1]} !important;
	}
	.bt_bb_headline.bt_bb_dash_top_bottom.bt_bb_supertitle_color_scheme_{$scheme_id} .bt_bb_headline_superheadline:before,
	.bt_bb_headline.bt_bb_dash_top.bt_bb_supertitle_color_scheme_{$scheme_id} .bt_bb_headline_superheadline:before {
		background: {$color_scheme[2]} !important;
	}


	/* Icons
	---------------------------------------------------------------------------------------------------------------------------------------------------------------- */
	
/*	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon a {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon:hover a {
		color: {$color_scheme[2]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon a span:before {
		background: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon a:hover span:before {
		background: {$color_scheme[1]};
	}

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_outline .bt_bb_icon_holder:before {
		background-color: transparent;
		box-shadow: 0 0 0 1px {$color_scheme[1]} inset;
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_outline:hover .bt_bb_icon_holder:before {
		background-color: transparent;
		box-shadow: 0 0 0 1px {$color_scheme[1]} inset;
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_outline:hover a.bt_bb_icon_holder:before {
		background-color: {$color_scheme[1]};
		box-shadow: 0 0 0 1px {$color_scheme[1]} inset;
		color: {$color_scheme[2]};
	}


	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_filled .bt_bb_icon_holder:before {
		box-shadow: 0 0 0 3em {$color_scheme[2]} inset;
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_filled:hover .bt_bb_icon_holder:before {
		box-shadow: 0 0 0 3em {$color_scheme[2]} inset;
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_filled:hover a.bt_bb_icon_holder:before {
		box-shadow: 0 0 0 3em {$color_scheme[2]} inset;
		background-color: {$color_scheme[2]};
		color: {$color_scheme[1]};
	}


	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_borderless .bt_bb_icon_holder:before {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_borderless:hover .bt_bb_icon_holder:before {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_borderless:hover a.bt_bb_icon_holder:before {
		color: {$color_scheme[2]};
	}
*/
	.bt_bb_text_color_scheme_{$scheme_id}.bt_bb_icon .bt_bb_icon_holder > span {
		color: {$color_scheme[1]};
	}
	.bt_bb_text_color_scheme_{$scheme_id}.bt_bb_icon:hover a.bt_bb_icon_holder > span  {
		color: {$color_scheme[1]};
	}
	.bt_bb_text_color_scheme_{$scheme_id}.bt_bb_icon a.bt_bb_icon_holder > span:before  {
		background: {$color_scheme[1]};
	}
	.bt_bb_text_color_scheme_{$scheme_id}.bt_bb_icon a.bt_bb_icon_holder:hover > span:before  {
		background: {$color_scheme[1]};
	}
	

	/* Buttons
	---------------------------------------------------------------------------------------------------------------------------------------------------------------- */
	
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_outline a {
		box-shadow: 0 0 0 1px {$color_scheme[1]} inset;
		color: {$color_scheme[1]};
		background-color: transparent;
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_outline:hover a {
		box-shadow: 0 0 0 4em {$color_scheme[1]} inset;
		color: {$color_scheme[2]};
		background-color: transparent;
	}

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_filled a {
		box-shadow: 0 0 0 4em {$color_scheme[2]} inset;
		color: {$color_scheme[1]};
		background-color: {$color_scheme[2]};
	}

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_filled:hover a {
		box-shadow: 0 0 0 1px {$color_scheme[2]} inset;
		color: {$color_scheme[2]};
		background-color: {$color_scheme[1]};
	}


	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_special_outline a {
		box-shadow: 0 0 0 1px {$color_scheme[2]} inset;
		color: {$color_scheme[1]};
		background-color: transparent;
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_special_outline a:hover {
		box-shadow: 0 0 0 4em {$color_scheme[2]} inset;
		color: {$color_scheme[1]};
	}

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_clean a,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_borderless a {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_clean a:hover,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_icon.bt_bb_style_borderless:hover a {
		color: {$color_scheme[2]};
	}


	.bt_bb_icon_color_scheme_{$scheme_id}.bt_bb_button .bt_bb_icon_holder {
		color: {$color_scheme[1]};
	}
	.bt_bb_icon_color_scheme_{$scheme_id}.bt_bb_button a:hover .bt_bb_icon_holder {
		color: {$color_scheme[2]};
	}


	/* Services
	---------------------------------------------------------------------------------------------------------------------------------------------------------------- */
	
/*	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline.bt_bb_service .bt_bb_icon_holder,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline.bt_bb_service:hover .bt_bb_icon_holder {
		box-shadow: 0 0 0 1px {$color_scheme[1]} inset;
		color: {$color_scheme[1]};
		background-color: transparent;
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_outline.bt_bb_service.btWithLink:hover .bt_bb_icon_holder {
		box-shadow: 0 0 0 5em {$color_scheme[1]} inset, 0 0 5px 1px rgb(0 0 0 / 15%);
		background-color: {$color_scheme[1]};
		color: {$color_scheme[2]};
	}

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled.bt_bb_service .bt_bb_icon_holder,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled.bt_bb_service:hover .bt_bb_icon_holder {
		box-shadow: 0 0 0 5em {$color_scheme[2]} inset;
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled.btWithLink.bt_bb_service:hover .bt_bb_icon_holder	{
		box-shadow: 0 0 0 5em {$color_scheme[2]} inset, 0 0 5px 1px rgb(0 0 0 / 15%);
		background-color: {$color_scheme[2]};
		color: {$color_scheme[1]};
	}

	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_borderless.bt_bb_service .bt_bb_icon_holder,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_borderless.bt_bb_service:hover .bt_bb_icon_holder {
		color: {$color_scheme[1]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_borderless.btWithLink.bt_bb_service:hover .bt_bb_icon_holder {
		color: {$color_scheme[2]};
	}
/*
	/* Tabs
	---------------------------------------------------------------------------------------------------------------------------------------------------------------- */
	
/*	.bt_bb_color_scheme_{$scheme_id}.bt_bb_tabs.bt_bb_style_filled .bt_bb_tabs_header li:hover,
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_tabs.bt_bb_style_filled .bt_bb_tabs_header li.on {
		color: {$color_scheme[1]};
		background-color: {$color_scheme[2]};
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_tabs.bt_bb_style_filled .bt_bb_tabs_header li {
		color: {$color_scheme[1]};
		background-color: transparent;
	}
	.bt_bb_color_scheme_{$scheme_id}.bt_bb_tabs.bt_bb_style_filled .bt_bb_tab_content {
		background-color: {$color_scheme[2]};
	}

	@media(max-width: 580px) {
		.bt_bb_color_scheme_{$scheme_id}.bt_bb_tabs.bt_bb_style_filled .bt_bb_tabs_header li {
			color: {$color_scheme[1]};
			background-color: {$color_scheme[2]};
		}
	}
*/

	/* Accordion
	---------------------------------------------------------------------------------------------------------------------------------------------------------------- */
	
/*	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_simple .bt_bb_accordion_item .bt_bb_accordion_item_title {
		color: {$color_scheme[1]};
	}
	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_simple .bt_bb_accordion_item .bt_bb_accordion_item_title:after {
		color: {$color_scheme[1]};
	}

	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_simple .bt_bb_accordion_item .bt_bb_accordion_item_title:hover {
		color: {$color_scheme[2]};
		border-color: {$color_scheme[1]};
	}
	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_simple .bt_bb_accordion_item .bt_bb_accordion_item_title:hover:after {
		color: {$color_scheme[2]};
	}
	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_simple .bt_bb_accordion_item.on .bt_bb_accordion_item_content {
		border-color: {$color_scheme[1]} !important;
	}

	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_simple .bt_bb_accordion_item.on .bt_bb_accordion_item_title {
		color: {$color_scheme[1]};
		border-color: {$color_scheme[1]};
	}
	.bt_bb_accordion.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_simple .bt_bb_accordion_item.on .bt_bb_accordion_item_title:hover {
		color: {$color_scheme[2]};
	}
*/

	/* Price List
	---------------------------------------------------------------------------------------------------------------------------------------------------------------- */
	
	.bt_bb_price_list.bt_bb_color_scheme_{$scheme_id} {
		border-color: {$color_scheme[2]};
		background: {$color_scheme[2]};
		color: {$color_scheme[1]};
	}
	.bt_bb_price_list.bt_bb_color_scheme_{$scheme_id} .bt_bb_price_list_title {
		color: inherit;
	}
	.bt_bb_price_list.bt_bb_color_scheme_{$scheme_id} .bt_bb_price_list_price,
	.bt_bb_price_list.bt_bb_color_scheme_{$scheme_id} .bt_bb_price_list_subtitle,
	.bt_bb_price_list.bt_bb_color_scheme_{$scheme_id} ul li {
		color: {$color_scheme[1]};
	}



	/* Working Hours
	---------------------------------------------------------------------------------------------------------------------------------------------------------------- */
	
/*	.bt_bb_working_hours.bt_bb_color_scheme_{$scheme_id} {
		color: {$color_scheme[2]};
	}
	.bt_bb_working_hours.bt_bb_color_scheme_{$scheme_id} .bt_bb_working_hours_button .bt_bb_button a {
		box-shadow: 0 0 0 4em {$color_scheme[2]} inset !important;
		background-color: {$color_scheme[1]} !important;
		color: {$color_scheme[1]} !important;
	}

	.bt_bb_working_hours.bt_bb_color_scheme_{$scheme_id} .bt_bb_working_hours_button .bt_bb_button a:hover {
		box-shadow: 0 0 0 4em {$color_scheme[2]} inset, 0 4px 10px 0px #a5a5a5a3 !important;
		background-color: {$color_scheme[1]} !important;
		color: {$color_scheme[1]} !important;
	}
*/


";