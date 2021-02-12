<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/assets/style.css">
        <title><?= $title ?></title>
    </head>
    <body>
        <div id="wrapper">
            <header>
                <?php include 'elems/header.php' ?>
            </header>
            <main>
                <p><?= $content ?></p>
            </main>
            <footer>
                <p>footer</p>
            </footer>

        </div>
    </body>
</html>