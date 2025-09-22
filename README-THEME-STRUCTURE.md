# Wisdom Waypoints WordPress Theme - Complete Structure

## 📁 File Structure

```
wisdom-waypoints/
├── style.css                 # Main stylesheet with theme info
├── index.php                 # Homepage template
├── header.php                # Header template
├── footer.php                # Footer template
├── functions.php             # Theme functions and setup
├── single.php                # Single post template
├── page.php                  # Single page template
├── archive.php               # Archive pages template
├── search.php                # Search results template
├── 404.php                   # 404 error page template
├── comments.php              # Comments template
├── sidebar.php               # Sidebar template
├── searchform.php            # Search form template
├── assets/
│   ├── js/
│   │   └── main.js          # Main JavaScript file
│   └── images/
│       ├── logo.png         # Desktop logo
│       ├── logo-mobile.png  # Mobile logo
│       └── hero-bg.jpg      # Hero background image
├── template-parts/
│   ├── content.php          # Default post content template
│   └── content-none.php     # No content found template
├── inc/
│   ├── customizer.php       # Theme customizer settings
│   ├── template-functions.php # Template helper functions
│   └── template-tags.php    # Custom template tags
├── js/
│   └── customizer.js        # Customizer preview JavaScript
├── languages/
│   └── wisdom-waypoints.pot # Translation template
└── README-THEME-STRUCTURE.md # This file
```

## 🎯 Core Templates

### Required Templates
- **style.css** - Theme stylesheet with header info
- **index.php** - Main template (fallback for all)
- **functions.php** - Theme setup and functionality

### Page Templates
- **single.php** - Individual blog posts
- **page.php** - Static pages
- **archive.php** - Category, tag, date archives
- **search.php** - Search results
- **404.php** - Error page

### Partial Templates
- **header.php** - Site header
- **footer.php** - Site footer
- **sidebar.php** - Widget area
- **comments.php** - Comments section
- **searchform.php** - Search form

## 🔧 Theme Features

### Navigation
- **Desktop Menu**: Hover dropdowns with 3-level support
- **Mobile Menu**: Slide-out menu with collapsible dropdowns
- **Menu Locations**: Primary, Mobile, Footer

### Customization
- **Theme Customizer**: Live preview settings
- **Widget Areas**: Sidebar + 3 footer widget areas
- **Custom Colors**: Brand color controls
- **Hero Section**: Background image and height controls
- **Card Content**: Editable homepage card content

### WordPress Features
- **Custom Logo Support**
- **Post Thumbnails**
- **Custom Menus**
- **Widget Support**
- **Translation Ready**
- **Responsive Design**
- **Comment System**

## 🎨 Styling

### CSS Framework
- **TailwindCSS**: Utility-first CSS framework
- **Custom Colors**: Wisdom brand palette
- **Typography**: Avenir + Minion Pro fonts
- **Responsive**: Mobile-first approach

### Color Palette
- **Wisdom Red**: #962017
- **Wisdom Purple**: #663366  
- **Wisdom Teal**: #203f41
- **Getting Started**: #4a6741
- **Events**: #c5975a
- **Courses**: #6b4c93

## 📱 Responsive Design

### Breakpoints
- **Mobile**: < 768px
- **Tablet**: 768px - 1023px
- **Desktop**: ≥ 1024px

### Mobile Features
- Slide-out navigation menu
- Touch-friendly dropdowns
- Optimized typography
- Responsive images

## 🔌 Functionality

### JavaScript Features
- Mobile menu toggle
- Dropdown animations
- Smooth transitions
- Event delegation
- Customizer live preview

### PHP Features
- Custom post navigation
- Pagination
- Comment system
- Widget areas
- Menu walkers
- Template tags

## 🌐 Translation

### Files
- **wisdom-waypoints.pot** - Translation template
- **Text Domain**: wisdom-waypoints
- **All strings** wrapped in translation functions

### Usage
```php
__('Text', 'wisdom-waypoints')
_e('Text', 'wisdom-waypoints')
_x('Text', 'context', 'wisdom-waypoints')
```

## 🚀 Installation

1. **Create folder**: `wisdom-waypoints`
2. **Copy all files** to the folder
3. **Upload logos** to `assets/images/`
4. **Zip the folder**
5. **Upload** via WordPress admin
6. **Activate** the theme
7. **Customize** via Appearance → Customize

## ⚙️ Configuration

### Menus
1. Go to **Appearance → Menus**
2. Create menus for locations:
   - Primary Menu
   - Footer Menu

### Widgets
1. Go to **Appearance → Widgets**
2. Add widgets to:
   - Sidebar
   - Footer Widget Area 1-3

### Customizer
1. Go to **Appearance → Customize**
2. Configure:
   - Site Identity
   - Header Settings
   - Hero Section
   - Homepage Cards
   - Theme Colors
   - Footer Settings

## 🎯 Best Practices

### Development
- Follow WordPress coding standards
- Use proper sanitization
- Implement security measures
- Test across devices
- Validate HTML/CSS

### Performance
- Optimize images
- Minify CSS/JS
- Use proper caching
- Lazy load images
- Optimize database queries

### SEO
- Semantic HTML structure
- Proper heading hierarchy
- Alt text for images
- Meta descriptions
- Schema markup ready

This theme provides a solid foundation for the Wisdom Waypoints website with modern design, responsive layout, and extensive customization options.