<?php $this->titre =  "Mon blog"; ?>

<?php foreach ($post as $posts): ?>
    <article>
        <header>
            <a href="<?= "index.php?action=post&numero_post=" .$posts['numero_post'] ?>">
                <h1 class="titreBillet"><?= $posts['titre'] ?> </h1>
            </a>
            <time><?= $posts['date_maj'] ?> </time>
        </header>
        <p><?= $posts['chapo'] ?></p>
    </article>
    <hr>
<?php endforeach; ?>

