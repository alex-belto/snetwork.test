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
                <?php if(!empty($_SESSION['message'])) echo $_SESSION['message']; unset($_SESSION['message']); ?>  
                <?php if(!empty($formContent)){echo $formContent;}  ?>
                <p><?= $content ?></p>
            </main>
            <footer>
                <p>footer</p>
            </footer>

        </div>
    </body>
</html>