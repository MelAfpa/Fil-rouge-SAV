<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <meta HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE" /> -->
	<title>SAV-LOG</title>
 <link rel='stylesheet' type='text/css' href='../style/connexion.css'>
</head>
<body>
	<div>
		<img src="../images/Menuiz Man.png" alt="logo">
		<h1>CONNEXION</h1>
   	<form action="" method="post" class="form">
   	   <div class="div_form">
   			<label for="login" class="form-label">Log name</label>
   		   <input type="text" class="form-control" id="login" name="login" value="<?=$pre_log; ?>" placeholder="________&#9997" required> 
   		</div> 
   		<div class="div_form">
   			<label for="password" class="form-label">Password</label>
   			<input type="password" class="form-control" id="password" name="password" value="<?=$pre_pass; ?>" placeholder="**********&#129323" required>
   		</div>
   		<div class="div_form">
   			<label for='captcha'class="form-label">Captcha</label>
   			<input type="captcha" name="captcha" class="captcha" value="<?= substr(uniqid(), 8); ?>" onmousedown="return false" readonly>
				<input type="text" name="captcha_inputs" class="captcha_inputs" placeholder="- - - - -" > 
   		</div>
			<input type="hidden" name="birth_date">  <!--HONEY POT-->
   		<div>
   			<button type="submit" class="form-submit">Connect</button>	            
   			<button type="reset" class="form-reset">Reset</button>	     
   	   </div>
			<?= $wrong_inputs; ?>        
   	</form>
	<div>
</body>
</html>