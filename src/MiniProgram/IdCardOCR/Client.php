<?php
namespace Qs\EasyWechat\MiniProgram\IdCardOCR;

use EasyWeChat\Kernel\BaseClient;

class Client extends BaseClient
{
    public function scanByImgUrl(string $img_url)
    {
        $params = [
            'img_url' => $img_url
        ];

        return $this->httpPost('cv/ocr/idcard', $params);
    }

    public function scanByImg(string $img_base64_content){
        $stream = fopen('data://text/plain;base64,' . $img_base64_content, 'r');

        $params = [
            'img' => $stream
        ];

        return $this->httpUpload('cv/ocr/idcard', [], $params);
    }
}