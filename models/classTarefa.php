<?php
class Tarefa{

    public $conn;

    public function __construct()
    {
        $db = new Database();
        $dbSet = $db->connection();
        $this->conn = $dbSet;
    }

    public function insertTask($dados){
        $query = "INSERT INTO tasks (`student_registration`, `class_id`, `name`, `total`, `nota`, `data_ini`, `data_fin`, `color` ) VALUES (:matricula, :materia_id, :nome, :valor, 0, :data_inicio, :data_final, :cor)";
        $stmt = $this->conn->prepare($query);
        try{
            $stmt->execute($dados);
            return 1;
        }catch(PDOException $e){
            echo $e->getMessage();
            return 0;
        }
    }

    public function deleteTask($id){
        $query = "DELETE FROM tasks WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        try{
            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            echo $e->getMessage();
            return 0;
        }
    }

    public function editTask($dados){
        $query = "UPDATE tasks SET name = :nome, total = :valor, nota = :nota , data_ini = :data_inicio, data_fin = :data_final, color = :cor WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        try{
            $stmt->execute($dados);
            return 1;
        }catch(PDOException $e){
            echo $e->getMessage();
            return 0;
        }
    }

    public function getAllTasksByAluno($dados){
        $query = "SELECT * FROM tasks WHERE student_registration = :matricula AND class_id = :materia;";
        $stmt = $this->conn->prepare($query);
        $stmt->execute($dados);
        return $stmt;
    }

}
?>