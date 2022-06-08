<?php
require("connect_db.php");

 if(!empty($_POST))
 {
$id = null;


if(!isset($_GET["id"]))
{	
/*Запрос на добавлние в transmission_car*/
mysqli_query($connect, "INSERT INTO `transmission_car`(`transmission`, `transmission_type`, `transmission_suspension_front`, `transmission_suspension_back`, `transmission_absorbers`, `transmission_front_brakes`, `transmission_back_brakes`) 
VALUES(\"".mysqli_real_escape_string($connect,$_POST['transmission'])."\",\"".mysqli_real_escape_string($connect,$_POST['transmission_type'])."\",\"".mysqli_real_escape_string($connect,$_POST['transmission_suspension_front'])."\",\"".mysqli_real_escape_string($connect,$_POST['transmission_suspension_back'])."\",
\"".mysqli_real_escape_string($connect,$_POST['transmission_absorbers'])."\",\"".mysqli_real_escape_string($connect,$_POST['transmission_front_brakes'])."\",\"".mysqli_real_escape_string($connect,$_POST['transmission_back_brakes'])."\")");
/*Запрос на добавлние в dynamics_car*/
mysqli_query($connect, "INSERT INTO `dynamics_car` (`dynamics_max_speed`, `dynamics_acceleration`)  VALUES(\"".mysqli_real_escape_string($connect,$_POST['dynamics_max_speed'])."\",\"".mysqli_real_escape_string($connect,$_POST['dynamics_acceleration'])."\")");
/*Запрос на добавлние в engine_car*/
mysqli_query($connect, "INSERT INTO `engine_car`(`engine_location`, `engine_type`, `enngine_capacity`, `engine_output`, `engine_torque`, `engine_cylinder`, `engine_fuel_consum`) 
VALUES(\"".mysqli_real_escape_string($connect,$_POST['engine_location'])."\",\"".mysqli_real_escape_string($connect,$_POST['engine_type'])."\",\"".mysqli_real_escape_string($connect,$_POST['enngine_capacity'])."\",\"".mysqli_real_escape_string($connect,$_POST['engine_output'])."\",
\"".mysqli_real_escape_string($connect,$_POST['engine_torque'])."\",\"".mysqli_real_escape_string($connect,$_POST['engine_cylinder'])."\",\"".mysqli_real_escape_string($connect,$_POST['engine_fuel_consum'])."\")");
/*Запрос на добавлние в size_car*/
mysqli_query($connect, "INSERT INTO `size_car`(`length_size`, `width_size`, `height_size`, `wheelbase_size`, `clearance_size`, `track_front_size`, `track_back_size`, `mass_size`, `trunk_size`) 
VALUES(\"".mysqli_real_escape_string($connect,$_POST['length_size'])."\",\"".mysqli_real_escape_string($connect,$_POST['width_size'])."\",\"".mysqli_real_escape_string($connect,$_POST['height_size'])."\",\"".mysqli_real_escape_string($connect,$_POST['wheelbase_size'])."\",
\"".mysqli_real_escape_string($connect,$_POST['clearance_size'])."\",\"".mysqli_real_escape_string($connect,$_POST['track_front_size'])."\",\"".mysqli_real_escape_string($connect,$_POST['track_back_size'])."\",\"".mysqli_real_escape_string($connect,$_POST['mass_size'])."\",
\"".mysqli_real_escape_string($connect,$_POST['trunk_size'])."\")");
/*Запрос на добавлние в body_car*/
mysqli_query($connect, "INSERT INTO `body_car` (`type_body`, `door_col_body`, `place_col_body`)  VALUES(\"".mysqli_real_escape_string($connect,$_POST['type_body'])."\",\"".mysqli_real_escape_string($connect,$_POST['col_door'])."\",\"".mysqli_real_escape_string($connect,$_POST['col_place'])."\")");
/*Запрос на добавлние в cars*/
mysqli_query($connect, 	"INSERT INTO `cars`(`brand_id`, `model_name`, `model_img`, `content`, `country_id`, `date_product`, `id_body`, `id_size`, `engine_id`, `dynamics_id`, `transmission_id`) VALUES (".mysqli_real_escape_string($connect, $_GET['brand_id']).",
\"".mysqli_real_escape_string($connect, $_POST['model_name'])."\",'/images/default.png',\"".mysqli_real_escape_string($connect, $_POST['content'])."\",".mysqli_real_escape_string($connect, $_POST['contru']).",\"".mysqli_real_escape_string($connect, $_POST['date_product'])."\",
\"".mysqli_real_escape_string($connect, mysqli_insert_id($connect))."\",\"".mysqli_real_escape_string($connect, mysqli_insert_id($connect))."\",\"".mysqli_real_escape_string($connect, mysqli_insert_id($connect))."\",\"".mysqli_real_escape_string($connect, mysqli_insert_id($connect))."\",
\"".mysqli_real_escape_string($connect, mysqli_insert_id($connect))."\")");
/*Запрос на добавлние в wiki_pages*/
mysqli_query($connect, "INSERT INTO `wiki_pages` (`car_id`, `user_id`) VALUES(".mysqli_real_escape_string($connect,mysqli_insert_id($connect)).",".mysqli_real_escape_string($connect, $_SESSION['log_user']['user_id']).")");
$id = mysqli_insert_id($connect);	

}
else
{
mysqli_query($connect, "UPDATE `cars`,`wiki_pages`,`body_car`,`size_car`, `engine_car`, `dynamics_car`, `transmission_car` SET `model_name` = \"".mysqli_real_escape_string($connect, $_POST['model_name'])."\" , `country_id`= \"".mysqli_real_escape_string($connect, $_POST['contru'])."\",
`content` = \"".mysqli_real_escape_string($connect, $_POST['content'])."\",`date_product` = \"".mysqli_real_escape_string($connect, $_POST['date_product'])."\",`type_body`= \"".mysqli_real_escape_string($connect, $_POST['type_body'])."\",
`door_col_body`= \"".mysqli_real_escape_string($connect, $_POST['col_door'])."\",`place_col_body`= \"".mysqli_real_escape_string($connect, $_POST['col_place'])."\",`length_size`= \"".mysqli_real_escape_string($connect, $_POST['length_size'])."\",
`width_size`= \"".mysqli_real_escape_string($connect, $_POST['width_size'])."\", `height_size`= \"".mysqli_real_escape_string($connect, $_POST['height_size'])."\", `wheelbase_size`= \"".mysqli_real_escape_string($connect, $_POST['wheelbase_size'])."\",
`clearance_size`= \"".mysqli_real_escape_string($connect, $_POST['clearance_size'])."\",`track_front_size`= \"".mysqli_real_escape_string($connect, $_POST['track_front_size'])."\",`track_back_size`= \"".mysqli_real_escape_string($connect, $_POST['track_back_size'])."\",
`mass_size`= \"".mysqli_real_escape_string($connect, $_POST['mass_size'])."\",`trunk_size`= \"".mysqli_real_escape_string($connect, $_POST['trunk_size'])."\",`engine_location`= \"".mysqli_real_escape_string($connect, $_POST['engine_location'])."\",
`engine_type`= \"".mysqli_real_escape_string($connect, $_POST['engine_type'])."\",`enngine_capacity`= \"".mysqli_real_escape_string($connect, $_POST['enngine_capacity'])."\",`engine_output`= \"".mysqli_real_escape_string($connect, $_POST['engine_output'])."\",
`engine_torque`= \"".mysqli_real_escape_string($connect, $_POST['engine_torque'])."\",`engine_cylinder`= \"".mysqli_real_escape_string($connect, $_POST['engine_cylinder'])."\", `engine_fuel_consum`= \"".mysqli_real_escape_string($connect, $_POST['engine_fuel_consum'])."\",
`dynamics_max_speed`= \"".mysqli_real_escape_string($connect, $_POST['dynamics_max_speed'])."\", `dynamics_acceleration`= \"".mysqli_real_escape_string($connect, $_POST['dynamics_acceleration'])."\",`transmission`= \"".mysqli_real_escape_string($connect, $_POST['transmission'])."\",
`transmission_type`= \"".mysqli_real_escape_string($connect, $_POST['transmission_type'])."\", `transmission_suspension_front`= \"".mysqli_real_escape_string($connect, $_POST['transmission_suspension_front'])."\", `transmission_suspension_back`= \"".mysqli_real_escape_string($connect, $_POST['transmission_suspension_back'])."\",
`transmission_absorbers`= \"".mysqli_real_escape_string($connect, $_POST['transmission_absorbers'])."\",`transmission_front_brakes`= \"".mysqli_real_escape_string($connect, $_POST['transmission_front_brakes'])."\",`transmission_back_brakes`= \"".mysqli_real_escape_string($connect, $_POST['transmission_back_brakes'])."\"
WHERE cars.transmission_id = transmission_car.transmission_id  AND cars.dynamics_id = dynamics_car.dynamics_id AND cars.engine_id = engine_car.engine_id AND cars.id_body = body_car.id_body AND cars.id_size = size_car.id_size AND cars.car_id = wiki_pages.car_id AND wiki_pages.page_id=".$_GET['id']);
$id = $_GET["id"];
}

header('Location: /wiki_page.php?id='.$id);	
exit;		
}
$title = "";
$titleValue = "";
$contentValue = "";
if(isset($_GET["id"])){
	$result = mysqli_query($connect, "SELECT * FROM transmission_car INNER JOIN dynamics_car INNER JOIN engine_car INNER JOIN size_car INNER JOIN body_car INNER JOIN brands INNER JOIN cars INNER JOIN country INNER JOIN users INNER JOIN wiki_pages 
	ON cars.brand_id = brands.brand_id AND cars.country_id = country.id_country AND wiki_pages.car_id = cars.car_id AND wiki_pages.user_id = users.user_id AND cars.id_body = body_car.id_body AND cars.id_size = size_car.id_size AND cars.engine_id = engine_car.engine_id  AND cars.dynamics_id = dynamics_car.dynamics_id AND cars.transmission_id = transmission_car.transmission_id WHERE cars.car_id =".$_GET['id']);

	if(!$result || mysqli_num_rows($result)== 0){
		echo "Такой страницы не существует.";
		exit;
	}
	$page = mysqli_fetch_assoc($result);
	$pageIdRead = $page["page_id"];
	$titleValue = $page["model_name"];
	$contentValue = $page["content"];
	$title = "Редактирование страницы";	
	
	
}
	else{
		$title = "Создание новой страницы";
	}
		
	
	
								

?>

<?php require("header.php");?>	
<?php require("main-menu.php");?>	

	<div id = "content">
		<h1><?=$title?></h1>
	
	<?php if(isset( $_SESSION['log_user'])):?>
		
		<div id ="form_zap">
	
		
		
		<form method = "POST">		
				<label id = "title"><h3>Наименование модели</h3></label>		
			<input type ="text" name ="model_name" value ="<?=$titleValue?>" id ="input-title">	
				
				
				<fieldset>
					<legend>Общие данные</legend>
								
					<table>	
					
						<!--<tr>
							<th>
								<label>Изображение</label>
							</th>
							
									
							<td>
									<form action = "load_page_img.php" method = "POST" enctype = 'multipart/form-data'>					
									<input id = "" type = "file" name = "somename" />								
									</form>
							</td>
				
						<tr>-->	
							
							<th><label>Страна сборки: </label></th>
							<td>						
								<select id = "selection" name ="contru" required>
									
									<?php 
									$country_q = mysqli_query($connect, "SELECT * FROM country WHERE 1");
									$country = array();
									while($country_a = mysqli_fetch_assoc($country_q))
									{
										$country[] = $country_a;
									}
									if(!empty($_GET['id']))
									{?>
										<option selected value="<?=$page['country_id']?>"> <?=$page['name_country']?></option>									
									<?php 
										foreach($country as $countru_select)
										{
											if($page['country_id']!=$countru_select['id_country'])
											{?>
												<option value ="<?=$countru_select['id_country']?>"><?=$countru_select['name_country']?></option>	
									  <?php }
										}?>
																			
									<?php } else{ ?>								
										<option selected></option>									
									<?php foreach($country as $countru_select){	?>															
										<option value ="<?=$countru_select['id_country']?>"><?=$countru_select['name_country']?></option>	
									<?php }}?>
								</select>	
							</td>
						
						</tr> 
						<tr>
							<th><label>Годы производства:</label></th>
							<td><input type ="text" name ="date_product" value ="<?=$page['date_product']?>"></td>
			</tr> 
			</table> 								
			</fieldset>				
				
			<fieldset>
				<legend>Кузов</legend>			
				<table>
					<tr>
						<th><label>Тип кузова: </label></th>
						<td>						
							<select id = "selection" name = "type_body">
								<?php 
								$type = array("Купе","Хэтчбек", "Универсал", "Седан", "Родстер");															
								if(!empty($_GET['id'])){?>
									<option selected value = "<?=$page['type_body']?>"><?=$page['type_body']?></option>	
									<?php foreach ($type as $tp){										
									if($page['type_body']!= $tp){ ?>										
									<option value = "<?=$tp?>"> <?=$tp?> </option>	
								<?php }}}else {?>
								<option selected></option>									
								<option value ="Купе">Купе</option>
								<option value ="Хэтчбек">Хэтчбек</option>
								<option value ="Универсал">Универсал</option>
								<option value ="Седан">Седан</option>
								<option value ="Родстер">Родстер</option>
								<?php }?>
							</select>
						</td>
					</tr>
					<tr>
						<th><label>Количество дверей: </label></th>
						<td>
							<select id = "selection" name = "col_door" required>
							<?php if(!empty($_GET['id'])){ ?>
								<option selected value = "<?=$page['door_col_body']?>"><?=$page['door_col_body']?></option>	
							<?php for ($col =2; $col<6; $col++){ 
								if($page['door_col_body'] != $col){?>																
									<option value = "<?=$col?>"> <?=$col?> </option>	
								<?php }}}else {?>
								<option selected></option>
								<?php for ($col =2; $col<6; $col++){ ?>
								<option value = "<?=$col?>"> <?=$col?> </option>
								<?php }}?>
							</select>							
						</td>
					</tr>
					<tr>
						<th><label>Количество мест: </label></th>
						<td>
							<select id = "selection" name = "col_place" required>
							<?php if(!empty($_GET['id'])){ ?>
									<option selected value = "<?=$page['place_col_body']?>"><?=$page['place_col_body']?></option>	
							<?php for ($col =2; $col<8; $col++){ 
								if($page['place_col_body'] != $col){?>
									<option value = "<?=$col?>"> <?=$col?> </option>
								<?php }}}else {?>
								<option selected></option>
								<?php for ($col =2; $col<8; $col++){ ?>
								<option value = "<?=$col?>"> <?=$col?> </option>
								<?php }}?>
							</select>		
						</td>
					</tr>
	
				</table> 								
			</fieldset>			
				
			<fieldset>
			<legend>Размеры, масса, объемы</legend>			
			<table>
				<tr>
					<th><label>Длина: </label></th>
					<td><input type ="text" name ="length_size" placeholder = "мм" value ="<?=$page['length_size']?>"></td>
				</tr>
				<tr>
					<th><label >Ширина: </label></th>
					<td><input type ="text" name ="width_size" id ="input_create"  placeholder = "мм" value ="<?=$page['width_size']?>"></td>
				</tr>
				<tr>
					<th><label>Высота: </label></th>
					<td><input type ="text" name ="height_size"  placeholder = "мм" value ="<?=$page['height_size']?>"></td>
				</tr>
				<tr>
					<th><label>Колесная база: </label></th>
					<td><input type ="text" name ="wheelbase_size"  placeholder = "мм" value ="<?=$page['wheelbase_size']?>"></td>
				</tr> 				
				<tr>
					<th><label>Клиренс: </label></th>
					<td><input type ="text" name ="clearance_size"  placeholder = "мм" value ="<?=$page['clearance_size']?>"></td>
				</tr> 
				<tr>
					<th><label>Колея передняя: </label></th>
					<td><input type ="text" name ="track_front_size"  placeholder = "мм" value ="<?=$page['track_front_size']?>"></td>
				</tr> 
				<tr>
					<th><label>Колея задняя: </label></th>
					<td><input type ="text" name ="track_back_size"  placeholder = "мм" value ="<?=$page['track_back_size']?>"></td>
				</tr> 
				<tr>
					<th><label>Масса: </label></th>
					<td><input type ="text" name ="mass_size"  placeholder = "кг" value ="<?=$page['mass_size']?>"></td>
				</tr> 
								<tr>
					<th><label>Объем багажника: </label></th>
					<td><input type ="text" name ="trunk_size"  placeholder = "л" value ="<?=$page['trunk_size']?>"></td>
				</tr> 
				
			</table> 								
			</fieldset>									
				
			<fieldset>
					
			<legend>Двигатель</legend>				
			<table>
				<tr>
					<th><label id = \"title\">Расположение двигателя: </label></th>
					<td><input type ="text" name ="engine_location" value ="<?=$page['engine_location']?>"></td>
				</tr>
				<tr>
					<th><label id = \"title\">Тип двигателя: </label></th>
					<td><input type ="text" name ="engine_type" value ="<?=$page['engine_type']?>"></td>
				</tr>
				<tr>
					<th><label id = \"title\">Объем двигателя: </label></th>
					<td><input type ="text" name ="enngine_capacity" placeholder = "см3" value ="<?=$page['enngine_capacity']?>"></td>
				</tr>
				<tr>
					<th><label id = \"title\">Мощность: </label></th>
					<td><input type ="text" name ="engine_output" placeholder = "л.с. при об/мин" value ="<?=$page['engine_output']?>"></td>
				</tr> 
				<tr>
					<th><label id = \"title\">Крутящий момент: </label></th>
					<td><input type ="text" name ="engine_torque" placeholder = "Н*м при об/мин"  value ="<?=$page['engine_torque']?>"></td>
				</tr> 
				<tr>
					<th><label id = \"title\">Клапанов на цилиндр: </label></th>
					<td><input type ="text" name ="engine_cylinder"  value ="<?=$page['engine_cylinder']?>"></td>
				</tr> 
				<tr>
					<th><label id = \"title\">Расход топлива: </label></th>
					<td><input type ="text" name ="engine_fuel_consum" placeholder = "л/км" value ="<?=$page['engine_fuel_consum']?>"></td>
				</tr> 
			</table> 								
			</fieldset>	
					
			
			<fieldset>	
				<legend>Динамические характеристики</legend>			
				<table>								
					<tr>
						<th><label>Максимальная скорость: </label></th>
						<td><input type ="text" name ="dynamics_max_speed" placeholder = "км/час" value ="<?=$page['dynamics_max_speed']?>"></td>
					</tr>
					
					<tr>
						<th><label>Разгон 0-100 км/ч: </label></th>
						<td><input type ="text" name ="dynamics_acceleration" placeholder = "сек" value ="<?=$page['dynamics_acceleration']?>"></td>
					</tr>
				</table> 								
			</fieldset>				

			<fieldset>
			<legend>Трансмиссия и ходовая часть</legend>			
				<table>
					<tr>
						<th><label id = \"title\">КП: </label></th>
						<td><input type ="text" name ="transmission" value ="<?=$page['transmission']?>">
					</tr>
					<tr>
						<th><label>Тип привода: </label></th>
							<td>
								<select id = "selection" name = "transmission_type" required>													
								<?php	
								$type = array("Полный", "Передний", "Задний");
								if(!empty($_GET['id'])){?>
									<option selected value = "<?=$page['transmission_type']?>"><?=$page['transmission_type']?></option>	
									<?php foreach ($type as $tp){	
									if($page['transmission_type']!= $tp){ ?>										
									<option value = "<?=$tp?>"><?=$tp?></option>	
								<?php }}}else {?>								
									<option selected></option>
									<?php foreach ($type as $tp){?>
									<option value = "<?=$tp?>"><?=$tp?></option>	
								<?php }}?>
							</select>		
							</td>
					</tr>
					<tr>
						<th><label id = \"title\">Подвеска передняя: </label></th>
						<td><input type ="text" name ="transmission_suspension_front" value ="<?=$page['transmission_suspension_front']?>"></td>
					</tr>
					<tr>
						<th><label id = \"title\">Подвеска задняя: </label></th>
						<td><input type ="text" name ="transmission_suspension_back" value ="<?=$page['transmission_suspension_back']?>"></td>
					</tr>
					<tr>
						<th><label id = \"title\">Амортизаторы: </label></th>
						<td><input type ="text" name ="transmission_absorbers" value ="<?=$page['transmission_absorbers']?>"></td>
					</tr> 
					<tr>
						<th><label id = \"title\">Тормоза передние: </label></th>
						<td><input type ="text" name ="transmission_front_brakes" value ="<?=$page['transmission_front_brakes']?>"></td>
					</tr> 
					<tr>
						<th><label id = \"title\">Тормоза задние: </label></th>
						<td><input type ="text" name ="transmission_back_brakes" value ="<?=$page['transmission_back_brakes']?>"></td>
					</tr> 
			</table> 								
			</fieldset>		
			
						
		</div>
			
			<label id = "title"><h3>Содержимое</h3></label>
			<div id = "CKEDITOR">					
			<textarea name ="content" id ="input-content"><?=$contentValue?></textarea>
			<script> CKEDITOR.replace("input-content");</script> 	
			</div>					 						
			<button type = "submit" id ="button-save" >Сохранить</button>													
		</form>
	
	</div>
	<?php else:?> <label id = "title">Что бы создать страницу авторизуйтись на сайте.</label></th> <?php endif;?>


<?php require("footer.php");?>	















