<?php

$fileinfo = 'comments.txt';
// Kolla om formuläret har skickats
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Ta emot användarens namn och kommentar
    $name = htmlspecialchars($_POST['name']);
    $comment = htmlspecialchars($_POST['comment']);
    $time = date('Y-m-d H:i:s'); 

    
    $save = "Namn: $name | Tid: $time | Kommentar: $comment\n";

    // Save comments
    file_put_contents($fileinfo, $save, FILE_APPEND);
    
    // Omdirigera tillbaka
    header("Location: comments.php");
    exit;

}
    $comments = [];
  // read from file
if (file_exists($fileinfo)) {
    $comments = file($fileinfo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    // the last is first
    $comments = array_reverse($comments);
}


?>