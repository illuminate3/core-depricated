<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);

		body {
			margin:0;
			font-family:'Lato', sans-serif;
			text-align:center;
			color: #999;
		}
	</style>
    <link type="text/css" rel="stylesheet" href="<?= asset('css/jquery-ui.min.css') ?>" media="screen" />
    <link type="text/css" rel="stylesheet" href="<?= asset('/packages/jildertmiedema/laravel-plupload/assets/js/jquery.ui.plupload/css/jquery.ui.plupload.css') ?>" media="screen" />

    <script type="text/javascript"  src="<?= asset('js/jquery.min.js') ?>"></script>
    <script type="text/javascript"  src="<?= asset('js/jquery-ui.min.js') ?>"></script>
    <script type="text/javascript" src="<?= asset('/packages/jildertmiedema/laravel-plupload/assets/js/plupload.full.min.js') ?>" charset="UTF-8"></script>
    <script type="text/javascript" src="<?= asset('/packages/jildertmiedema/laravel-plupload/assets/js/jquery.ui.plupload/jquery.ui.plupload.min.js') ?>" charset="UTF-8"></script>
    <script src="<?= asset('/packages/jildertmiedema/laravel-plupload/assets/js/i18n/zh_CN.js') ?>" type="text/javascript"></script>


    <script type="text/javascript" src="<?= asset('packages/tinymce/tinymce/tinymce.min.js') ?>"></script>
    <script type="text/javascript">
    tinymce.init({
        selector: "textarea",
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste moxiemanager"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });
    </script>



</head>
<body>

<div id="uploader">
    <p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
</div>

<form method="post" action="somepage">
        <textarea name="content" style="width:100%"></textarea>
    </form>

<script type="text/javascript">
    // Initialize the widget when the DOM is ready
    $(function() {
        $("#uploader").plupload({
            // General settings
            runtimes : 'html5,flash,silverlight,html4',
            url : "<?= URL::route("images.store") ?>",

            // Maximum file size
            max_file_size : '2mb',

            chunk_size: '1mb',

            // Resize images on clientside if we can
            resize : {
                width : 200,
                height : 200,
                quality : 90,
                crop: false // crop to exact dimensions
            },

            // Specify what files to browse for
            filters : [
                {title : "Image files", extensions : "jpg,gif,png"},
                {title : "Zip files", extensions : "zip,avi"}
            ],

            // Rename files by clicking on their titles
            rename: true,

            // Sort files
            sortable: true,

            // Enable ability to drag'n'drop files onto the widget (currently only HTML5 supports that)
            dragdrop: true,

            // Views to activate
            views: {
                list: true,
                thumbs: true, // Show thumbs
                active: 'thumbs'
            },

            // Flash settings
            flash_swf_url : '/packages/jildertmiedema/laravel-plupload/assets/js/Moxie.swf',

            // Silverlight settings
            silverlight_xap_url : '/packages/jildertmiedema/laravel-plupload/assets/js/Moxie.xap'
        });
    });
</script>
</body>
</html>
