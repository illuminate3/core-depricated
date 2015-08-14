<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel PHP Framework</title>
    <script type="text/javascript"  src="<?= asset('js/jquery.min.js') ?>"></script>
    <script type="text/javascript" src="<?= asset('packages/tinymce/tinymce/tinymce.min.js') ?>"></script>
    <script type="text/javascript">
        function elFinderBrowser (field_name, url, type, win) {
            tinymce.activeEditor.windowManager.open({
                file: '<?= URL::route('elfinder.tinymce') ?>',// use an absolute path!
                title: 'elFinder 2.0',
                width: 900,
                height: 450,
                resizable: 'yes'
            }, {
                setUrl: function (url) {
                    win.document.getElementById(field_name).value = url;
                }
            });
            return false;
        }

        tinymce.init({
            selector: "textarea",
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            file_browser_callback : elFinderBrowser,
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            language:'zh_CN'
        });
    </script>
</head>
<body>
    <form method="post" action="somepage">
        <textarea name="content" style="width:100%"></textarea>
    </form>
</body>
</html>