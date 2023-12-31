<?php
namespace Qs\EasyWechat\MiniProgram\PhoneNumber;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $app)
    {
        $app['phone_number'] = function ($app) {
            return new Client($app);
        };
    }
}