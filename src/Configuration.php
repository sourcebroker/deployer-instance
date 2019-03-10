<?php

namespace SourceBroker\DeployerInstance;

use Deployer\Deployer;

class Configuration
{
    public static function getEnvironment($name)
    {
        try {
            $environment = Deployer::get()->environments[$name];
        } catch (\RuntimeException $e) {
            throw new \RuntimeException('Name of instance "' . $name . '" is not on the environments list:' .
                implode(',', array_keys(Deployer::get()->environments)) . "\n" . 'Please check case sensitive.',
                1500717628491);
        }
        return $environment;
    }

    public static function getServer($name)
    {
        try {
            $server = Deployer::get()->servers[$name];
        } catch (\RuntimeException $e) {
            throw new \RuntimeException('Name of instance "' . $name . '" is not on the environments list:' .
                implode(',', array_keys(Deployer::get()->servers)) . "\n" . 'Please check case sensitive.',
                1500717628491);
        }
        return $server;
    }
}