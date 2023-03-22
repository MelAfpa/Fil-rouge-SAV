<?php ob_start(); ?>


<?php $content= 'DEBUG view: all-users <br><br>'; ?>


   <p>Etes vous ?sure de bien vouloir supprimer ce technicien ?</p>

  <!--BUTTON  DELETE-->
  <form action="actionControl.php" method="POST">
    <input type="hidden"  name="action" value="del_user">
    <input type="hidden"  name="del_id" value="<?= $_GET['del_id']?>">
    <input type="submit" value="UI">
  </form>

  <form action="actionControl.php?action=back_home" method="POST">
      <input type="hidden"  name="action" value="getFormUpdate">
      <input type="submit" value="NON">
  </form>

<?php $content.= ob_get_clean(); ?>

<?php require_once('template.php'); ?>