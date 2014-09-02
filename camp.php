<!DOCTYPE html>
<html>
<head>
	 <script src="jquery.min.js" ></script>
</head>
<body>
<!-- opens db connection-->
<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('db/test.db');
      }
   }
   $db = new MyDB();
   ?>

<form id="myform" method="post">
 <p>Your id: <input type="text" id="id" name="id" /></p>
 <p>Your name: <input type="text" id="name" name="name" /></p>
 <p>Your message: <input type="text" id="message" name="message" /></p>
 <p><input type="submit" /></p>
</form>

<button onclick="viewdata()" id="view">view</button><br>


<script>
$(document).ready(function(){
	$("button#view").mouseenter(function () {
		var id = $("#id").val();
    if (id) {
		  $.get( "view.php", { id: id }, function(data) {alert( "done: " + data.toString());});
    }
	});


    $("form#myform").submit(function(event) {
        event.preventDefault();
        var id = $("#id").val();
        var name = $("#name").val();
        var message = $("#message").val();

        $.ajax({
            type: "POST",
            url: "insert.php",
            data: "id=" + id + "&name=" + name + "&message=" + message,
            success: function(){alert('success');}
        });
    });
});
</script>






<!-- lists entries-->
   <?php
   $sql =<<<EOF
      SELECT * from BRICKS;
EOF;

   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
      echo "ID = ". $row['ID'];
      echo "NAME = ". $row['NAME'];
      echo "MESSAGE = ". $row['MESSAGE'];
      echo "<br>";
   }
   $db->close();
?>
</body>
</html>