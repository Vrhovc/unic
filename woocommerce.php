<?php

	if (is_product()) { get_template_part( 'woocommerce', 'product' );	}
	else if (is_category()) { get_template_part( 'woocommerce', 'category' );	}
	else { get_template_part( 'woocommerce', 'default' );	}
?>
