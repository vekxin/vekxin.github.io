#!/usr/local/bin/php
<?php 
header('Content-Type: text/plain; charset=utf-8');
if ($_SERVER['REQUEST_METHOD']==="POST") {
    echo 'post successfully written';
    $author=$_POST['Author'];
    if ($_POST['Author']===''){
        $author=$_COOKIE['username'];
    }
    $content=$_POST['Content'];

    $file=@fopen('posts.txt', 'a');
    fwrite($file, "<b>$author</b> says: $content\n");
    fclose($file);
} else {
    echo 'Nobody has made a post.';
}
?>