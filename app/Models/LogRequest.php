<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class LogRequest extends Model
{
    use HasFactory;

    protected $table = 'logs_request';
    protected $guarded = [''];

    const METHOD_POST = "POST";
    const METHOD_GET = "GET";

    public $setStatus = [
        200 => [
            'class' => 'label label-success'
        ],
        302 => [
            'class' => 'label label-info'
        ],
        500 => [
            'class' => 'label label-danger'
        ],
    ];

    public $setMethod = [
        self::METHOD_GET => [
            'class' => 'label label-default'
        ],
        self::METHOD_POST => [
            'class' => 'label label-default'
        ],
    ];

    public function getStatus()
    {
        return Arr::get($this->setStatus, $this->status, '[N\A]');
    }

    public function getMethod()
    {
        return Arr::get($this->setMethod, $this->method, '[N\A]');
    }
}
