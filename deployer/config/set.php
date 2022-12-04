<?php

namespace Deployer;

use RuntimeException;
use SourceBroker\DeployerInstance\Env;

set('local_host', function () {
    $env = new Env();
    $env->load();
    $instance = $env->get('INSTANCE');
    if ($instance === null) {
        throw new RuntimeException(
            'INSTANCE var is no set.',
            1602784218
        );
    }

    return $instance;
});

set('argument_host', function () {
    return input()->getOptions()['host'];
});

set('is_argument_host_the_same_as_local_host', function () {
    return get('local_host') === input()->getOptions()['host'];
});
