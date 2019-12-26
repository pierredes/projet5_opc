<?php $titre = "Mon blog - " . $post['titre']; ?>
<?php ob_start(); ?>

<article>
    <header>
        <h1 class="titreBillet"><?= $post['titre']; ?></h1>
        <time><?= $post['date_maj']; ?></time>
    </header>
    <h2><?= $post['chapo']; ?></h2>
    <p><?= $post['contenu']; ?></p>
</article>
<hr>
<header>
<h1 id="titreReponse"> Réponse à : <?= $post['titre']; ?></h1>
</header>
<?php foreach($commentaire as $commentaires): ?>
<p> De : <?= $commentaires['prenom'] ?> <?= $commentaires['nom'] ?></p>
<p> <?= $commentaires['contenu'] ?> </p>
<time> <?= $commentaires['date'] ?> </time>
<?php endforeach; ?>
<?php $contenu = ob_get_clean(); ?>

<?php require 'vue/gabari.php'; ?>