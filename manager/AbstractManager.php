<?php
namespace App\manager;

Abstract Class AbstractManager
{    
    /**
     * connection database
     * @return $db
     */
    public function dbConnect()
    {
        try
        {
            $db = new \PDO('mysql:host=localhost;dbname=blog_p5;charset=utf8', 'root', 'root');
            return $db;
        }
        catch(Exception $e)
        {
            return $e->getMessage();
    }
    }
}