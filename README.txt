=== Cover ===

Contributors: peiche
Tags: light, white, one-column, fluid-layout, responsive-layout, custom-menu, featured-images, infinite-scroll, sticky-post

Requires at least: 4.1
Tested up to: 4.2.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Cover is a content-driven blogging theme for WordPress.

== Description ==

Built on top of Automattic’s _s (Underscores) and bundled with Font Awesome, Cover allows you to focus on your writing. There are no sidebars to mess with, just a single column view of your content.

Cover is designed for any size screen. No matter the device, Cover always looks beautiful.

Drawing special attention to featured images, from the homepage to posts, category archives to pages, your blog is made uniquely yours. Of course, you don’t have to use images. Cover’s clean typography lets your writing stand on its own.

-- Full-width featured images --

When you use a featured image in Cover, it displays as a background image behind the title. Images taller than 600 pixels will be displayed full-screen.

-- Scalable vector icons --

Cover is bundled with Font Awesome v4.3, allowing you to include any of its icons on any post or page.

-- Built for Aesop Story Engine --

Cover was built from the ground up with ASE in mind. Break out of the content area with full-width components like images, galleries, maps, and more.

-- Put widgets in their place --

Cover puts your content first, exactly where it should be. But that doesn't mean you can't have widgets and menus, and that's where the overlay comes in.

The overlay is a full-screen menu and widget display. You can define two menus (a regular one and a social media one) and as many widgets as your little heart desires. You can also put a social menu in the footer.

-- Social menus --

So, about those social menus. All you have to do is create a menu with links to your favorite social media accounts, and Cover will do the rest. It will detect the URL of the site in question and display the appropriate icon*, courtesy of Font Awesome.

*Supported sites:
- CodePen
- Dribbble
- Facebook
- Flickr
- Github
- Google+
- Instagram
- LinkedIn
- Pinterest
- RSS
- Soundcloud
- Tumblr
- Twitter
- Vimeo
- WordPress
- YouTube

-- Recommended Plugins --

Aesop Story Engine
------------------

Cover was built from the ground up with Aesop Story Engine in mind. Break out of the content area with full-width components like images, galleries, maps, and more.

Jetpack
-------

Automattic's Jetpack plugin comes packed with modules for any theme to use, but Cover is designed to work nicely with these:

- * Site Logo *
In the Customizer, you can not only set the site title and tagline, but also a site logo. You can enable and disable any combination of these three options.

- * Featured Posts *
In the Customizer (again), you'll find the option to assign a specific tag to featured posts (the default is "featured"). Tagging a post will give it a special place on your blog's home page: it's displayed larger than the normal post listing, with its featured image displayed prominently behind it. Please note that Cover currently only shows a single featured post, even though you may tag more than one post as featured.

