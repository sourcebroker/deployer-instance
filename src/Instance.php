<?php

namespace SourceBroker\DeployerInstance;

class Instance
{
    public function getLocalInstance()
    {
        if (getenv('INSTANCE') === false) {
            $configFile = getcwd() . '/.env';
            (new \Symfony\Component\Dotenv\Dotenv())->loadEnv($configFile);
            if (getenv('INSTANCE') === false) {
                throw new \Exception('INSTANCE var is no set. Please
            set one of them with the name of INSTANCE which should corresponds to host() name.', 1500717953824);
            }
        }
        return getenv('INSTANCE');
    }
}
