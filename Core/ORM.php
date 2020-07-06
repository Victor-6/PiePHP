<?php

namespace Core;

class ORM
{
    private $bdd;

    public function __construct()
    {
        try {
            $this->bdd = new \PDO('mysql:host=localhost;dbname=cinema;charset=UTF8', 'root', 'Victor@Epitech1');
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function create($table, $fields) // retourne un id
    {
        $query = "INSERT INTO $table (email, password) VALUES (";
            foreach ($fields as $key => $value) { // prend les éléments du tableau et les remplace par la valeur qui est entre ""
                $fields[$key] = '"' . $value . '"';
            }
        $query .= implode(", ", $fields) . ")";
        $sql = $this->bdd->prepare($query);
        $sql->execute();
        return $this->bdd->lastInsertId();
    }

    public function read($table, $id) // retourne un tableau associatif
    {
        $query = "SELECT * FROM $table WHERE id = $id";
            $sql = $this->bdd->prepare($query);
        $sql->execute();
        $result = $sql->fetchAll();
        return ($result);
    }

    public function update($table, $id, $fields) // retourne un booleen
    {
        $test = "";

        foreach ($fields as $key => $value) {
            $test .=  $key . "=" . "'". $value . "',";
        }
        $test = substr($test, 0, -1);
        $query = "UPDATE $table SET $test WHERE id = $id";
        $sql = $this->bdd->prepare($query);
        return $sql->execute();
    }

    public function delete($table, $id) // retourne un booleen
    {
        $query = "DELETE FROM $table WHERE id = $id";
        $sql = $this->bdd->prepare($query);
        return $sql->execute();
    }

    public function find($table, $params = array(    // retourne un tableau d'enregistrement
        'WHERE' => '1',
        'ORDER BY' => 'id ASC',
        'LIMIT' => '',
    ))
    {
        $test = "";
        foreach ($params as $key => $value)
        {
            if (!empty($value)){
                $test .= $key . " " . $value . " ";
            } else {
                $key = null;
            }
        }
        $query = "SELECT * FROM $table $test"; // $test correspond au tout ce qui sera dans le foreach (key et value)
        $sql = $this->bdd->prepare($query);
        $sql->execute();
        $result = $sql->fetchAll();
        return $result;
    }

}


