# WP-ZeroFour

WP-ZeroFour is a WordPress adaptation of of the responsive HTML template ZeroFour (v2.5) originally by @n33co (CC3.0 by; [html5up.net](http://html5up.net/)).

The initial conversion from HTML5 to WordPress was performed in 2014 by [thequicksilver](https://github.com/thequicksilver/). This implementation (March 2018) includes bug fixes and enhancements.

Working Demo: http://www.west-la.info/

## Requirements and Resources
1. Working WordPress installation
2. The files from this repository
3. Plugin: "WP Mobile Menu" by Takanakui 

## Demo Mode
* When enabled, populates the Home Page with sample content
* If content already exists, it will be used
* If content is missing, Demo Mode will supply sample content
* Look at the sample content for tips on how to replace it
* Demo Mode is ON by default
* Appearance... WP-ZeroFour Options... General... Layout Options

## Quick Guide Installation and Setup
* Install theme files
* Activate the theme
* WP Admin... Appearance... Menus... Create Menu named "Top Nav"
* WP Admin... Appearance... WP-ZeroFour Options
* Mobile Menu: see "wp-zerofour-mobile-menu-options.md"
* Make two pages, "Show on Homepage" in WP-ZeroFour Options
* Edit static text in home.php
* Make three regular posts with featured images
* Make a sticky post with featured image
* Make content pages and adjust Top Nav menu

## Detailed Installation and Setup

### A. Initial Installation
1. Download the theme ZIP file from the project's main page
2. In WP Admin, go to Appearance... Themes... Add New
3. Click the "Upload Theme" button
4. Choose the ZIP file and then click "Install Now"
5. After theme is installed, click the "Activate" link

### B. Site Setup
1. In WP Admin, go to Appearance... Menus
2. Enter this Menu Name: Top Nav
3. Click the "Create Menu" button
4. Drag items into your menu. After you make some pages you can come back and add them to the menu as desired. 
5. In WP Admin, go to Appearance... WP-ZeroFour Options
6. Make changes to tabs: General, Home Settings, Media Section, 404 Page and Contact
7. Click the "Save Options" button to complete the changes.
* Note: If you don't have all the information needed to complete WP-ZeroFour Options, Demo Mode will fill in whatever is missing.

### C. Headings on the Home Page
* The Headings section is comprised of three images with headings, subtitles and icons. There is some text below.
* Currently this section is hard-coded into home.php
1. Open home.php with a text editor
2. Edit the HTML:  
a. Photos: Edit references to pic01.jpg, pic02.jpg and pic03.jpg  
b. Headings: Edit text in H3 elements  
c. Subtitles: Edit text in "span class=byline" elements  
d. Icons: Edit references to fa-user, fa-cog and fa-bar-chart-o  
e. Icon reference: https://fontawesome.com/v4.7.0/cheatsheet/  
f. Wording at bottom: Edit text in paragraph near the bottom  
* Note: The "major_heading" and "major_subheading" are controlled by the WP-ZeroFour Options. Do not edit this part.

### D. Subheadings on the Home Page
* There are two subheadings, accompanied by text and butons.
* These two items are made from pages of your site.
1. In WP Admin, go to Pages... Add New (or select existing page)
2. Fill in the title and content
3. Look for the WP-ZeroFour Options panel on the right
4. Check the box: "Show on Homepage"
5. Fill out the Subheading and other fields for the button
6. Home Position: 1 = left side; 2 = right side
7. Publish or Update the page

### E. Recent Posts (appears on selected pages)
* If you already have posts, they will appear here
* To add content here, add a post
1. In WP Admin, go to Posts... Add New
2. Enter title and content
3. Select a category and uncheck Uncategorized
4. Featured Image should be 1200 pixels wide  
  a. Category display = full width, 1200 pixels  
  b. Post pgae display = 800 pixels  
  c. Thumbnail = 180x167, autocropped  
  d. 1200x450 works well  
  e. Too small = blurry full width  

### F. Spotlight (appears on selected pages)
* Follow the same instructions for Recent Posts, except make it a sticky post:
1. Edit "Visibility" In the Publish box near the upper right 
2. Check the box: "Stick this post to the front page"
3. Image sizes are same as above, except Thumbnail = 367x168

### G. Footer Sidebars (appears on all pages)
* The footer uses three sidebars, named Footer 1, 2 and 3
* Footer 1 appears first (right to left), followed by 2 and 3
* Footers fill in the empty space on the left side. If only Footer 3 exists, it will appear all the way to the left. 
* Footer 1 - about 260 pixels wide, works best as a column
* Footer 2 - about 260 pixels wide, works best as a column
* Footer 3 - about 575 pixels wide, works best as a rectangle
* Note: Footers 1 & 2 occupy the space left of the Contact block
* Note: Footer 3 occupies the space above the Contact block
1. In WP Admin, go to Appearance... Widgets
2. Drag a widget or Custom HTML into a Footer sidebar
3. Complete the widget setup
4. Click the "Save" button

### H. Contact Area (appears on all pages)
* This section is controlled by the WP-ZeroFour Options.

### I. Adding More Pages
* To make a new page use: WP Admin... Pages... Add New
* To adjust the menu use: WP Admin... Appearance... Menus
* If your menu does not appear, make sure Menu Name = "Top Nav"
* Check box: "Primary navigation along the top of the template"

### J. Sidebars
* The theme the standard sidebar
* The sidebar appears on posts and selected pages
1. In WP Admin, go to Appearance... Widgets
2. Drag a widget or Custom HTML into a Footer sidebar
3. Complete the widget setup
4. Click the "Save" button

### K. Mobile Menu Setup
* Suggested Plugin: "WP Mobile Menu" by Takanakui 
* See document: "wp-zerofour-mobile-menu-options.md"

## Credits and Acknowledgements

### The O.G.
* ZeroFour Free Template: [HTML5 UP] (https://html5up.net/zerofour)
* ZeroFour by Subscription: [Pixelarity] (https://pixelarity.com/zerofour)
The original template design was released on HTML5 UP as a free download. The author has another subscription-based site called Pixelarity that offers the free templates, as well as some that are only available at Pixelarity. The subscription is a low fee (US$19/3mo as of March 2018) and allows you to download dozens of templates.

### First Adaptation of ZeroFour Template into WordPress
* thequicksilver: [thequicksilver/wp-zerofour](https://github.com/thequicksilver/wp-zerofour)

### Demo Images
* Demo Images: [unsplash.com](http://unsplash.com)
* 404 Image: [freepik.com](http://freepik.com)
* Demo Logo: [cooltext.com] (https://cooltext.com/Logo-Design-Gold-Outline)  
  -- CoolText_WP-ZeroFour_55-352x68.png (original)  
  -- WP-ZeroFour-CoolText_195x35.gif (mobile logo)  
  -- WP-ZeroFour-CoolText_250x45.gif (website logo)

### Icons
* Font Awesome: [fontawesome.com](https://fontawesome.com/)

### Other
* jQuery (jquery.com)
* html5shiv.js (@afarkas @jdalton @jon_neal @rem)
* CSS3 Pie (css3pie.com)
* jquery.dropotron (n33.co)
* skelJS (skeljs.org)

---
## Original ZeroFour License Info
ZeroFour 2.5 by HTML5 UP
- Free for personal and commercial use under the CCA 3.0 license
- Web: [html5up.net/zerofour](http://html5up.net/zerofour)
- License: [html5up.net/license](http://html5up.net/license)