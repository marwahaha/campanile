<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="bootstrap.min.css">
<script src="jquery.min.js"></script>
<script src="bootstrap.min.js"></script>
</head>
<body OnLoad="bottom();refreshtablesize();" style="  padding-right:0px;
">
  <style>
.modal-content  {
    background: url('closeup3.jpg') repeat center center;
    background-color: #000000;
    background-size: cover;
}

html {
         overflow-y: scroll;
}
body {
  min-width:500px;
}
table {
  min-width:290px;

}
td {
         cursor: pointer;
         padding:0px;
         font-size:20px;
         overflow:hidden;
         white-space:nowrap;
}
td.full {
  background-color:rgba(255,240,0,0.2);
}
td.window {
         cursor: auto;
}
#viewmessage {
  white-space:pre-wrap;
}
</style>


<div class = "modal fade" id="viewModal" tabindex="-1" role = "dialog">
    <div class = "modal-dialog modal-lg">
        <div class = "modal-content">
            <div style="font-family: 'Impact, Charcoal, sans-serif'; text-align:center; color:#eeeeff; padding-right:10px; padding-left:10px">
              <h2 id="viewmessage">Poem</h2>
            </div>
                  <div style="border-top: 0px; padding-bottom: 8px" class="modal-footer">
                <h4 style="font-family: 'Impact, Charcoal, sans-serif'; text-align:center; color:#eeeeff; padding-left:10px; float:left" id="viewname">Arun</h4>
                <a href="#" data-dismiss="modal"  class="btn btn-sm btn-default">Close</a>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
<div class = "modal fade" id="editModal" tabindex="-1" role = "dialog">
    <div class = "modal-dialog modal-lg">
        <div class = "modal-content">
                    <form id="editform" method="post">
                    <input id="editid" style="display:none"/>
            <div style="font-family: 'Impact, Charcoal, sans-serif'; padding:10px">
            <h3><div style="color:#ffffff">Message: </div><textarea id="editmessage" style="margin-top:10px; width:96%; margin-left:2%"></textarea></h3>
            </div>
            <h5 style="padding-left:10px; float:left;"><span style="color:#ffffff">Name: </span><input id="editname" maxlength="35" style="width:50%"/></h5>
                  <div style="border-top: 0px; padding-top: 8px" class="modal-footer">
                <a href="#" data-dismiss="modal"  class="btn btn-default">Close</a>
                <input href="#" type="submit" class="btn btn-primary">
              </form>
                </div>
            </div>
        </div>
    </div>

<script>
    $("form#editform").submit(function(event) {
        event.preventDefault();
        var id = $("#editid").val();
        var name = $("#editname").val();
        if (!(name)) {
          name = "Anon.";
        }
        var message = $("#editmessage").val();
        if (message) {
          $.ajax({
              type: "POST",
              url: "insert.php",
              data: "id=" + id + "&name=" + name + "&message=" + message})
            .done(function(){
                console.log('success');
                $("#editModal").modal("hide");
                $("#editname").val("");
                $("#editmessage").val("");
                    var $obj = $('[data-id="' + id + '"]');
                    $obj.addClass('full');
                    $obj.append(name);  
                    $obj.append('<input id="brick-info-' + id + '" data-name="' + name + '" data-message="' + message + '"" style="display:none"/>');
                    refreshbrickevents();
            })
            .fail(function() {
                $("#editModal").modal("hide");
                alert("sorry, there was an error");
            })
          }
    });
    </script>


<div style="background-image: linear-gradient(to top, #f5f5f5 0%, #00a3ef 100%);   background-repeat: no-repeat;">
  <div style="position:fixed; width:12%; margin-left:5%; margin-top:10%">
    <button id="seetopbutton" onclick="document.location.href = 'top.html';" style="max-height: 20%; width:100%;white-space: normal; margin-top: 20%" class='btn btn-lg btn-primary'>See the top<img width="100%" src="hires3.jpg"/></button>
    <button id="climbbutton" onclick="totop()" style="max-height: 20%; width:100%; white-space: normal; margin-top: 20%" class='btn btn-lg btn-primary'>Climb!<img width="100%" src="lookup.jpeg"/></button>
    <button id="seebottombutton" onclick="bottom()" style=" max-height: 20%; width:100%;white-space: normal; margin-top: 30%" class='btn btn-lg btn-success'>Back to ground</button>
    <button id="playbutton" onclick="play()" style=" max-height: 20%; width:100%;white-space: normal; margin-top: 30%" class='btn btn-lg btn-warning'>Hear the bell</button>
  </div>
  <div style="position:fixed; width:12%; margin-left:83%; margin-top:10%">
      <div id="infobutton" onclick="" style="font-size:24px; font-weight:900; max-height: 20%; width:100%; white-space: normal; margin-top: 80%; cursor:default; text-align:center;">Share your story by clicking on an empty brick.</div>
  </div>
  <audio style="display:none" id="audio1" src="0.7bell2.mp3" type="audio/mpeg"></audio>
  <script>
  function play() {
    var audio = document.getElementById('audio1');
    if (audio.paused) {
        audio.play();
    }else{
        audio.currentTime = 0
    }
}
  </script>
