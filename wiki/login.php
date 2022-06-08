<?php>
require("connect_db.php");
$data = $_POST;
$title = "Вход";
$content = "";


if(isset($data['button_signup'])){
	//реистрация
	$errors = array();
	

	if(trim($data['login']) == '')
	{	
		$errors[] = 'Введите логин!';
	}
		
	
	if($data['password']=='')
	{
		$errors[] = 'Введите пароль!';
	}

	$userLogin = mysqli_query($connect, "SELECT * FROM `users` WHERE login = \"".$data['login']."\"");
	if(mysqli_num_rows($userLogin ) == 1 )
	{
		$user = mysqli_fetch_assoc($userLogin);
		if(password_verify($data['password'],$user['password']))
		{
		   $_SESSION['log_user'] = $user;
		   header('Location: /');

		}
		
		else
		{
			$errors[] = 'Введённый вами пароль неверен.';
		}
	}
	else
	{
		$errors[] = 'Пользователя с таким логином не существует!';
	}
	
	if(!empty($errors))
	{
		 $content ='<br><div style = "color: red;">'.array_shift($errors).'</div><hr>';
	}
	
	$loginSave =@$data['login'];
}

	if(isset($_SESSION['luck_reg']))
	{
		$content = $_SESSION['luck_reg'];
	}

$content .= "	
		<br>						
				<form method = \"POST\">	
			<p>
				<p><strong>Логин:</strong></p>
				<input type = \"text\" name = \"login\" value = ".$loginSave.">
			</p>			
			
			<br>
			<p>
				<p><strong>Пароль:</strong></p>
				<input type = \"password\" name = \"password\">
			</p>
			
			<br>
			<p>
				<button type = \"sumbit\" name = \"button_signup\"> Войти</button>
				
			</p>	
			</form>
";
unset($_SESSION['luck_reg']);
require ("wiki_template.php");
?>