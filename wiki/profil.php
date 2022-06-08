<?php require("header.php");?>	
<?php require("main-menu.php");?>
	
<?php 
	$result = mysqli_query($connect, "SELECT * FROM users INNER JOIN wiki_pages ON users.user_id = wiki_pages.user_id WHERE users.user_id =".$_SESSION['log_user']['user_id']);
	
	$res = array();
	
	while($resq = mysqli_fetch_assoc($result))
	{
		$res = $resq;
	}
	
	
	
	$col = mysqli_query($connect, "SELECT wiki_pages.user_id, COUNT(wiki_pages.page_id) FROM wiki_pages GROUP BY wiki_pages.user_id");	
	$count = mysqli_fetch_assoc($col);

?>	
	
<div id = "content">
	
		<h1>Страница пользователя: <?=$res['login']?></h1>
		<div id = "profil">			
			<div id = "profil_avatar">
				<center><h2>Аватар</h2>(200x200 px)</center>
				<img src = "<?=$res['user_img']?>">
				<form action = "loading_img.php" method = "POST" enctype = 'multipart/form-data'>
					<input id = "file" type = "file" name = "somename" />
					<input id = "file" type = "submit" name = "submit" value = "Загрузить" />
				</form>
			</div>
			<div id = "profil_info">
			<h2>Информация</h2>
			<br>
			<h3>Группа: <?php if($res['user_group'] == 1 ){echo "Редакторы";} else {echo "Администраторы";}?></h3>		
			<br>
				<h3>Страниц создано: <?php if($count['user_id'] == $_SESSION['log_user']['user_id']){ echo $count['COUNT(wiki_pages.page_id)'];}?></h3>			
			<br>
			<h3>Заметки: </h3>
			<?php 
			if(isset($_GET['submit']))
			{
			$zametki = mysqli_query($connect,  "UPDATE `users` SET `user_zametki` = \"".mysqli_real_escape_string($connect, $_GET['zametki'])."\"
			WHERE users.user_id=".$res['user_id']);
		
			}
			?>
			<script>
			function refr()
			{
				setTimeout(document.location.reload(), 1000);
			}
			</script>

			<form onsubmit="refr();"  method = "GET" >
					 <textarea placeholder="Ваши заметки" name = "zametki"><?=$res['user_zametki']?></textarea>
					 <input type = "submit" value = "Сохранить" name = "submit" />					 
			</form>
			</div>
		</div>
		
		<?php 
			$pages = mysqli_query($connect, "SELECT * FROM cars INNER JOIN brands INNER JOIN wiki_pages ON cars.car_id = wiki_pages.car_id AND cars.brand_id = brands.brand_id WHERE wiki_pages.user_id =".$_SESSION['log_user']['user_id']);
			$pages_admin = mysqli_query($connect, "SELECT * FROM cars INNER JOIN brands INNER JOIN wiki_pages ON cars.car_id = wiki_pages.car_id AND cars.brand_id = brands.brand_id WHERE 1");
			
			/*$res = array();
	
			while($resq = mysqli_fetch_assoc($result))
			{
				$res = $resq;
			}*/
			
		?>
		
		
		
		
		<div id = "profil_pages">
		<?php
			if($res['user_group'] == 1 ){?>
				<h1>Ваши страницы</h1>
					<?php while($page = mysqli_fetch_assoc($pages)){?>
					
				<div id = "profil_page">
				
				<img src = "<?=$page['model_img']?>">	
				
				<div id = "profil_page_name">
					<a href = "wiki_page.php?id=<?=$page['page_id']?>"><h2><?=$page['brand_name']?> <?=$page['model_name']?></h2></a>
				</div>
				<div id = "profil_page_update_delite">
					<a href = "create_update.php?id=<?=$page['page_id']?>"><h2>Редакировать</h2></a>
				</div>				
			
				<div id = "profil_page_update_delite">
					<a href = "delit_pages.php?page_id=<?=$page['page_id']?>"><h2>Удалить</h2></a>
				</div>
				</div>				
			<?php }} else {?>
				<h1>Все страницы</h1>
					<?php while($page = mysqli_fetch_assoc($pages_admin)){?>
					
				<div id = "profil_page">
				
				<img src = "<?=$page['model_img']?>">	
				
				<div id = "profil_page_name">
					<a href = "wiki_page.php?id=<?=$page['page_id']?>"><h2><?=$page['brand_name']?> <?=$page['model_name']?></h2></a>
				</div>
				<div id = "profil_page_update_delite">
					<a href = "create_update.php?id=<?=$page['page_id']?>"><h2>Редакировать</h2></a>
				</div>				
			
				<div id = "profil_page_update_delite">
					<a href = "delit_pages.php?page_id=<?=$page['page_id']?>"><h2>Удалить</h2></a>
				</div>
				</div>			
			
			<?php }} ?>	
						
				
				
				
		</div>
		
		
		
	</div>
<?php require("footer.php");?>	