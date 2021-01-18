<?php
  session_start();

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
   </script>
 </head>
 <body>
   <form action="search-form.php" method="get"><br>
   <button type="submit">search</button>
   <button type="submit" formaction="search.html">profile</button>
 </form>
   <div class="info">
     <label for="example">Share what you feel
     </label>
     <input id="example" type="text"
            name="Ntext" size="50">
     <input id="sent" type="submit"
            value="post">
 </div>
   <p id="para">
   </p>
 </body>
 <script>
   window.onclick = function(e)
   {   var id =  e.target.id;
    if (id === 'sent')
    { var txt = document.getElementById('example').value
      $( "#para" ).empty().append( txt );
    }
   }
 </script>
</html>

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php
          	echo $_SESSION['success'];
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>

</body>
</html>
