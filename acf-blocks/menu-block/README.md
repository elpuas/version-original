# Restaurant Menu Block

This block displays a restaurant menu with sections and items in a two-column layout.

## Features

- Displays menu sections with taglines and titles
- Organizes menu items in a two-column layout
- Shows dish names, descriptions, and prices
- Optional section images
- Fully responsive design

## ACF Fields Required

This block expects the following ACF fields to be set up in the Theme Options:

### Menu Sections (Repeater Field)

- **Field Name:** `menu_sections`
- **Location:** Options Page

#### Sub Fields:

1. **Section Tagline**
   - Field Name: `section_tagline`
   - Type: Text
   - Description: A short tagline for the menu section (e.g., "FRESH TASTE BUDS")

2. **Section Title**
   - Field Name: `section_title`
   - Type: Text
   - Description: The main title for the menu section (e.g., "STARTERS")

3. **Menu Items (Repeater Field)**
   - Field Name: `menu_items`
   - Sub Fields:
     - **Dish Name** (`dish_name`) - Text
     - **Dish Description** (`dish_description`) - Text
     - **Dish Price** (`dish_price`) - Text

4. **Has Section Image**
   - Field Name: `has_section_image`
   - Type: True/False
   - Description: Toggle to show/hide a section image

5. **Section Image**
   - Field Name: `section_image`
   - Type: Image
   - Description: An image to display alongside the menu section
   - Conditional Logic: Show if Has Section Image is true

## Usage

1. Add the "Restaurant Menu" block to your page
2. The block will automatically pull menu data from the Theme Options
3. Customize the menu sections and items in the Theme Options page

## Styling

The block includes responsive styling that works on all device sizes. The menu items are displayed in two columns on larger screens and stack on mobile devices. 