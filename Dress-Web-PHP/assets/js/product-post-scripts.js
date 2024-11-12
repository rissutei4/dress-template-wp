jQuery(document).ready(function ($) {
    var mediaUploader;

    $('.upload-button').on('click', function (e) {
        e.preventDefault();

        if (mediaUploader) {
            mediaUploader.open();
            return;
        }

        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });

        mediaUploader.on('select', function () {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#main-image').val(attachment.url);
        });

        mediaUploader.open();
    });

    // Upload Main Image
    $('#upload_main_image').on('click', function (event) {
        event.preventDefault();

        // Create the media frame
        var file_frame = wp.media.frames.file_frame = wp.media({
            title: 'Select or Upload Main Image',
            button: {
                text: 'Use this image',
            },
            multiple: false
        });

        // When an image is selected in the media frame
        file_frame.on('select', function () {
            var attachment = file_frame.state().get('selection').first().toJSON();
            $('.main_image_preview').attr('src', attachment.url);
            $('#main_image').val(attachment.url);
        });

        // Open the media frame
        file_frame.open();
    });

    var frame;

    $('#upload_additional_images_button').on('click', function(event) {
        event.preventDefault();

        // If the media frame already exists, reopen it.
        if (frame) {
            frame.open();
            return;
        }

        // Create a new media frame
        frame = wp.media({
            title: 'Select or Upload Images',
            button: {
                text: 'Use selected images'
            },
            multiple: 'add'  // Set to 'add' to allow multiple file selections
        });

        // When an image is selected in the media frame...
        frame.on('select', function() {
            // Get media attachment details from the frame state
            var attachments = frame.state().get('selection').map(function(attachment) {
                attachment.toJSON();
                return attachment;
            });

            var ids = attachments.map(function(attachment) {
                return attachment.id;
            });

            // Set the hidden input's value
            $('#additional_images').val(ids.join(','));

            // Display the selected images previews
            var html = '';
            attachments.forEach(function(attachment) {
                html += '<img src="' + attachment.attributes.url + '" style="max-width: 100px; height: auto; margin: 10px;"/>';
            });
            $('#additional_images_preview').html(html);
        });

        // Finally, open the modal
        frame.open();
    });

    // When the Remove Images button is clicked
    $('#remove_additional_images_button').on('click', function(event) {
        event.preventDefault();

        // Clear the hidden input's value
        $('#additional_images').val('');

        // Remove the image previews
        $('#additional_images_preview').empty();
    });
});
