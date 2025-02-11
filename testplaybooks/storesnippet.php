<?php
global $data;
$catalog = $data;

$CTproduct = $catalog["Data"]["Groups"]["$cat"]["Products"];
$Titlesections = $catalog["Data"]["Groups"]["$cat"]["Name"];
$Products = $catalog["Data"]["Products"];
$testPspec = $catalog["Data"]["Products"]["0"]["Specs"];

//Grab skus from Catalog Section

$catagorysku = array_column($CTproduct, 'Opsku');

//Debug

//echo $catagorysku[0];
// echo $gitempos;
//$testXpage = $catalog["Data"]["Products"]["0"]["ProductPageUrl"];
//$testXnotes = array_column($testPspec,'Text',"Key");
//echo $testXnotes["Vintage"];
//unset($testXnotes["TastingNotes"]);
//var_dump($testXnotes);
//echo $testXpage;
//$my_array = $testXnotes;
//var_dump($my_array);
//myprint_r($testXnotes);

	
echo '<div class="row">';
//loop for all items in Group Catagory
foreach ($catagorysku as $x) {
	echo '<div class="column"><div class="card" style="border-radius: 12px";>';
	echo '<div class="dynamictxt" style="height: 100%;">';
	$gitempos = array_search( $x, array_column($Products, 'Opsku'));
	$winestaus = $catalog["Data"]["Products"]["$gitempos"]["StatusMessage"];
	$wineXtitle = $catalog["Data"]["Products"]["$gitempos"]["Title"];
    $wineXpage = $catalog["Data"]["Products"]["$gitempos"]["ProductPageUrl"];
    $wineXimage = $catalog["Data"]["Products"]["$gitempos"]["Image"]["Thumb"];
	$wineXyn = (explode(' ', $wineXtitle , 2));
	$wineXprice = $catalog["Data"]["Products"]["$gitempos"]["RetailPrice"];
    $wineXspecs = $catalog["Data"]["Products"]["$gitempos"]["Specs"];
    $wineXnotes = array_column($wineXspecs,'Text',"Key");
	$image = $wineXimage;
    $imageData = base64_encode(file_get_contents($wineXimage));
	echo "<a href='$wineXpage'>",'<img src="data:image/jpeg;base64,'.$imageData.'" style="position:top;height:240px;" class="imageresponsive"  >';
	echo  "<br/><b>","$wineXyn[1]</a>",'<br/></b>';
    echo  $wineXyn[0],'&nbsp;', $wineXnotes["Varietal"],'<br/>';
//	echo  '<b> Price $', $wineXprice,'</b>' ;
 //   if (!empty($wineXnotes["CasesProduced"])){
//		echo "<b>",$wineXnotes["CasesProduced"],"</b>", '  Cases Produced', '<br/>'  ;
//	}else{
//		echo "&nbsp;";
//	}
	
//	echo '<div class="grid">' . '<p>' .  $row["title"] . '</p>' . '</div>';
//  echo '<hr/>';
	echo "<a href='$wineXpage'>",'<button class="button" style="border-radius: 12px;">LEARN MORE</button>',"</a>";
// if (!empty($wineXnotes["TastingNotes"])){
//	  echo  $wineXnotes["TastingNotes"];
//	  }
	echo '</div>';
	echo '</div></div>';
}
echo '</div>';


//Direct Data
//$wine1title = $catalog["Data"]["Products"]["$gitempos"]["Title"];
//$wine1page = $catalog["Data"]["Products"]["$gitempos"]["ProductPageUrl"];
//$wine1image = $catalog["Data"]["Products"]["$gitempos"]["Image"]["Large"];
//$wine1price = $catalog["Data"]["Products"]["$gitempos"]["RetailPrice"];
//$wine1specs = $catalog["Data"]["Products"]["$gitempos"]["Specs"];
//$wine1notes = array_column($wine1specs,'Text',"Key");



//$image = $wine1image;
//$imageData = base64_encode(file_get_contents($wine1image));
//echo '<img src="data:image/jpeg;base64,'.$imageData.'" ALIGN="Left" width = "200" Height="300">';
//echo "<H1>","<a href='$wine1page'>$wine1title</a>", "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ,'$ ', $wine1price, "</H1>";
//echo "<P1>",$wine1notes["VarietalComposition"],"\n";
//echo "<b>",$wine1notes["CasesProduced"],"</b>", '  Cases Produced' ,"</P1>" ;
//echo "<br />&nbsp;<br />", $wine1notes["TastingNotes"];



	

?>