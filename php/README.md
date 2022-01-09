php vendor/bin/phpunit tests/ExampleAssertionTest.php

vendor/bin/phpunit tests/ExampleAssertionTest.php
vendor/bin/phpunit tests/ExampleAssertionTest.php --colors
vendor/bin/phpunit tests/ExampleAssertionTest.php --colors --filter test_name_here


Configure
    - create file phpunit.xml
    - Update with this
        <?xml version="1.0" encoding="UTF-8"?>
        <phpunit colors="true" cacheResult="false" bootstrap="vendor/autoload.php">
            <testsuites>
                <testsuite name="Tests">
                    <directory>tests</directory>
                </testsuite>
            </testsuites>
        </phpunit>
    - Point it to a bootstrap="vendor/autoload.php" -->> for autoloading
    - cacheResult="false" if run on small project
    - Add this to your composer
            "autoload": {
                "psr-4": {
                    "App\\": "src"
                }
            }
    - make sure you now use "use Namespace" e.g "use App\Cart";
    - run "composer dump-autoload -o"
        NOTE: if issue "composer dump-autoload"

Try and autoload test sub-folder


    -when you run setUp() method on test remember to add function return :void
    - Use this when test looks like it is cached or parameter not changing on class static properties
        protected function tearDown(): void
        {
            
        }

    - use symfony/var-dumper to dump data on the fly... -->> dd($var)
    - Test double is when you want to test part of your system thta depends on another part of your system
    - Replace functionality with fake or Mock Functionality