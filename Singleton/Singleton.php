<?php

    /**
     * You can define singletonas base class
     * And move your logic to sub class
     */
    class Singleton 
    {
        /**
         * static field is an array that sores instance of singleton
         */
        public static $instance = [];

        /**
         * constructor should not be public 
         */
        protected function __construct()
        {
            
        }

        /**
         * clonning and unserialization are not permitted
         */
        protected function __clone()
        {
            
        }

        public function __wakeup()
        {
            
        }

        /**
         * return Singleton cause error
         */
        public static function getInstance ()
        {
            $subclass = static::class;
            if (!isset(self::$instance[$subclass])) {
                /**
                 * "static" keyword instead of actual class name 
                 * static means current class
                 */
                self::$instance[$subclass] = new static();
            }

            return self::$instance[$subclass];
        }
    }


    /** 
     * Logging class mostly used Singleton
     * You also need a convenient way to access your log globally
     */
    class Logger extends Singleton 
    {
        /**
         * File pointer resource of log file
         */
        private $fileHandle;

        /**
         * Singleton constructor is called only once
         * And opened at all time
         * 
         * Open console stream instead of actual file
         */
        protected function __construct()
        {
            $this->fileHandle = fopen('php://stdout', 'w');
        }

        /**
         * Write Logic
         * write log entry into the existing opened resource
         */
        public function writeLog(string $message): void
        {
            $date = date('Y-m-d');
            fwrite($this->fileHandle, "$date: $message" . PHP_EOL );
        }

        /**
         * Handy shortcut to reduce amount of code needed to log the message
         * from client code
         */
        public static function log (string $message):void
        {
            $logger = static::getInstance();
            $logger->writeLog($message);
        }
    }

    
    /**
     * accessing Singleton from different places
     * Configuration can be accessed from lot of places 
     * That Comfort comes with Singleton also
     */
    class Config extends Singleton
    {
        private $hashmap = [];

        public function getValue (string $key): string
        {
            return $this->hashmap[$key];
        }

        public function setValue (string $key, string $value): void
        {
            $this->hashmap[$key] = $value;
        }
    }

    /**
     * client code
     */
    Logger::log("Started");

    /**
     * Try and Compare Logger Singleton
     */
    $l1 = Logger::getInstance();
    $l2 = Logger::getInstance();
    if ($l1 === $l2) {
        Logger::log("Logger has a single singleton");
    } else {
        Logger::log("Logger has different Singleton");
    }

    // Check how Config Singleton Saves its data
    $config1 = Config::getInstance();
    $login = "test_login";
    $password = "test_password";
    $config1->setValue("login", $login);
    $config1->setValue("password", $password);

    // and restores it
    $config2 = Config::getInstance();
    if ($login === $config2->getValue("login") && $password === $config2->getValue("password")) {
        Logger::log("Config Singleton are one");
    } else {
        Logger::log("Config Singleton also works fine without been same!");
    }

    Logger::log("Finished");