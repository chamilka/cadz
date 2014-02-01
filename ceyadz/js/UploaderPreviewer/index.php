<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html lang="es" xml:lang="es" xmlns="http://www.w3.org/1999/xhtml">

<head>

    <link rel="stylesheet" href="css/custom-theme/jquery-ui-1.8rc2.custom.css" type="text/css" />
    <link rel="stylesheet" href="css/uploaderPreviewer.css" type="text/css" />

    <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.8rc2.custom.min.js"></script>
    <script type="text/javascript" src="js/globalFunctions.js"></script>
    <script type="text/javascript" src="js/uploaderPreviewer.js"></script>
    <script type="text/javascript" src="js/itemForm.js"></script>

    <title>UploaderPreviewer jQuery Plugin Demo</title>

<script type="text/javascript">

(function($) {

$(document).ready(function() {

    // it must be checked if there are div.imageForms because the
    // uploaderPreviewer javascript may be not included and produce an error
    if ($('div.imageForms').length) {

        $('div.imageForms').append($.uploaderPreviewer.createImageForms());

        // the images are populated if the admin form is to edit, and not
        // to insert
        if ($('div.imageForms[images]').length) {
            var imageFilenames = $('div.imageForms[images]').attr('images').split(',');
            $.uploaderPreviewer.populateImages(imageFilenames);
            $('div.imageForms[images]').removeAttr('images');
        }
    }

    $('#buttonSave').click(function() {
        var itemId = $(this).attr('itemId');
        if (itemId) {
            $.itemForm.update(itemId);
        }
        else {
            $.itemForm.insert();
        }
    });

});

})(jQuery);

</script>

</head>

