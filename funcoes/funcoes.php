<?php

/*
 *
 *
 *
 * Codigos das funcoes
*/


function decontoSimples()
{

    if (isset($_GET['tipo-desconto'])) {
        echo $_GET['tipo-desconto'];
    }
    if (isset($_GET['nominal'])) {
        echo $_GET['nominal'];
    }
    if (isset($_GET['taxa'])) {
        echo $_GET['taxa'];
    }
    if (isset($_GET['tempo'])) {
        echo $_GET['tempo'];
    }
    if (isset($_GET['tempo-dia'])) {
        echo $_GET['tempo-dia'];
    }
    if (isset($_GET['valDesc'])) {
        echo $_GET['valDesc'];
    }
}

function jurosSimples()
{

    if (isset($_GET['vp'])) {
        $vp = $_GET['vp'];
    } else {
        $vp = null;
    }
    if (isset($_GET['taxa'])) {
        $taxa = $_GET['taxa'];
    } else {
        $taxa = null;
    }
    if (isset($_GET['taxa-t'])) {
        $taxa_t = $_GET['taxa-t'];
    } else {
        $taxa_t = null;
    }
    if (isset($_GET['tempo'])) {
        $tempo = $_GET['tempo'];
    } else {
        $tempo = null;
    }
    if (isset($_GET['tempo-t'])) {
        $tempo_t = $_GET['tempo-t'];
    } else {
        $tempo_t = null;
    }
    if (isset($_GET['vf'])) {
        $vf = $_GET['vf'];
    } else {
        $vf = null;
    }

    $taxa = converteTaxa($taxa, $taxa_t);

    /*Calcula Valor Futuro*/
    if ($vp != null & $taxa != null & $tempo != null & $vf == null) {

        $tempo = converteTempo($tempo, $tempo_t);

        echo "<h4>Valor Presente: " . $vp . "</h4> ";
        echo "<h4>Taxa (" . $taxa_t . "): " . $taxa . "</h4> ";
        echo "<h4>Tempo (" . $tempo_t . "): " . $tempo . "</h4> ";
        echo "<h3>Valor Futuro: " . jurosSimplesM($vp, $taxa, $tempo) . "</h3> ";

    } elseif ($vp == null & $taxa != null & $tempo != null & $vf != null) { /*Calcular valor do valor presente*/

        echo "<h4>Valor Futuro: " . $vf . "</h4> ";
        echo "<h4>Taxa (" . $taxa_t . "): " . $taxa . "</h4> ";
        echo "<h4>Tempo (" . $tempo_t . "): " . $tempo . "</h4> ";
        echo "<h3>Valor Presente: " . jurosSmplesC($vf, $taxa, $tempo) . "</h3> ";


    } elseif ($vp != null & $taxa == null & $tempo != null & $vf != null) { /*Calcular valor do valor da taxa*/

        echo "<h4>Valor Futuro: " . $vf . "</h4> ";
        echo "<h4>Valor Presente: " . $vp . "</h4> ";
        echo "<h4>Tempo (" . $tempo_t . "): " . $tempo . "</h4> ";
        echo "<h3>Taxa: " . jurosSmplesI($vp, $vf, $tempo) . "</h3> ";


    } elseif ($vp != null & $taxa != null & $tempo == null & $vf != null) { /*Calcular valor do tempo*/

        echo "<h4>Valor Presente: " . $vp . "</h4> ";
        echo "<h4>Valor Futuro: " . $vf . "</h4> ";

        echo "<h4>Taxa (" . $taxa . "): " . $taxa_t . "</h4> ";
        echo "<h3>Tempo: " . jurosSmplesTT($vp, $taxa, $vf) . "</h3> ";

    } else {
        echo "<div class=\"alert alert-warning\">
            Deixe apenas um campo em branco.</div>";
    }

}

function jurosSimplesM($c, $i, $t)
{
    /*M = C.(1 + i.t)*/

    $m = ($c * (1 + ($i * $t)));

    return $m;

}

function jurosSmplesC($vf, $i, $t)
{
    /*Valor Presente (ou Principal): P = F/(1 + i.n)*/
    $vp = $vf / (1 + ($i * $t));
    return $vp;

    //echo "calculando valor presente";


}

function jurosSmplesI($vp, $vf, $t)
{
    /*Taxa de Juros: i = (F - P)/(P.n)*/
    $i = ($vf - $vp) / ($vp * $t);

    //echo "calculando valor da taxa";
    return $i;

}

function jurosSmplesTT($vp, $taxa, $vf)
{
    /*Número de Períodos: n = (F - P)/(P.i)*/
    $t = ($vf - $vp) / ($vp * $taxa);
    //echo "calculando valor do tempo";
    return $t;
}


function converteTempo($val, $per)
{

    /*switch ($per) {
        case 'dia':
            $val = ($val / 30);
            break;
        case 'mes':
            break;
        case 'ano':
            $val = $val * 12;
            break;
        case 'sem':
            $val = $val * 6;
            break;
        case 'tri':
            $val = $val * 4;
            break;
    }*/

    return $val;
}

function converteTaxa($val, $i)
{
    /* switch ($i) {
         case 'dia':
             $val = $val / 30;
             break;
         case 'mes':
             break;
         case 'ano':
             $val = $val * 12;
             break;
         case 'sem':
             $val = $val * 6;
             break;
         case 'tri':
             $val = $val * 4;
             break;
     }*/

    return ($val / 100);
}