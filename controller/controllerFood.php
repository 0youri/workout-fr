<?php
    $lunchHTML = $dinnerHTML = $totalHTML = "";
    $request = "SELECT * FROM public.food WHERE type='lunch' ORDER BY rank;";
    $lunchSQL = requestDB($request,$connect);
    
    $lipidesAll = $glucidesAll = $protAll = $kcalAll = 
    $lunchKcal = $lunchLipides = $lunchGlucides = $lunchProt = 0;
    
    while ( $dataLunch = pg_fetch_assoc($lunchSQL) )
    {
        $aliment = $dataLunch['aliment'];
        $quantite = $dataLunch['quantite'];
        $kcal = ( $quantite * $dataLunch['kcal'] ) / 100;
        $lipides = ( $quantite * $dataLunch['lipides'] ) / 100;
        $glucides = ( $quantite * $dataLunch['glucides'] ) / 100;
        $prot = ( $quantite * $dataLunch['proteines'] ) / 100;
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
    $lunchKcal = $kcalAll;
    $lunchLipides = $lipidesAll;
    $lunchGlucides = $glucidesAll;
    $lunchProt = $protAll;

    $lunchHTML = $lunchHTML.
    "<tr class='table-dark'>
        <td><strong>Total</strong></td>
        <td>".$lunchKcal."</td><td>".$lunchLipides."</td><td>".$lunchGlucides."</td><td>".$lunchProt."</td>
    </tr>";

    $request = "SELECT * FROM public.food WHERE type='dinner' ORDER BY rank;";
    $dinnerSQL = requestDB($request,$connect);
    
    while ( $dataDinner = pg_fetch_assoc($dinnerSQL) )
    {
        $aliment = $dataDinner['aliment'];
        $quantite = $dataDinner['quantite'];
        $kcal = ( $quantite * $dataDinner['kcal'] ) / 100;
        $lipides = ( $quantite * $dataDinner['lipides'] ) / 100;
        $glucides = ( $quantite * $dataDinner['glucides'] ) / 100;
        $prot = ( $quantite * $dataDinner['proteines'] ) / 100;
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
    $dinnerHTML = $dinnerHTML.
    "<tr class='table-dark'>
        <td><strong>Total</strong></td>
        <td>".($kcalAll-$lunchKcal)."</td><td>".($lipidesAll-$lunchLipides)."</td>
        <td>".($glucidesAll-$lunchGlucides)."</td><td>".($protAll-$lunchProt)."</td>
    </tr>";

    $totalHTML = "<tr> <td>~".$kcalAll."</td> <td>~".$lipidesAll."</td> <td>~".$glucidesAll."</td> <td>~".$protAll."</td> </tr>";
?>