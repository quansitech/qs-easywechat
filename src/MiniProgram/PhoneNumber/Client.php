<?php
namespace Qs\EasyWechat\MiniProgram\PhoneNumber;

use EasyWeChat\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 获取用户手机号.
     *
     * @see https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/phonenumber/phonenumber.getPhoneNumber.html
     *
     * @param string $code
     *
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     *
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public function getUserPhoneNumber(string $code)
    {
        $params = [
            'code' => $code
        ];

        return $this->httpPostJson('wxa/business/getuserphonenumber', $params);
    }
}