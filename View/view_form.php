
<?php ob_start(); ?>

<div>
	
	<form class="admin_form" action="actionControl.php" method="POST">

			<?php if($_GET['action'] === 'getFormSelectOne') :?>  <!-- CHAMP ID POUR UNE RECHERCHE RAPIDE -->
	   		<div class="div_form">
					<label for="id" >id user</label>
				   <input type="text" name="id" id="id" placeholder="id"> 
				</div>
			<?php endif ?>


	   <div class="div_form">
			<label for="login" >Log name</label>
		   <input type="text" name="login"  id="login" value="<?= $pre_log ?>" placeholder="login"> 
		</div>

		<?php if($_GET['action'] !== 'getFormSelectOne' AND $_GET['action'] !== 'getFormUpdate') :?> <!-- CHAMP PASSWORD UNIQUEMENT POUR LA CREATION D'UTILISATEUR -->
			<div class="div_form">
				<label for="password">password</label>
				<input type="text"  name="password" id="password" placeholder="password">
			</div>
		<?php endif ?>

		<div class="div_form">   <!-- SELECTION DE LA BRANCHE -->
			<label for="branche">branche</label>
			<select name="branche">
				<option value="admin">Admin</option>
				<option value="hotline" selected>Hotline</option>
				<option value="sav">Sav</option>
			</select>
		</div>

		<div class="div_form">		

		<!-- ALL DIFFERENTS CRUD ACTIONS-->

		<?php if($_GET['action'] === 'getFormSelectOne') : ?>  <!-- ACTION DE RECHERCHE -->
			<?php $msg= 'Rechercher un technicien';?>
			<input type="hidden" name="action" value="select_user">
		<?php endif ?>

		<?php if($_GET['action'] === 'getFormAdd') : ?>   <!-- ACTION D'AJOUT -->
			<?php $msg= 'Ajouter un technicien';?>
			<input type="hidden" name="action" value="add_user">
		<?php endif ?>

		<?php if($_GET['action'] === 'getFormUpdate') : ?>  <!-- ACTION DE MISE A JOUR -->
			<?php $msg= 'Modifier un technicien';?>
			<input type="hidden" name="action" value="getFormConfirmUpd">
			<input type="hidden" name="upd_id" value="<?= $_GET['upd_id'] ?>">
		<?php endif ?>

			<div>
				<button type="submit" class="post_form">Select</button>	            
				<button type="reset" class="post_form">Reset</button>	
			</div>    
	   </div>  
	</form>
<div>

<?php $content= "<h3>$msg</h3>"; ?>
	
<?php $content.= ob_get_clean(); ?>

<?php require_once('template.php'); ?>

