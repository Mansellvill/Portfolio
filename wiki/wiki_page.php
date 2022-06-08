<?php
require("connect_db.php");

if(!isset($_GET['id'])){
	echo "Укажите id страницы";
	exit;
}
$result = mysqli_query ($connect,"SELECT * FROM transmission_car INNER JOIN dynamics_car INNER JOIN engine_car INNER JOIN size_car INNER JOIN body_car INNER JOIN brands INNER JOIN cars INNER JOIN country INNER JOIN users INNER JOIN wiki_pages
	ON cars.brand_id = brands.brand_id AND cars.country_id = country.id_country AND wiki_pages.car_id = cars.car_id AND wiki_pages.user_id = users.user_id AND cars.id_body = body_car.id_body AND cars.id_size = size_car.id_size AND cars.engine_id = engine_car.engine_id  AND cars.dynamics_id = dynamics_car.dynamics_id AND cars.transmission_id = transmission_car.transmission_id  AND users.user_id = wiki_pages.user_id WHERE wiki_pages.page_id = ".$_GET['id']);
/*
 wiki_pages.page_id, cars.car_id,cars.brand_id, brands.brand_name, brands.brand_img, cars.country_id, country.name_country, cars.model_name, cars.model_img, cars.content,cars.date_product, cars.id_body, body_car.type_body, body_car.door_col_body, body_car.place_col_body, wiki_pages.user_id, users.login, users.email
*/
if (!$result || mysqli_num_rows($result) == 0) {
echo "В БД не существует страницы стаким параметром id.";
exit;
}

$page = mysqli_fetch_assoc($result);
$pageIdUpdate = $page["page_id"];
$title = $page["model_name"];
$content = "
		
		<div id=\"table_content\">			
			<table>
				<thead>
					<tr>
						<th colspan = \"2\"><h2>".$page['brand_name']." ".$page["model_name"]."</h2></th>
					</tr>
					<tr>
						<td colspan = \"2\"><img src = ".$page["model_img"]."></td>
						
					</tr>
					<tr>
						<th colspan = \"2\">Технические характеристики:</th>
					</tr>
				</thead>
				
				<tbody>	
					<tr>
						<th style = \"text-align: center;\" colspan = \"2\">Общие данные</th>
					</tr>
				
					<tr>
						<th>Страна сборки</th>
						<td>".$page["name_country"]."</td>
					</tr>
					<tr>
						<th>Годы производства</th>
						<td>".$page["date_product"]."</td>
					</tr>
					<tr>
						<th style = \"text-align: center;\"  colspan = \"2\">Кузов</th>
					</tr>
					
					<tr>
						<th>Тип кузова</th>
						<td>".$page['type_body']."</td>
					</tr>
					<tr>
						<th>Количество дверей</th>
						<td>".$page['door_col_body']."</td>
					</tr>
					<tr>
						<th>Количество мест</th>
						<td>".$page['place_col_body']."</td>
					</tr>
					<tr>
						<th style = \"text-align: center;\" colspan = \"2\">Размеры, масса, объемы</th>
					</tr>

					<tr>
						<th>Длина</th>
						<td>".$page['length_size']." мм</td>
					</tr>
					<tr>
						<th>Ширина</th>
						<td>".$page['width_size']." мм</td>
					</tr>
					<tr>
						<th>Высота</th>
						<td>".$page['height_size']." мм</td>
					</tr>
					<tr>
						<th>Колесная база</th>
						<td>".$page['wheelbase_size']." мм</td>
					</tr>
					
					<tr>
						<th>Клиренс</th>
						<td>".$page['clearance_size']." мм</td>
					</tr>
					<tr>
						<th>Колея передняя</th>
						<td>".$page['track_front_size']." мм</td>
					</tr>
					<tr>
						<th>Колея задняя</th>
						<td>".$page['track_back_size']." мм</td>
					</tr>								
					<tr>
						<th>Масса</th>
						<td>".$page['mass_size']." кг</td>
					</tr>
					<tr>
						<th>Объем багажника</th>
						<td>".$page['trunk_size']." л</td>
					</tr>
					
					<tr>
						<th style = \"text-align: center;\" colspan = \"2\">Двигатель</th>
					</tr>
					<tr>
						<th>Расположение двигателя</th>
						<td>".$page['engine_location']."</td>
					</tr>
					<tr>
						<th>Тип двигателя</th>
						<td>".$page['engine_type']."</td>
					</tr>
					<tr>
						<th>Объем двигателя</th>
						<td>".$page['enngine_capacity']." см3</td>
					</tr>
					<tr>
						<th>Мощность</th>
						<td>".$page['engine_output']." л.с. при об/мин</td>
					</tr>
					<tr>
						<th>Крутящий момент</th>
						<td>".$page['engine_torque']." Н*м при об/мин</td>
					</tr>
					<tr>
						<th>Клапанов на цилиндр</th>
						<td>".$page['engine_cylinder']."</td>
					</tr>
					<tr>
						<th>Расход топлива</th>
						<td>".$page['engine_fuel_consum']."</td>
					</tr>
					<tr>
						<th style = \"text-align: center;\" colspan = \"2\">Динамические характеристики</th>
					</tr>
					<tr>
						<th>Максимальная скорость</th>
						<td>".$page['dynamics_max_speed']." км/час</td>
					</tr>
					<tr>
						<th>Разгон 0-100 км/ч</th>
						<td>".$page['dynamics_acceleration']." сек.</td>
					</tr>
					<tr>
						<th style = \"text-align: center;\" colspan = \"2\">Трансмиссия и ходовая часть</th>
					</tr>					
					<tr>
						<th>КП</th>
						<td>".$page['transmission']."</td>
					</tr>
					<tr>
						<th>Тип привода</th>
						<td>".$page['transmission_type']."</td>
					</tr>
					<tr>
						<th>Подвеска передняя</th>
						<td>".$page['transmission_suspension_front']."</td>
					</tr>
					<tr>
						<th>Подвеска задняя</th>
						<td>".$page['transmission_suspension_back']."</td>
					</tr>
					<tr>
						<th>Амортизаторы</th>
						<td>".$page['transmission_absorbers']."</td>
					</tr>
					<tr>
						<th>Тормоза передние</th>
						<td>".$page['transmission_front_brakes']."</td>
					</tr>
					<tr>
						<th>Тормоза задние</th>
						<td>".$page['transmission_back_brakes']."</td>
					</tr>
					<tr>
						<th>Страницу создал</th>
						<td><h4><img style = \"width: 20px; height: 20px;\"src = ".$page['user_img']."> ".$page['login']."</h4></td>
					</tr>
					</tbody>
			</table>			
		</div>
					";
					
					
					
$content .= $page["content"];

require ("wiki_template.php");
?>