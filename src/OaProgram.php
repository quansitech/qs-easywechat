<?php
namespace Qs\EasyWechat;

use EasyWeChat\Factory;

class OaProgram{

    private $app;

    public function __construct(array $config = [])
    {
        if(empty($config)){
            $new_config = [
                'app_id' => env('WX_APPID'),
                'secret' => env('WX_APPSECRET'),
                'token' => env('WX_EVENT_TOKEN'),
                'aes_key' => env('WX_EVENT_AESKEY'),

                'log' => [
                    'default' => 'prod'
                ],

                'response_type' => 'array'
            ];
        }
        else{
            $new_config = $config;
        }


        $this->app = Factory::officialAccount($new_config);
    }

    public function __get($name)
    {
        return $this->$name;
    }
}