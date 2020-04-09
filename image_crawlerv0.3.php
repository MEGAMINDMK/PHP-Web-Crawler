<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<meta charset="utf-8">
<?php 
error_reporting(0); 
$id =$_POST['search'];
crawl_page("https://www.bing.com/images/search?q=".$id.""); 
crawl_page("https://imgur.com/search/score?q=".$id."");
crawl_page("https://www.picsearch.com/index.cgi?q=".$id."");
crawl_page("https://www.google.com/search?tbm=isch&q=".$id."&tbm=isch");
crawl_page("https://images.search.yahoo.com/search/images;_ylt=AwrExl.8kzpdV4kA_EeJzbkF;_ylu=X3oDMTBsZ29xY3ZzBHNlYwNzZWFyY2gEc2xrA2J1dHRvbg--;_ylc=X1MDOTYwNjI4NTcEX3IDMgRhY3RuA2NsawRjc3JjcHZpZANYRjM0VURFd0xqTFlMYXBkWElxNURRR05NVGd5TGdBQUFBQVF4YkFVBGZyAwRmcjIDc2EtZ3AEZ3ByaWQDBG5fc3VnZwMwBG9yaWdpbgNpbWFnZXMuc2VhcmNoLnlhaG9vLmNvbQRwb3MDMARwcXN0cgMEcHFzdHJsAwRxc3RybAM0BHF1ZXJ5A3ZjbXAEdF9zdG1wAzE1NjQxMjAwMDA-?p=".$id."&guccounter=1");
crawl_page("https://yandex.com/images/search?text=".$id."");


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
 //echo '<a href="'.$src.'" target="_blank"><img src="'.$src.'" alt="'.$alt.'" style="width: 300px; height: 168px; margin-top: 6px; -moz-box-shadow: 0 0 10px #ccc; -webkit-box-shadow: 0 0 10px #ccc; box-shadow: 0 0 10px #ccc;"></a>&nbsp;';     
 echo '<img src="'.$src.'" alt="'.$alt.'" onerror="$(this).hide();" style="width: 300px; height: 168px; margin-top: 6px; -moz-box-shadow: 0 0 10px #ccc; -webkit-box-shadow: 0 0 10px #ccc; box-shadow: 0 0 10px #ccc;">&nbsp;';      
 }
 }
 ?> 
 <script>$("img").on("error", function() {
  $(this).hide();
});</script>