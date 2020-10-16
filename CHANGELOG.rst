
Changelog
---------

master
~~~~~~

a) [TASK] Add Env class with load() / get() methods.
b) [TASK][BREAKING] Remove class Instance with public method getLocalInstance. Use `(new Env())->get('INSTANCE');` instead.
c) [TASK] Change getenv to $_ENV as default for symfony/dotenv.
d) [TASK] Add ddev config.

3.2.0
~~~~~

a) [TASK] Increase `symfony/dotenv` version.

3.1.0
~~~~~

a) [FEATURE] Use loadEnv function from Symfony\Dotenv if possible.

3.0.0
~~~~~

a) [TASK][BREAKING] Rename getCurrentInstance to getLocalInstance
b) [FEATURE] AddConfiguration->getLocalHost method.
c) [TASK][BREAKING] Refactor on default vars.

2.0.0
~~~~~

a) [TASK][BREAKING] Compatibility with Deployer 6.4+


1.0.1
~~~~~

a) [TASK] Dos.

1.0.0
~~~~~

a) Init version
