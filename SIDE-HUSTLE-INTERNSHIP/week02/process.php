<?php
     session_start();

     /**
      * @login
      * params ()
      * return (redirect or $message);
      */
     function login ()
     {
          try {
               if (empty($_POST['email']) || empty($_POST['password']))
               {
                    throw new Exception("Please provide your credentials!");
               } else {
                    foreach ($_SESSION['users'] as $user) {
                         if (($user['email'] === $_POST['email'] || $user['username'] === $_POST['email']) && $user['password'] === $_POST['password'] ) {
                              $_SESSION['auth_user'] = $user;
                              break;
                         }
                    }
                    if (isset($_SESSION['auth_user'])) {
                         header("location: index.php");
                    } else {
                         $message = "Please provide your credentials!";
                    }
               }
          }
          catch (Exception $e)
          {
               $message = $e->getMessage();
          }
          return $message;
     }

     /**
      * @register
      * params ()
      * return (redirect or $message);
      * ==========================================================
      * Note: Please no Uniqueness in mail and username check...
      * will be provided on request :) 
      * ==========================================================
      */
     function register ()
     {
          $message = '';
          try {
               if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])) {
                    throw new Exception("Please Fill all Fields");
               } else {
                    if ($_POST['password'] !== $_POST['confirm_password']) {
                         throw new Exception("Password did not match!");
                    } else {
                         $new_user = [
                              'email' => $_POST['email'],
                              'username' => $_POST['username'],
                              'password' => $_POST['password']
                         ];

                         array_push($_SESSION['users'], $new_user);
                         header("location: login.php");
                    }
               }
          }
          catch (Exception $e)
          {
               echo $e->getMessage();
          }
          return $message;
     }



     // try {
     //      if (!empty($_POST['email']) && !empty($_POST['password'])) {
     //          if ($_POST['email'] !== $_SESSION['email'] || $_POST['email'] !== $_SESSION['username']) {
     //              throw new Exception("Account not Recognised!");
     //          } else {
     //              if ($_POST['password'] !== $_SESSION['password']) {
     //                  throw new Exception("Account not Recognised!");
     //              } else {
     //                  $_SESSION['user'] = array($_POST['email']);
     //                  header("location: index.php");
     //              }
     //          }
     //      }
     //      throw new Exception("Please input all fields!");
     //  } catch (Exception $e) {
     //      echo $e->getMessage();
     //  }