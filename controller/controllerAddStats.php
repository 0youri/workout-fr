<?php
    $noW = $typeW = $muscle = $exercise = $noseries = $noreps = $weight = "";
    $viewCard = $titleCard = $textCard = $buttonCard = $link = "";
    $tab = array();

 
    // Add workout on DB
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if ( !empty($_POST['muscle']) )
        {
            $id = $_GET['w'];
            $muscle = $_POST['muscle'];
            $rank = $_POST['rank'];
            $today = date("Y-m-d");   
            $serie1 = $_POST['serie1'];
            $serie2 = $_POST['serie2'];
            $serie3 = $_POST['serie3'];
            $serie4 = $_POST['serie4'];
            $weight = $_POST['weight'];
            $values = "'".$today."',".$serie1.",".$serie2.",".$serie3.",".$serie4.",'".$weight."','".$muscle."',".$rank."";
            addTableDataDB($id,$values,$connect);
        }
    }
    


    // Beging workout
    if ($_GET['state'] == -1)
    {
           // Recover data from table allworkout
        $request = "SELECT * FROM public.allworkout";
        $allworkoutSQL = requestDB($request,$connect);
        // Searching from $allworkoutSQL id and type of workout 
        while ( $dataAllWorkout = pg_fetch_assoc($allworkoutSQL) )
        {
            if ($dataAllWorkout['id'] == $_GET['w'])
            {
                $noW = $dataAllWorkout['id'];
                $typeW = $dataAllWorkout['type'];
                break;
            }
        }
        $request = "SELECT count(*) FROM public.workout WHERE id=".$noW.";";
        $stateF = requestDB($request,$connect);
        $stateF = pg_fetch_assoc($stateF)['count'];
        $viewCard = '
                <a href="index.php?page=addstats&w='.$noW.'&typeW='.$typeW.'&stateF='.$stateF.'&state=0" 
                class="btn btn-dark">Start workout</a>';
    }
    // Finish workout
    else if ( $_GET['state'] == $_GET['stateF'])
    {
       
        header('Location: index.php');
        exit();
        /*
         $noW = $_GET['w'];
        $typeW = $_GET['typeW'];
        //$viewCard = '<h5 class="card-title">Workout is end</h5>
        <a href="index.php?page=workout" class="btn btn-danger">To end</a>';
        */
    }
    // During workout
    else
    {   
        $noW = $_GET['w'];
        $typeW = $_GET['typeW'];
        $tab = getExercise($noW,$_GET['state'],$connect);
        $muscle = $tab[0];
        $exercise = $tab[1];
        $noseries = $tab[2];
        $noreps = $tab[3];
        $weight = $tab[4];
        $link = 'index.php?page=addstats&w='.$noW.'&typeW='.$typeW.'&stateF='.$_GET['stateF'].'&state='.($_GET['state']+1);

        $titleCard = '<form method="POST" id="formAdd" enctype="multipart/form-data" action="'.$link.'">
            <input style="display:none;" name="weight" value="'.$weight.'">
            <input style="display:none;" name="rank" value="'.($_GET['state']+1).'">
            <input style="display:none;" name="muscle" value="'.$muscle.'">
            <h5 class="card-title">#'.($_GET['state']+1).' ['.$muscle.'] '.$exercise.' | '.$noseries.'x'.$noreps.' | '.$weight.'kg</h5>';
        $textCard = '<p class="card-text"><div class="row">';
        for ($i = 1; $i <= $noseries; $i++)
        {
            $textCard = $textCard.' <div class="col">
            <input class="border border-dark container" name="serie'.$i.'" id="serie'.$i.'"></div>';
        }
        $textCard = $textCard.'</div></p>';
        $buttonCard = '<button type="button" class="btn btn-success" onclick="sumbitFormAdd();">Sumbit</button></form>';
        $viewCard = $titleCard.$textCard.$buttonCard;
 
    }

    // Tab with data of exercise
    function getExercise($noW,$noEx,$connect)
    {
        $tab = array();
        $request = "SELECT * FROM public.workout WHERE id=".$noW." ORDER BY rank;";
        if ( !pg_connection_busy($connect) ) pg_send_query($connect,$request);
        else echo "Error controller/controllerAdd.php -> pg_connection_busy(...)";

        $infoSQL = pg_get_result($connect);
        if ( !$infoSQL ) echo 'Error controller/controllerAdd.php -> pg_get_result(...)';
        $infoSQL = pg_fetch_assoc($infoSQL,$noEx);

        $tab[0] = $infoSQL['muscle'];
        $tab[1] = $infoSQL['exercise'];
        $tab[2] = $infoSQL['series'];
        $tab[3] = $infoSQL['repetitions'];
        $tab[4] = $infoSQL['weight'];
        return $tab;
    }



?>