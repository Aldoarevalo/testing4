<%-- 
    Document   : newjsp1
    Created on : 10/10/2016, 10:16:42 AM
    Author     : ALDO
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
<script type='text/javascript'
  src='http://code.jquery.com/jquery-2.0.2.js'></script>
<link rel="stylesheet" type="text/css"
  href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
<script type='text/javascript'
  src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css"
  href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css">
<script type='text/javascript'>//<![CDATA[ 
$(window).load(function(){<!-- w w w . java 2s .c  o  m-->
$('#accordion').on('shown.bs.collapse', function (e) {
   var id = $(e.target).prev().find("[id]")[0].id;
   navigateToElement(id);
})
function navigateToElement(id) {
    $('html, body').animate({
        scrollTop: $("#" + id).offset().top
    }, 1000);
}
});//]]>  
</script>
</head>
<body>
  <div class="panel-group" id="accordion">
    <!-- first panel -->
    <div class="panel panel-default">
      <div class="panel-heading">
        <span class="strong"> <a data-toggle="collapse"
          data-parent="#accordion" href="#collapseOne" id="predict">
            Gettysburg <span class="caret"></span>
        </a>
        </span>
      </div>
      <div id="collapseOne" class="panel-collapse collapse">
        <div class="panel-body">
          <!--LOTS OF CONTENT - replaced with image-->
          <img src="http://i.imgur.com/AMhADP1.png" />
        </div>
      </div>
    </div>
    <!-- second panel -->
    <div class="panel panel-default">
      <div class="panel-heading">
        <span class="strong"> <a data-toggle="collapse"
          data-parent="#accordion" href="#collapseTwo" id="aries">
            Background <span class="caret"></span>
        </a>
        </span>
      </div>
      <div id="collapseTwo" class="panel-collapse collapse">
        <div class="panel-body">
          <!--LOTS OF CONTENT - replaced with image-->
          <img src="http://imgur.com/j98Q0H8.png" />
        </div>
      </div>
    </div>
  </div>
  <!-- Post Info -->
  <div style="height: 100px;"></div>
  <div
    style='position: fixed; bottom: 0; left: 0; background: lightgray; width: 100%;'>
    About this SO Question: <a
      href='http://stackoverflow.com/q/20633087/1366033'>Load accordion
      panels at top of their content</a><br /> Find documentation: <a
      href='http://getbootstrap.com/css/'>Get Bootstrap 3.0</a><br /> Fork
    This Skeleton Here <a href='http://jsfiddle.net/KyleMit/kcpma/'>Bootrsap
      3.0 Skeleton</a><br />
    <div>
</body>
</html>