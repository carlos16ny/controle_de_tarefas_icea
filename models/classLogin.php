<?php
class Login {
    private $matricula;
    private $senha;
    public $conn;

    public function __construct(){
        $database = new Database();
        $dbSet = $database->connection();
        $this->conn = $dbSet;
    }


    public function setMatricula($matricula){
        $this->matricula = $matricula;

    }

    public function setSenha($senha){
        $this->senha = sha1($senha);
    }
    public function existsLogin(){
        $query = "SELECT * FROM `student` WHERE `registration` = :matricula  AND `password` = :senha; ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":matricula", $this->matricula);
        $stmt->bindParam(":senha", $this->senha);
        $stmt->execute();
        return $stmt;
    }
}

?>

