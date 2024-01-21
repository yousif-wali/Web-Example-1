<?php
class DB{
    private $connection;
    protected function connect(){
        $this->connection = mysqli_connect("localhost", "root", "", "kado");
    }
    public function __construct(){
        if(!isset($_SESSION["Username"])){
            session_start();
        }
        $this->connect();
    }
    public function getConnect(){
        return $this->connection;
    }
    public function __destruct(){
        mysqli_close($this->connection);
    }
    public function hash($text){
        $opts03 = [ "cost" => 15 ];
        return password_hash($text, PASSWORD_BCRYPT, $opts03);
    }
}
class Login extends DB{
    private $name;
    private $pwd;
    public function __construct($_name, $_pwd){
        $this->connect();
        $this->name = mysqli_real_escape_string($this->getConnect(), $_name);
        $this->pwd = mysqli_real_escape_string($this->getConnect(), $_pwd);
    }
    public function login(){
        $this->connect();
        $result =mysqli_query($this->getConnect(), "SELECT * from users where Email = '$this->name' OR Username = '$this->name'");
        $possiblePwd = mysqli_fetch_assoc($result)["Pwd"];
        if(md5($this->pwd) == $possiblePwd){
            session_start();
            $tar =mysqli_query($this->getConnect(), "SELECT * from users where Email = '$this->name' OR Username = '$this->name'");
            while($row = mysqli_fetch_assoc($tar)){
                $_SESSION['User_ID'] = $row['User_ID'];
                $_SESSION["Username"] = $row["Username"];
                $_SESSION['Admin'] = $row["Is_Admin"];
            }
            return "logged in";
        }else{
            return "not logged in";
        }
    }
}
class Signup extends DB{
    public function __construct()
    {
        $this->connect();
    }
    public function userExists($username){
        return mysqli_num_rows(mysqli_query($this->getConnect(), "SELECT * FROM users WHERE Username = '$username'")) > 0 ? true : false;
    }
    public function signup($name, $email, $username, $pwd){
        $name = mysqli_real_escape_string($this->getConnect(), $name);
        $email = mysqli_real_escape_string($this->getConnect(), $email);
        $username = mysqli_real_escape_string($this->getConnect(), $username);
        $pwd = mysqli_real_escape_string($this->getConnect(), $pwd);
        $exists = $this->userExists($username);
        if($exists){
            return false;
        }else{
            $hashed = md5($pwd);
            mysqli_query($this->getConnect(), "INSERT INTO users (Name, Email, Username, Pwd) VALUES ('$name', '$email', '$username', '$hashed')");
            $_SESSION['username'] = $username;
            $_SESSION['name'] = $name;
            return true;
        }
    }
}
class Event extends DB{
    public function __construct(){
        $this->connect();
    }
    public function getPosts(){
        $result = mysqli_query($this->getConnect(), "SELECT * FROM posts");
        $list = [];
        $i = 0;
        while($row = mysqli_fetch_assoc($result)){
            $list[$i] = [$row["Post_Id"],$row['Title'], $row['Description'], $row['Published'], $row['Images']];
            $i++;
        }
        return $list;
    }
}
class Post extends DB{
    public function __construct(){
        $this->connect();
    }
    public function Post($title, $desc, $images){
        $title = mysqli_real_escape_string($this->getConnect(), $title);
        $desc = mysqli_real_escape_string($this->getConnect(), $desc);
        $images = mysqli_real_escape_string($this->getConnect(), $images);

        $query = mysqli_query($this->getConnect(), "INSERT INTO posts (Title, Description, Images) VALUES ('$title', '$desc', '$images')");
        if($query){
            setcookie("post", true , time()+15, "/");
        }else{
            setcookie("post", false, time()+15, "/");;
        }
    }
}
?>