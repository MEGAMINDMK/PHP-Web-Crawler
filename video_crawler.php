<?php
error_reporting(0);
    define("MAX_RESULTS", 16);
    
     if (isset($_GET['search_button']) )
     {
        $search = $_GET['search'];
        
               
        if (empty($search))
        {
            $response = array(
                  "type" => "error",
                  "message" => "Please enter the keyword."
                );
        } 
    }
         
?>
<style>

          
            .search-form-container {
                background: #F0F0F0;
                border: #e0dfdf 1px solid;
                padding: 20px;
                border-radius: 2px;
            }
            .input-row {
                margin-bottom: 20px;
            }
            .input-field {
                width: 100%;
                border-radius: 2px;
                padding: 10px;
                border: #e0dfdf 1px solid;
            }
            .btn-submit {
                padding: 10px 20px;
                background: #333;
                border: #1d1d1d 1px solid;
                color: #f0f0f0;
                font-size: 0.9em;
                width: 100px;
                border-radius: 2px;
                cursor:pointer;
            }
            .videos-data-container {
                background: #F0F0F0;
                border: #e0dfdf 1px solid;
                padding: 20px;
                border-radius: 2px;
            }
            
            .response {
                padding: 10px;
                margin-top: 10px;
                border-radius: 2px;
            }

            .error {
                 background: #fdcdcd;
                 border: #ecc0c1 1px solid;
            }

           .success {
                background: #c5f3c3;
                border: #bbe6ba 1px solid;
            }
            .result-heading {
                margin: 20px 0px;
                padding: 20px 10px 5px 0px;
                border-bottom: #e0dfdf 1px solid;
            }
            iframe {
                border: 0px;
            }
            .video-tile {
                display: inline-block;
                margin: 10px 10px 20px 10px;
            }
            
            .videoDiv {
                width: 250px;
                height: 150px;
                display: inline-block;
            }
            .videoTitle {
                text-overflow: ellipsis;
                white-space: nowrap;
                overflow: hidden;
            }
            
            .videoDesc {
                text-overflow: ellipsis;
                white-space: nowrap;
                overflow: hidden;
            }
            .videoInfo {
                width: 250px;
            }
        </style>
        
    </head>
    <body>
       
       
       <div class="container-fluid">			
<form id="keywordForm" action="" method="GET">				
<div class="row" style="background:#f2f2f2">					
<div class="col-sm-1">						
<a href="./"><img src="as.png" height="60px"></a>											
</div>										
<div class="col-sm-6" style="margin-left:15px">						
<div class="input-group" style="margin-top:10px">							
<input type="text" class="form-control" type="search" id="search" name="search" placeholder="Example Google+Database">&nbsp;						
<span class="input-group-btn">								
<input class="btn btn-outline-danger" type="submit" name="search_button" value="search !">							
</span>						
</div>
<br>						
</div>
</div>							
</form>		
</div>	
       <center> 
        <?php if(!empty($response)) { ?>
                <div class="response <?php echo $response["type"]; ?>"> <?php echo $response["message"]; ?> </div>
        <?php }?>
        <?php
            if (isset($_GET['search_button']) )
          {
                                         
              if (!empty($search))
              {
             $apikey = 'AIzaSyCKMpw2nmPnon_gkh4EIXnbiAmrZNw-v4M';
                $googleApiUrl = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q=' . $search . '&maxResults=' . MAX_RESULTS . '&key=' . $apikey;

                $ch = curl_init();

                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_VERBOSE, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $response = curl_exec($ch);

                curl_close($ch);
                $data = json_decode($response);
                $value = json_decode(json_encode($data), true);
            ?>

            <div class="result-heading">About <?php echo MAX_RESULTS; ?> Results</div>
            <div class="videos-data-container" id="SearchResultsDiv">

            <?php
                for ($i = 0; $i < MAX_RESULTS; $i++) {
                    $videoId = $value['items'][$i]['id']['videoId'];
                    $title = $value['items'][$i]['snippet']['title'];
                    $description = $value['items'][$i]['snippet']['description'];
                    ?> 
    
                        <div class="video-tile">
                        <div  class="videoDiv">
<iframe id="iframe" style="width:100%;height:100%" src="https://www.youtube.com/embed/<?php echo $videoId; ?>" frameborder="0" allowfullscreen></iframe>                     
                        </div>
                        <div class="videoInfo">
                        <div class="videoTitle"><b><?php echo $title; ?></b></div>
                        <div class="videoDesc"><?php echo $description; ?></div>
                        </div>
                        </div>
           <?php 
                    }
                } 
           
           }
            ?> 
            
        </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){ 
	$('body').find('img[src$="https://cdn.rawgit.com/000webhost/logo/e9bd13f7/footer-powered-by-000webhost-white2.png"]').remove();
    }); 
</script>
