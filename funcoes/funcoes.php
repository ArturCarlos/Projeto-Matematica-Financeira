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
    /*nominal
    taxa
    taxa-t
    tempo
    tempo-dia
    valDesc
    */
}