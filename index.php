<!DOCTYPE html>
<html lang="en">
    <head>
        <title>workout-fr</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.js"></script>
        <script type="text/javascript" src="js/script.js?0"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    </head>
        
    <body >
        <?php
            require('model/constantes.php');
            require('model/includes.php');
            require('model/routes.php');
            
            $connect = connectDB();
            
            include('view/viewMenu.php');
            include('controller/controllerMenu.php');
            
            if(isset($_GET['page'])) // Choose of page
            {
                $page = $_GET['page'];
                
                if(isset($routes[$page]))
                {
                    $controller = $routes[$page]['controller'];
                    $view = $routes[$page]['view'];
                    include('controller/' . $controller . '.php');
                    include('view/' . $view . '.php');
                }
                else
                {
                    include('controller/controllerWorkout.php');
                    include('view/viewWorkout.php');
                }
            }
            else
            {
                include('controller/controllerWorkout.php');
                include('view/viewWorkout.php');
            }
        ?>
    </body>
</html>



