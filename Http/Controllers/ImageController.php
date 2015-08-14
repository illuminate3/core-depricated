<?php
/**
 * Created by PhpStorm.
 * User: Raymond
 * Date: 14-12-20
 * Time: 下午3:10
 */

class ImageController extends BaseController
{

    public function lists($id=1)
    {
        $images = Images::where('user_id', $id)->get()->toArray();
        return View::make('images.lists', ['images'=>$images]);
    }

    public function upload()
    {
        return View::make('upload');
    }

    public function store()
    {
        return json_encode(
            Plupload::receive('file', function ($file)
            {
                $fileName = $file->getClientOriginalName();
                $verb = substr(strrchr($fileName, '.'), 1);
                $name = substr($fileName, 0, -strlen($verb)-1);
                $saveName = time().substr(md5($fileName), -10).".$verb";
                $saveDir = public_path() . '/upload/images/';
                $dateFlag = date('Y/m/');
                $file->move($saveDir.$dateFlag, $saveName);
                $mime = explode(';',(new finfo(FILEINFO_MIME))->file($saveDir.$dateFlag.$saveName))[0];
                $imageModel = Images::store(1, $dateFlag.$saveName, $name, $name, $verb, $mime);

                if($imageModel!==null)
                    return $imageModel->id;
                else
                    return 'false';
            })
        );
//        $saveDir = public_path() . '/upload/';
//        $imageModel = Images::store(1, date('Y/m/').'1419090956e420508eff.jpg', '200', '200', 'jpg');
    }

    public function resize()
    {
        $img = Image::make(storage_path().'/test/IMG_20131117_125502.jpg')->resize(300, 600);
        return $img->response('png');
    }

} 