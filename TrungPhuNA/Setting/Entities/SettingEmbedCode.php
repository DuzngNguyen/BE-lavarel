<?php

namespace TrungPhuNA\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Arr;

class SettingEmbedCode extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $table = 'settings_embed_code';
    protected $guarded = [''];
    const TYPE_CSS = 1;
    const TYPE_JS  = 2;

    const POSITION_HEAD = 1;
    const POSITION_BODY = 2;
    const POSITION_FOOTER = 3;

    protected $positions = [
        self::POSITION_HEAD => [
            "name" =>  "Head",
            "class" =>  "",
        ],
        self::POSITION_BODY => [
            "name" =>  "Body",
            "class" =>  "",
        ],
        self::POSITION_FOOTER => [
            "name" =>  "Footer",
            "class" =>  "",
        ],
    ];

    protected $type = [
        self::TYPE_CSS => [
            'name' =>  "CSS",
            'class' =>  "",
        ],
        self::TYPE_JS => [
            'name' =>  "JS",
            'class' =>  "",
        ],
    ];

    public function getPosition()
    {
        return Arr::get($this->positions, $this->s_position, []);
    }

    public function getType()
    {
        return Arr::get($this->type, $this->s_type, []);
    }

    protected static function newFactory()
    {
        return \TrungPhuNA\Setting\Database\factories\SettingEmbedCodeFactory::new();
    }
}
