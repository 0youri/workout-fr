<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.js"></script>
        <script src="script.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    </head>
        
    <body>
        <?php 
            include('view/menu.php');

            if(isset($_GET['page'])) // Choix de la page
            {
                $page = $_GET['page'];
                
                if(isset($routes[$page])) {
                    $controller = $routes[$page]['controller'];
                    $view = $routes[$page]['view'];
                    include('controller/' . $controller . '.php');
                    include('view/' . $view . '.php');
                }
                else {
                    include('static/accueil.php');
                }
            }
            else {
                include('static/accueil.php');
            }

            include('static/footer.php');
        ?>
    </body>
</html>


