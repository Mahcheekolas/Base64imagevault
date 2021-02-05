<?php

include("config.php");

//Use for paging results in returned recordset
$results_per_page = 6;

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $results_per_page;

 $sql = "select timestamp, imageBase64, description, codetype, code from images ORDER BY timestamp DESC LIMIT $start_from, ".$results_per_page;
 $result = mysqli_query($con,$sql);
 $row = mysqli_fetch_array($result);

	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)):

		$code_base64 = $row['imageBase64'];
		$getimgtype = 'data:image/';
		$getimgtype .= $row['codetype'];
		$getimgtype .= ';base64,';
		$code_base64 = str_replace($getimgtype,'',$code_base64);
		$code_binary = base64_decode($code_base64);
		$image= imagecreatefromstring($code_binary);
		
		echo '<style> img { width:100%; height:100%; object-fit:cover; } </style>';
		echo '<p><div style="max-width: 200px !important;height: 200px !important;"><img src="data:image/jpg;base64,' . $code_base64 . '" /></div>';

		//todo : add remaining info fields, cascade results on page, create link to provide image in full side outside 200x200 dic

	endwhile;

	//page results control bar
	$sql = "SELECT COUNT(timestamp) AS total FROM images";
	$result = mysqli_query($con,$sql);
	$row =  mysqli_fetch_array($result);
	$total_pages = ceil($row["total"] / $results_per_page); 
	  
	for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
				echo "<a href='viewImages.php?page=".$i."'";
				if ($i==$page)  echo " class='curPage'";
				echo ">".$i."</a> "; 
	};

?>