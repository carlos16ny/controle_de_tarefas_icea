<?php
class Login
{

    private $matricula;
    private $senha;
    public $conn;

    public function __construct()
    {
        $database = new Database();
        $dbSet = $database->connection();
        $this->conn = $dbSet;
    }
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;
    }
    public function setSenha($senha)
    {
        $this->senha = sha1($senha);
    }
    public function existsLogin()
    {
        $query = "SELECT s.name, s.registration, s.email, s.surname, c.name as curso FROM student s, course c WHERE registration = :matricula AND password = :senha AND c.id = s.course_id ;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":matricula", $this->matricula);
        $stmt->bindParam(":senha", $this->senha);
        $stmt->execute();
        return $stmt;
    }

    public function insertAluno($dados){
        $query = "INSERT INTO student (`registration`,`name`,`surname`,`email`,`password`,`course_id`) VALUES (:matricula, :nome, :sobrenome, :email, :senha, :curso);";
        $stmt = $this->conn->prepare($query);
        try{
            $stmt->execute($dados);
            return 1;
        }catch(PDOException $e){
            
            return 0;
        }
    }
}
