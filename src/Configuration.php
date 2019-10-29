<?php

namespace SourceBroker\DeployerInstance;

use Deployer\Deployer;

class Configuration
{
    /*
 * Returns info only about ssh server.
 *
 * Example:
   [beta] => Deployer\Server\Environment Object
        (
            [values:Deployer\Server\Environment:private] => Deployer\Collection\Collection Object
                (
                    [collection:Deployer\Collection\Collection:private] => Array
                        (
                            [server] => Array
                                (
                                    [name] => beta
                                    [host] => vm-dev.example.com
                                    [port] => 22
                                )

                            [deploy_path] => /home/www/example.com/beta
                            [public_urls] => Array
                                (
                                    [0] => https://beta.example.com
                                )

                        )

                )

            [protectedNames:Deployer\Server\Environment:private] => Array
                (
                    [0] => server
                )

        )
 */
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

    /*
     * Returns info only about ssh server.
     *
     * Example:
       [beta] => Deployer\Server\Remote\NativeSsh Object
            (
                [mkdirs:Deployer\Server\Remote\NativeSsh:private] => Array
                    (
                    )

                [configuration:Deployer\Server\Remote\NativeSsh:private] => Deployer\Server\Configuration Object
                    (
                        [authenticationMethod:Deployer\Server\Configuration:private] => 0
                        [name:Deployer\Server\Configuration:private] => beta
                        [host:Deployer\Server\Configuration:private] => vm-dev.example.com
                        [port:Deployer\Server\Configuration:private] => 22
                        [user:Deployer\Server\Configuration:private] => deploy-user
                        [password:Deployer\Server\Configuration:private] =>
                        [configFile:Deployer\Server\Configuration:private] =>
                        [publicKey:Deployer\Server\Configuration:private] =>
                        [privateKey:Deployer\Server\Configuration:private] =>
                        [passPhrase:Deployer\Server\Configuration:private] =>
                        [pemFile:Deployer\Server\Configuration:private] =>
                        [pty:Deployer\Server\Configuration:private] =>
                    )

            )

     */
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
