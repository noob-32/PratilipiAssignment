<?php
//ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
session_start();
require("db.php");


//SANITIZE ALL USER INPUTS
foreach($_GET as $k=>$v) {$_GET[$k] = sanitize($v);}
foreach($_POST as $k=>$v) {$_POST[$k] = sanitize($v);}


function sanitize($string){
    global $db;
    $string = stripslashes($string); // removes backslashes
	return mysqli_real_escape_string($db,$string);
}

function authenticate(){
	if(empty($_SESSION["USER_ID"]))
		redirect("login.php");
}

function redirect($path){
	header("Location: ".$path);
	exit;
}

function query($sql){
	global $db;
	return mysqli_query($db, $sql); 
}

function GetArticleReadCount($ARTICLE_ID){
	$QUERY="SELECT COUNT(*) AS ROW_COUNT FROM article_user_view WHERE ARTICLE_ID='".$ARTICLE_ID."'"; 
	return mysqli_fetch_assoc(Query($QUERY))['ROW_COUNT'];
}

function GetArticleLiveCount($ARTICLE_ID){
	$QUERY = "SELECT COUNT(*) AS ROW_COUNT FROM live_article_views WHERE view_time >= (NOW() - INTERVAL 1 MINUTE) AND ARTICLE_ID='".$ARTICLE_ID."' ";
	return mysqli_fetch_assoc(Query($QUERY))['ROW_COUNT'];
}