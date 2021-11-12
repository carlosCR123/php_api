<?php

class Painter extends Worker {

    function assignTask($task)
    {
        echo "Now the painter " . $this->name . "is working on " . $task;
    }
    
    function transfer()
    {
        echo "The painter " . $this->name . "was transfered to another city";
    }

    function fire()
    {
        echo "Sorry painter " . $this->name . " you were fired";
    }

}