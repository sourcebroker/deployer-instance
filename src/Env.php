<?php

namespace SourceBroker\DeployerInstance;

use RuntimeException;
use Symfony\Component\Dotenv\Dotenv;

class Env
{
    protected static $envLoaded = false;

    /**
     * @param string|null $configFile
     * @param string|null $envKey
     */
    public function load(?string $configFile = null, ?string $envKey = null): void
    {
        if (self::$envLoaded === false) {
            $configFile = $configFile ?? $this->projectRootAbsolutePath() . '/.env';
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
