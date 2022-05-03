<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 9/23/21 .
 * Time: 9:11 PM .
 */

namespace App\Service;


class RenderMetaSeoService
{
    public static function render($options)
    {
        $keywordDefault = 'đồ án cntt, code thuê, làm thuê đồ án tốt nghiệp';

        $title = \Arr::get($options, 'title', 'Chưa cập nhật');
        $desc  = \Arr::get($options, 'description', 'Chưa cập nhật');
        $image = \Arr::get($options, 'avatar', config('app.url_image_social'));
        $type  = \Arr::get($options, 'type', '');
        $keyword = \Arr::get($options, 'keyword', '') . $keywordDefault;
        \SEOMeta::setTitle($title);
        \SEOMeta::setDescription($desc);
        \SEOMeta::setCanonical(\Request::url());
        \SEOMeta::setKeywords($keyword);

        \OpenGraph::addImage($image, ['height' => 315, 'width' => 600]);
        \OpenGraph::setDescription($desc);
        \OpenGraph::setTitle($title);

        if ($type)
            \OpenGraph::addProperty('type', $type);

        \JsonLd::setTitle($title);
        \JsonLd::setDescription($desc);
        \JsonLd::addImage($image);

        \SEOMeta::setRobots(\Arr::get($options, 'robots', 'NOINDEX, NOFOLLOW'));
    }

    public static function setMeta($content)
    {
        RenderMetaSeoService::render([
            'title'       => $content->name,
            'avatar'      => config('app.url_image_social'),
            'description' => $content->description_seo,
            'robots'      => $content->seo,
            'keyword'     => $content->keyword_seo,
        ]);
    }
}
