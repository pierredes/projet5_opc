<?php $titre = 'Mon blog'; ?>

<?php ob_start(); ?>
<p> Une erreur est survenue : <?= $messageerreur ?></p>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabari.php'; ?>