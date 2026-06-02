<?php

class Koneksi_db
{
    private $db_host = "localhost";
    private $db_user = "user";
    private $db_pass = "password";
    private $db_name = "database";

    private $con = false;
    private $hasil = array();

    public function connect()
    {
        if (!$this->con) {
            $myconn = @mysqli_connect($this->db_host, $this->db_user, $this->db_pass);
            @mysqli_set_charset(mode: 'utf8', mysql: $myconn);
            if ($myconn) {
                $seldb = @mysqli_select_db($this->db_name, $myconn);
                if ($seldb) {
                    $this->con = true;
                    return true;
                } else {
                    array_push(array: $this->hasil, values: mysqli_error());
                    return false;
                }
            } else {
                array_push(array: $this->hasil, values: mysqli_error());
                return false;
            }
        } else {
            return true;
        }
    }
}
