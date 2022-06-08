<?php require("header.php");?>	
<?php require("main-menu.php");?>	
	<div id = "content">
		<div id = "main_content">
			<div id = "main_img"></div>
			<div id = "main_title">
				<p><h1 style = "line-height: 60px;">Добро пожаловать в Википедию-Авто</h1></p>
				<p>свободную энциклопедию, которую может редактировать каждый.</p>
			</div>	
		</div>
		
			<?php			
			$last_pages = mysqli_query($connect, "SELECT * FROM cars INNER JOIN wiki_pages INNER JOIN brands ON cars.car_id = wiki_pages.car_id AND cars.brand_id = brands.brand_id ORDER BY wiki_pages.page_id DESC LIMIT 5");			
			
			
		?>
		
		<div id = "last_pages">
			<h2 style = "text-align: center;">Новейшие страницы</h2>
			<?php while($last_page = mysqli_fetch_assoc($last_pages)) {?>
			<div id= "list_last_pages">
				<a href = "/wiki_page.php?id=<?=$last_page["page_id"]?>">
				<div id= "img_list_last_pages">
					<img src = "<?=$last_page["model_img"]?>">
				</div>
				<div id= "text_list_last_pages">
					<h2><?=$last_page["brand_name"]?> <?=$last_page["model_name"]?></h2>
				</div>
				</a>
			</div>
			<?php }?>		
		</div>
		
		<?php
			$count_pages = mysqli_query($connect, "SELECT COUNT(page_id) FROM wiki_pages");
			$count = mysqli_fetch_assoc($count_pages);
			$rarndom =  mt_rand(1, (int)$count["COUNT(page_id)"]);			
			$rarndom_pages = mysqli_query($connect, "SELECT * FROM cars INNER JOIN wiki_pages INNER JOIN brands ON cars.car_id = wiki_pages.car_id AND  cars.brand_id = brands.brand_id WHERE wiki_pages.page_id =".$rarndom);
			$random_page = mysqli_fetch_assoc($rarndom_pages);
	
		
		?>
		<div id = "random_pages">
			<h2 style = "text-align: center;">Случайная страница</h2>
			<div id = "content_random_pages">
				<h1 style= "text-align:left; margin-bottom: 1%;"><?=$random_page["brand_name"]?> <?=$random_page["model_name"]?></h1>
				<img src = "<?=$random_page["model_img"]?>">
				<?php echo mb_substr( $random_page["content"], 0,1000,'utf-8');?>											
			</div>
			<div id = "pereity_random_pages">
				<a href ="/wiki_page.php?id=<?=$random_page["page_id"]?>"> Перейти</a>
			</div>
				
		</div>
	</div>
<?php require("footer.php");?>	
