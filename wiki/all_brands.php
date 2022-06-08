<?php require("header.php");?>	
<?php require("main-menu.php");?>	
<?php 
	$brand_q= mysqli_query($connect , "SELECT * FROM brands");
	$brand = array();
	while($br = mysqli_fetch_assoc($brand_q))
	{
		$brand[] = $br;
	}
?>
	<div id = "content">
	<h1>Марки автомобилей</h1>
	
	
		<?php
		foreach($brand as $br)
		{
		?>
		<div id = "brand">		
			<div id = brand_content>
				<a href="/brand.php?brand_id=<?php echo $br['brand_id'];?>&brand_name=<?php echo $br['brand_name'];?>">
					<img src = "<?php echo $br['brand_img'];?>">
					<h2><?php echo $br['brand_name'];?></h2>
				
				</a>
			</div>						
		</div>
	<?php } ?>
	</div>
	
<?php require("footer.php");?>	


