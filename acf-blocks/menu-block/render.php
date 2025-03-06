<?php
/**
 * Render the menu block.
 * 
 * @package version-original
 */

$menu_items = get_field('menu_sections', 'option');

// Check if menu items exist
if (!$menu_items || !is_array($menu_items)) {
    return;
}
?>

<div class="menu-block">
    <?php foreach ($menu_items as $section) : 
        // Get section data
        $tagline = isset($section['section_tagline']) ? $section['section_tagline'] : '';
        $title = isset($section['section_title']) ? $section['section_title'] : '';
        $items = isset($section['menu_items']) ? $section['menu_items'] : [];
        $has_image = isset($section['has_section_image']) ? $section['has_section_image'] : false;
        $image_id = isset($section['section_image']) ? $section['section_image'] : false;
        
        // Skip if no menu items
        if (empty($items) || !is_array($items)) {
            continue;
        }
        
        // Create unique ID for section
        $section_id = sanitize_title($title);
    ?>
        <section id="<?php echo esc_attr($section_id); ?>" class="menu-section <?php echo $has_image ? 'has-image' : ''; ?>">
            <?php if ($has_image && $image_id) : ?>
                <div class="menu-section-image alignfull">
                    <?php 
                    echo wp_get_attachment_image(
                        $image_id,
                        'large',
                        false,
                        [
                            'class' => 'section-image',
                            'alt' => esc_attr(sprintf(__('%s section image', 'version-original'), $title))
                        ]
                    ); 
                    ?>
                </div>
                <?php endif; ?>
            <div class="menu-section-header">
                <?php if (!empty($tagline)) : ?>
                    <p class="menu-section-tagline"><?php echo esc_html($tagline); ?></p>
                <?php endif; ?>
                
                <?php if (!empty($title)) : ?>
                    <h2 class="menu-section-title"><?php echo esc_html($title); ?></h2>
                <?php endif; ?>
            </div>
            
            <div class="menu-section-content">
                <div class="menu-items-container">
                    <?php 
                    // Calculate items per column (divide items into two columns)
                    $total_items = count($items);
                    $items_per_column = ceil($total_items / 2);
                    
                    // First column
                    echo '<div class="menu-column">';
                    for ($i = 0; $i < $items_per_column && $i < $total_items; $i++) {
                        $dish = $items[$i];
                        $dish_name = isset($dish['dish_name']) ? $dish['dish_name'] : '';
                        $dish_description = isset($dish['dish_description']) ? $dish['dish_description'] : '';
                        $dish_price = isset($dish['dish_price']) ? $dish['dish_price'] : '';
                        ?>
                        <div class="menu-item">
                            <div class="menu-item-header">
                                <h3 class="menu-item-name"><?php echo esc_html($dish_name); ?></h3>
                                <hr class="wp-block-separator">
                                <span class="menu-item-price"><?php echo esc_html($dish_price); ?></span>
                            </div>
                            <?php if (!empty($dish_description)) : ?>
                                <p class="menu-item-description"><?php echo esc_html($dish_description); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php 
                    }
                    echo '</div>';
                    
                    // Second column (if there are enough items)
                    if ($total_items > $items_per_column) {
                        echo '<div class="menu-column">';
                        for ($i = $items_per_column; $i < $total_items; $i++) {
                            $dish = $items[$i];
                            $dish_name = isset($dish['dish_name']) ? $dish['dish_name'] : '';
                            $dish_description = isset($dish['dish_description']) ? $dish['dish_description'] : '';
                            $dish_price = isset($dish['dish_price']) ? $dish['dish_price'] : '';
                            ?>
                            <div class="menu-item">
                                <div class="menu-item-header">
                                    <h3 class="menu-item-name"><?php echo esc_html($dish_name); ?></h3>
                                    <hr class="wp-block-separator has-text-color has-white-color has-alpha-channel-opacity has-white-background-color has-background wp-container-content-1">
                                    <span class="menu-item-price"><?php echo esc_html($dish_price); ?></span>
                                </div>
                                <?php if (!empty($dish_description)) : ?>
                                    <p class="menu-item-description"><?php echo esc_html($dish_description); ?></p>
                                <?php endif; ?>
                            </div>
                        <?php 
                        }
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </section>
    <?php endforeach; ?>
</div>