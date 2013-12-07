<!DOCTYPE HTML>
<html lang="en-US">
<head>
 	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 	<title>ITD 3243 Group Project</title>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<h1>ITD 3243 Forum</h1>
	<div id="wrapper">
	<div id="menu">
		<a class="item" href="/random-project-3/index.php">Home</a> -
		<a class="item" href="/random-project-3/create_topic.php">Create a topic</a> -
		<a class="item" href="/random-project-3/create_cat.php">Create a category</a>
		
		<div id="userbar">
		<?php
		if($_SESSION['signed_in'])
		{
			echo 'Hello <b>' . htmlentities($_SESSION['user_name']) . '</b>. Not you? <a class="item" href="signout.php">Sign out</a>';
		}
		else
		{
			echo '<a class="item" href="signin.php">Sign in</a> or <a class="item" href="signup.php">create an account</a>';
		}
		?>
		</div>
	</div>
		<div id="content">