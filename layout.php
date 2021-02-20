<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/assets/style.css?v=1">
        <title><?= $title ?></title>
    </head>
    <body>
        <div id="wrapper">
            <header>
                <?php include 'elems/header.php' ?>
            </header>
            <main>
                <?php if(isset($_SESSION['message'])){
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                 } ?>  
                <?php if(!empty($formContent)){echo $formContent;}  ?>
                <p><?= $content ?></p>
                <?php if(isset($_SESSION['auth']) AND !empty($wallFormContent)){echo $wallFormContent;}  ?>
            </main>
            <footer>
                <p>footer</p>
            </footer>

        </div>
    </body>
</html>