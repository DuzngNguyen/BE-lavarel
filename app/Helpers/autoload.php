<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 4/20/21 .
 * Time: 6:01 PM .
 */

use Illuminate\Database\Eloquent\Model;

if (!function_exists('pare_url_file')) {
    function pare_url_file($image, $folder = 'uploads')
    {
        if (!$image) {
            return '/images/preloader.png';
        }
        $explode = explode('__', $image);

        if (isset($explode[0])) {
            $time = str_replace('_', '/', $explode[0]);
            return '/' . $folder . '/' . date('Y/m/d', strtotime($time)) . '/' . $image;
        }
    }
}

function get_numerics ($str) {
    preg_match_all('/\d+/', $str, $matches);
    return $matches[0][0] ?? null;
}


if (!function_exists('pare_url_cms')) {
    function pare_url_cms($image, $folder = 'uploads')
    {
        $url = env('APP_URL_CMS','https://cms.123code.net/');
        if (!$image) {
            return '/images/preloader.png';
        }
        $explode = explode('__', $image);

        if (isset($explode[0])) {
            $time = str_replace('_', '/', $explode[0]);
            return $url . '/' . $folder . '/' . date('Y/m/d', strtotime($time)) . '/' . $image;
        }
    }
}

if (!function_exists('get_data_user')) {
    function get_data_user($type, $field = 'id')
    {
        return \Auth::guard($type)->user() ? \Auth::guard($type)->user()->$field : '';
    }
}

if (!function_exists('upload_image')) {
    /**
     * @param $file [tên file trùng tên input]
     * @param array $extend [ định dạng file có thể upload được]
     * @return array|int [ tham số trả về là 1 mảng - nếu lỗi trả về int ]
     */
    function upload_image($file, $folder = '', array $extend = array())
    {
        $code = 1;
        // lay duong dan anh
        $baseFilename = public_path() . '/uploads/' . $_FILES[$file]['name'];

        $size = $_FILES[$file]['size'];
        $size =  round($size / (1024),1);

        // thong tin file
        $info = new SplFileInfo($baseFilename);

        // duoi file
        $ext = strtolower($info->getExtension());

        // kiem tra dinh dang file
        if (!$extend)
            $extend = ['png', 'jpg', 'jpeg', 'webp', 'gif'];

        if (!in_array($ext, $extend))
            return $data['code'] = 0;

        // Tên file mới
        $nameFile = trim(str_replace('.' . $ext, '', strtolower($info->getFilename())));
        $filename = date('Y-m-d__') . \Illuminate\Support\Str::slug($nameFile) . '.' . $ext;;

        // thu muc goc de upload
        $path = public_path() . '/uploads/' . date('Y/m/d/');
        if ($folder)
            $path = public_path() . '/' . $folder . '/' . date('Y/m/d/');

        if (!\File::exists($path))
            @mkdir($path, 0777, true);

        // di chuyen file vao thu muc uploads
        move_uploaded_file($_FILES[$file]['tmp_name'], $path . $filename);
        $data = [
            'name'     => $filename,
            'code'     => $code,
            'ext'      => $ext,
            'path'     => $path,
            'size'     => $size,
            'path_img' => 'uploads/' . $filename
        ];

        return $data;
    }
}

if (!function_exists('gen_time')) {
    function gen_time($time)
    {
        $time = \Carbon\Carbon::parse($time)->format('M d, Y H:i:s');
        return $time;
    }
}

if (!function_exists('apart_time')) {
    function apart_time($start, $stop)
    {
        $start = \Carbon\Carbon::parse($start);
        $stop = \Carbon\Carbon::parse($stop);
        return $stop->diffInSeconds($start);

    }
}

if (!function_exists('detect_category_expenditure')) {
    function detect_category_expenditure($id)
    {
        $categories = (new \TrungPhuNA\Admin\Entities\Expenditure())->getCategories();
        foreach ($categories as $item)
        {
            if ($item['id'] === $id) return $item;
        }
        return  "[N\A]";
    }
}

if (!function_exists('get_banks_item')) {
    function get_banks_item($id)
    {
        $banks = config('transaction.banks');
        foreach ($banks as $item)
        {
            if ($item['bankCode'] === $id) return $item;
        }
        return  [];
    }
}
