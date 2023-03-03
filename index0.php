
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <meta HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE" /> -->
	<title>my_exercices</title>
 <link rel='stylesheet' type='text/css' href='style/connexion.css'>
</head>
<body>
   <h2>CONNEXION</h2>
   <form action="home.php" method="post" class="form">
      <div class="div_form">
   		<label for="login" class="form-label">Log name</label>
   	   <input type="login" class="form-control" id="login" name="login" placeholder=" (/ 'x' \)" required> 
   	</div>
   	<div class="div_form">
   		<label for="password" class="form-label">Password</label>
   		<input type="password" class="form-control" id="password" name="password" placeholder="**********" required>
   	</div>
   	<div>
   		<button type="submit" class="form-submit">Connect</button>	            
   		<button type="reset" class="form-reset">Reset</button>	             
      </div>
   </form>	
</body>
</html>