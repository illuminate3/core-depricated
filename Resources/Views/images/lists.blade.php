@extends('layout')

@section('content')
<button type="button" class="btn btn-default"  data-toggle="modal" data-target="#myModal">upload</button>
<table class="table">
    <caption>test case</caption>
    <thead>
        <tr>
            <th>pic</th>
            <th>name</th>
            <th>mime</th>
            <th>ups</th>
            <th>path</th>
            <th>created_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($images as $image)
        <tr>
            <td><img src="{{ asset('/upload/images/'.$image['path']) }}" width="24px" height="24px" class="img-rounded"></td>
            <td>{{ $image['name'] }}</td>
            <td>{{ $image['mime'] }}</td>
            <td>{{ $image['ups'] }}</td>
            <td>{{ $image['path'] }}</td>
            <td>{{ $image['created_at'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
    aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" 
                    data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Upload
                </h4>
            </div>
            <div class="modal-body">
            
                <div id="uploader">
                    <p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
                </div>

            

                <link type="text/css" rel="stylesheet" href="<?= asset('assets/bower/jqueryui/themes/black-tie/jquery-ui.min.css') ?>" media="screen" />
                <link type="text/css" rel="stylesheet" href="<?= asset('/packages/jildertmiedema/laravel-plupload/assets/js/jquery.ui.plupload/css/jquery.ui.plupload.css') ?>" media="screen" />
                <script type="text/javascript"  src="<?= asset('assets/bower/jqueryui/jquery-ui.min.js') ?>"></script>
                <script type="text/javascript" src="<?= asset('/packages/jildertmiedema/laravel-plupload/assets/js/plupload.full.min.js') ?>" charset="UTF-8"></script>
                <script type="text/javascript" src="<?= asset('/packages/jildertmiedema/laravel-plupload/assets/js/jquery.ui.plupload/jquery.ui.plupload.min.js') ?>" charset="UTF-8"></script>
                <script src="<?= asset('/packages/jildertmiedema/laravel-plupload/assets/js/i18n/zh_CN.js') ?>" type="text/javascript"></script>

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

                    $('#myModal').on('hide.bs.modal', function () {
                        // 执行一些动作...
                        location.reload();
                    });
                </script>
        </div>
         
        <div class="modal-footer">
            <button type="button" class="btn btn-default" 
               data-dismiss="modal">关闭
            </button>
            <button type="button" class="btn btn-primary">
               提交更改
            </button>
        </div>
      </div><!-- /.modal-content -->
</div>
@stop