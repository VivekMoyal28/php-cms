<?php
session_start();
require_once( dirname( __FILE__ ) . '/../functions/connectionClass.php' );
require_once( dirname( __FILE__ ) . '/../messages/alertClass.php' );
class loginClass  extends connectionClass{
    
    public function checkLogin($username,$password){
        $username= $this->real_escape_string($username);
        $password=  $this->real_escape_string($password);
        $pass = urlencode($password);
        $messages=new alertClass();
        if($username==""||$password==""){
            return $messages->getAlert("Values are empty", "warning");
        }
        else{
            $query="select * from members where username='$username'";
            $result=  $this->query($query);
            $count=  $result->num_rows;
            if($count < 1){
                return $messages->getAlert("Access Denied", "error");
            }
            else{
                $row=  $result->fetch_array(3);
                if($row["password"]==crypt($pass, $row["password"])){
                $_SESSION["username"]=$row["username"];
                $_SESSION["password"]=$row["password"];
                if($_SESSION["username"]==""||$_SESSION["password"]==""){
                    return $messages->getAlert("Some error occurred", "error");
                }
                else
                {
                    header("Location:dashboard.php");
                }
                }
                else
                {
                    return $messages->getAlert("Access Denied", "error");
                }
            }
        }
    }
    
    public function checkCurrentSession(){
        
        $query="select * from members where username='$_SESSION[username]' AND password='$_SESSION[password]'";
        $result=  $this->query($query) or die($this->error);
        $count=  $result->num_rows;
            if($count < 1){
                $this->logout();
            }
            else{}
        
    }
    
    public function logout(){
        session_destroy();
        header("Location:index.php");
    }
    
    public function changePassword($password){
        $newpassword=  $password;
        $encryptPassword=$newpassword;
        $pass = urlencode($encryptPassword);
        $pass_crypt = crypt($pass);
        $message=new alertClass();
        if($pass_crypt=="")
        {
            return $message->getAlert("Please contact administrator", "error");
        }
        else
        {
            $update="update members set password='$pass_crypt'";
            $result=  $this->query($update);
            if($result){
               return $message->getAlert("Your Password is changed", "success"); 
            }
            else
            {
                return $message->getAlert("Error !!! please try again.", "error");
            }
        }
    }    
    public function generatePassword() {
    $this->length= 10;
    $this->chars= '0123456789';
    $this->count= mb_strlen($this->chars);
    for ($this->i;$this->i< $this->length; $this->i++) {
        $this->index = rand(0, $this->count - 1);
        $this->password .= mb_substr($this->chars, $this->index, 1);
    }
    return $this->password;
}

}
