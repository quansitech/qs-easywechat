## easywechat4.0扩展
微信许多新的接口在easywechat4.x版本已经不再支持，该扩展实现了官方没有支持的接口

https://easywechat.com/4.x/installation.html 官方文档

### 案装
```text
composer require quansitech/qs-easywechat
```

### 用法

微信公众号用OaProgram

微信小程序用MiniProgram

构造用法类似

简略构造方式
```php
use Qs\EasyWechat\MiniProgram;

$mp = new MiniProgram();

/*
 * 该方式必须在.env文件定义
 * MINI_APPID
 * MINI_APPSECRET
 * MINI_MSG_TOKEN
 * MINI_MSG_AESKEY
 */
```

复杂构造方式
```php
use Qs\EasyWechat\MiniProgram;
$config = [
    'app_id' => '****',
    'secret' => '****',
    'token' => '****',
    'aes_key' => '****',

    'log' => [
        'level' => 'debug',
        'file' => __DIR__.'/wechat.log',
    ],

    'response_type' => 'array'
];
$mp = new MiniProgram($config);
```

1. 手机号验证
> [微信接口文档](https://developers.weixin.qq.com/miniprogram/dev/OpenApiDoc/user-info/phone-number/getPhoneNumber.html)
> 
> 用法
>  ```php
> use Qs\EasyWechat\MiniProgram;
> 
> $mp = new MiniProgram();
> $res = $mp->app->phone_number->getUserPhoneNumber($code);
> echo $res['phone_info']['purePhoneNumber'];
>  ```

2. 身份证识别
> [微信接口文档](https://developers.weixin.qq.com/miniprogram/dev/OpenApiDoc/img-ocr/ocr/idCardOCR.html)
> 
> 用法
> ```php
> use Qs\EasyWechat\MiniProgram;
> 
> $mp = new MiniProgram();
> $img_data = file_get_contents(WWW_DIR . '/idcard.png');
> $res = $mp->app->id_card_ocr->scanByImg(base64_encode($img_data));
> 
> $mp->app->id_card_ocr->scanByImgUrl("http://test.com/idcard.png");
> ```
