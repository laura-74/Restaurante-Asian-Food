<?php

class Database {
    private $host = "localhost";
    private $dbname = "asianFood";
    private $username = "root";
    private $password = "";
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function create($table, $data) {
        $columns = implode(", ", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        $stmt = $this->conn->prepare($sql);
        foreach ($data as $key => &$val) {
            $stmt->bindParam(":$key", $val);
        }
        return $stmt->execute();
    }

    public function read($table, $conditions = []) {
        $sql = "SELECT * FROM $table";
        if (!empty($conditions)) {
            $sql .= " WHERE " . implode(" AND ", array_map(function($key) {
                return "$key = :$key";
            }, array_keys($conditions)));
        }
        $stmt = $this->conn->prepare($sql);
        foreach ($conditions as $key => &$val) {
            $stmt->bindParam(":$key", $val);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($table, $data, $conditions) {
        $set = implode(", ", array_map(function($key) {
            return "$key = :$key";
        }, array_keys($data)));
        $where = implode(" AND ", array_map(function($key) {
            return "$key = :$key";
        }, array_keys($conditions)));
        $sql = "UPDATE $table SET $set WHERE $where";
        $stmt = $this->conn->prepare($sql);
        foreach (array_merge($data, $conditions) as $key => &$val) {
            $stmt->bindParam(":$key", $val);
        }
        return $stmt->execute();
    }

    public function delete($table, $conditions) {
        $where = implode(" AND ", array_map(function($key) {
            return "$key = :$key";
        }, array_keys($conditions)));
        $sql = "DELETE FROM $table WHERE $where";
        $stmt = $this->conn->prepare($sql);
        foreach ($conditions as $key => &$val) {
            $stmt->bindParam(":$key", $val);
        }
        return $stmt->execute();
    }
}

?>

