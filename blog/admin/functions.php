<?php
function query($sql, $params = [])
{
	$user = $GLOBALS['db']->prepare($sql);

	$user->execute($params);

	return $user->rowCount();

}

function find($username)
{

	$user =  query("SELECT id FROM admin WHERE username = ?", [$username]);

	return ($user > 0) ? true : false;
}

function login($username, $password)
{
	$user_id = $GLOBALS['db']->prepare("SELECT id FROM admin WHERE username = ? AND password = ?");

	$user_id->execute([$username, $password]);

	$user_id = $user_id->fetch(PDO::FETCH_OBJ);

	return (count($user_id)) ? $user_id : false;
}

function logged_in()
{
	return (isset($_SESSION['user_id'])) ? true : false;
}