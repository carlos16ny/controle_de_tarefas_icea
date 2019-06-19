<?php
class Login {
    private $matricula;
    private $senha;
    public $conn;

    public __construct(){
        $database = new Database();
            $dbSet = $database->dbSet();
            $this->conn = $dbSet;
         }
    public function setMatricula($matricula){
        $this->matricula = $matricula;

    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    public existsLogin(){
        $query = "SELECT * FROM `student` WHERE `registration` = :matricula  AND `password` = :senha; ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":matricula", $this->matricula);
        $stmt->bindParam(":senha", sha1($this->senha));
        $stmt->execute();
        return $stmt;
    }
}

?>

