<?php>
require("connect_db.php");
$data = $_POST;
$title = "Регистрация";
$content = "";
if(isset($data['button_signup'])){
	//реистрация
	$errors = array();
	

	if(trim($data['login']) == '')
	{	
		$errors[] = 'Введите логин!';
	}
	
	
	//проверяем существует ли пользователь с таким логином
	if(mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `users` WHERE login = \"".$data['login']."\""))> 0)
	{
		$errors[] = 'Этот логин уже занят!';
	}
	
	
	if(trim($data['email']) == '')
	{
		$errors[] = 'Введите ваш email!';
	}
	
	//проверяем существует ли пользователь с таким email
	if(mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `users` WHERE email = \"".$data['email']."\""))> 0)
	{
		$errors[] = 'Этот email уже занят!';
	}
	
	if($data['password']=='')
	{
		$errors[] = 'Введите пароль!';
	}
	
	if($data['password_2']!= $data['password'])
	{
		$errors[] = 'Повторынй пароль введен не верно!';
	}
	
	
	if(empty($errors))
	{
		mysqli_query($connect, "INSERT INTO users (login,email,password) VALUES (\"".$data['login']."\",\"".$data['email']."\" , \"".password_hash($data['password'], PASSWORD_DEFAULT)."\")");
		$id = mysqli_insert_id($connect);		
		$_SESSION['luck_reg'] =  '<br><div style = "color: green;">Вы успешно зарегистрировались!!!</div><hr>';
	
		header('Location: /login.php');	
	
		
	}	
	else
	{
		 $content ='<br><div style = "color: red;">'.array_shift($errors).'</div><hr>';

	}
	
	
	$loginSave =@$data['login'];
	$emailSave =@$data['email'];

	
}

$content .= "
			<br>						
				<form method = \"POST\">	
			<p>
				<p><strong>Ваш логин:</strong></p>
				<input type = \"text\" name = \"login\" value = ".$loginSave.">
			</p>			
			<br>
			<p>
				<p><strong>Ваш email:</strong></p>
				<input type = \"email\" name = \"email\" value = ".$emailSave.">
			</p>	
			<br>
			<p>
				<p><strong>Ваш пароль:</strong></p>
				<input type = \"password\" name = \"password\">
			</p>
			<br>
			<p>
				<p><strong>Введите ваш пароль еще раз:</strong></p>
				<input type = \"password\" name = \"password_2\">
			</p>
			<br>
			<p>
				<button type = \"sumbit\" name = \"button_signup\"> Зарегистрироваться</button>
				
			</p>	
			</form>
		

";

require ("wiki_template.php");
?>