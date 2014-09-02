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
      echo $db->lastErrorMsg();
   } else {
      // echo "Opened database successfully\n";
   }

   $id = $_GET['id'];
   $sql = "SELECT * FROM BRICKS WHERE ID = '$id'";

   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
      echo "{'id':'". $row['ID'] . "'; ";
      echo "'name':'". $row['NAME'] . "'; ";
      echo "'message':'". $row['MESSAGE'] . "';}";
   }
   $db->close();
?>