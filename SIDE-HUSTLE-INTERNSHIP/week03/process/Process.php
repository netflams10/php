<?php

    class Process
    {
        private $message;
        private $conn = null;

        public function __construct($host = "localhost", $user = "root", $password = "", $dbname = "week_three")
        {
            try {
                $this->conn = new PDO("mysql:host={$host};dbname={$dbname};", $user, $password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                throw new Exception($e->getMessage());
            }
        }

        public function getAllTask()
        {
            $query = "SELECT * FROM task";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }

        public function getOneUpdate($id)
        {
            $query = "SELECT * FROM task WHERE id=:id";
            $stmt = $this->conn->prepare($query);
            try {
                $stmt->execute([":id" => $id]);
                $result = $stmt->fetch();
                if (!($result)) {
                    throw new Exception("404 Task Not Found");
                }
                return $result;
            } catch (Exception $e) {
                return "<h3>" . $e->getMessage() . "</h3>";
            }
        }

        public function createTask()
        {
            $data = $this->filterMyData($_POST['task_name'], $_POST['task_details']);
            $sql = "INSERT INTO task (task_name, task_details) VALUES (:task_name, :task_details)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':task_name' => $data['0'], ':task_details' => $data[1]]);
            return "Saved Propely";
        }

        public function deleteTask()
        {
            //
        }

        private function statementExecutor($statement, $parameters = [])
        {
            try {
                $stmt = $this->conn->prepare($statement);
                $stmt->execute($parameters);
                return $stmt;
            } catch (PDOException $e) {
                return $e->getMessage();
            }
        }

        private function filterMyData($name, $details)
        {
            $data =  array();
            $name = htmlspecialchars(trim($name));
            $details = htmlspecialchars($details);
            array_push($data, $name, $details);

            return $data;
        }
    }

    $execute = new Process();



