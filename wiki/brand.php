<?php require("header.php");?>	
<?php require("main-menu.php");?>	
<?php
/*$models = mysqli_query($connect, "SELECT brands.brand_name, cars.model FROM brands INNER JOIN cars ON brands.id = cars.brand_id WHERE brands.id=".$_GET['id']);
$model = array();
	while($mod = mysqli_fetch_assoc($models))
	{
		$model[] = $mod;
	}
	}*/

	$result = mysqli_query ($connect , "SELECT * FROM cars INNER JOIN wiki_pages ON cars.car_id = wiki_pages.car_id WHERE cars.brand_id =".$_GET['brand_id']);
 
?>	
	
<div id = "content">
	<!--Название марки -->
	

	<h1>Модели <?php echo $_GET['brand_name'];?></h1> 
		<!--список моделей-->
	
		<?php if (!$result || mysqli_num_rows ($result ) == 0 ){ ?>
		<ul>
		<li>В системе нет страниц.</li>
		</ul>
		<?php }	else {
		
		while ( $page = mysqli_fetch_assoc($result) ) { ?>
		
		<div id = "model">	
					<a href="wiki_page.php?id=<?php echo $page["page_id"];?>">
				<div id = "model_content_img">				
					<img src = "<?php echo $page['model_img'];?>">				
				</div>
			
				<div id = "model_content_header">
					
					<h2><?php echo $page["model_name"];?></h2>
				</div>
				<div id = "model_content_text">
					<p><?php echo mb_substr(strip_tags($page["content"]), 0, 50,'utf-8'). '...';?>	</p> 
				</div>		 
				</a>	
		</div>
		
		
		<?php } }?>
				
		<div id = "model">
			<a href="create_update.php?brand_id=<?php echo $_GET['brand_id'];?>&brand_name=<?php echo $_GET['brand_name'];?>">			
				<div id = "model_content_img">
			
					<img src = "/images/models/add.jpg">
					
				</div>
			
				<div id = "model_content_header">
					<h2>Добавить</h2>
				</div>
				 <div id = "model_content_text">		
					<p>Нажмите чтобы добавить новую модель.</p>
				</div>			
					</a>
		</div>
			
		
			
</div>
	
<?php require("footer.php");?>	