<div style="margin-left:21%; width:58%">


<?php 


for ($x=7; $x>=0; $x--) {
  $id2 = $x * 3 + 2;
  $id1 = $x * 3 + 1;
  $id0 = $x * 3 + 0;
echo <<<"FOOBAR"
<table class="windowtable" cellpadding="0" cellspacing="0" style="table-layout:fixed; text-align:center;position:absolute;width:58%;font-family: 'Impact, Charcoal, sans-serif'; font-weight:900" border="0" >
  <tr style="">
    <td data-id="w.$id2.0"style="width:20%;"><span style="visibility:hidden">.</span></td>
    <td data-id="w.$id2.1"style="width:20%;"><span style="visibility:hidden">.</span></td>
    <td data-id="w.$id2.2"class="window" style="width:20%;"><span style="visibility:hidden">.</span></td>
    <td data-id="w.$id2.3"style="width:20%;"><span style="visibility:hidden">.</span></td>
    <td data-id="w.$id2.4"style="width:20%;"><span style="visibility:hidden">.</span></td>
  </tr>
  <tr style="">
    <td data-id="w.$id1.0"style="width:20%;"><span style="visibility:hidden">.</span></td>
    <td data-id="w.$id1.1"style="width:20%;"><span style="visibility:hidden">.</span></td>
    <td data-id="w.$id1.2"class="window" style="width:20%;"><span style="visibility:hidden">.</span></td>
    <td data-id="w.$id1.3"style="width:20%;"><span style="visibility:hidden">.</span></td>
    <td data-id="w.$id1.4"style="width:20%;"><span style="visibility:hidden">.</span></td>
  </tr>
  <tr style="">
    <td data-id="w.$id0.0"style="width:20%;"><span style="visibility:hidden">.</span></td>
    <td data-id="w.$id0.1"style="width:20%;"><span style="visibility:hidden">.</span></td>
    <td data-id="w.$id0.2"class="window" style="width:20%;"><span style="visibility:hidden">.</span></td>
    <td data-id="w.$id0.3"style="width:20%;"><span style="visibility:hidden">.</span></td>
    <td data-id="w.$id0.4"style="width:20%;"><span style="visibility:hidden">.</span></td>
  </tr>
</table>
<img width="100%" src="window2.jpg"/>
FOOBAR;


for ($y=3; $y>=0; $y--) {
  $wid1 = $x*8 + $y*2 + 1;
  $wid0 = $x*8 + $y*2;
echo <<<"FOOBAR2"

<table class="bricktable" cellpadding="0" cellspacing="0" style="table-layout:fixed; font-weight:900; text-align:center;position:absolute;width:58%; margin-top:0px" border="0" >
  <tr style="">
    <td data-id="b.$wid1.0" style="width:20%;"><span style="visibility:hidden">.</span></td>
    <td data-id="b.$wid1.1"style="width:20%;"><span style="visibility:hidden">.</span></td>
    <td data-id="b.$wid1.2"data-id="b.$wid1.0"style="width:20%;"><span style="visibility:hidden">.</span></td>
    <td data-id="b.$wid1.3"style="width:20%;"><span style="visibility:hidden">.</span></td>
    <td data-id="b.$wid1.4"style="width:20%;"><span style="visibility:hidden">.</span></td>
  </tr>
  <tr style="">
    <td data-id="b.$wid0.0" style="width:20%;"><span style="visibility:hidden">.</span></td>
    <td data-id="b.$wid0.1" style="width:20%;"><span style="visibility:hidden">.</span></td>
    <td data-id="b.$wid0.2" style="width:20%;"><span style="visibility:hidden">.</span></td>
    <td data-id="b.$wid0.3" style="width:20%;"><span style="visibility:hidden">.</span></td>
    <td data-id="b.$wid0.4" style="width:20%;"><span style="visibility:hidden">.</span></td>
  </tr>
</table>
<img width="100%" src="double.jpg"/>
FOOBAR2;

} 
}
?>



</div>
</div>
<img width="100%" id="bottomimg" src="base4.jpg"/>
<button onclick="document.location.href = 'index.html';" class='btn btn-sm btn-default' style='float:right;position:relative; margin-right:3%; margin-top:-50px'>Back to main</button>
<h2 id='bottomtext' style="border: 2px solid;
    border-radius: 10px;padding:10px; background-color:rgba(0,0,0,0.7);width:46%; margin-left:27%; font-weight:900; color:#ffffff; text-align:center; position:relative;">Stories are held inside the stones. Scroll up to explore.</h2>
<h4 id='instructiontext' style="border: 2px solid;
    border-radius: 10px;padding:10px;background-color:rgba(255,240,0,0.2);width:30%; margin-left:35%; font-weight:900; color:#111111; text-align:center; position:relative;">Golden bricks, when clicked, contain the stories.</h4>
