<?php 

class Database{

    private $host = 'localhost';
	private $user = 'root';
	private $db_name = 'controle_de_tarefas';
	private $pass = '';
    public $conn;

	public function connection(){

		$this->conn = null;

		try {
            $this->conn = new PDO("mysql:host=" . $this->host .  ";dbname=" . $this->db_name, $this->user, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
	}





}
