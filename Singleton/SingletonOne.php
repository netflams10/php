<?php

    /**
     * Lets client access same same instance of this class
     * constructor is defined private 
     */

    class SingletonOne 
    {
        /**
         * instance is stored in a static field.
         * Singleton can havesub classes
         * Item in array be an instance of a singleton
         */
        private static $instance = [];

        /**
         * constructor must be private 
         * private not to be able to use the [ new ] keyword
         */
        protected function __construct()
        {
            
        }

        /**
         * Singleton should not be cloneable
         */
        public function __clone()
        {
            
        }

        /** 
         * Cannot be restorable form string 
         * */
        public function __wakeup()
        {
            
        }

        /**
         * Controls access method to the singleton instance.
         * place object in the static fields
         * Always return client stored object
         */
        public static function getInstance (): SingletonOne
        {
            $cls = static::class;
            // print_r($cls . PHP_EOL); // @return SingletonOne
            if (!isset(self::$instance[$cls])) {
                self::$instance[$cls] = new static();
            }
            // print_r(self::$instance);
            return self::$instance[$cls];
        }

        /**
         * You can add business logic
         */
        public function someBusinessLogic ()
        {
            // ...
        }
    }


    /**
     * Client code 
     * Acess instance code
     */
    function clientCode ()
    {
        $s1 = SingletonOne::getInstance();
        $s2 = SingletonOne::getInstance();
        if ($s1 === $s2) {
            echo "This is just a single object" . PHP_EOL;
            // print_r($s1);
        } else {
            echo "This is not a fucking single object <br />" . PHP_EOL;
        }
    }

    clientCode();