<?php
error_reporting(E_ERROR | E_PARSE);
session_start();

class Connection{
  public $host = "localhost";
  public $user = "root";
  public $password = "";
  public $db_name = "vanibao";
  public $conn;

  public function __construct() {
    $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);
  }
}

class Signup extends Connection{
  public function tosignup($username, $password, $confirmpassword, $email, $firstname, $lastname, $address) {
    if (!$username&&!$password&&!$email&&!$firstname&&!$lastname&&!$address) {return 0;}

    $duplicate = mysqli_query($this->conn, "SELECT * FROM vb_users WHERE user_name = '$username' OR email = '$email'");
    if(mysqli_num_rows($duplicate) > 0) {
      return 10;
      // Username or email has already taken
    } else {
      if($password == $confirmpassword) {
        $query = "INSERT INTO vb_users (user_name, password, email, first_name, last_name, address) VALUES('$username', '$password', '$email', '$firstname', '$lastname', '$address')";
        mysqli_query($this->conn, $query);
        return 1;
        // Registration successful
      } else {
        return 100;
        // Password does not match
      }
    }
  }
}

class Login extends Connection {
  public $id;
  public function tologin($usernameemail, $password) {
    $result = mysqli_query($this->conn, "SELECT * FROM vb_users WHERE user_name = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) > 0){
      // echo $row["user_id"];
      // echo $row["password"];
      if($password == $row["password"]){
        $this->id = $row["user_id"];
        return 1;
        // Login successful
      } else {
        return 10;
        // Wrong password
      }
    } else {
      return 100;
      // User not registered
    }
  }

  public function idUser(){
    return $this->id;
  }
}

class Select extends Connection {
  public function selectUserById($id){
    $result = mysqli_query($this->conn, "SELECT * FROM vb_users WHERE user_id = $id");
    return mysqli_fetch_assoc($result);
  }
}

class ShoppingCart extends Connection {
  public function query() {
    if(isset($_SESSION["id"])) {
      $user_id = $_SESSION["id"];
    } else {
      return false;
    }

    $result = mysqli_query($this->conn, "SELECT * FROM vb_shoppingcart WHERE user_id = $user_id");
    $rowsnum = mysqli_num_rows($result);
    return $result;
  }

  public function rowsnum($result) {
    return mysqli_num_rows($result);
  }

  public function get($result) {
    // echo "get".mysqli_num_rows($result);
    if((mysqli_num_rows($result) > 0) && ($item = mysqli_fetch_assoc($result))) {
      $book_id = $item["book_id"];
      $book = mysqli_fetch_assoc(mysqli_query($this->conn, "SELECT * FROM vb_books WHERE book_id = $book_id"));
      $name = $book["book_name"];
      $img = $book["book_img1"];
      $num = $item["book_count"];
      $price = $item["book_price"];
      $row = array("name" => $name, 
                   "img" => $img, 
                   "num" => $num, 
                   "price" => $price);
      return $row;
    } else {
      return false;
    }
  }
}

class Book extends Connection {
  public function get($book_id) {
    $result = mysqli_query($this->conn, "SELECT * FROM vb_books WHERE book_id = $book_id");
    
    if((mysqli_num_rows($result) > 0) && ($item = mysqli_fetch_assoc($result))) {

      $name = $item["book_name"];
      $img1 = $item["book_img1"];
      $img2 = $item["book_img2"];
      $img3 = $item["book_img3"];
      $img4 = $item["book_img4"];

      $category1_id	= $item["category1_id"];
      $category = mysqli_fetch_assoc(mysqli_query($this->conn, "SELECT * FROM vb_category WHERE id = $category1_id"));
      $category1 = $category["category"];
      
      $category2_id	= $item["category2_id"];
      $category = mysqli_fetch_assoc(mysqli_query($this->conn, "SELECT * FROM vb_category WHERE id = $category2_id"));
      $category2 = $category["category"];
	
      $auther_id	= $item["auther_id"];
      $auther = mysqli_fetch_assoc(mysqli_query($this->conn, "SELECT * FROM vb_auther WHERE id = $auther_id"));
      $auther = $auther["auther"];
	
      $publisher_id	= $item["publisher_id"];
      $publisher = mysqli_fetch_assoc(mysqli_query($this->conn, "SELECT * FROM vb_publisher WHERE id = $publisher_id"));
      $publisher = $publisher["publisher"];

      $language = $item["language"];
      $edtion = $item["edtion"];
      $isbn = $item["isbn"];
      $price = $item["book_price"];
      $summary = $item["book_summary"];
      $descrip = $item["book_descrip"];

      $row = array("name" => $name, 
                   "img1" => $img1, 
                   "img2" => $img2, 
                   "img3" => $img3, 
                   "img4" => $img4, 
                   "category1" => $category1, 
                   "category2" => $category2, 
                   "auther" => $auther, 
                   "publisher" => $publisher, 
                   "language" => $language, 
                   "edtion" => $edtion, 
                   "isbn" => $isbn, 
                   "price" => $price, 
                   "summary" => $summary, 
                   "descrip" => $descrip);
      return $row;
    } else {
      return false;
    }

  }
}


class Search extends Connection {
  private $result;
  public $rowsnum;
  public function query($keyword) {
    $this->result = mysqli_query($this->conn, "SELECT * FROM vb_books WHERE book_name LIKE '%$keyword%' OR keywords LIKE '%$keyword%'");
    $this->rowsnum = mysqli_num_rows($this->result);
  }

  public function get() {
    // echo "get".mysqli_num_rows($result);
    if(($this->result > 0) && ($books = mysqli_fetch_assoc($this->result))) {
      $book_id = $books["book_id"];
      $name = $books["book_name"];
      $img = $books["book_img1"];
      $keywords = $books["keywords"];
      $price = $books["book_price"];
      $summary = $books["summary"];
      $descrip = $books["book_descrip"];
      $row = array("id" => $book_id,
                  "name" => $name, 
                  "img" => $img, 
                  "keywords" => $keywords, 
                  "price" => $price,
                  "summary" => $summary,
                  "descrip" => $descrip);
      return $row;
    } else {
      return false;
    }
  }
}