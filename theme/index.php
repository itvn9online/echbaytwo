<?php

// gọi đến file common với các tham số dùng chung
include_once EB_THEME_PLUGIN_INDEX . 'common.php';

?>
<!DOCTYPE html>
<html lang="<?php echo $__cf_row['cf_content_language']; ?>" class="no-js no-svg" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<?php
include EB_THEME_PLUGIN_INDEX . 'header.php';
?>
<!--Thêm class tượng trưng cho mỗi trang lên <body> để tùy biến-->
<body class="<?php echo $css_m_css; ?>">
<?php

include EB_THEME_PLUGIN_INDEX . 'top.php';

include EB_THEME_PLUGIN_INDEX . 'container.php';

include EB_THEME_PLUGIN_INDEX . 'footer.php';

?>
</body>
</html>