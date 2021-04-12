

# zyan/baidu-zz-push

百度推送 百度站长普通收录 api 多站点批量提交

- [x] 批量提交
- [x] 多站点提交(无需指定域名,由程序自动拆分)

## 要求

1. php >= 7.3
2. Composer

## 安装

```shell
composer require zyan/baidu-zz-push -vvv
```
## 用法

```php
use Zyan\BaiduZzPush\BaiduZzPush;

$token = '准入密钥';

$baidu = new BaiduZzPush($token);
```

单条推送

```php
$baidu->push('http://www.php127.com/article/100000.html');
```

多条推送

```php
$urls = [
    'http://www.test.com/article/100000.html',
    'http://www.php127.com/article/100001.html'
];

$baidu->pushs($urls);
```

返回示例
```php
//多个站点会拆分多次推送,并反回相应站点的结果
Array
(
    [www.test.com] => Array
        (
            [error] => 401
            [message] => site error
        )

    [www.php127.com] => Array
        (
            [remain] => 99999
            [success] => 1
        )

)
```

## 参与贡献

1. fork 当前库到你的名下
2. 在你的本地修改完成审阅过后提交到你的仓库
3. 提交 PR 并描述你的修改，等待合并

## License

[MIT license](https://opensource.org/licenses/MIT)
