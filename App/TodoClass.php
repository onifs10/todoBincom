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

    public  function  index()
    {
        $query = "SELECT * FROM todo ";
        $result =  $this->database->query($query);
        $result_out = [];
        foreach ($result as $row) {
            $result_out[] = ['id' => $row['id'],'title' => $row['title'],'body' => $row['body']];
        }
        return $result_out;
    }

    public function create(array $array)
    {
        $query = "INSERT INTO `todo` (`id`, `title`, `body`, `done`, `created_at`, `updated_at`) VALUES (NULL, ?, ?, '0', ?, ?)";
    }
}