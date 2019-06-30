<?php
class Materia
{

    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connection();
    }

    public function getMateriasCursando($aluno)
    {
        $query = "SELECT * FROM student_has_class, class WHERE student_registration = :aluno AND `status` = 1 AND id = class_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":aluno", $aluno);
        $stmt->execute();
        return $stmt;
    }

    public function reductName($name)
    {
        $newName = "";
        if (strlen($name) > 18) {
            $init = explode(" ", $name);
            foreach ($init as $letra) {
                $newName .= (strlen($letra) > 1 ? $letra[0] : "");
            }
        } else {
            $newName = $name;
        }
        return $newName;
    }

    public function getMateriaById($id)
    {
        $query = "SELECT * FROM class WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt;
    }

    public function getAllMateriasLiberadasPorCurso($curso)
    // Materias sem dependencia
    {
        $query = "SELECT DISTINCT t1.nome, t1.class_id FROM 
                        (SELECT c.name as nome, c.id as class_id
                        FROM  course_has_class cc, class c, dependence d 
                        WHERE c.id = cc.class_id AND cc.course_id = :id_curso
                        ) as t1
                    LEFT  JOIN 
                        (SELECT dd.class_id as c_id
                        FROM dependence dd 
                        WHERE dd.course_id = 1
                        ) as t2 
                    ON t2.c_id = t1.class_id WHERE t2.c_id IS NULL;";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id_curso", $curso);
        $stmt->execute();
        return $stmt;
    }

    public function getAllMAteriasLiberadasPorPessoa($dados){
        $query = "  SELECT DISTINCT c.name, c.id, ch.type
                    FROM class c, dependence d, course_has_class ch
                    WHERE c.id = d.class_id AND ch.class_id = c.id AND ch.course_id = :curso AND d.class_id_dep IN 
                        (SELECT s.class_id FROM  student_has_class s WHERE s.student_registration = :matricula AND s.status = 2)
                ;";
        $stmt = $this->conn->prepare($query);
        $stmt->execute($dados);
        return $stmt;
    }

    public function getMateriasConcluidasPoraluno($matricula){
        $query = "SELECT s.class_id FROM  student_has_class s WHERE s.student_registration = :matricula AND s.status = 2";
        $stmt = $this->conn->prepare($query);
        $stmt->execute($matricula);
        return $stmt;
    }

    public function getMateriasPorAluno($matricula){
        $query = "  SELECT cc.type, s.student_registration, c.id, c.name, s.status, cc.semester
                    FROM student_has_class s, class c, course_has_class cc
                    WHERE s.student_registration = :matricula AND s.class_id = c.id AND cc.class_id = c.id AND cc.course_id = (SELECT course_id FROM student WHERE registration = :matricula) ORDER BY cc.semester ASC;
                ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute($matricula);
        return $stmt;
    }

    public function activateMateria($dados){
        $query = "UPDATE student_has_class s SET s.status = 1 WHERE s.student_registration = :matricula AND s.class_id = :id_materia";
        $stmt = $this->conn->prepare($query);
        try{
            $stmt->execute($dados);
            return 1;
        }catch(PDOException $e){
            return 0;
            echo $e->getMessage();
        }
    }

    public function concluirMateria($dados){
        $query = "UPDATE student_has_class s SET s.status = 2 WHERE s.student_registration = :matricula AND s.class_id = :id_materia";
        $stmt = $this->conn->prepare($query);
        try{
            $stmt->execute($dados);
            return 1;
        }catch(PDOException $e){
            return 0;
            echo $e->getMessage();
        }
    }

    public function reprovarMateria($dados){
        $query = "UPDATE student_has_class s SET s.status = 3 WHERE s.student_registration = :matricula AND s.class_id = :id_materia";
        $stmt = $this->conn->prepare($query);
        try{
            $stmt->execute($dados);
            return 1;
        }catch(PDOException $e){
            return 0;
            echo $e->getMessage();
        }
    }

    public function restartMateria($dados){
        $query = "DELETE FROM tasks t WHERE t.student_registration = :matricula AND t.class_id = :id_materia";
        $stmt = $this->conn->prepare($query);
        try{
            $stmt->execute($dados);
            return 1;
        }catch(PDOException $e){
            return 0;
            echo $e->getMessage();
        }
    }

    public function getResultMateria($dados){
        $query = "  SELECT SUM(t.nota) / SUM(t.total) * 100 as resultado
                    FROM tasks t
                    WHERE t.student_registration = :matricula AND t.class_id = :materia
                ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute($dados);
        return $stmt;
    }
}
