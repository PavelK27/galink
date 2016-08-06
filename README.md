# galink
[Google Analytics Link Tracking for WordPress](https://wordpress.org/plugins/ga-link-tracking-for-wysiwyg/)

The simple plugin for adding Google Analytics Event tracking links via default WordPress WYSIWYG editor - TinyMCE. Please note, that you must have Google Analytics API (analytics.js) installed on your website in order for these links to work correctly.
The plugin adds a shortcode button into the page editor and processes it when the page loads.

# Installation

1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress
1. Use the WYSIWYG editor for adding shortcodes to posts/pages via the new button with Google Analytics logo.


# Frequently Asked Questions

> I'm getting 'ga is not defined' error in console
Please check if there's analytics.js: https://developers.google.com/analytics/devguides/collection/analyticsjs/ installed on your website.

> It's still not working!
Try to install a browser extension for GA tags testing, as "Google Analytics Debugger" for example, to see if there are any errors with your codes. Also, keep in mind that you'll need to wait at least 24 hours, before events data will appear in reports. Though you can check Real-Time data in Real-Time\Events section of your GA panel.

# Screenshots

1. A new button which the plugin adds
2. A pop-up window with link options
3. A shortcode added into content area
4. Processed shortcode in page content
5. Google Analytics screenshot with Real-Time events data

# Changelog 

# 1.0
First version with basic functionality

# Upgrade Notice
No upgrades so far!