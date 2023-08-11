<?php
namespace Qs\EasyWechat\MiniProgram\IdCardOCR;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['id_card_ocr'] = function ($app) {
            return new Client($app);
        };
    }
}