- * Infinite Scroll *
The Infinite Scroll module already works just fine, and we're not messing with that. But Cover allows you to have a social menu in the footer, so now Jetpack responds accordingly. If you have infinite scrolling enabled and no footer menu, scrolling down will load more posts, just as it's meant to do. But if you do have a footer menu, you will see a button to click in order to load more posts. (Otherwise, you'd never see the footer!)

Color Posts
-----------

Using the Color Posts (https://wordpress.org/plugins/color-posts/) plugin will allow Cover to match the header's color to the color of a post's featured image. Please note that this plugin requires Jetpack.

== Installation ==

-- WordPress.org --

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Search for "Cover" and, once you've found the theme, click Install.
3. Click Activate to start using Cover.

-- Github --

You can download the latest from Github. Follow these steps to activate Cover:

1. Download the latest release at https://github.com/peiche/cover/releases/latest.
2. In your admin panel, go to Appearance > Themes and click the Add New button.
3. Click Upload and Choose File, then select the theme's zip file. Click Install Now.
4. Click Activate.

== FAQ ==

1. How do I set the background image behind the post title?

   When you use a featured image in Cover, it displays as a background image behind the title. Images taller than 600 pixels will be displayed full-screen.

2. Can I change the font size?

   Cover does not allow you to change the default font size. I recommend creating a child theme before making changes to the theme.

3. I am receiving an error in the Customizer, what should I do?

   Disable any caching plugins that you may have activated.

== Changelog ==

1.6.4
- Updated TGM Plugin Activation to latest version of fork that passes wp.org theme-check.
- Updated markup for accessibility.
- Updated chapter component styles in Aesop Story Engine plugin.
- Improved Headroom functionality.
- Fixed sticky map component in Aesop Story Engine plugin.
- Fixed hover opacity on image components in Aesop Story Engine plugin.
- Removed Skrollr.
- Removed author data shim to mirror _s commit.

1.6.3
- Added link on posts to view featured image.
- Added link on posts with featured images to jump straight to content.
- Added support for my fork of the Threads plugin.
- Added widget area on search overlay.
- Updated to Font Awesome 4.5.
- Fixed missing translation text in post navigation.
- Fixed color theme for Chrome on Android Lollipop.
- Fixed broken `customizer.js` link (thanks @michaelbeil).
- Stylesheet fixes.

1.6.2
- Escaped theme option outputs.
- Fixed missing margin for Minimal view.
- Updated TGM Plugin Activation class.

1.6.1
- Extended nested menu logic for all hierarchical items, including categories.
- Fixed caption styles for Aesop video components.
- Fixed featured content slider format issue.
- Added support for Naked Social Share plugin.

1.6.0
- Upgraded to FontAwesome 4.4.
- Updated Vimeo icon (per [this FontAwesome issue](https://github.com/FortAwesome/Font-Awesome/issues/2197)).
- Added overlay color option: dark or light.
- Added Unslider plugin for more than one featured post.
- Increased featured post maximum from one to five.
- Added post view option: minimal or grid.
- Added custom background color option for grid view.
- Added custom background image option for grid view.
- Added column option for grid view.
- Added Masonry plugin for grid view.
- Tweaked profile layout for small screens.
- Tweaked post spacing for small screens.

1.5.6
- Fixed margin for comment and paging navigation.
- Fixed site description for small screens.
- Fixed footer for small screens.
- Overhauled blockquote styles, for both the default and the Aesop Story Engine component.

1.5.5
- Fixed sticky post style inconsistencies.
- Fixed undefined variable in content.php.
- Fixed full size featured images for posts with long titles.
- Fixed site header for long site titles.
- Fixed debug error in inc/cover-archive.php.
- Fixed single page/post featured image styles.

1.5.4
- Removed 62.5% antipattern.

1.5.3
- Added overlay for Aesop Story Engine Content component to make text more readable.
- Fixed non-object property bug in post navigation.
- Fixed post background for sticky posts displayed in the loop.
- Fixed header background transition timing.
- Fixed post navigation margins.

1.5.2
- Fixed header for touch screen devices.
- Fixed widget menus.
- Fixed overlay text color.
- Code cleanup.

1.5.1
- Fixed header color for Color Posts plugin.

1.5.0
- Added support for Jetpack's Site Logo module.
- Added Customizer option to change header color.
- Added Customizer option to change link color.
- Added support for the Color Posts plugin to set the header color based on post images. (Please note that Color Posts requires Jetpack to function.)
- Added TGM Plugin Activation class to suggest Aesop Story Engine.
- Added caption styles for Aesop Story Engine image gallery types (Grid, Thumbnail, Sequence, Photoset, Parallax).
- Added styles for Aesop Story Engine to darken the image behind the text in the chapter component, similar to the header.
- Added background image for sticky posts in The Loop.

1.4.0
- Jetpack's Infinite Scrolling module now detects whether or not the footer social menu is present.
- Update Google Fonts URL to be protocol-relative (thanks to BforBen)
- Added WordPress.org installation directions.

1.3.1
- Initial release on the WordPress.org Theme Directory

== License ==

Cover is GPL v2.0 or later.

Image used in screenshot.png - https://unsplash.com/photos/1uxV8fAfhVM/download by Luke Chesser
License - http://creativecommons.org/publicdomain/zero/1.0/

All other resources are licensed as follows:

* Font Awesome - http://fontawesome.io/license (Font: SIL OFL 1.1, CSS: MIT License)
* Headroom - MIT - https://github.com/WickyNilliams/headroom.js/blob/master/LICENSE
* TGM Plugin Activation - GPL v2.0 - https://github.com/TGMPA/TGM-Plugin-Activation/blob/develop/LICENSE.md
* Unslider - WTFPL - https://github.com/idiot/unslider/blob/master/readme.md
