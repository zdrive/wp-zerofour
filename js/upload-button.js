jQuery(document).ready(function($){
/**
 * Upload images in WP-ZeroFour options.
 *
 * @since WP-ZeroFour 1.1
 * thanks to: https://www.webfulcreations.com/using-wordpress-media-uploader-in-admin-theme-options/ 
 */

    $('#upload_heading_image-1').click(function(e) {
    var custom_uploader1;
        e.preventDefault();
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader1) {
            custom_uploader1.open();
            return;
        }
        //Extend the wp.media object
        custom_uploader1 = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader1.on('select', function() {
            attachment = custom_uploader1.state().get('selection').first().toJSON();
            $('#wp04_theme_options\\[image_heading_photo-1\\]').val(attachment.url);
        });
        //Open the uploader dialog
        custom_uploader1.open();
   });

    $('#upload_heading_image-2').click(function(e) {
    var custom_uploader2;
        e.preventDefault();
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader2) {
            custom_uploader2.open();
            return;
        }
        //Extend the wp.media object
        custom_uploader2 = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader2.on('select', function() {
            attachment = custom_uploader2.state().get('selection').first().toJSON();
            $('#wp04_theme_options\\[image_heading_photo-2\\]').val(attachment.url);
        });
        //Open the uploader dialog
        custom_uploader2.open();
   });

    $('#upload_heading_image-3').click(function(e) {
    var custom_uploader3;
        e.preventDefault();
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader3) {
            custom_uploader3.open();
            return;
        }
        //Extend the wp.media object
        custom_uploader3 = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader3.on('select', function() {
            attachment = custom_uploader3.state().get('selection').first().toJSON();
            $('#wp04_theme_options\\[image_heading_photo-3\\]').val(attachment.url);
        });
        //Open the uploader dialog
        custom_uploader3.open();
   });


    $('#upload_site_logo_img_button').click(function(e) {
    var custom_uploader4;
        e.preventDefault();
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader4) {
            custom_uploader4.open();
            return;
        }
        //Extend the wp.media object
        custom_uploader4 = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader4.on('select', function() {
            attachment = custom_uploader4.state().get('selection').first().toJSON();
            $('#wp04_theme_options\\[site_logo\\]').val(attachment.url);
        });
        //Open the uploader dialog
        custom_uploader4.open();
   });

    $('#upload_header_img_button').click(function(e) {
    var custom_uploader5;
        e.preventDefault();
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader5) {
            custom_uploader5.open();
            return;
        }
        //Extend the wp.media object
        custom_uploader5 = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader5.on('select', function() {
            attachment = custom_uploader5.state().get('selection').first().toJSON();
            $('#wp04_theme_options\\[header_img\\]').val(attachment.url);
        });
        //Open the uploader dialog
        custom_uploader5.open();
   });

});