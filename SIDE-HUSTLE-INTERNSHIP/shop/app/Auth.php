<?php

    require_once "DBConnect.php";
    require_once "Traits/Validate.php";
    
    class Auth extends DBConnect {
        use Validate;

        public function __construct () 
        {
            parent::__construct();
        }

        public function create ()
        {
            $data = $this->validateRegister();
            if ($data === "error") return "Please Provide the needed Data!";
            if ($this->testUniqueEmail($data['email']) === true) return "Email in Use by Another Customer!";
            $sql = "INSERT INTO shopUser (shop_name, full_name, email, secret_question, secret_answer, password) values (:shop_name, :full_name, :email, :secret_question, :secret_answer, :password)";
            try {
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':shop_name' => $data['shop_name'], ':full_name' => $data['full_name'], ':email' => $data['email'], ':secret_question' => $data['secret_question'], ':secret_answer' => $data['secret_answer'], ':password' => $data['password']]);
                header("location: login.php");
                if(!$stmt) {
                    throw new Exception('Something Happened ');
                }
            } catch (Exception $err) {
                return $err->getMessage();
            }
        }

        public function login ()
        {
            $data = $this->validateLogin();
            if ($data === "error") return "Username or Password is Incorrect";
            if ($this->testUniqueEmail($data['email']) === false) return "Username or Password Wrong!";
            $result = $this->getUserByEmail($data['email']);
            if ($this->authUser($result) === false) {
                return "Username or Password Wrong!";
            }
            $user = $this->getAuthUser($data['email']);
            // create session for user
            $_SESSION['authUser'] = $user;
            return true;
        }

    }

    $auth = new Auth();