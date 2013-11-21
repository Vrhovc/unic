<?php
function wp_nav_menu_select_sort($a, $b)
{
    return $a = $b;
}

function wp_nav_menu_select($args = array())
{
    $defaults = array(
        'theme_location' => '',
        'menu_class' => 'select-menu'
    );
    $args     = wp_parse_args($args, $defaults);
    if (($menu_locations = get_nav_menu_locations()) && isset($menu_locations[$args['theme_location']])) {
        $menu       = wp_get_nav_menu_object($menu_locations[$args['theme_location']]);
        $args       = array(
            'orderby' => 'menu_order',
            'output' => ARRAY_N
        );
        $menu_items = wp_get_nav_menu_items($menu->term_id, $args);
        $children   = array();
        $parents    = array();
        foreach ($menu_items as $id => $data) {
            if (empty($data->menu_item_parent)) {
                $top_level[$data->ID] = $data;
            } else {
                $children[$data->menu_item_parent][$data->ID] = $data;
            }
        }
        foreach ($top_level as $id => $data) {
            foreach ($children as $parent => $items) {
                if ($id == $parent) {
                    $menu_item[$id] = array(
                        'parent' => true,
                        'item' => $data,
                        'children' => $items
                    );
                    $parents[]      = $parent;
                }
            }
        }
        foreach ($top_level as $id => $data) {
            if (!in_array($id, $parents)) {
                $menu_item[$id] = array(
                    'parent' => false,
                    'item' => $data
                );
            }
        }
?>
            <select id="menu-<?php echo $args['theme_location'] ?>" class="<?php echo $args['menu_class'] ?>" ONCHANGE="location = this.options[this.selectedIndex].value;">
                <option value=""><?php _e( 'Navigation' ); ?></option>
                <?php foreach ( $menu_item as $id => $data ) : ?>
                    <?php if ( $data['parent'] == true ) : ?>
                        <optgroup label="<?php echo $data['item']->title ?>">
                            <option value="<?php echo $data['item']->url ?>"><?php echo $data['item']->title ?></option>
                            <?php foreach ( $data['children'] as $id => $child ) : ?>
                                <option value="<?php echo $child->url ?>"><?php echo $child->title ?></option>
                            <?php endforeach; ?>
                        </optgroup>
                    <?php else : ?>
                        <option value="<?php echo $data['item']->url ?>"><?php echo $data['item']->title ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
			<script type="text/javascript">
				jQuery('#menu-<?php echo $args['theme_location'] ?> option[value="' + document.URL + '"]').attr('selected','selected');
			</script>
        <?php
    } else {
        ?>
            <select class="menu-not-found">
                <option value=""><?php _e( 'Menu Not Found' ); ?></option>
            </select>
        <?php
    }
}

?>	