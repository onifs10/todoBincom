<?php


namespace App;


use \PDO;

class TodoClass
{
    /**
     * @var PDO
     */
    private $database;

    public function __construct()
    {
        try
        {
            /* Actual connection */
            $this->database = new PDO('mysql:host=127.0.0.1;dbname=todo', 'root',  '');
            /* Set some parameters */
            $this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->database->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
        }
        catch (PDOException $e)
        {
            /* If there is an error an exception is thrown */
            pdo_exception($e);
        }
    }


}