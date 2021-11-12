<?php

abstract class Worker {
    public $name;
    public $age;
    public $city;

    abstract function assignTask($task);
    abstract function transfer();
    abstract function fire();

}