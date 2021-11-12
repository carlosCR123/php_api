<?php

class Programmer extends Worker {

    function assignTask($task)
    {
        echo "Now the programmer " . $this->name . "is working on " . $task;
    }
    
    function transfer()
    {
        echo "The programmer " . $this->name . "was transfered to another department";
    }

    function fire()
    {
        echo "Sorry " . $this->name . " you were fired";
    }

}