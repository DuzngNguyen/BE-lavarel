<?php

namespace TrungPhuNA\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Arr;

class SettingNav extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $table = 'settings_navs';
    protected $guarded = [''];

    const TYPE_URL      = 1;
    const TYPE_MENU     = 2;
    const TYPE_ARTICLE  = 3;
    const TYPE_CATEGORY = 4;
    const TYPE_PRODUCT  = 5;
    const TYPE_KEYWORD  = 6;

    public $type = [
        self::TYPE_URL      => [
            'name' => 'URL'
        ],
//        self::TYPE_MENU     => [
//            'name' => 'Menu Bài viết'
//        ],
//        self::TYPE_ARTICLE  => [
//            'name' => 'Bài viết'
//        ],
        self::TYPE_CATEGORY  => [
            'name' => 'Danh mục'
        ],
        self::TYPE_PRODUCT  => [
            'name' => 'Sản phẩm'
        ],
        self::TYPE_KEYWORD  => [
            'name' => 'Từ khoá'
        ],
    ];

    public function getType()
    {
        return Arr::get($this->type, $this->sn_type, []);
    }

    protected static function newFactory()
    {
        return \TrungPhuNA\Setting\Database\factories\SettingNavFactory::new();
    }
}
