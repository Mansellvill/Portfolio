<?php
require("connect_db.php");

if(isset($_GET['button_search']))
{
if(empty($_GET['text_search']))
{
	$title = "Нечего искать";
	$content = "Для поиска по сайту введите текст в поле поиска.";
	require ("wiki_template.php");
	exit;
}
else{	
$searchText = $_GET['text_search'];

$title = "";
$content = "";
$result = mysqli_query ($connect , "SELECT * FROM cars INNER JOIN wiki_pages ON cars.car_id = wiki_pages.car_id WHERE cars.model_name LIKE '%".$searchText."%'");

if (!$result || mysqli_num_rows ($result ) == 0) {
$title = "Рузультат поиска по слову: ".$searchText;
$content = "К сожалению, поиск по сайту не дал никаких результатов.";
} 
else {
$title = "Рузультат поиска по слову: ".$searchText;
$content="";
while ( $page = mysqli_fetch_assoc($result) ) {	

$content = "
			<div id = \"model\">	
				<a href=\"/wiki_page.php?id=".$page["page_id"]."\">
					<div id = \"model_content_img\"><img src = ".$page['model_img']."></div>		
					<div id = \"model_content_header\"><h2>".$page['model_name']."</h2></div>								
				</a>	
			</div>";

}
}
require ("wiki_template.php");
exit;
}
}
else echo "Небыла нажата кнопка поиска!!!";
?>
				