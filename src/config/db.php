<?php
class database{
    private $host='localhost';
    private $user='chandu';
    private $pswd='Chandu@23';
    private $dbname='abcde';

    public function connect(){
        $conn_str="mysql:host=$this->host;dbname=$this->dbname";
        $conn=new PDO($conn_str,$this->user,$this->pswd);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        return $conn;
    }
}
