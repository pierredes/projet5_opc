<!doctype html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <base href="<=? $racineweb ?>">
        <link rel="stylesheet" href="contenu/style.css">
        <title>Mon blog</title>
    </head>
    <body>
        <div id="global">
            <header>
                <a href="index.php"><h1 id="titreBlog">Mon Blog</h1></a>
                <p>je vous souhaite la bienvenue sur mon blog</p>
            </header>
            <div id="contenu">
                <?= $contenu ?>
            </div>
            <footer id="piedBlog">
                Blog réalisé avec php, html et css
            </footer>
        </div>
    </body>
</html> 