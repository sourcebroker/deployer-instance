<?php

namespace SourceBroker\DeployerInstance;

class Instance
{
    public function getCurrentInstance()
    {
        if (getenv('INSTANCE') === false) {
            $configFile = getcwd() . '/.env';
            if (file_exists($configFile)) {
                (new \Symfony\Component\Dotenv\Dotenv())->load($configFile);
            } else {
                throw new \Exception('Missing file "' . $configFile . '"', 1500717945887);
            }
            if (getenv('INSTANCE') === false) {
                throw new \Exception('INSTANCE var is no set. Please
            set one of them with the name of INSTANCE which should corenspond to server() name.', 1500717953824);
            }
        }
        return getenv('INSTANCE');
    }
}