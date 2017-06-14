<?php






/*
* Danh sách menu, dùng cái nào thì bỏ comment đi, rồi echo vào vị trí cần nhúng
*/
$arr_tmp_top_menu[] = $func->echbay_menu( 'top-menu-01' );

$arr_tmp_top_menu[] = $func->echbay_menu( 'top-menu-02' );

$arr_tmp_top_menu[] = $func->echbay_menu( 'top-menu-03' );




//
$arr_tmp_footer_menu[] = $func->echbay_menu(
	'footer-menu-01',
	array(
		'menu_class' => 'bottom-node',
	),
	1,
	'<div class="footer-title upper">'
);

$arr_tmp_footer_menu[] = $func->echbay_menu(
	'footer-menu-02',
	array(
		'menu_class' => 'bottom-node',
	),
	1,
	'<div class="footer-title upper">'
);

$arr_tmp_footer_menu[] = $func->echbay_menu(
	'footer-menu-03',
	array(
		'menu_class' => 'bottom-node',
	),
	1,
	'<div class="footer-title upper">'
);

$arr_tmp_footer_menu[] = $func->echbay_menu(
	'footer-menu-04',
	array(
		'menu_class' => 'bold bottom-contact',
	),
	1,
	'<div class="footer-title upper">'
);

$arr_tmp_footer_menu[] = $func->echbay_menu(
	'footer-menu-05',
	array(
		'menu_class' => 'bottom-nav'
	),
	1,
	'<div class="medium18 bold upper">'
);





/*
* gọi đến file common với các tham số dùng chung
*/
include_once EB_THEME_PLUGIN_INDEX . 'common.php';

?>
<!DOCTYPE html>
<html lang="<?php echo $__cf_row['cf_content_language']; ?>" class="no-js no-svg" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<?php
include EB_THEME_PLUGIN_INDEX . 'header.php';
?>
<!--Thêm class tượng trưng cho mỗi trang lên <body> để tùy biến-->
<body class="<?php echo $css_m_css; ?>">
<header id="header">
	<div class="top-top-login default-2bg hide-if-mobile">
		<div class="cf <?php echo $__cf_row['cf_blog_class_style']; ?>">
			<div class="lf f50"><a href="mailto:<?php echo $__cf_row['cf_email']; ?>" rel="nofollow" target="_blank"><i class="fa fa-envelope-o orgcolor"></i> <?php echo $__cf_row['cf_email']; ?></a> &nbsp; <span class="phone-numbers-inline"><i class="fa fa-phone orgcolor"></i> <?php echo $__cf_row['cf_call_dienthoai']; ?></span></div>
			<div class="lf f50">
				<div class="rf cf top-top-ul"><?php echo $arr_tmp_top_menu[0]; ?>
					<ul class="cf">
						<li><a title="Giỏ hàng" href="actions/cart" class="btn-to-cart"><i class="fa fa-shopping-cart"></i> Giỏ hàng (<span class="show_count_cart">0</span>)</a></li>
						<li>
							<div id="oi_member_func" class="oi_member_func"></div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="web-top-logo cf <?php echo $__cf_row['cf_blog_class_style']; ?>">
		<div class="lf f25 cf fullsize-if-mobile"><a href="./" class="web-logo d-block" style="background-image:url('<?php echo $__cf_row['cf_logo']; ?>');">&nbsp;</a></div>
		<div class="lf f75 hide-if-mobile cf">
			<div class="lf f62">
				<div class="div-search-margin">
					<div class="div-search">
						<form role="search" method="get" action="<?php echo web_link; ?>">
							<input type="search" placeholder="Tìm kiếm sản phẩm" value="<?php echo $current_search_key; ?>" name="s" aria-required="true" required>
							<input type="hidden" name="post_type" value="post" />
							<button type="submit" class="cur default-bg"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<div id="oiSearchAjax"></div>
				</div>
			</div>
			<div class="lf f38 text-right">
				<div class="nav-mobile-hotline aorgcolor"><i class="fa fa-phone"></i> <?php echo $__cf_row['cf_call_hotline']; ?></div>
			</div>
		</div>
	</div>
	<div class="top-nav default-bg hide-if-mobile">
		<div class="cf <?php echo $__cf_row['cf_blog_class_style']; ?>">
			<div class="lf f25">
				<div id="nav"><?php echo $arr_tmp_top_menu[1]; ?></div>
			</div>
			<div class="lf f75 cf">
				<div class="lf f75">
					<div class="nav-about"><?php echo $arr_tmp_top_menu[2]; ?></div>
				</div>
				<div class="lf f25 text-right d-none show-if-scroll awhitecolor medium18"><i class="fa fa-phone"></i> <?php echo $__cf_row['cf_call_hotline']; ?></div>
			</div>
		</div>
	</div>
