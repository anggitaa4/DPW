<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $paswd = ""; // Dikosongkan jika pakai XAMPP standar Windows
    private $name = "db_praktikum"; // Disamakan dengan nama di phpMyAdmin kamu
    public $con;

    public function __construct() {
        $this->con = new mysqli($this->host, $this->user, $this->paswd, $this->name);
        if ($this->con->connect_error) {
            die("Koneksi database gagal: " . $this->con->connect_error);
        }
    }

    public function getConnection() {
        return $this->con;
    }
}
?>