




/*
* global function
*/
// for home
if ( act == '' ) {
	___eb_global_home_runing( function () {
		
		//
		/*
		var a = $('#main_in_left').html() || '';
		
		if ( a != '' ) {
			a = '<div id="main_in_left" class="' + ( $('#main_in_left').attr('class') || '' ) + '">' + a + '</div>';
			
			$('#main_in_left').remove();
			
			$('#main_in_right').after(a);
			
			$('#main').removeClass('left-menu-space').addClass('right-menu-space');
		}
		*/
		
		
	});
}
// end home



// archive (category/ blog)
else if ( act == 'archive' ) {
	
	// category
	if ( switch_taxonomy == 'category'
	|| switch_taxonomy == 'post_tag'
	|| switch_taxonomy == 'post_options' ) {
		
		//
		___eb_list_post_run( function () {
		});
		
	}
	// blog
	else {
		___eb_global_blogs_runing( function () {
		});
	}
	
}
// end archive



// for details
else if ( act == 'single' ) {
	WGR_for_post_details();
}
// end details



// for contact
else if ( act == 'contact' ) {
	_global_js_eb.contact_func();
}
// end contact

// for cart
else if ( act == 'cart' ) {
	_global_js_eb.cart_func();
}
// end cart

// for 404
else if ( act == '404' ) {
	_global_js_eb.page404_func();
}
// end 404






// hệ thống banner quảng cáo
//___eb_logo_doitac_chantrang(6);
//___eb_thread_details_timeend();
//___eb_thread_list_li();
//___eb_add_space_for_breadcrumb();
//___eb_click_open_video_popup();


// fix menu khi cuộn chuột
//___eb_fix_left_right_menu();



// module mạng xã hội add xuống cuối file để ưu tiên giao diện chính của web được chạy trước
//___eb_add_href_for_fb();




