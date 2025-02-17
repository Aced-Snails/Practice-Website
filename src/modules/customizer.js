(function($) {
    // Common function to update text, color, and font size dynamically
    function updateCustomization(setting, selector, property) {
        wp.customize(setting, function(value) {
            value.bind(function(newval) {
                if (property === 'text') {
                    $(selector).text(newval); // Update text content
                } else if (property === 'font-size' && !isNaN(newval)) {
                    $(selector).css(property, newval + 'px'); // Update font size
                } else if (property === 'background-color' && (newval.includes('rgba') || newval === 'transparent')) {
                    $(selector).css(property, newval); // Allow rgba or transparent
                } else {
                    $(selector).css(property, newval); // Update color or background color
                }
            });
        });
    }

    // Arrays to hold settings and selectors for colors, text, and font size
    const settings = [
        { setting: 'header_background_color_setting', selector: 'header', property: 'background-color' },
        { setting: 'hero_background_color_setting', selector: '.hero-overall-container', property: 'background-color' },
        { setting: 'featured_1_background_color_setting', selector: '.weapons-container', property: 'background-color' },
        { setting: 'featured_2_background_color_setting', selector: '.armor-container', property: 'background-color' },
        { setting: 'overall_featured_color_setting', selector: '.overall-featured-container', property: 'background-color' },
        { setting: 'location_background_color_setting', selector: '.locations-container-all', property: 'background-color' }, // Supports transparency
        { setting: 'footer_background_color_setting', selector: 'footer', property: 'background-color' },
        { setting: 'hero_title_color_setting', selector: '.hero-title', property: 'color' },
        { setting: 'hero_subtitle_color_setting', selector: '.hero-subtitle', property: 'color' },
        { setting: 'featured_title_1_color_setting', selector: '.featured-title-1', property: 'color' },
        { setting: 'featured_title_2_color_setting', selector: '.featured-title-2', property: 'color' },
        { setting: 'location_title_color_setting', selector: '.location-title', property: 'color' },
        { setting: 'header_text_color_setting', selector: 'nav ul li a', property: 'color' },
        { setting: 'hero_title', selector: '.hero-title', property: 'text' },
        { setting: 'hero_subtitle', selector: '.hero-subtitle', property: 'text' },
        { setting: 'featured_title_1', selector: '.featured-title-1', property: 'text' },
        { setting: 'featured_title_2', selector: '.featured-title-2', property: 'text' },
        { setting: 'location_title', selector: '.location-title', property: 'text' },
        { setting: 'disclaimer_setting', selector: '.disclaimer', property: 'text' },
        { setting: 'hero_title_fontsize_setting', selector: '.hero-title', property: 'font-size' },
        { setting: 'hero_subtitle_fontsize_setting', selector: '.hero-subtitle', property: 'font-size' },
        { setting: 'featured_title_1_fontsize_setting', selector: '.featured-title-1', property: 'font-size' },
        { setting: 'featured_title_2_fontsize_setting', selector: '.featured-title-2', property: 'font-size' },
        { setting: 'location_title_fontsize_setting', selector: '.location-title', property: 'font-size' },
        { setting: 'header_fontsize_setting', selector: 'nav ul li a', property: 'font-size' },
    ];

    // Loop through all settings and update customization
    settings.forEach(function(item) {
        updateCustomization(item.setting, item.selector, item.property);
    });

})(jQuery);
