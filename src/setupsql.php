 <?php
include "php_func/phpFunction.php"; 
  try { create_db();
        create_table_user();
        create_table_devise(); 
        create_table_settings();
        create_table_Task();
        insert_set("maxfile","10000000");
        insert_set("default volume","30");
        create_table_music();
        create_table_Photos();
        //insert_set($name,$val);
        chown ("/var/www/html/",33);
        mkdir('/var/www/html/Media_Library', 0777, true);
        mkdir('/var/www/html/Media_Library/music', 0777, true);
        mkdir('/var/www/html/Media_Library/photos', 0777, true);
     echo" <script> location.replace('index.php'); </script>";
  }
  catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
  }
/*//////////////////////////////////////////////////*/
function  create_db(){
  $servername = "db";
  $username = "root";
  $password = "root";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
  // Create database
      $sql = "CREATE DATABASE mbs";
      if (mysqli_query($conn,$sql)) {
        echo "Database created successfully";
        echo "<br>";
        return 1;
      } else {
       // echo "Error creating database: " . mysqli_error($conn);
       throw new Exception("יש בעייה ליצור מסד נתונים");
       echo "<br>";
       echo "Error creating table: " . mysqli_error($connect);
        return 1;
      }
mysqli_close($conn);
}


function  create_table_user(){
  include  'sqli.php'; 
  $query = "CREATE TABLE user(
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 firstname TEXT(30) NOT NULL, pass TEXT(32) NOT NULL, path TEXT(30))";
  if (mysqli_query($connect,$query)) {
    echo "Table user created successfully";
    echo "<br>";
  } else {
   throw new Exception("Error creating table user");
    echo "Error creating table: " . mysqli_error($connect);   
  }
      mysqli_close($connect);
}
function  create_table_devise(){
  include 'sqli.php'; 
    $query = "CREATE TABLE devise(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      devise_name TEXT(20) NOT NULL,  sync  BOOLEAN NOT NULL DEFAULT FALSE )";
      if (mysqli_query($connect,$query)) {
        echo "Table devise created successfully";
        echo "<br>";
      } else {
       throw new Exception("Error creating table devise");
        echo "Error creating table: " . mysqli_error($connect);
      
      }
      mysqli_close($connect);
}


function  create_table_settings(){
  include 'sqli.php'; 
    $query = "CREATE TABLE settings(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name TEXT(15) NOT NULL, val TEXT(40))";
      if (mysqli_query($connect,$query)) {
        echo "Table devise created successfully";
        echo "<br>";
      } else {
       throw new Exception("Error creating table settings");
        echo "Error creating table: " . mysqli_error($connect);
      }
      mysqli_close($connect);
}



function  create_table_Task(){
  include 'sqli.php'; 
    $query = "CREATE TABLE task_tb(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name TEXT(15) NOT NULL,task TEXT(5), `devise_name` TEXT(20), val INT(6))";
      if (mysqli_query($connect,$query)){
        echo "Table Task created successfully";
        echo "<br>";
      } else {
        echo "Error creating table: " . mysqli_error($connect);
      }
      mysqli_close($connect);
}



function  create_table_music(){
  include 'sqli.php'; 
    $query = "CREATE TABLE music(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, name VARCHAR(100) NOT NULL,user_n TEXT(30),likes TEXT(30)) ";
      if (mysqli_query($connect,$query)) {
        echo "Table music created successfully";
        echo "<br>";
      } else {

        echo "Error creating table music: " . mysqli_error($connect);
      }
      mysqli_close($connect);
}

function  create_table_Photos(){
  include 'sqli.php'; 
    $query = "CREATE TABLE photos(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, name VARCHAR(100) NOT NULL,user_n TEXT(30)) ";
      if (mysqli_query($connect,$query)) {
        echo "Table Photos created successfully";
        echo "<br>";
      } else {

        echo "Error creating table Photos: " . mysqli_error($connect);
      }
      mysqli_close($connect);
}




?> 
