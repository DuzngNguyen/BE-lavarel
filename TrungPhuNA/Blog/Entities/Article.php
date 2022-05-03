<?php

namespace TrungPhuNA\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $guarded = [''];
    protected $table = 'articles';

    public function menu()
    {
        return $this->belongsTo(Menu::class,'a_menu_id');
    }

    public function articleRelate()
    {
        return $this->belongsToMany(Article::class,'articles_relate','ar_relate_id','ar_article_id');
    }
}
