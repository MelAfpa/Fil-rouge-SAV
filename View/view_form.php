
<?php ob_start(); 



$content= 'DEBUG view: form<br><br>'; 
 	echo $_GET['action']; 

?>
<div>
	<h2>Form</h2>

	<form action="actionControl.php" method="POST">

		 <?php if($_GET['action'] !== 'getFormSelect') :?>

			<?php if($_GET['action'] === 'getFormSelectOne') :?>
	   		<div class="div_form">
					<label for="id" >id user</label>
				   <input type="text" name="id"  placeholder="id"> 
				</div>
			<?php endif ?>
	   <div class="div_form">
			<label for="login" >Log name</label>
		   <input type="text" name="login"  value="<?= $pre_log ?>" placeholder="login"> 
		</div>

		<?php if($_GET['action'] !== 'getFormSelectOne' AND $_GET['action'] !== 'getFormUpdate') :?>
			<div class="div_form">
				<label for="password">password</label>
				<input type="text"  name="password" placeholder="password">
			</div>
		<?php endif ?>

		<div class="div_form">
			<label for="branche">branche</label>
			<select name="branche">
				<option value="admin">Admin</option>
				<option value="hotline" selected>Hotline</option>
				<option value="sav">Sav</option>
			</select>
			<!-- <input type="text"  name="branche"  value="" placeholder="branche"> -->
		</div>

		<div class="div_form">
			
		</div>



		<?php endif ?>

		<!-- ALL DIFFERENTS CRUD ACTIONS-->

		<?php if($_GET['action'] === 'getFormSelect') : ?>
			<input type="hidden" name="action" value="select_users">
		<?php endif ?>

		<?php if($_GET['action'] === 'getFormSelectOne') : ?>
			<input type="hidden" name="action" value="select_user">
		<?php endif ?>

		<?php if($_GET['action'] === 'getFormAdd') : ?>
			<input type="hidden" name="action" value="add_user">
		<?php endif ?>

		<?php if($_GET['action'] === 'getFormUpdate') : ?>
			<input type="hidden" name="action" value="upd_user">
			<input type="hidden" name="upd_id" value="<?= $_GET['upd_id'] ?>">
		<?php endif ?>

			<button type="submit">Select</button>	            
			<button type="reset">Reset</button>	     
	   </div>  
	</form>
<div>
<?php $content.= ob_get_clean(); ?>

<?php require_once('template.php'); ?>
