<?php ob_start(); ?>

<!--BUTTON  DELETE-->
<?php if(isset($_GET['action'])) : ?>
  
  <?php if($_GET['action'] === 'getFormConfirmDel') : ?> 
    <p>Etes vous sure de bien vouloir supprimer ce technicien ?</p>
    <form action="actionControl.php" method="POST">
      <input type="hidden"  name="action" value="del_user">
      <input type="hidden"  name="del_id" value="<?= $_GET['del_id']?>">
      <input type="hidden"  name="del_log" value="<?= $_GET['del_log']?>"> 
      <input type="hidden"  name="del_dept" value="<?= $_GET['del_dept']?>">
      <input type="submit" value="OUI">
    </form>
  <?php endif ?>
<?php endif ?>

<!--BUTTON  UPDATE-->
<?php if(isset($_POST['action'])) : ?>
  <p>Etes vous sure de bien vouloir modifier ce technicien ?</p>
  <?php if($_POST['action'] === 'getFormConfirmUpd') : ?>
    <form action="actionControl.php" method="POST">
      <input type="hidden"  name="action" value="upd_user">
      <input type="hidden"  name="upd_id" value="<?= $_POST['upd_id']?>">
      <input type="hidden"  name="upd_log" value="<?= $_POST['login']?>">
      <input type="hidden"  name="upd_dept" value="<?= $_POST['branche'] ?>">
      <input type="submit" value="OUI">
    </form>
  <?php endif ?>
<?php endif ?>



  <form action="actionControl.php?action=back_home" method="POST">
      <input type="submit" value="NON">
  </form>

<?php $content.= ob_get_clean(); ?>

<?php require_once('template.php'); ?>