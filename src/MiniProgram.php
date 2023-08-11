<?php
namespace Qs\EasyWechat;

use EasyWeChat\Factory;
use Qs\EasyWechat\MiniProgram\IdCardOCR\ServiceProvider as IdCardOCRServiceProvider;
use Qs\EasyWechat\MiniProgram\PhoneNumber\ServiceProvider as PhoneNumberServiceProvider;

class MiniProgram{

    private $app;

    public function __construct(array $config = [])
    {
        if(empty($config)){
            $new_config = [
                'app_id' => env('MINI_APPID'),
                'secret' => env('MINI_APPSECRET'),
                'token' => env('MINI_MSG_TOKEN'),
                'aes_key' => env('MINI_MSG_AESKEY'),

                'log' => [
                    'default' => 'prod'
                ],

                'response_type' => 'array'
            ];
        }
        else{
            $new_config = $config;
        }


        $this->app = Factory::miniProgram($new_config);
        $this->app->register(new PhoneNumberServiceProvider());
        $this->app->register(new IdCardOCRServiceProvider());
    }

    public function __get($name)
    {
        return $this->$name;
    }
}