<script>
var abovebase = false;
var inprogress = false;
var $window = $(window);


climb = function() {

          console.log("up");
        inprogress = true;
$("html, body").animate({ scrollTop: $('#bottomimg').offset().top - $window.height() - 20}, 400, function() {
  abovebase = true;inprogress = false;
            $("#climbbutton").show();
          $("#seetopbutton").hide();
          $("#seebottombutton").show();
          $("#playbutton").show();
          $("#infobutton").show();
});
}

bottom = function() {
          $("#climbbutton").hide();
          $("#seetopbutton").hide();
          $("#seebottombutton").hide();
          $("#playbutton").hide();
          $("#infobutton").hide();


  console.log("bottom");
  inprogress = true;
  $("html, body").animate({ scrollTop: document.body.scrollHeight}, 400, function() { abovebase = false;inprogress = false;});
}


unclimb = function() {
            $("#climbbutton").hide();
          $("#seetopbutton").hide();
          $("#seebottombutton").hide();
          $("#playbutton").hide();
          $("#infobutton").hide();

          console.log("down");
        inprogress = true;
$("html, body").animate({ scrollTop: $('#bottomimg').offset().top + 20}, 400, function() { abovebase = false;inprogress = false;});
}

totop = function() {
  console.log("top");
  inprogress = true;
  $("html, body").animate({ scrollTop: 0}, 400, function() {
  abovebase = true;inprogress = false;
            $("#climbbutton").hide();
          $("#seetopbutton").show();
          $("#seebottombutton").show();
          $("#playbutton").show();
          $("#infobutton").show();

});
}
  attop = false;

  $window.scroll(function() {
      if (attop && !(inprogress) && $window.scrollTop() < 30) {
        $("#climbbutton").hide();
        $("#seetopbutton").show();

        attop = false;
    } else if (abovebase && !(attop) && !(inprogress) && $window.scrollTop() > 30) {
        $("#climbbutton").show();
        $("#seetopbutton").hide();
        attop = true;
      }
    if (abovebase && !(inprogress)) {
      if ($window.scrollTop() > $("#bottomimg").offset().top - $window.height()) {
        unclimb();
      }
    } else if (!(abovebase) && !(inprogress)) {
      if ($window.scrollTop() < $("#bottomimg").offset().top) {
        climb();
      }
    }
  });
  
  $(window).resize(function() {
    refreshtablesize();
  });

  refreshtablesize = function() {
        $(".windowtable").height($(".windowtable").width() / 6.4);
        $(".bricktable").height($(".bricktable").width() / 10);
        $("#bottomtext").css('margin-top', Math.min(-200, 0 - ($(".windowtable").width() /5)));
        $("#instructiontext").css('margin-top', Math.min(-400, 0 - ($(".windowtable").width() /1)));

  }

</script>
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

      $sql =<<<EOF
      SELECT * from BRICKS;
EOF;

   $ret = $db->query($sql);
   $result = '';
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
    $result = $result  . ',{"id": ' . addslashes(json_encode($row['ID'])) . ',';
    $result = $result  . '"name": '. addslashes(json_encode($row['NAME'])) . ',';
    $result = $result  . '"message": '. addslashes(json_encode($row['MESSAGE'])) . '}';
  }
    $result = '[' . substr($result, 1) . ']';

   ?>
<script>

    var result = '<?php echo $result; ?>';
    result = JSON.parse(result);
    for (entry in result) {

      var $obj = $('[data-id="' + result[entry]['id'] + '"]');
      $obj.addClass('full');
      $obj.append(result[entry]['name']);
      $obj.append('<input id="brick-info-' + result[entry]['id'] + '" data-name="' + result[entry]['name'] + '" data-message="' + result[entry]['message'] + '"" style="display:none"/>');

    }

    refreshbrickevents = function() {
      $('td').off('click');
  $('td.full').click(function() {
    $("#viewModal").modal();
    $('body').css('padding-right', 0);
    $brickdata = $(this).find('input');
    $("#viewname").text($brickdata.data('name'));
    $("#viewmessage").text($brickdata.data('message').replace(/[<]br [//][>]/g,''));

  });
  $('td').not('.full').not('.window').click(function() {
    $('#editModal').modal();
    $('body').css('padding-right', 0);
    $("#editid").val($(this).data('id'));
    console.log($("#editid").val());
  })
}
refreshbrickevents();

    onthehourinit = true;
   function onTheHour() {
       var d = new Date(),
       h = new Date(d.getFullYear(), d.getMonth(), d.getDate(), d.getHours() + 1, 0, 0, 0),
       e = h - d;
       window.setTimeout(onTheHour, e);

       if (onthehourinit) {
        onthehourinit = false;
       } else {
       //code to be run
       var hours = d.getHours() % 12;
       if (hours == 0) { hours = 12;}
       while (hours > 0) {
        window.setTimeout(play, 4000*hours);
        hours -=1;
       }
     }
    }
    onTheHour(); 
</script>
</body>
</html>