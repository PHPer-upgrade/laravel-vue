<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Base
{
    use SoftDeletes;

    protected $fillable = [
        'category_id', 'title', 'thumbnail', 'auther', 'content', 'tag_include', 'source', 'is_audit', 'recommend', 'status',
    ];

    // 关联所有的评论
    public function comments()
    {
        return $this->hasMany('App\Models\ArticleComment', 'article_id', 'id');
    }

    // 关联所有的互动
    public function interactives()
    {
        return $this->hasMany('App\Models\ArticleInteractive');
    }

    // 关联菜单表
    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }

}
