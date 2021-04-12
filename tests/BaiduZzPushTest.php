<?php

/*
 * This file is part of the zyan/baidu-zz-push.
 *
 * (c) 读心印 <aa24615@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Zyan\Tests;

use PHPUnit\Framework\TestCase;
use Zyan\BaiduZzPush\BaiduZzPush;

/**
 * Class BaiduZzPushTest.
 *
 * @package Zyan\Tests
 *
 * @author 读心印 <aa24615@qq.com>
 */
class BaiduZzPushTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->token = 'test123';
        $this->url = 'http://www.baidu.com/test.html';
        $this->urls = [$this->url,'http://www.php127.com/test.html'];
    }

    public function testAssembly()
    {
        $baidu = new BaiduZzPush($this->token);

        $res = $baidu->assembly([$this->url]);
        $this->assertTrue(count($res) == 1);
    }

    public function testAssembly2()
    {
        $baidu = new BaiduZzPush($this->token);

        $res = $baidu->assembly($this->urls);
        $this->assertTrue(count($res) == 2);
    }


    public function testPush()
    {
        $baidu = new BaiduZzPush($this->token);

        $res = $baidu->push($this->url);

        $this->assertTrue(count($res) == 1);
    }

    public function testPushs()
    {
        $baidu = new BaiduZzPush($this->token);

        $res = $baidu->pushs($this->urls);

        print_r($res);
        $this->assertTrue(count($res) == 2);
    }
}