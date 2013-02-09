<?php
	//Create a DI
    $di = new Phalcon\DI\FactoryDefault();

    //Set the database service
    $di->set('db', function(){
        return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
            "host" => "localhost",
            "username" => "root",
            "password" => "",
            "dbname" => "imenik"
        ));
    });
?>