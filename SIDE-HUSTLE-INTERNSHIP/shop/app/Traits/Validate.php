<?php

    trait Validate {
        private function validateLogin ()
        {
            if (empty($_POST['email']) || empty($_POST['password']))
            {
                return "error";
            }
            $data = [
                "email" => filter_var((stripslashes($_POST['email'])), FILTER_VALIDATE_EMAIL),
                "password" => filter_var($_POST['password'], FILTER_SANITIZE_STRING)
            ];
            return $data;
        }


        public function validateRegister ()
        {
            if (empty($_POST['shop_name']) || empty($_POST['full_name']) || empty($_POST['email']) || empty($_POST['secret_question'])  || empty($_POST['secret_answer']) || empty($_POST['password']) || $_POST['password'] !== $_POST['confirm_password'])
            {
                return "error";
            }
            $data = [
                "shop_name" => filter_var(stripslashes(strip_tags(htmlspecialchars($_POST['shop_name']))), FILTER_SANITIZE_STRING),
                "full_name" => filter_var(stripslashes(strip_tags(htmlspecialchars($_POST['full_name']))), FILTER_SANITIZE_STRING),
                "email" => filter_var(strip_tags($_POST['email']), FILTER_SANITIZE_STRING),
                "secret_question" => filter_var(stripslashes(strip_tags($_POST['secret_question'])), FILTER_SANITIZE_STRING),
                "secret_answer" => filter_var(stripslashes(strip_tags($_POST['secret_answer'])), FILTER_SANITIZE_STRING),
                "password" => password_hash(filter_var(stripslashes(htmlspecialchars($_POST['password'])), FILTER_SANITIZE_STRING), PASSWORD_BCRYPT)
            ];

            return $data;
        }

        private function getAuthUser($email)
        {
            $stmt = $this->conn->prepare("SELECT email, full_name, shop_name FROM shopUser WHERE email=:email");
            $stmt->execute([':email' => $email]);
            return $stmt->fetch();
        }

        private function fetchEmail($email)
        {
            $stmt = $this->conn->prepare("SELECT email, password FROM shopUser WHERE email=:email");
            $stmt->execute([':email' => $email]);
            return $stmt->fetch();
        }

        private function authUser ($data)
        {
            $result = password_verify(filter_var(stripslashes(htmlspecialchars($_POST['password'])), FILTER_SANITIZE_STRING), $data['password']);
            if(!$result)
            {
                return false;
            } else {
                return true;
            }
        }

        private function testUniqueEmail (string $email)
        {
            if (empty($this->fetchEmail($email))) {
                return false;
            } else {
                return true;
            }
        }

        private function getUserByEmail (string $email)
        {
            return $this->fetchEmail($email);
        }
    }