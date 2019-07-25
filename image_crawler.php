<?php 
error_reporting(0); 
$id =$_POST['search'];
crawl_page("https://www.google.com/search?q=".$id."&tbm=isch"); 
function crawl_page($url) 
{      
$dom = new DOMDocument('1.0');      
@$dom->loadHTMLFile($url);     
$anchors = $dom -> getElementsByTagName('img');     
 foreach ($anchors as $element) 
 {        
 $src = $element -> getAttribute('src');        
 $alt = $element -> getAttribute('alt');         
 $height = $element -> getAttribute('height');        
 $width = $element -> getAttribute('width');        
 echo '<a href="'.$src.'" target="_blank"><img src="'.$src.'" alt="'.$alt.'" style="width: 300px; height: 168px; margin-top: 6px; -moz-box-shadow: 0 0 10px #ccc; -webkit-box-shadow: 0 0 10px #ccc; box-shadow: 0 0 10px #ccc;"></a>&nbsp;';     
 }
 }  
 ?> 
