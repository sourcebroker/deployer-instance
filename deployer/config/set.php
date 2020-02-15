<?php

namespace Deployer;

use SourceBroker\DeployerInstance\Instance;

set('default_stage', function () {
    return (new Instance)->getLocalInstance();
});

set('argument_stage', function () {
    return input()->getArgument('stage');
});
