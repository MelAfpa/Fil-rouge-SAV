<?php ob_start(); ?>
<?php $content = 'DEBUG view: TICKET <br><br>'; ?>
<?php $content .= ob_get_clean(); ?>

<?php require_once('template.php'); ?>