</header>
<!-- main -->
<div id="container">
	<div class="hide-if-mobile"><?php echo $str_big_banner; ?></div>
	<div class="thread-details-tohome">
		<div class="<?php echo $__cf_row['cf_blog_class_style']; ?>">
			<ul class="cf">
				<li><a href="./"><i class="fa fa-home"></i> Trang chủ</a></li>
				<?php echo $group_go_to; ?>
			</ul>
		</div>
	</div>
	<section id="main-content">
		<div id="main" style="min-height:300px;">
			<div id="rME"><?php echo $main_content; ?></div>
		</div>
		<div class="sponsor-top-desktop">
			<div class="home-btn-chantrang text-center <?php echo $__cf_row['cf_blog_class_style']; ?>">
				<div class="home-prev-chantrang"><i class="fa fa-angle-left"></i></div>
				<div class="home-next-chantrang"><i class="fa fa-angle-right"></i></div>
				<div data-num="6" class="banner-chan-trang"><?php echo $func->load_ads( 5, 12, $__cf_row['cf_other_banner_size'] ); ?></div>
			</div>
		</div>
	</section>
	<section id="sidebar"></section>
</div>
<br>
<!-- footer -->
<footer id="footer">
	<div class="bottom-slogan">
		<div class="<?php echo $__cf_row['cf_blog_class_style']; ?>">
			<ul data-width="240" class="fix-li-wit cf l19 bold upper">
				<li>
					<div><i class="fa fa-refresh"></i> Đổi hàng<br />
						trong 7 ngày</div>
				</li>
				<li>
					<div><i class="fa fa-truck"></i> Giao hàng miễn phí<br />
						Toàn Quốc</div>
				</li>
				<li>
					<div><i class="fa fa-dollar"></i> Thanh toán<br />
						khi giao hàng</div>
				</li>
				<li>
					<div><i class="fa fa-check-square"></i> Bảo hành VIP<br />
						12 tháng</div>
				</li>
			</ul>
		</div>
	</div>
	<div class="site-footer-inner default-2bg">
		<div class="<?php echo $__cf_row['cf_blog_class_style']; ?>">
			<div class="cf">
				<div class="lf f25 fullsize-if-mobile">
					<div class="footer-title upper"><?php echo $__cf_row['cf_ten_cty']; ?></div>
					<div class="l19"><i class="fa fa-location-arrow orgcolor"></i> <?php echo nl2br( $__cf_row['cf_diachi'] ); ?><br>
						<i class="fa fa-phone orgcolor"></i> <?php echo $__cf_row['cf_call_hotline']; ?> - <span class="phone-numbers-inline"><?php echo $__cf_row['cf_call_dienthoai']; ?></span><br>
						<i class="fa fa-envelope-o orgcolor"></i> <a href="mailto:<?php echo $__cf_row['cf_email']; ?>" rel="nofollow" target="_blank"><?php echo $__cf_row['cf_email']; ?></a><br>
					</div>
					<br>
					<div><?php echo $arr_tmp_footer_menu[3]; ?></div>
					<hr class="orgborder one-line" />
					<div><i class="fa fa-star greencolor l25"></i> Kết nối với chúng tôi</div>
					<ul class="footer-social text-center cf">
						<li class="footer-social-fb"><a href="javascript:;" class="ahref-to-facebook" target="_blank" rel="nofollow"><i class="fa fa-facebook"></i></a></li>
						<li class="footer-social-tw"><a href="javascript:;" class="each-to-twitter-page" target="_blank" rel="nofollow"><i class="fa fa-twitter"></i></a></li>
						<li class="footer-social-yt"><a href="javascript:;" class="each-to-youtube-chanel" target="_blank" rel="nofollow"><i class="fa fa-youtube"></i></a></li>
						<li class="footer-social-gg"><a href="javascript:;" class="ahref-to-gooplus" target="_blank" rel="nofollow"><i class="fa fa-google-plus"></i></a></li>
					</ul>
					<br>
				</div>
				<div class="lf f25 fullsize-if-mobile">
					<div class="left-menu-space"><?php echo $arr_tmp_footer_menu[0]; ?></div>
					<br>
				</div>
				<div class="lf f25 fullsize-if-mobile">
					<div class="left-menu-space"><?php echo $arr_tmp_footer_menu[1]; ?></div>
					<br>
				</div>
				<div class="lf f25 fullsize-if-mobile">
					<div class="left-menu-space"><?php echo $arr_tmp_footer_menu[2]; ?></div>
					<br>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-site-info text-center">Bản quyền &copy; <?php echo $year_curent; ?> <span><?php echo $web_name; ?></span> - Toàn bộ phiên bản. <?php echo $str_fpr_license_echbay; ?></div>
</footer>
<?php
include EB_THEME_PLUGIN_INDEX . 'footer.php';
?>
</body>
</html>