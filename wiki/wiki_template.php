<!DOCTYPE html>
<html>
<head>
	<script src="ckeditor/ckeditor.js"></script>
	<meta charset = "utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=$title?></title>
	<link rel = "stylesheet" href = "style.css" type="text/css" media="all">
</head>
<body>
	<div id = "container">
	<div id = "logo"><a href = "/">Википедия-Авто</a></div>
	<div id = "header">
		<ul>
			<?php if(isset( $_SESSION['log_user'])):?>
			<li><a href="logout.php">Выйти</a></li>
			<li>Вы вошли на сайт, как:<a href ="profil.php?id=<?php echo $_SESSION['log_user']['user_id'];?>"> <?php echo $_SESSION['log_user']['login']; ?> </a></li>
			<?php else:?>
			<li><a href="login.php">Вход</a></li>
			<li><a href="signup.php">Регистрация</a></li>
			<li>Вы вошли на сайт, как гость.</li>
			<?php endif;?>
		</ul>
	</div>
	<div id = "header-menu">
		<ul>
			<li><form method = "GET" action = "search.php">		
			<input type="search" name="text_search">
			<input type="submit" name = "button_search" value="Искать">
			</form></li>
			<li>Поиск:</li>
			<?php if(empty($_SESSION) && isset($pageIdUpdate) ):?>
			<li><a href="login.php">Авторизуйтесь, чтобы редактировать страницу.</a></li>
			<?php else:?>
			<?php if(isset($pageIdUpdate)):?>
			<li><a href="create_update.php?id=<?=$pageIdUpdate?>">Редактировать</a></li>
			<?php endif; ?>
			<?php if(isset($pageIdRead)):?>
			<li><a href="wiki_page.php?id=<?=$pageIdRead?>">Читать</a></li>
			<?php endif; ?>
			<?php endif; ?>
		</ul>
	</div>
	<div id="clear"></div>
<?php require("main-menu.php");?>	
	
	<div id = "content">
		<h1><?=$title?></h1>
		<?=$content;?>
	</div>
	
<?php require("footer.php");?>	