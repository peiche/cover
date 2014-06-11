Cover
===

A simple WordPress theme with a focus on content. Features include responsive layout and images, 
full-screen featured images in posts and pages, and custom header backgrounds for categories. 
No sidebars, no widgets, just content.

Cover is a pure blogging theme for WordPress. Built on top of Automattic’s _s (Underscores) 
and bundled with Font Awesome, Cover allows you to focus on your writing. 
There are no widgets to configure, just a single column view of your content.

##Features

Cover is built from the ground up to be responsive. No matter what size screen you’re using, Cover always looks beautiful. 
Drawing special attention to featured images, from the homepage to posts, category archives to pages, 
your blog is made uniquely yours through your images. Of course, you don’t have to use images. 
Cover’s clean typography lets your writing stand on its own.

###Full-screen featured images

When you use a featured image in Cover, it displays it as a background image behind the title and author. Images taller than 600 pixels 
will be displayed full-screen.

###Featured post slider

By default, no images are loaded on the homepage. The exception to this is when you’ve set one or more posts to be “sticky.” 
However many sticky posts you have, Cover will show them in a slider at the top of the page. If you have more than one, 
left and right arrows will appear so they can be quickly paged through. On smaller screens, the arrows disappear in favor of displaying 
pagination indicators.

###Scalable vector icons

Cover is bundled with Font Awesome v4.1.0, allowing you to include any icon in any post or page.

###Social profiles

Below each blog post is an author profile which contains the post author’s information, which can be set in Users > Your Profile. 
By default WordPress includes support for linking to your Facebook, Twitter, and Google+ profiles.

###Custom Yet Another Related Post Plugin (YARPP) template

Related posts, powered by YARPP (http://wordpress.org/plugins/yet-another-related-posts-plugin/), are shown in a full-width content area at 
the bottom of each post. If you have YARPP configured to return more than one related post, Cover will 
build a slider similar to the featured content post slider on the homepage.

If you don’t have YARPP installed or active, no problem! You don’t have to use it if you don’t want to. If you do, though, 
be sure to select “Custom” in the YARPP Display Options box. The only option available will be the “Thumbnails” selection, 
because I’ve only created one template. (If you’d like to see different options, let me know!)

###Built with Sass

If you’re a developer and want to play around with Cover, you’ll find that its default style.css stylesheet is nearly empty. 
This is because while WordPress requires this stylesheet, I prefer to build and compress the theme’s styles using Sass. 
To that end, in the project you’ll find the folder /sass which holds all the components required to compile the real 
stylesheet located in /css, including Font Awesome and the base styles for the featured post slider. 
(Similarly, the JavaScript used in Cover is compressed, but the uncompressed code is provided in /src for ease of modification.)

----

Cover is built on Underscores http://underscores.me/, (C) 2012-2014 Automattic, Inc.

**Credits:**  
Google Fonts http://www.google.com/fonts  
Font Awesome http://fontawesome.io/  
Sass http://sass-lang.com/  
iDangerous Swiper http://www.idangero.us/sliders/swiper/  
Waypoints http://imakewebthings.com/jquery-waypoints/  
Yet Another Related Posts Plugin (YARPP) http://wordpress.org/plugins/yet-another-related-posts-plugin/