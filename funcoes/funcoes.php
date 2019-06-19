<?php
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
    $taxa1 = converteTaxaSimples($taxa, $taxa_t, $tempo_t);
    $tempo1 = converteTempoSimples($tempo, $tempo_t, $taxa_t);
    //echo "Taxa = ".$taxa . " Tempo = ";echo $tempo;
    /*Calcula Valor Futuro*/
    if ($vp != null & $taxa != null & $tempo != null & $vf == null) {
        echo "<h4>Valor Presente: " . $vp . "</h4> ";
        echo "<h4>Taxa (" . $taxa_t . "): " . $taxa . "% </h4> ";
        echo "<h4>Tempo (" . $tempo_t . "): " . $tempo . "</h4> ";
        echo "<h3>Valor Futuro: " . jurosSimplesM($vp, $taxa1, $tempo1) . "</h3> ";
    } elseif ($vp == null & $taxa != null & $tempo != null & $vf != null) { /*Calcular valor do valor presente*/
        echo "<h4>Valor Futuro: " . $vf . "</h4> ";
        echo "<h4>Taxa (" . $taxa_t . "): " . $taxa . "% </h4> ";
        echo "<h4>Tempo (" . $tempo_t . "): " . $tempo . "</h4> ";
        echo "<h3>Valor Presente: " . jurosSmplesC($vf, $taxa1, $tempo1) . "</h3> ";
    } elseif ($vp != null & $taxa == null & $tempo != null & $vf != null) { /*Calcular valor do valor da taxa*/
        echo "<h4>Valor Futuro: " . $vf . "</h4> ";
        echo "<h4>Valor Presente: " . $vp . "</h4> ";
        echo "<h4>Tempo (" . $tempo_t . "): " . $tempo . "</h4> ";
        echo "<h3>Taxa(" . $taxa_t . "): " . jurosSmplesI($vp, $vf, $tempo1) . "% </h3> ";
    } elseif ($vp != null & $taxa != null & $tempo == null & $vf != null) { /*Calcular valor do tempo*/
        echo "<h4>Valor Presente: " . $vp . "</h4> ";
        echo "<h4>Valor Futuro: " . $vf . "</h4> ";
        echo "<h4>Taxa (" . $taxa_t . "): " . $taxa . "% </h4> ";
        echo "<h3>Tempo(" . $tempo_t . "): " . jurosSmplesTT($vp, $taxa1, $vf) . "</h3> ";
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
function converteTempoSimples($val, $perT, $per)
{
    /*Converte todas os valores para mes*/
    if ($per == $perT) {
        return $val;
    } else {
        switch ($perT) {
            case 'dia':
                $val = ($val / 30);
                break;
            case 'mes':
                break;
            case 'ano':
                $val = ($val * 12);
                break;
            case 'sem':
                $val = ($val * 6);
                break;
            case 'tri':
                $val = ($val * 4);
                break;
        }
        return $val;
    }
}
function converteTaxaSimples($val, $perT, $per)
{
    /*Converte todas os valores para mes*/
    if ($per == $perT) {
        return ($val / 100);
    } else {
        switch ($perT) {
            case 'dia':
                $val = ($val / 30) / 100;
                break;
            case 'mes':
                $val = $val / 100;
                break;
            case 'ano':
                $val = ($val * 12) / 100;
                break;
            case 'sem':
                $val = ($val * 6) / 100;
                break;
            case 'tri':
                $val = ($val * 4) / 100;
                break;
        }
        return $val;
    }
}
function jurosComposto()
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
    $taxa1 = converteTaxaSimples($taxa, $taxa_t, $tempo_t);
    $tempo1 = converteTempoSimples($tempo, $tempo_t, $taxa_t);
    //echo "Taxa = ".$taxa . " Tempo = ";echo $tempo;
    /*Calcula Valor Futuro*/
    if ($vp != null & $taxa != null & $tempo != null & $vf == null) {
        echo "<h4>Valor Presente: " . $vp . "</h4> ";
        echo "<h4>Taxa (" . $taxa_t . "): " . $taxa . "% </h4> ";
        echo "<h4>Tempo (" . $tempo_t . "): " . $tempo . "</h4> ";
        echo "<h3>Valor Futuro: " . jurosCompostoM($vp, $taxa1, $tempo1) . "</h3> ";
    } elseif ($vp == null & $taxa != null & $tempo != null & $vf != null) { /*Calcular valor do valor presente*/
        echo "<h4>Valor Futuro: " . $vf . "</h4> ";
        echo "<h4>Taxa (" . $taxa_t . "): " . $taxa . "% </h4> ";
        echo "<h4>Tempo (" . $tempo_t . "): " . $tempo . "</h4> ";
        echo "<h3>Valor Presente: " . jurosCompostoC($vf, $taxa1, $tempo1) . "</h3> ";
    } elseif ($vp != null & $taxa == null & $tempo != null & $vf != null) { /*Calcular valor do valor da taxa*/
        echo "<h4>Valor Futuro: " . $vf . "</h4> ";
        echo "<h4>Valor Presente: " . $vp . "</h4> ";
        echo "<h4>Tempo (" . $tempo_t . "): " . $tempo . "</h4> ";
        echo "<h3>Taxa(" . $taxa_t . "): " . jurosCompostoI($vp, $vf, $tempo1) . " % </h3> ";
    } elseif ($vp != null & $taxa != null & $tempo == null & $vf != null) { /*Calcular valor do tempo*/
        echo "<h4>Valor Presente: " . $vp . "</h4> ";
        echo "<h4>Valor Futuro: " . $vf . "</h4> ";
        echo "<h4>Taxa (" . $taxa_t . "): " . $taxa . "% </h4> ";
        echo "<h3>Tempo(" . $tempo_t . "): " . converteTempoComposto(jurosCompoatoTT($vp, $taxa1, $vf), $tempo_t, $taxa_t) . "</h3> ";
    } else {
        echo "<div class=\"alert alert-warning\">
            Deixe apenas um campo em branco.</div>";
    }
}
function jurosCompostoM($c, $i, $t)
{
    $m = ($c * pow(1 + $i, $t));
    return $m;
}
function jurosCompostoC($vf, $i, $t)
{
    $vp = $vf / pow((1 + $i), $t);
    return $vp;
}
function jurosCompostoI($vp, $vf, $t)
{
    $i = pow(($vf / $vp), (1 / $t)) - 1;
    return $i;
}
function jurosCompoatoTT($vp, $taxa, $vf)
{
    /*Número de Períodos: n = (F - P)/(P.i)*/
    $t = log($vf / $vp) / log(1 + $taxa);
    //echo "calculando valor do tempo";
    return $t;
}
function converteTempoComposto($val, $perT, $per)
{
    /*Converte todas os valores para mes*/
    if ($per == $perT) {
        return $val;
    } else {
        switch ($perT) {
            case 'dia':
                $val = ($val * 30);
                break;
            case 'mes':
                break;
            case 'ano':
                $val = ($val / 12);
                break;
            case 'sem':
                $val = ($val / 6);
                break;
            case 'tri':
                $val = ($val / 4);
                break;
        }
        return $val;
    }
}
function decontoSimples()
{
    if (isset($_GET['tipo-desconto'])) {
        $tipoDesc = $_GET['tipo-desconto'];
    } else {
        $tipoDesc = null;
    }
    if (isset($_GET['nominal'])) {
        $nominal = $_GET['nominal'];
    } else {
        $nominal = null;
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
    if (isset($_GET['valDesc'])) {
        $valDesc = $_GET['valDesc'];
    } else {
        $valDesc = null;
    }
    /*Calcula desconto simples comercial*/
    if ($nominal == null & $taxa != null & $tempo != null & $valDesc != null) {
        echo "<h4>Desconto (" . $tipoDesc . ")</h4> ";
        echo "<h4>Taxa (" . $taxa_t . "): " . $taxa . "% </h4> ";
        echo "<h4>Tempo (" . $tempo_t . "): " . $tempo . "</h4> ";
        echo "<h4>Valor Desconto: " . $valDesc . "</h4> ";
        if ($tipoDesc == 'com') {
            echo "<h3>Valor Nominal: " . descontoSimplesCn($valDesc, $taxa, $tempo) . "</h3> ";
        } else {
            echo "<h3>Valor Nominal: " . descontoSimplesRn($valDesc, $taxa, $tempo) . "</h3> ";
        }
    } elseif ($nominal != null & $taxa == null & $tempo != null & $valDesc != null) {
        echo "<h4>Desconto (" . $tipoDesc . ")</h4> ";
        echo "<h4>Valor Nominal: " . $nominal . "</h4> ";
        echo "<h4>Tempo (" . $tempo_t . "): " . $tempo . "</h4> ";
        echo "<h4>Valor Desconto: " . $valDesc . "</h4> ";
        if ($tipoDesc == 'com') {
            echo "<h3>Taxa (" . $taxa_t . "): " . descontoSimplesCtx($nominal, $valDesc, $tempo) . "% </h3> ";
        } else {
            echo "<h3>Taxa (" . $taxa_t . "): " . descontoSimplesRtx($nominal, $valDesc, $tempo) . "% </h3> ";
        }
    } elseif ($nominal != null & $taxa != null & $tempo == null & $valDesc != null) {
        echo "<h4>Desconto (" . $tipoDesc . ")</h4> ";
        echo "<h4>Valor Nominal: " . $nominal . "</h4> ";
        echo "<h4>Taxa (" . $taxa_t . "): " . $taxa . " % </h4> ";
        echo "<h4>Valor Desconto: " . $valDesc . "</h4> ";
        if ($tipoDesc == 'com') {
            echo "<h3>Tempo (" . $tempo_t . "): " . descontoSimplesCtempo($nominal, $valDesc, $taxa) . "</h3> ";
        } else {
            echo "<h3>Tempo (" . $tempo_t . "): " . descontoSimplesRtempo($nominal, $valDesc, $taxa) . "</h3> ";
        }
    } elseif ($nominal != null & $taxa != null & $tempo != null & $valDesc == null) {
        echo "<h4>Desconto (" . $tipoDesc . ")</h4> ";
        echo "<h4>Valor Nominal: " . $nominal . "</h4> ";
        echo "<h4>Taxa (" . $taxa_t . "): " . $taxa . "% </h4> ";
        echo "<h4>Tempo (" . $tempo_t . "): " . $tempo . "</h4> ";
        if ($tipoDesc == 'com') {
            echo "<h4>Valor Desconto: " . descontoSimplesC($nominal, $taxa, $tempo) . "</h4> ";
        } else {
            echo "<h4>Valor Desconto: " . descontoSimplesR($nominal, $taxa, $tempo) . "</h4> ";
        }
    } else {
        echo "<div class=\"alert alert-warning\">
            Deixe apenas um campo em branco.</div>";
    }
}

// Desconto Racional Simples
function descontoSimplesRtx($nominal, $valDesc, $tempo) {
    /* Valor da taxa: tx = ((VF/N) - 1 ) / n */
    $tx = (($valDesc / $nominal) - 1) / $tempo;
    return $tx;
}
function descontoSimplesRtempo($nominal, $valDesc, $taxa) {
    /* Valor da tempo: n = ((VF/N) - 1 ) / i */
    $n = (($valDesc / $nominal) - 1) / $taxa;
    return $n;
}
function descontoSimplesRn($valDesc, $taxa, $tempo) { // valor presente
    /*Valor nominal: N = VF / (1 + i.n) */
    $nominal = $valDesc / (1 + $taxa * $tempo);
    return $nominal;
}
function descontoSimplesR($nominal, $taxa, $tempo) {  //valor futuro
    /* Valor futuro: VF = N.(1 + i.n) */
    $valDesc = $nominal / (1 + $taxa * $tempo);
    return $valDesc;
}
// Desconto Comercial Simples
function descontoSimplesCtx($nominal, $valDesc, $tempo) {
    /* Valor da taxa: d = D / N.n */
    $i = $valDesc / ($nominal * $tempo);
    return $i;
}
function descontoSimplesCtempo($nominal, $valDesc, $taxa) {
    /* Valor da tempo: n = D / N.d */
    $n = $valDesc / ($nominal * $taxa);
    return $n;
}
function descontoSimplesCn($valDesc, $taxa, $tempo) {
    /*Valor nominal: N = D / d.n */
    $nominal = $valDesc / ($taxa * $tempo);
    return $nominal;
}
function descontoSimplesC($nominal, $taxa, $tempo) {
    /* Valor de desconto: D = N.d.n */
    $valDesc = $nominal * $taxa * $tempo;
    return $valDesc;
}

function descontoComposto()
{

    if (isset($_GET['tipo-desconto'])) {
        $tipoDesconto = $_GET['tipo-desconto'];
        echo $_GET['tipo-desconto'];
    } else {
        $tipoDesconto = null;
    }
    if (isset($_GET['nominal'])) {
        $nominal = $_GET['nominal'];
        // echo $_GET['nominal'];
    } else {
        $nominal = null;
    }
    if (isset($_GET['taxa'])) {
        $taxa = $_GET['taxa'];
        // echo $_GET['taxa'];
    } else {
        $taxa = null;
    }
    if (isset($_GET['taxa-t'])) {
        $taxa_t = $_GET['taxa-t'];
        // echo $_GET['taxa'];
    } else {
        $taxa_t = null;
    }
    if (isset($_GET['tempo'])) {
        $tempo = $_GET['tempo'];
        // echo $_GET['tempo'];
    } else {
        $tempo = null;
    }
    if (isset($_GET['tempo-t'])) {
        $tempo_t = $_GET['tempo-t'];
        // echo $_GET['tempo-t'];
    } else {
        $tempo_t = null;
    }
    if (isset($_GET['valDesc'])) {
        $valDesc = $_GET['valDesc'];
    } else {
        $valDesc = null;
    }
    
    $taxa1 = converteTaxaSimples($taxa, $taxa_t, $tempo_t);
    $tempo1 = converteTempoSimples($tempo, $tempo_t, $taxa_t);

    //echo "Taxa = ".$taxa . " Tempo = ";echo $tempo;

    if($tipoDesconto == 'com') {
        if ($nominal != null & $taxa != null & $tempo != null & $valDesc == null) { //valor descontado
            $valDesc = descontoCompostoC($nominal, $taxa1, $tempo1);
            echo "<h4>Valor Presente: " . $nominal . "</h4> ";
            echo "<h4>Taxa (" . $taxa_t . "): " . $taxa . "% </h4> ";
            echo "<h4>Tempo (" . $tempo_t . "): " . $tempo . "</h4> ";
            echo "<h4>Desconto: ". valDesconto($valDesc, $nominal) ."</h4> ";
            echo "<h3>Valor Futuro: " . $valDesc . "</h3> ";
        } elseif ($nominal == null & $taxa != null & $tempo != null & $valDesc != null) { //valor nominal
            $nominal = descontoCompostoCn($valDesc, $taxa1, $tempo1);
            echo "<h4>Valor Presente: " . $valDesc . "</h4> ";
            echo "<h4>Taxa (" . $taxa_t . "): " . $taxa . "% </h4> ";
            echo "<h4>Tempo (" . $tempo_t . "): " . $tempo . "</h4> ";
            echo "<h4>Desconto: ". valDesconto($valDesc, $nominal) ."</h4> ";
            echo "<h3>Valor Futuro: " . $valDesc . "</h3> ";
        } elseif ($nominal != null & $taxa == null & $tempo != null & $valDesc != null) { //valor da taxa
            echo "<h4>Valor Presente: " . $nominal . "</h4> ";
            echo "<h4>Taxa (" . $taxa_t . "): " . descontoCompostoCtx($nominal, $valDesc, $tempo1) . "% </h4> ";
            echo "<h4>Tempo (" . $tempo_t . "): " . $tempo . "</h4> ";
            echo "<h4>Desconto: ". valDesconto($valDesc, $nominal) ."</h4> ";
            echo "<h3>Valor Futuro: " . $valDesc . "</h3> ";
        } elseif ($nominal != null & $taxa != null & $tempo == null & $valDesc != null) { //valor período
            echo "<h4>Valor Presente: " . $nominal . "</h4> ";
            echo "<h4>Taxa (" . $taxa_t . "): " . $taxa . "% </h4> ";
            echo "<h4>Tempo (" . $tempo_t . "): " . descontoCompostoCtempo($nominal, $valDesc, $taxa1) . "</h4> ";
            echo "<h4>Desconto: ". valDesconto($valDesc, $nominal) ."</h4> ";
            echo "<h3>Valor Futuro: " . $valDesc . "</h3> ";
        }
    } elseif ($tipoDesconto == 'rac') {
        if ($nominal != null & $taxa != null & $tempo != null & $valDesc == null) { //valor descontado
            $valDesc = valorFinalDC($nominal, $taxa1, $tempo1);
            echo "<h4>Valor Presente: " . $nominal . "</h4> ";
            echo "<h4>Taxa (" . $taxa_t . "): " . $taxa . "% </h4> ";
            echo "<h4>Tempo (" . $tempo_t . "): " . $tempo . "</h4> ";
            echo "<h4>Desconto: ". descontoCompostoR($nominal, $taxa1, $tempo1) ."</h4> ";
            echo "<h3>Valor Futuro: " . valorFinalDCr($nominal, $taxa1, $tempo1) . "</h3> ";
        } elseif ($nominal == null & $taxa != null & $tempo != null & $valDesc != null) { //valor nominal
            $nominal = descontoCompostoRn($valDesc, $taxa1, $tempo1);
            echo "<h4>Valor Presente: " . $nominal . "</h4> ";
            echo "<h4>Taxa (" . $taxa_t . "): " . $taxa . "% </h4> ";
            echo "<h4>Tempo (" . $tempo_t . "): " . $tempo . "</h4> ";
            echo "<h4>Desconto: ". descontoCompostoR($nominal, $taxa1, $tempo1) ."</h4> ";
            echo "<h3>Valor Futuro: " . $valDesc . "</h3> ";
        } elseif ($nominal != null & $taxa == null & $tempo != null & $valDesc != null) { //valor da taxa
            echo "<h4>Valor Presente: " . $nominal . "</h4> ";
            echo "<h4>Taxa (" . $taxa_t . "): " . descontoCompostoRtx($nominal, $valDesc, $tempo1) . "% </h4> ";
            echo "<h4>Tempo (" . $tempo_t . "): " . $tempo . "</h4> ";
            echo "<h4>Desconto: ". descontoCompostoR($nominal, $taxa1, $tempo1) ."</h4> ";
            echo "<h3>Valor Futuro: " . $valDesc . "</h3> ";
        } elseif ($nominal != null & $taxa != null & $tempo == null & $valDesc != null) { // valor do período
            echo "<h4>Valor Presente: " . $nominal . "</h4> ";
            echo "<h4>Taxa (" . $taxa_t . "): " . $taxa . "% </h4> ";
            echo "<h4>Tempo (" . $tempo_t . "): " . descontoCompostoRtempo($nominal, $valDesc, $taxa1) . "</h4> ";
            echo "<h4>Desconto: ". descontoCompostoR($nominal, $taxa1, $tempo1) ."</h4> ";
            echo "<h3>Valor Futuro: " . $valDesc . "</h3> ";
        }
    } else {
        echo "<div class=\"alert alert-warning\">
            Deixe apenas um campo em branco.</div>";
    }
}

// Desconto Composto Comercial
function descontoCompostoCtx($nominal, $valDesc, $tempo) {
    /* Valor da taxa: d = D / N.n */
    $i = $valDesc / ($nominal * $tempo);
    return $i;
}

function descontoCompostoCtempo($nominal, $valDesc, $taxa) {
    /* Valor da tempo: n = D / N.d */
    $n = $valDesc / ($nominal * $taxa);
    return $n;
}

function descontoCompostoCn($valDesc, $taxa, $tempo) {
    /*Valor nominal: N = vf * (1 + i) ^ n*/
    $nominal = $valDesc * pow((1 + $taxa), $tempo);
    return $nominal;
}

function valorFinalDCc($nominal, $taxa, $tempo) {
    // valor futuro: vf = N / (1 + i) ^ n
    $vf = $nominal / pow((1 + $taxa), $tempo);
    return $vf;
}

function descontoCompostoC($nominal, $taxa, $tempo) {
    /* Valor de desconto: D = VF.(1 - (1 - i)^ n) */ 
    $vf = valorFinalDCc($nominal, $taxa, $tempo);
    $valDesc = $vf * (1 - pow((1 - $taxa), $tempo));
    return $valDesc;
}

// Desconto Composto Racional
function descontoCompostoRtx($nominal, $valDesc, $tempo) {
    // /* Valor da taxa: d = D / N.n */
    // $i = $valDesc / ($nominal * $tempo);
    // return $i;
}

function descontoCompostoRtempo($nominal, $valDesc, $taxa) {
    // /* Valor da tempo: n = D / N.d */
    // $n = $valDesc / ($nominal * $taxa);
    // return $n;
}

function descontoCompostoRn($valDesc, $taxa, $tempo) {
    /*Valor nominal: N = vf / (1 + i) ^ n*/
    $nominal = $valDesc / pow((1 + $taxa), $tempo);
    return $nominal;
}
function valorFinalDCr($nominal, $taxa, $tempo) {
    // valor futuro: vf = N (1 + i) ^ n
    $vf = $nominal * pow((1 + $taxa), $tempo);
    return $vf;
}
function descontoCompostoR($nominal, $taxa, $tempo) {
    /* Valor de desconto: D = VF.(1 - (1 + i)^ -n) */ 
    $vf = valorFinalDCr($nominal, $taxa, $tempo);
    $valDesc = $vf * (1 - pow((1 + $taxa), (-$tempo)));
    return $valDesc;
}

function montante() {

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

    $taxa1 = converteTaxaSimples($taxa, $taxa_t, $tempo_t);
    $tempo1 = converteTempoSimples($tempo, $tempo_t, $taxa_t);

        if ($vp != null & $taxa != null & $tempo != null & $vf == null) {

            echo "<h4>Valor Presente: " . $vp . "</h4> ";
            echo "<h4>Taxa (" . $taxa_t . "): " . $taxa . "% </h4> ";
            echo "<h4>Tempo (" . $tempo_t . "): " . $tempo . "</h4> ";
            echo "<h3>Valor Futuro: " . montanteSvf($vp, $taxa1, $tempo1) . "</h3> ";
    
        } elseif ($vp == null & $taxa != null & $tempo != null & $vf != null) { /*Calcular valor do valor presente*/
            
            echo "<h4>Valor Futuro: " . $vf . "</h4> ";
            echo "<h4>Taxa (" . $taxa_t . "): " . $taxa . "% </h4> ";
            echo "<h4>Tempo (" . $tempo_t . "): " . $tempo . "</h4> ";
            echo "<h3>Valor Presente: " . montanteSvf($vf, $taxa1, $tempo1) . "</h3> ";
    
        } elseif ($vp != null & $taxa == null & $tempo != null & $vf != null) { /*Calcular valor do valor da taxa*/
    
            echo "<h4>Valor Futuro: " . $vf . "</h4> ";
            echo "<h4>Valor Presente: " . $vp . "</h4> ";
            echo "<h4>Tempo (" . $tempo_t . "): " . $tempo . "% </h4> ";
            echo "<h3>Taxa(".$taxa_t."): " . montanteStx($vp, $vf, $tempo1) . "</h3> ";
    
    
        } elseif ($vp != null & $taxa != null & $tempo == null & $vf != null) { /*Calcular valor do tempo*/
    
            echo "<h4>Valor Presente: " . $vp . "</h4> ";
            echo "<h4>Valor Futuro: " . $vf . "</h4> ";
            echo "<h4>Taxa (" . $taxa_t . "): " . $taxa . "% </h4> ";
            echo "<h3>Tempo(".$tempo_t."): " . montanteStt($vp, $taxa1, $vf) . "</h3> ";
    
        } else {
            echo "<div class=\"alert alert-warning\">
                Deixe apenas um campo em branco.</div>";
        }
}

function montanteStt($c, $i, $vf) {
    // tempo: n = vf - c / c . i
    $n = ($vf - $c) / ($c * $i);
    return $n;
}

function montanteStx($c, $vf, $t) {
    // tx: tx = vf - c / c . n
    $tx = ($vf - $c) / ($c * $t);
    return $tx;

}
function montanteScap($vf, $i, $t) {
    // capital: C = m / (1 + i . t)
    $c = $vf / (1 + $i * $t);
}
function montanteSvf($c, $i, $t) {
    // montante: M = C (1 + i . t)
    $m = $c * (1 + $i * $t);
    return $m;
}
?>