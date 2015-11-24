<?php

if(isset($_GET['word']) && $_GET['word'] != ""){
    $query = $_GET['word'];
    $result = array();
    $str = file_get_contents('dictionary.json');
    $json_array = json_decode($str, true); 
    foreach($json_array as $key => $value){
        if(strpos($key,strtoupper($query)) === 0){
            $result[$key] = $value;
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Dictionary
        </title>    
        <link href="style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <section class="main <?php echo !isset($result)?'center':''?>">
            <h1 class="center_heading">Enter the Search Word</h1>
             <form class="search" action="#" method="get" >
                 <input type="text" name="word"/>
<!--
                 <ul class="results" >
                     <li><a href="index.html">Search Result #1<br /><span>Description...</span></a></li>
                     <li><a href="index.html">Search Result #2<br /><span>Description...</span></a></li>
                    <li><a href="index.html">Search Result #3<br /><span>Description...</span></a></li>
                    <li><a href="index.html">Search Result #4</a></li>
                 </ul>
-->
             </form>
            <?php if(isset($result)){?>
             <table class="results">
                 <?php if(!empty($result)){?>
                 <thead>
                    <tr>
                        <th colspan="2">You Searched For <?php echo isset($_GET['word'])?'<p class="query">'.$_GET['word'].'</p>':""?></th> 
                    </tr>
                    <tr>
                        <th>Word</th>
                        <th>Meaning</th>
                    </tr>
                 </thead>
                 <tbody>
                        <?php 
                            
                            foreach($result as $word => $meaning){?>
                                <tr class="result">
                                    <td class="meaning"><?php echo $word; ?></td>   
                                    <td class="meaning"><?php echo $meaning ?></td> 
                                </tr>
                         <?php   }
                                
                            }else{
                                    echo '<p class="error">Sorry, no result found</p>';
                            }
                    }
                        ?>
                </tbody>
            </table>
             </div>
        </section>
    </body>
</html>