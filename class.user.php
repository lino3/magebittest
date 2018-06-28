<?php
include "db_config.php";
 
    class User{
 
        public $db;
        /* connecting to db */
        public function __construct(){
            $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
 
            if(mysqli_connect_errno()) {
                echo "Error: Could not connect to database.";
                    exit;
            }
        }
 
        /* registration process */
        public function reg_user($name,$email,$password){
 
            $password = md5($password);
            $sql="SELECT * FROM users WHERE email='$email'";
 
            //checking if the email is available in db
            $check =  $this->db->query($sql) ;
            $count_row = $check->num_rows;
 
            //if the email is not in db then insert to the table
            if ($count_row == 0){
                $sql1="INSERT INTO users SET name='$name', password='$password', email='$email'";
                $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
                return $result;
            }
            else { return false;}
        }
 
        /* login process */
        public function check_login($email, $password){
 
            $password = md5($password);
            $sql2="SELECT id from users WHERE email='$email' and password='$password'";
 
            //checking if the email and password are available in the table
            $result = mysqli_query($this->db,$sql2);
            $user_data = mysqli_fetch_array($result);
            $count_row = $result->num_rows;
 
            if ($count_row == 1) {
                // this login var will be used for the session
                $_SESSION['login'] = true;
                $_SESSION['id'] = $user_data['id'];
                return true;
            }
            else{
                return false;
            }
        }
 
        /* to show the users name */
        public function get_name($id){
            $sql3="SELECT name FROM users WHERE id = $id";
            $result = mysqli_query($this->db,$sql3);
            $user_data = mysqli_fetch_array($result);
            echo $user_data['name'];
        }
 
        /* starting the session */
        public function get_session(){
            return $_SESSION['login'];
        }
 
        public function user_logout() {
            $_SESSION['login'] = FALSE;
            session_destroy();
        }
 
    }
?>