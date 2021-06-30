<?php

    namespace Repository\Type;

    use Repository\AbstractRepository;

    class Invoice extends AbstractRepository
    {
        /**
         * return @mixed
         */
        public function save ()
        {
            // TODO: Implement save();
        }


        /**
         * @params int $id
         * return @mixed
         */
        public function findOne (int $id)
        {
            //
        }

        /**
         * @params array $options
         * return @mixed
         */
        public function findByOne (array $option)
        {
            // TODO: Implement findByOne
        }

         /**
         * @params array $options
         * return @mixed
         */
        public function findAllBy (array $options)
        {
            // TODO: Implement findAllBy
        }
    }