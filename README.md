# Custom Portfolio WordPress Plugin

A WordPress plugin that manages and displays portfolio items with category organization.

## Core Features

The plugin creates a custom post type 'Portfolio' with integrated category management and frontend display capabilities.

### Post Type Features
- Title and content editor support
- Featured image capability
- Custom taxonomy: Portfolio Category
- Frontend display via shortcode

### Display Features
- Shortcode: `[portfolio]`
- Responsive grid layout
- Category badges for each item

## Installation

1. Upload the plugin directory to `/wp-content/plugins/`
2. Activate through WordPress admin panel
3. Use the Portfolio menu item to add content
4. Display using `[portfolio]` shortcode

## Usage

### Adding Portfolio Items
1. Navigate to Portfolio in admin dashboard
2. Create new portfolio items with titles, content, and images
3. Assign categories as needed

### Frontend Display
Insert `[portfolio]` shortcode in any post or page to display the portfolio grid.

## File Structure

```
custom-portfolio/
├── includes/
│   ├── class-custom-portfolio.php
│   ├── class-custom-portfolio-activator.php
│   ├── class-custom-portfolio-deactivator.php
│   ├── class-custom-portfolio-post-type.php
│   └── class-custom-portfolio-shortcode.php
├── public/
│   └── css/
│       └── custom-portfolio.css
└── custom-portfolio.php
```

## Actions and Filters

- `custom_portfolio_init`: Fires during plugin initialization
- `portfolio_shortcode_output`: Filters the shortcode output

## Q3 Bonus Features

### Content Import/Export
- CSV file support for bulk content management
- Category mapping functionality
- Media file handling
- Import/Export page in admin panel

### Shortcode Enhancements
- Category filtering options
- Custom grid layouts
- Sorting parameters
- Items per page control

## Credit

Built by: Abiola Akande
Version: 1.0.0
Requires WordPress: 6.0+