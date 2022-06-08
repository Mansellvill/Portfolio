<?php 
	require("connect_db.php");
	$delit = mysqli_query($connect,"DELETE `wiki_pages`, `cars`, `transmission_car`, `size_car`, `engine_car`, `dynamics_car`, `body_car` 
	FROM `wiki_pages` INNER JOIN `cars` INNER JOIN `transmission_car` INNER JOIN `size_car` INNER JOIN `engine_car` INNER JOIN `dynamics_car` INNER JOIN `body_car` 
	WHERE wiki_pages.car_id = cars.car_id AND cars.transmission_id = transmission_car.transmission_id AND cars.id_size = size_car.id_size AND cars.engine_id = engine_car.engine_id AND dynamics_car.dynamics_id = cars.dynamics_id AND cars.id_body = body_car.id_body AND wiki_pages.page_id =".$_GET['page_id']);
	header('Location: /profil.php?id='.$_SESSION['log_user']['user_id']);
?>