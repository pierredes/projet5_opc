<?php $titre =  "Mon blog"; ?>

<?php ob_start(); ?>
<?php foreach ($post as $posts): ?>
    <article>
        <header>
            <h1 class="titreBillet"><?= $posts['titre'] ?> </h1>
            <time><?= $posts['date_maj'] ?> </time>
        </header>
        <p><?= $posts['chapo'] ?></p>
    </article>
    <hr>
<?php endforeach; ?>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabari.php'; ?>