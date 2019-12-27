<?php $this->titre = "Mon blog - " . $post['titre']; ?>

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
<h1 id="titreReponse"> Réponse à : <?= $post['titre'] ?></h1>
</header>
<?php foreach($commentaire as $commentaires): ?>
<p> De : <?= $commentaires['prenom'] ?> <?= $commentaires['nom'] ?></p>
<p> <?= $commentaires['contenu'] ?> </p>
<time> <?= $commentaires['date'] ?> </time>
<?php endforeach; ?>

<form action="index.php?action=commenter" method="post">
    <textarea name="contenu" id="textecommentaire" rows="4" placeholder="Votre commentaire" required></textarea>
    <input type="hidden" name="numero_post" value="<?= $post['numero_post'] ?>">
    <input type="submit" value="Commenter">
</form>
