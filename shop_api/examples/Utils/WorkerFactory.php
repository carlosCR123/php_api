<?php

class WorkerFactory
{
    public function getWorker($type)
    {
        switch ($type) {
            case 'Programmer':
                return new Programmer();
            case 'Painter':
                return new Painter();
            default:
                return null;
        }
    }
}