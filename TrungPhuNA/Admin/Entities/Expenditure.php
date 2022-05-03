<?php

namespace TrungPhuNA\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Arr;
use phpDocumentor\Reflection\Types\Collection;
use TrungPhuNA\Setting\Entities\Admin;

class Expenditure extends Model
{
    use HasFactory;

    protected $guarded = [''];
    protected $table = 'expenditures';

    const TYPE_UNDEFINED = 1;
    const TYPE_COLLECT = 2;
    const TYPE_SPEND = 3;

    public $type = [
        self::TYPE_COLLECT => [
            'name' => 'Thu',
            'class' => 'label-default label'
        ],
        self::TYPE_SPEND => [
            'name' => 'Chi',
            'class' => 'label-warning label'
        ],
        self::TYPE_UNDEFINED => [
            'name' => 'Chưa xác định',
            'class' => 'label-success label'
        ],
    ];

    public $categories = [
        [
            'name' => 'Chưa xác định',
            'id' => 1
        ],
        [
            'name' => 'Lương nhân viên',
            'id' => 2
        ],
        [
            'name' => 'Chạy ADS',
            'id' => 3
        ],
        [
            'name' => 'Google',
            'id' => 4
        ],
        [
            'name' => 'Chi tài liệu',
            'id' => 5
        ],
        [
            'name' => 'Content SEO',
            'id' => 6
        ],
        [
            'name' => 'Thưởng nhân viên',
            'id' => 7
        ],
    ];

    public function getNameType()
    {
        return Arr::get($this->type, $this->e_type,[]);
    }

    public function getType()
    {
        return $this->type;
    }

    public function getCategories()
    {
        return collect($this->categories);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class,'e_admin_id');
    }
}
