<?php

namespace Deployer;

use SourceBroker\DeployerInstance\Env;

set('default_stage', function () {
    $instance = (new Env())->get('INSTANCE');
    if ($instance === null) {
        throw new \RuntimeException(
            'INSTANCE var is no set.',
            1602784218
        );
    }
    return $instance;
});

set('argument_stage', function () {
    return input()->getArgument('stage');
});
