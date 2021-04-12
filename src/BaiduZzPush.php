<?php
/*
 * This file is part of the zyan/baidu-zz-push.
 *
 * (c) 读心印 <aa24615@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Zyan\BaiduZzPush;

/**
 * Class Page.
 *
 * @package Zyan\Page
 *
 * @author 读心印 <aa24615@qq.com>
 */

class BaiduZzPush
{
    /**
     * @var string
     */
    protected $token;

    /**
     * Page constructor.
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }


    /**
     * 批量提交.
     *
     * @param array $urls
     *
     * @return array
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public function pushs(array $urls)
    {
        $list = $this->assembly($urls);

        $res = [];
        foreach ($list as $key => $val) {
            $res[$key] = HttpClient::post($this->token, $key, $val);
        }

        return $res;
    }


    /**
     * 推送一条.
     *
     * @param string $url
     *
     * @return array
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public function push(string $url)
    {
        return $this->pushs([$url]);
    }

    /**
     * getSite.
     *
     * @param array $urls
     *
     * @return array
     *
     * @author 读心印 <aa24615@qq.com>
     */

    public function assembly(array $urls)
    {
        $list = [];
        foreach ($urls as $url) {
            $parse = parse_url($url);
            $list[$parse['host']][] = $url;
        }

        return $list;
    }
}
