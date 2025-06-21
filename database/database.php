<?php

namespace Database;

use PDO;
class Database
{
    public $connection;
    public function __construct()
    {
        $this->connection = new PDO("mysql:host=localhost;dbname=notesapp", "root", "", [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function getNotes()
    {
        $stmt = $this->connection->query("SELECT * FROM Notes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getNote($id)
    {
        $stmt = $this->connection->prepare("SELECT * FROM Notes WHERE id = :id");
        $stmt->bindParam("id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function createNote($data)
    {
        $stmt = $this->connection->prepare("INSERT INTO Notes (create_time, title, description) VALUES (:create_time, :title, :description)");
        // today date
        $date = date("Y-m-d H:i:s");
        $stmt->bindParam("create_time", $date, PDO::PARAM_STR);
        $stmt->bindParam("title", $data["title"], PDO::PARAM_STR);
        $stmt->bindParam("description", $data["description"], PDO::PARAM_STR);
        return $stmt->execute();
    }
    public function updateNote($id, $data)
    {
        $stmt = $this->connection->prepare("UPDATE Notes SET title = :title, description = :description WHERE id = :id");
        $stmt->bindParam("id", $id, PDO::PARAM_INT);
        $stmt->bindParam("title", $data["title"], PDO::PARAM_STR);
        $stmt->bindParam("description", $data["description"], PDO::PARAM_STR);
        return $stmt->execute();
    }
    public function deleteNote($id)
    {
        $stmt = $this->connection->prepare("DELETE FROM Notes WHERE id = :id");
        $stmt->bindParam("id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}

return new Database();