<?php
    namespace Repository;

    abstract class AbstractRepository
    {
        abstract public function save();
        abstract public function findOne(int $id);
        abstract public function findByOne(array $options);
        abstract public function findAllBy(array $options);
    }