<body>

    <h1>UploaderPreviewer jQuery Plugin Demo</h1>

    <div class="imageForms"></div>

    <div class="buttonSave">
        <button id="buttonSave">Save</button>
    </div>

    <p>
        The images are not stored till the "Save" button is pressed. Till then
        they are kept in a temporary directory, and are removed if the user
        exits the page or reloads it.
    </p>

    <p>
        The images can be stored with a descriptive name. It will be taken
        three random keywords of a given keywords list.
        <br />
        This feature is useful for SEO.
        <br />
        To test this feature, type a comma-separated keywords list in the input
        text below.
    </p>

    <div>
        <strong>Keywords (separate by ','):</strong>
        <input type="text" id="keywords" style="width: 400px;"
               value="keyword1, keyword2, keyword3, keyword4" />
    </div>

    <hr />

    <h2>Instructions</h2>

    <h3>Initialize forms to insert</h3>

    <p>
        Just write in the page a div of "imageForms" class:

        <p><code>&lt;div class="imageForms"&gt;&lt;/div&gt;</code></p>

        It must be initialized in the $(document).ready() jQuery function:

        <p><code>
            $('div.imageForms').append($.uploaderPreviewer.createImageForms());
        </code></p>

    </p>

    <h3>Initialize forms to update</h3>

    <p>
        Just write in the page a div of "imageForms" class with a "images"
        attribute, containing the filenames of the uploaded files:

        <p><code>&lt;div class="imageForms" images="image1.png,image2.jpg,image3.gif"&gt;&lt;/div&gt;</code></p>

        It must be initialized in the $(document).ready() jQuery function:

        <p><code>
            if ($('div.imageForms[images]').length) {<br />
                var imageFilenames = $('div.imageForms[images]').attr('images').split(',');<br />
                $.uploaderPreviewer.populateImages(imageFilenames);<br />
                $('div.imageForms[images]').removeAttr('images');<br />
            }<br />
        </code></p>

    </p>

    <h3>Working Description</h3>

    <p>
        When a file field is changed, the selected file is uploaded to a
        temporary directory with a temporary filename. It is resized to
        medium and thumb sizes, and previewed the thumb image.
    </p>

    <p>
        The files in the temporary directory are deleted when the user exits
        or reloads the page, in order not keep unnecessary files.
    </p>

    <p>
        When the user presses the "Save" button, the files in the temporary
        directory are moved to the uploads directory.
    </p>

    <p>
        A list of keywords can be indicated to construct the final filename.
        This feature is useful for SEO purposes.
    </p>

    <p>
        If there is an error in the upload process, it is displayed above
        the corresponding file field.
    </p>

    <h3>Files Included</h3>

    <p>
        <ul>
            <li>/js/uploaderPreviewer.js</li>
            <li>/php/uploadedFile.php</li>
        </ul>
        These are the main files of the plugin. They manage the dynamic
        uploading, resizing and previewing of the images.
    </p>

    <p>
        <ul>
            <li>/js/itemForm.js</li>
            <li>/php/uploadedFile.php</li>
            <li>/php/removeImage.php</li>
        </ul>
        Manage the saving and uploading of the uploaded files from the
        temporary directory to the final one.
    </p>

    <p>
        <ul>
            <li>/php/configuration.php</li>
        </ul>
        Includes the configuration parameters, like upload paths, maximum
        image size, etc.
    </p>

    <p>
        <ul>
            <li>/js/globalFunctions.js</li>
        </ul>
        Includes utility functions, like displaying dialog box, display errors,
        etc.
    </p>

    <p>
        <ul>
            <li>/php/insert.php</li>
            <li>/php/upload.php</li>
        </ul>
        Manage the ajax requests to insert and upload files. The upload file
        has no functionality in this demo, as it requires the database stored
        images filenames, in order to compare them with the new ones and see
        if they have been changed.
    </p>

    <p>
        <ul>
            <li>/js/jquery-1.4.2.min.js</li>
            <li>/js/jquery-ui-1.8rc2.custom.min.js</li>
        </ul>
        jQuery and jQuery UI libraries. The jQuery UI library is only used
        to display dialog boxes and a progress bar.
    </p>

    <h3>Configuration</h3>

    <p>
        The configuration of the server side is all done in the configuration.php
        file.
    </p>

    <p>
        The configuration of the client side is done at the top of
        the javascript files, uploaderPreviewer.js and itemForm.js.
    </p>

    <h3>Features</h3>

    <ul>
        <li><b>Crossbrower.</b> Firefox, Opera, Chrome, Safari and IE.</li>
        <li><b>No garbage.</b> The files in the temporary directory are
            deleted when the user exits or reloads the page</li>
        <li><b>Descriptive filenames.</b> The file names are constructed
            with a three random keywords of a given keywords list. If the
            filename already exists, characters are taken from the unique
            temporary filename generated by PHP.</li>
        <li><b>Iframe factory.</b> An iframe factory is used in order not to
            unnecessary duplicate iframes.</li>
        <li><b>Loading spinner image.</b> A loading spinner image is displayed
            while the uploading. It was taken from the website
            <a href="http://ajaxload.info/">ajaxload.info</a>.</li>
        <li><b>Loading timeout.</b> A jQuery dialog box is displayed while
            the images saving. It contains a progress bar that shows the elapsed
            time if there are images loading. If the maximum loading time
            is reach, the saving process is canceled and an error message
            is displayed. To test this feature, it can be placed a timer
            in the php script. For example, place <code>sleep(5);</code>
            before the return statement, at the end of the script.</li>
        <li><b>Javascript validations.</b>
            <ul>
                <li>Image type. <code>uploaderPreviewer.js > checkImageType()</code></li>
                <li>Uploaded files. <code>itemForm.js > validateData()</code></li>
            </ul>
        </li>
        <li><b>Php validations.</b> All in <code>uploadImage.php</code>.
            <ul>
                <li>Upload error. </li>
                <li>File type. File types supported by the script: png, jpg, gif.</li>
                <li>File size. The maximum supported is 3000000.</li>
                <li>File dimension. The maximum supported is 2500.</li>
            </ul>
        </li>
    </ul>

    <h3>Known flaws</h3>

    <ul>
        <li>If an image is uploaded while another one is still loading, the
            second image is not processed.</li>
        <li>If an image is uploaded while another one is still loading but
            its upload was canceled, the second image is not processed and
            the first one is taken.</li>
        <li>If an animated gif is resized, the animation is lost.</li>
    </ul>

</body>

</html>