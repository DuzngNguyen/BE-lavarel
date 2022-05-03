<?php

namespace TrungPhuNA\Ecommerce\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Arr;
use TrungPhuNA\Setting\Entities\Admin;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $guarded = [''];

    const STATUS_DEFAULT = 1;
    const STATUS_HANDLING = 2;
    const STATUS_TRANSFER = 3;
    const STATUS_SUCCESS = 4;
    const STATUS_CANCEL = -1;

    protected $status = [
        self::STATUS_DEFAULT => [
            'name' => 'Khởi tạo',
            'class' => 'label-default label'
        ],
        self::STATUS_HANDLING => [
            'name' => 'Xử lý',
            'class' => 'label-warning label'
        ],
        self::STATUS_TRANSFER => [
            'name' => 'Chờ thanh toán',
            'class' => 'label-info label'
        ],
        self::STATUS_SUCCESS => [
            'name' => 'Hoàn thành',
            'class' => 'label-success label'
        ],
        self::STATUS_CANCEL => [
            'name' => 'Huỷ đơn',
            'class' => 'label-danger label'
        ],
    ];

    protected $subjects = [
        'Toán','Văn','Anh','Lý','Hoá','Sinh','Sử','Địa','GDCD','Tin học','Công nghệ','Tiểu học','Mỹ thuật','GDTC','ĐGNL'
    ];

    public $changes = [
        'facebook','zalo','google','tailieu247.net','email_marketing','landing_page'
    ];

    public function getStatus()
    {
        return Arr::get($this->status, $this->t_status, []);
    }

    public function getSubjects()
    {
        return $this->subjects;
    }

    public function getChanges()
    {
        return $this->changes;
    }

    protected static function newFactory()
    {
        return \TrungPhuNA\Ecommerce\Database\factories\TransactionFactory::new();
    }

    public function orders()
    {
        return $this->hasMany(Order::class,'o_transaction_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'t_user_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class,'t_admin_id');
    }
}
