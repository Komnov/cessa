<?php
namespace DB;

final class MySQLi {
    private $hostname;
    private $username;
    private $password;
    private $database;
    private $port;
    private $connection;

    public function __construct($hostname, $username, $password, $database, $port = '3306') {
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->port = $port;

        $this->connect();
    }

    private function connect() {
        $this->connection = new \mysqli($this->hostname, $this->username, $this->password, $this->database, $this->port);

        if ($this->connection->connect_error) {
            throw new \Exception('Error: ' . $this->connection->connect_error . '<br />Error No: ' . $this->connection->connect_errno);
        }

        $this->connection->set_charset("utf8");
        $this->connection->query("SET SQL_MODE = ''");
        $this->connection->query("SET SESSION sql_mode = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION'");
        
        // Увеличьте время ожидания соединения до 300 секунд (или другого значения по вашему усмотрению)
        $this->connection->options(MYSQLI_OPT_CONNECT_TIMEOUT, 300);
    }

    public function query($sql) {
        // Переподключитесь к серверу, если соединение потеряно
        if (!$this->connection->ping()) {
            $this->connect();
        }

        $query = $this->connection->query($sql);

        if (!$this->connection->errno) {
            if ($query instanceof \mysqli_result) {
                $data = array();

                while ($row = $query->fetch_assoc()) {
                    $data[] = $row;
                }

                $result = new \stdClass();
                $result->num_rows = $query->num_rows;
                $result->row = isset($data[0]) ? $data[0] : array();
                $result->rows = $data;

                $query->close();

                return $result;
            } else {
                return true;
            }
        } else {
            throw new \Exception('Error: ' . $this->connection->error  . '<br />Error No: ' . $this->connection->errno . '<br />' . $sql);
        }
    }

    public function escape($value) {
        return $this->connection->real_escape_string($value);
    }
    
    public function countAffected() {
        return $this->connection->affected_rows;
    }

    public function getLastId() {
        return $this->connection->insert_id;
    }
    
    public function connected() {
        return $this->connection->ping();
    }
    
    public function __destruct() {
        $this->connection->close();
    }
}
?>
