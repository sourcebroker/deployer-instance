<?php

namespace SourceBroker\DeployerInstance;

use Deployer\Deployer;
use Deployer\Host\Host;
use Deployer\Task\Context;
use Deployer\Exception\GracefulShutdownException;

class Configuration
{
    public static function getHost($hostName): Host
    {
        if (Deployer::get()->hosts->has($hostName)) {
            return Deployer::get()->hosts->get($hostName);
        }
        throw new GracefulShutdownException('Name of host "' . $hostName . '" is not on hosts list:' .
            implode(',', array_keys(Deployer::get()->hosts)) . "\n" . 'Please check case sensitive.',
            1500717628491);
    }

    public static function getLocalHost(): Host
    {
        $localHostName = Context::get()->getConfig()->get('local_host');
        if (Deployer::get()->hosts->has($localHostName)) {
            return Deployer::get()->hosts->get($localHostName);
        }
        throw new GracefulShutdownException('Name of host "' . $localHostName . '" is not on hosts list:' .
            implode(',', array_keys(Deployer::get()->hosts)) . "\n" . 'Please check case sensitive.',
            1500717628491);
    }
}
