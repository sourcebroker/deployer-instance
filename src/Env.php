<?php

namespace SourceBroker\DeployerInstance;

use RuntimeException;
use Symfony\Component\Dotenv\Dotenv;

class Env
{
    protected static $envLoaded = false;

    /**
     * @param string|null $configFile
     * @param null $envKey
     */
    public function load(string $configFile = null, $envKey = null): void
    {
        if (self::$envLoaded === false) {
            $configFile = $configFile ?? getcwd() . '/.env';
            if (file_exists($configFile)) {
                $dotEnv = new Dotenv();
                if (method_exists($dotEnv, 'loadEnv')) {
                    $dotEnv->loadEnv($configFile, $envKey);
                } else {
                    $dotEnv->load($configFile);
                }
                self::$envLoaded = true;
            } else {
                throw new RuntimeException('Missing config file. Searching in: '
                    . "\n" . $configFile, 1500717945887);
            }
        }
    }

    /**
     * @param string $envName
     * @return mixed|null
     */
    public function get(string $envName)
    {
        return $_ENV[$envName] ?? null;
    }
}
