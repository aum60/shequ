<?php

class NoticeAction extends CommonAction {

    private $upload_dir = './Public/Uploads/cover/';

    //定义封装搜索条件的方法
    public function _filter(&$map) {
        //判断是否存在搜索条件
        if (!empty($_REQUEST['title'])) {
            $map['title'] = array("like", "%{$_REQUEST['title']}%");
        }
    }

    //新增数据添加方法
    public function data_add() {
        if ($_POST) {
            if (!$_POST['title'] || !$_POST['showpicval'] || !$_POST['link']) {
                $this->error(L('参数错误'));
            }
            $path = $this->upload_dir;
            $picname = $_POST['showpicval'];
            $x = $_POST['x'];
            $y = $_POST['y'];
            $width = $_POST['w'];
            $height = $_POST['h'];
            $cut_pic = $this->cut_pic($picname, $path, $x, $y, $width, $height);
            $_POST['enclosure'] = $cut_pic;
            $_POST['link'] = str_replace('http://', '', $_POST['link']);
            $model = D("Notice");
            $return = $model->add($_POST);
            //echo $model->getLastSql();die;
            if ($return) {
                $this->success(L('新增成功'));
            } else {
                $this->error(L('新增失败') . $model->getLastSql());
            }
        }
    }

    //修改数据添加方法
    public function data_update() {
        if ($_POST) {
            //上传图片
            //var_dump($_FILES);
            if ($_FILES['enclosure']['name']) {
                //echo 22;
                $file_name = $this->uploadpic();
                // echo $file_name.'------';
                $_POST['enclosure'] = $file_name[1];
            }
            //var_dump($_POST);
            $model = D("Notice");

            $return = $model->save($_POST);
            //echo $model->getLastSql();die;

            $this->success(L('修改成功'));
        }
    }

    public function detail() {
        $model = D("Notice");
        $where['id'] = array("eq", $_GET['id']);
        $list = $model->where($where)->find();
        $this->assign("list", $list);
        $this->display();
    }

    //swfpic
    public function swf_uploadpic() {
        //执行上传
        $return = $this->uploadpic();
        echo $return;

        //}
    }

    //图片上传显示裁剪
    public function uploadpic() {
        import("ORG.Net.UploadFile");
        $upload = new UploadFile();
        $upload->maxSize = 3145728; // 设置附件上传大小
        $upload->allowExts = array('jpg', 'gif', 'bmp', 'png', 'jpeg'); // 设置附件上传类型
        $upload->savePath = $this->upload_dir; // 设置附件上传目录
        if (!$upload->upload()) {
            return $upload->getErrorMsg();
        } else {
            $info = $upload->getUploadFileInfo();
        }
        $picsrc = $info[0]['savename'];
        $path = $this->upload_dir;
        //去压缩
        $this->updateImage($picsrc, $path, "s_");
        //删除最原始的上传图
        unlink($path . $picsrc);
        //返回压缩后的文件名
        return 's_' . $picsrc;
    }

    //图片缩放
    public function updateImage($picname, $path, $prix = "s_", $maxwidth, $maxheight) {
        //1. 定义获取基本信息
        $path = rtrim($path, "/"); //去除后面多余的"/"
        $info = getimagesize($path . "/" . $picname);  //获取图片文件的属性信息

        $width = $info[0]; //原图片的宽度
        $height = $info[1]; //原图片的高度
        //如果原图片大于一千则默认压缩为1000否则显示原图片的大小
        if ($width > 1000) {
            $w = 1000;
        } else {
            $w = $width;
        }
        $w = $maxwidth; //新图片的宽度
        //根据比例计算高度
        $h = ($maxwidth / $width) * $height;
        //指定新的高度
        //$h = $maxheight;
        //}else{
        //$h=$maxheight;//新图片的宽度
        //$w=($maxheight/$height)*$width;//新图片的高度
        //}
        //3. 创建图像源
//      dump($info);
        $newim = imagecreateTrueColor($w, $h); //新图片源
        //根据原图片类型来创建图片源
        switch ($info[2]) {
            case 1: //gif格式
                $srcim = imageCreateFromgif($path . "/" . $picname);
                break;
            case 2: //jpeg格式
                $srcim = imageCreateFromjpeg($path . "/" . $picname);
                break;
            case 3: //png格式
                $srcim = imageCreateFrompng($path . "/" . $picname);
                break;
            case 6: //bmp格式
                $srcim = imageCreateFrompng($path . "/" . $picname);
                break;
            default :
                exit("无效的图片格式!");
                break;
        }

        //4. 执行缩放处理
        imagecopyresampled($newim, $srcim, 0, 0, 0, 0, $w, $h, $width, $height);

        //5. 输出保存绘画
        //header("Content-Type:".$info['mime']); //设置响应类型为图片格式
        //根据原图片类型来保存新图片
        switch ($info[2]) {
            case 1: //gif格式
                imagegif($newim, $path . "/" . $prix . $picname); //保存
                //imagegif($newim);//输出
                break;
            case 2: //jpeg格式
                imagejpeg($newim, $path . "/" . $prix . $picname);
                //imagejpeg($newim);
                break;
            case 3: //png格式
                imagepng($newim, $path . "/" . $prix . $picname);
                //imagepng($newim);
                break;
            case 6: //bmp格式
                imagebmp($newim, $path . "/" . $prix . $picname);
                break;
        }

        //6. 销毁资源
        imageDestroy($newim);
        imageDestroy($srcim);
    }

    //根据点位坐标裁剪图片     (图片名称,图片路径,x坐标,y坐标,长度,宽度,前缀)
    public function cut_pic($picname, $path, $x, $y, $width, $height, $prix = "x_") {
        //去除后面多余的"/"
        $path = rtrim($path, "/");
        //获取图片文件的属性信息
        $info = getimagesize($path . "/" . $picname);
        //新图片源
        $newim = imagecreateTrueColor($width, $height);
        //根据原图片类型来创建图片源
        switch ($info[2]) {
            case 1: //gif格式
                $srcim = imageCreateFromgif($path . "/" . $picname);
                break;
            case 2: //jpeg格式
                $srcim = imageCreateFromjpeg($path . "/" . $picname);
                break;
            case 3: //png格式
                $srcim = imageCreateFrompng($path . "/" . $picname);
                break;
            case 6: //bmp格式
                $srcim = imageCreateFrompng($path . "/" . $picname);
                break;
            default :
                exit("无效的图片格式!");
                break;
        }
        //执行裁剪
        imagecopyresampled($newim, $srcim, 0, 0, $x, $y, $width, $height, $width, $height);
        //保存图片
        switch ($info[2]) {
            case 1: //gif格式
                imagegif($newim, $path . "/" . $prix . $picname); //保存
                break;
            case 2: //jpeg格式
                imagejpeg($newim, $path . "/" . $prix . $picname);
                break;
            case 3: //png格式
                imagepng($newim, $path . "/" . $prix . $picname);
                break;
            case 6: //bmp格式
                imagebmp($newim, $path . "/" . $prix . $picname);
                break;
        }
        //释放资源
        imageDestroy($newim);
        imageDestroy($srcim);
        //删除裁剪前的图片
        unlink($path . "/" . $picname);
        return $prix . $picname;
    }

}
