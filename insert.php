<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('db/test.db');
      }
   }
   $db = new MyDB();
   if(!$db){
      header('HTTP/1.0 400 Bad Request');
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
   }

   $id = htmlspecialchars($_POST['id'], ENT_QUOTES);
   $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
   $message = htmlspecialchars($_POST['message'], ENT_QUOTES);
   $sql ="INSERT INTO BRICKS (ID,NAME,MESSAGE) VALUES ('$id', '$name', '$message')";

   $ret = $db->exec($sql);
   if(!$ret){
      header('HTTP/1.0 401 Unauthorized');
      echo $db->lastErrorMsg();
   } else {
      echo "Records created successfully\n";
   }
   $db->close();
?>