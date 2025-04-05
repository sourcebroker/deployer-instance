<?php

namespace SourceBroker\DeployerInstance;

use Symfony\Component\Dotenv\Dotenv;

class Env
{
    protected static $envLoaded = false;

    public function load(?string $configFile = null, ?string $envKey = null): void
    {
        if (self::$envLoaded === false) {
            $dotEnv = new Dotenv();
            $configFile = $configFile ?? $this->projectRootAbsolutePath() . '/.env';
            if (file_exists($configFile)) {
                if (method_exists($dotEnv, 'loadEnv')) {
                    $dotEnv->loadEnv($configFile, $envKey);
                } else {
                    $dotEnv->load($configFile);
                }
            } else {
                $env = getenv();
                $dotEnv->populate($env);
            }
            self::$envLoaded = true;
        }
    }

    /**
     * @return mixed|null
     */
    public function get(string $envName)
    {
        return $_ENV[$envName] ?? null;
    }

    public function projectRootAbsolutePath(): string
    {
        $dir = __DIR__;
        while ((!is_file($dir . '/composer.json') && !is_file($dir . '/root_dir') && !is_file($dir . '/deploy.php')) || basename($dir) === 'deployer-instance') {
            if ($dir === \dirname($dir)) {
                break;
            }
            $dir = \dirname($dir);
        }

        return $dir;
    }
}
