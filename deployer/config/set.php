<?php

namespace Deployer;

use SourceBroker\DeployerInstance\Instance;

// Deployer standard settings. By setting 'default_stage' you can do 'dep db:backup' instead of 'dep db:backup local'
// Its sometimes equal to 'current_instance' but only when no stage is set on command.
set('default_stage', function () {
    return (new Instance)->getCurrentInstance();
});

// Return current instance name. Based on that scripts knows from which server() takes the data to database operations.
set('current_stage', function () {
    return (new Instance)->getCurrentInstance();
});

set('target_stage', function () {
    return !empty(input()->getArgument('stage')) ? input()->getArgument('stage') : get('default_stage');
});