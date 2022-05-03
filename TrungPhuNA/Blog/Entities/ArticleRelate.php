<?php

namespace TrungPhuNA\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArticleRelate extends Model
{
    use HasFactory;

    protected $table = 'articles_relate';
}
