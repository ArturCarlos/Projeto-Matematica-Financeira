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

    $tempo = converteTempo($tempo, $tempo_t);

    echo "<h4>Valor Presente: " . $vp . "</h4> ";
    echo "<h4>Taxa (" . $taxa_t . "): " . $taxa . "</h4> ";
    echo "<h4>Tempo (" . $tempo_t . "): " . $tempo . "</h4> ";


    echo "<h3>Valor Futuro: " . jurosSimplesM($vp, $taxa, $tempo) . "</h3> ";

}

function jurosSimplesM($c, $i, $t)
{

    /*M = C.(1 + i.t)*/

    $m = ($c * (1 + ($i * $t)));

    return $m;
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

    return ($val/100);
}