<?php

// desarrollo (INSTRUCCIONES PARA QUE EL PROGRAMA REPORTE TODOS LOS ERRORES)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Importamos la clase al archivo php
require 'basicFileManager.php';
    
$bfm = new BasicFileManager();

if($bfm->set('file', $_POST['folder']) && 
    $bfm->set('file2', $_POST['folder']) &&
    $bfm->set('file3', $_POST['folder'])){
    echo '<h1>File upload successfully</h1>';
} else {
    echo '<h1>File upload Error</h1>';
}

$bfm -> readFile($_FILES['file']['name'], $_POST['folder']);
echo '<h1> archivo:'.$_FILES['file']['name'].'</h1>';
$bfm -> readFile($_FILES['file2']['name'], $_POST['folder']);
echo '<h1> archivo:'.$_FILES['file2']['name'].'</h1>';
$bfm -> readFile($_FILES['file3']['name'], $_POST['folder']);
echo '<h1> archivo:'.$_FILES['file3']['name'].'</h1>';



