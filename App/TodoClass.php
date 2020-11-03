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
        catch (\PDOException $e)
        {
            /* If there is an error an exception is thrown */
            \pdo_exception($e);
        }
    }

    public  function  index()
    {
        $query = "SELECT * FROM todo ";
        $result =  $this->database->prepare($query);
        $result->execute();
        $result_out = [];
        foreach ($result as $row) {
            $result_out[] = ['id' => $row['id'],'title' => $row['title'],'body' => $row['body'] ,'done' => $row['done'], 'date' => $row['updated_at']];
        }
        return $result_out;
    }

    public function create(string $title , string $body)
    {
        try{
            $this->database->beginTransaction();
            $query = "INSERT INTO `todo` ( `title`, `body`) VALUES ( ?, ?)";
            $statement = $this->database->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $this->database->commit();
            return $statement->execute([ $title , $body]);
        }catch(\Exception $e)
        {
            $this->database->rollBack();
            var_dump($e->getMessage());
        }
        
    }
    public function delete($id)
    {
        try{
            $this->database->beginTransaction();
            $query = "DELETE FROM `todo` WHERE `todo`.`id` = ?";
            $statement = $this->database->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $this->database->commit();
            return $statement->execute([$id]);
        }catch(\Exception $e)
        {
            $this->database->rollBack();
            var_dump($e->getMessage());
        }
    }

    public function done($id)
    {
        try{
            $this->database->beginTransaction();
            $query = "UPDATE `todo` SET `done` = '1' , `updated_at` = NOW() WHERE `todo`.`id` = ?";
            $statement = $this->database->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $this->database->commit();
            return $statement->execute([$id]);
        }catch(\Exception $e)
        {
            $this->database->rollBack();
            var_dump($e->getMessage());
        }
    }

    public function undone($id)
    {
        
        try{
            $this->database->beginTransaction();
            $query = "UPDATE `todo` SET `done` = '0' WHERE `todo`.`id` = ?";
            $statement = $this->database->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $this->database->commit();
            return $statement->execute([$id]);
        }catch(\Exception $e)
        {
            $this->database->rollBack();
            var_dump($e->getMessage());
        }
    }
}