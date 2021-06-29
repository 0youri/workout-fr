<?php
    $lunchHTML = $dinnerHTML = $snackHTML = $totalHTML = "";
    $lunch = file("model/food/lunch.txt");
    $dinner = file("model/food/dinner.txt");
    $snack = file("model/food/snack.txt");
    
    $lipidesAll = $glucidesAll = $protAll = $kcalAll = 0;
    
    for ($i = 0; $i < count($lunch); $i++)
    {
        $explore = explode(":",$lunch[$i]);
        $aliment = $explore[0];
        $quantite = $explore[1];
        $kcal = ( $quantite * $explore[2] ) / 100;
        $lipides = ( $quantite * $explore[3] ) / 100;
        $glucides = ( $quantite * $explore[4] ) / 100;
        $prot = ( $quantite * $explore[5] ) / 100;
        $lunchHTML = $lunchHTML.
        "<tr>
            <td>".$aliment."</td>
            <td>".$kcal."</td><td>".$lipides."</td><td>".$glucides."</td><td>".$prot."</td>
        </tr>";
        $kcalAll = $kcalAll + $kcal;
        $lipidesAll = $lipidesAll + $lipides;
        $glucidesAll = $glucidesAll + $glucides;
        $protAll = $protAll + $prot;
    }

    for ($i = 0; $i < count($dinner); $i++)
    {
        $explore = explode(":",$dinner[$i]);
        $aliment = $explore[0];
        $quantite = $explore[1];
        $kcal = ( $quantite * $explore[2] ) / 100;
        $lipides = ( $quantite * $explore[3] ) / 100;
        $glucides = ( $quantite * $explore[4] ) / 100;
        $prot = ( $quantite * $explore[5] ) / 100;
        $dinnerHTML = $dinnerHTML.
        "<tr>
            <td>".$aliment."</td>
            <td>".$kcal."</td><td>".$lipides."</td><td>".$glucides."</td><td>".$prot."</td>
        </tr>";
        $kcalAll = $kcalAll + $kcal;
        $lipidesAll = $lipidesAll + $lipides;
        $glucidesAll = $glucidesAll + $glucides;
        $protAll = $protAll + $prot;
    }

    for ($i = 0; $i < count($snack); $i++)
    {
        $explore = explode(":",$snack[$i]);
        $aliment = $explore[0];
        $quantite = $explore[1];
        $kcal = ( $quantite * $explore[2] ) / 100;
        $lipides = ( $quantite * $explore[3] ) / 100;
        $glucides = ( $quantite * $explore[4] ) / 100;
        $prot = ( $quantite * $explore[5] ) / 100;
        $snackHTML = $snackHTML.
        "<tr>
            <td>".$aliment."</td>
            <td>".$kcal."</td><td>".$lipides."</td><td>".$glucides."</td><td>".$prot."</td>
        </tr>";
        $kcalAll = $kcalAll + $kcal;
        $lipidesAll = $lipidesAll + $lipides;
        $glucidesAll = $glucidesAll + $glucides;
        $protAll = $protAll + $prot;
    }

    $totalHTML = "<tr> <td>".$kcalAll."</td> <td>".$lipidesAll."</td> <td>".$glucidesAll."</td> <td>".$protAll."</td> </tr>";
?>