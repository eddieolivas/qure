<?php if(is_page(14)) {
	dynamic_sidebar('sidebar-primary');
} elseif(is_page(16)) {
	dynamic_sidebar('sidebar-whatis');
} elseif(is_page(37)) {
	dynamic_sidebar('sidebar-reviews');
} elseif(is_page(366)) {
	dynamic_sidebar('sidebar-studies');
} else {
	return true;
} ?>
