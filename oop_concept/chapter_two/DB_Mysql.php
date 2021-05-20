<?php


class DB_Mysql
{
    protected $user;
    protected $pass;
    protected $dbhost;
    protected $dbname;
    protected $dbh; // Databse connection handle

    public function __construct($user, $pass, $dbhost, $dbname)
    {
        $this->user = $user;
        $this->pass = $pass;
        $this->dbhost = $dbhost;
        $this->dbname = $dbname;
    }

    protected function connect ()
    {
        $this->dbh = mysqli_connect($this->dbhost, $this->user, $this->pass, $this->dbname);
        if (!is_resource($this->dbh)) {
//            throw new Exception('UNABLE TO CONNECT');
            echo "I failed here";
            return $this->dbh;
        }
        if (!mysqli_select_db($this->dbh, $this->dbname)) {
            throw new Exception("DATABSE NOT CONNECTING");
        }
        return $this->dbh;
    }

    public function is_connect ()
    {
        return $this->connect();
    }

}

// $dbh = new DB_Mysql("root", "johnson10", "localhost", "test_oop");
// var_dump($dbh->is_connect());

function connect ($dbhost, $username, $password) {
    $conn = new mysqli($dbhost, $username, $password);
    if ($conn->connect_error) {
        die("Connect Error: " . $conn->connect_error . "\n");
    }
    // return "Connected Succefully \n";
    return $conn;
}

var_dump(connect('localhost', 'root', 'johnson10'));