<?php
include_once "./examples/Objects/Worker.php";
include_once "./examples/Objects/Programmer.php";
include_once "./examples/Objects/Painter.php";
include_once "./examples/Utils/WorkerFactory.php";


//Se crea la fabrica
$factory = new WorkerFactory();

//Se crea el objeto
$worker = $factory->getWorker('Programmer');


if ($worker) {
    //Se llama a alguna funcion
    $worker->transfer();
}

