## WP Mobile Menu settings for WP-ZeroFour
The settings described below are intended to reproduce the original Zero Four design for mobile resolutions.  

### Installation  
In WP Admin, select "Plugins... Add New" from the left menu 
- Search plugins... keyword: "WP Mobile Menu" 
- Choose the plugin by Takanakui
- Install/Activate

### Setup
In WP Admin, select "Mobile Menu Options" from the left menu

1. "General Options" Tab  
- Enable Mobile Menu: ON  
- Mobile Menu Visibility (Width Trigger): 480px  
- Enable Left Menu: ON  
- Enable Right Menu: OFF  
- Menu Display Type: Slideout Over Content  
*Advanced Options*  
- Hide elements by default: all are checked  
- Hide Elements: .main-navigation  
- Sticky Html Elements: (empty by default, adjust as desired)  
- Custom CSS: (empty by default, adjust as desired)  
- Custom JS: (empty by default, adjust as desired)  

2. "Header options" Tab  
*Main options*  
- Naked Header: NO  
- Disable Logo/Text: NO  
*Logo options*  
- Site Logo: Logo  
- Logo: (A sample logo that was made at cooltext.com can be found here:  
-- /wp-content/themes/wp-zerofour-master/images/stock/WP-ZeroFour-CoolText_195x35.gif)  
-- Source: https://cooltext.com/Logo-Design-Gold-Outline  
- Logo Height: 35px (adjust as needed for your logo)  
- Disable Logo URL: NO  
- Alternative Logo URL:  
- Logo/Text Top Margin: 10px (adjust as needed for your logo)
*Header options*  
- Header Height: 58px  
- Header Text: (empty)  
- Header Logo/Text Alignment: Center  
- Header Logo/Text Left Margin: 20px  
- Header Logo/Text Right Margin: 20px  
- Header Menu Font:  
-- Font Family: Dosis  
-- Color: (dark gray. Google #2d2d2d for reference)  
-- Font Size: 20px  
-- Font Weight: inherit  
-- Font Style: normal  
-- Line Height: 1.5em  
-- Letter Spacing: normal  
-- Text Transform: none
-- Color: (dark gray. Google #2d2d2d for reference)  

3. "Left Menu options" Tab  
- Left Menu: Top Nav (needs to be set up first in Menus)
- Parent Link open submenu: NO  
*Menu Icon*  
- Text After Icon: (empty)
- Text After Icon Font  
-- Font Family: Open Sans  
-- Color: (dark gray. Google #2d2d2d for reference)  
-- Font Size: inherit  
-- Font Weight: normal  
-- Font Style: normal  
-- Line Height: 1.5em  
-- Letter Spacing: normal  
-- Text Transform: none  
-- Color: (dark gray. Google #2d2d2d for reference)  
- Icon Action: Open Menu
- Icon Link URL: (empty)  
- Icon Link Url Target: Self  
- Icon Type: Icon Font
- Icon Font: (first one, three blue lines)
- Icon Font Size: 36 px
- Icon Image: (empty)
- Icon Top Margin: 10 px
- Icon Left Margin: 5 px  
*Left Panel options*  
- Panel Background Image: (empty)
- Panel Background Image Opacity: 100 %
- Panel Background Image Size: Cover
- Panel Background Gradient Css: (empty)
- Menu Panel Width Units: Pixels
- Menu Panel Width(Pixels): 150 px
- Menu Panel Width(Percentage): 40 %
- Left Menu Content Padding: 0 %
- Left Menu Font  
-- Font Family: Open Sans  
-- Color: (dark gray. Google #2d2d2d for reference)  
-- Font Size: inherit  
-- Font Weight: 700  
-- Font Style: normal  
-- Line Height: 1.5em  
-- Letter Spacing: normal  
-- Text Transform: uppercase  
-- Color: (dark gray. Google #2d2d2d for reference)  

4. Right Menu options Tab  
The right tab is not used for this implemntation. The settings can remain as default, or you can use the Left Menu settings if desired.

5. Color Options Tab  
- Overlay Background Color: rgba(0,0,0,0.5)
- Header Background Color: rgba(59,62,69,0.9)
- Header Text Color: #222
- Text After Left Icon: #222
- Text Before Right Icon: #222
*Left Menu Colors*
- Left Menu Icon Color: #c9c9c9
- Background Color: rgba(59,62,69,0.9)
- Text Color: #ffffff
- Background Hover Color: #a3d3e8
- Hover Text Color: #fff
- Submenu Background Color: #eff1f1
- Submenu Text Color: #222
*Right Menu Colors*
- (not applicable for this implementation that only uses Left Menu - following are default values)
- Right Menu Icon Color: #886838
- Background Color: #003366
- Text Color: #c6c6c6
- Background Hover Color: #a3d3e8
- Hover Text Color: #eeee22
- Submenu Background Color: #eff1f1
- Submenu Text Color: #222

6. Documentation Tab
- This tab has information from the Plugin author