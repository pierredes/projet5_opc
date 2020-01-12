<?php $this->titre =  "Mon blog"; ?>

<?php foreach ($post as $posts): ?>
    <article>
        <header>
            <a href="<?= "index.php?action=post&numero_post=" . $this->nettoyer($posts['numero_post']) ?>">
                <h1 class="titreBillet"><?= $this->nettoyer($posts['titre']) ?> </h1>
            </a>
            <time><?= $this->nettoyer($posts['date_maj']) ?> </time>
        </header>
        <p><?= $this->nettoyer($posts['chapo']) ?></p>
    </article>
    <hr>
<?php endforeach; ?>

