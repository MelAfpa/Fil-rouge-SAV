
<?php ob_start(); ?>
<ul>
  <?php foreach($users as $user) : ?>
    <li class="users_list"> <?= "  ". $user['Log_name']. " _/ " . $user['branche']; ?> 
    
    <?php if(count($users) > 1) : ?>
      <?php $msg= 'Liste des techniciens: ';?>
      
        <!--BUTTON  DELETE DANS LA LISTE DE TECHNICIENS--> 
  <div>
    <form action="actionControl.php" method="GET">
      <input type="hidden"  name="action" value="getFormConfirmDel">
      <input type="hidden"  name="del_id" value="<?= $user['Id_user']?>">
      <input type="hidden"  name="del_log" value="<?= $user['Log_name']?>">
      <input type="hidden"  name="del_dept" value="<?= $user['branche']?>">
      <input type="submit"  id="list_del_button" value="supprimer">
  </form>
</div>
  <!--BUTTON  UPDATE  DANS LA LISTE DE TECHNICIENS --> 
<div>
  <form action="actionControl.php" method="GET">
      <input type="hidden"  name="action" value="getFormUpdate">
      <input type="hidden"  name="upd_id" value="<?= $user['Id_user']?>">
      <input type="hidden"  name="upd_log" value="<?= $user['Log_name']?>">
      <input type="hidden"  name="upd_dept" value="<?= $user['branche']?>">
      <input type="submit" id="list_upt_button" value="modifier">
  </form>
</div>
<?php endif ?>

</li>
<?php endforeach ?>
  </ul>
<?php if(count($users) === 1) : ?>

  <?php $msg= 'Techniciens retrouvé: ';?>
  <!--BUTTON  DELETE--> 
  <form action="actionControl.php" method="GET">
    <input type="hidden"  name="action" value="getFormConfirmDel">
    <input type="hidden"  name="del_id" value="<?= $user['Id_user']?>">
    <input type="hidden"  name="del_dept" value="<?= $user['branche']?>">
    <input type="submit" value="supprimer ce Technicien">
  </form>

  <!--BUTTON  UPDATE--> 
  <form action="actionControl.php" method="GET">
      <input type="hidden"  name="action" value="getFormUpdate">
      <input type="hidden"  name="upd_id" value="<?= $user['Id_user']?>">
      <input type="hidden"  name="upd_log" value="<?= $user['Log_name']?>">
      <input type="hidden"  name="upd_dept" value="<?= $user['branche']?>">
      <input type="submit" value="modifier ce Technicien">
  </form>

<?php endif ?>
<?php if(count($users) === 0) : ?>
  <?php $msg="Desolé, personne n'a été retrouvé <br><a href='actionControl.php?action=back_home'>retour</a>"; ?>
  <?php endif ?>
  
<?php $content= "<h3>$msg</h3>"; ?>
<?php  $content.= ob_get_clean(); ?>

<?php require_once('template.php'); ?>

