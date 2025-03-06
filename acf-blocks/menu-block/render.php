<?php
/**
 * Render the menu block.
 * 
 * @package version-original
 */

$menu_items = get_field('menu_sections', 'option');

?>

<div class="menu-block">
    <h2>Menu Block</h2>
    <?php var_dump($menu_items); ?>
</div>