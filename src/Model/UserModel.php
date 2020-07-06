<?php

namespace Model;

use \Core\Database;
use Core\Core;
use Core\Entity;
use Core\ORM;

class UserModel extends Entity
{
    private $email;
    private $password;
    private $orm;

    public function __construct($email, $password)
    {
        $this->orm = new ORM();
        $this->email = $email;
        $this->password = $password;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

//    public static function log()
//    {
//        $email = $_POST['email'];
//        $password = $_POST['password'];
//
//        $_SESSION['id'] = ORM::create("users", [
//            'email' => $email,
//            'password' => $password
//        ]);
//    }

    public function Create($email, $password)
    {
//        $pdo = Database::connection();
//        $query = "INSERT INTO users (email, password) VALUES (:email, :password)";
//        $sql = $pdo->prepare($query);
//        $sql->bindParam(':email', $email);
//        $sql->bindParam(':password', $password);
//        $id = $pdo->lastInsertId();
//        $sql->execute();
//        return $id;
        $this->orm->create("users", array(
            'email' => $email,
            'password' => $password
        ));
    }

    public function Read($id)
    {
//        $pdo = Database::connection();
//        $query = "SELECT * FROM users WHERE id = :id";
//        $sql = $pdo->prepare($query);
//        $sql->bindParam(':id', $id);
//        $sql->execute();
//        $result = $sql->fetchAll();
        $this->orm->read("users", $id);
    }

    public function Update($id, $columns, $value)
    {
//        $pdo = Database::connection();
//        $query = "UPDATE users SET $columns = $values WHERE id = :id";
//        $sql = $pdo->prepare($query);
//        $sql->bindParam(':id', $id);
//        $sql->bindParam(':values', $value);
//        $sql->execute();
        $this->orm->update("users", $id, array());
    }

    public function Delete($id)
    {
//        $pdo = Database::connection();
//        $query = "DELETE FROM users WHERE id = :id";
//        $sql = $pdo->prepare($query);
//        $sql->bindParam(':id', $id);
//        $sql->execute();
        $this->orm->delete("users", $id);
    }

    public function Find($table, $params = array())
    {
//        $this->orm->find($table, $params = array(
//            'WHERE' => '1',
//            'ORDER BY' => 'id ASC',
//            'LIMIT' => '',
//        ));
//        print_r($this->orm->find('users'));
    }

    public function Read_all($id)
    {
        $pdo = Database::connection();
        $query = "SELECT * FROM users WHERE id = :id";
        $sql = $pdo->prepare($query);
        $sql->bindParam(':id', $id);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function login($email, $password)
    {
        if (!empty($email) && !empty($password)) {

            $pdo = Database::connection();
            $query = "SELECT * FROM users WHERE email = :email AND password = :password";
            $sql = $pdo->prepare($query);
            $sql->bindParam(':email', $email);
            $sql->bindParam(':password', $password);
            $sql->execute();
            $result = $sql->fetchAll();

            if (!empty($result)) {
                $_SESSION['id'] = $result[0]['id'];
                $_SESSION['email'] = $result[0]['email'];
                return true;
            } else {
                return false;
            }
        }
    }
}