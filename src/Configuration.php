<?php

namespace SourceBroker\DeployerInstance;

use Deployer\Deployer;
use Deployer\Host\Host;
use Deployer\Task\Context;

class Configuration
{
    public static function getHost($hostName): Host
    {
        if (isset(Deployer::get()->hosts[$hostName])) {
            return Deployer::get()->hosts[$hostName];
        } else {
            throw new \RuntimeException('Name of host "' . $hostName . '" is not on hosts list:' .
                implode(',', array_keys(Deployer::get()->hosts)) . "\n" . 'Please check case sensitive.',
                1500717628491);
        }
    }

    public static function getLocalHost(): Host
    {
        $defaultStage = Context::get()->getConfig()->get('default_stage');
        if (isset(Deployer::get()->hosts[$defaultStage])) {
            return Deployer::get()->hosts[$defaultStage];
        } else {
            throw new \RuntimeException('Name of host "' . $defaultStage . '" is not on hosts list:' .
                implode(',', array_keys(Deployer::get()->hosts)) . "\n" . 'Please check case sensitive.',
                1500717628491);
        }
    }
}
