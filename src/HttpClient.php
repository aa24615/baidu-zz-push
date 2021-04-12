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
 * Class HttpClient.
 *
 * @package Zyan\BaiduZzPush
 *
 * @author 读心印 <aa24615@qq.com>
 */
class HttpClient
{
    /**
     * post.
     *
     * @param string $token
     * @param string $site
     * @param array $urls
     *
     * @return
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public static function post($token, $site, $urls)
    {
        $api = "http://data.zz.baidu.com/urls?site={$site}&token={$token}";
        $ch = curl_init();
        $options = array(
            CURLOPT_URL => $api,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => implode("\n", $urls),
            CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
        );
        curl_setopt_array($ch, $options);
        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }
}
