<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{  
    if($_POST['thang_search'] != 0|| $_POST['nam_search'] != 0)
    {
        $link ='/luongnhansu/export/?thang='.$_POST['thang_search'].'&nam='.$_POST['nam_search'];
          
    die(json_encode(
        array(
            
            'status'=> '1',
            'link'=> $link,
           
        )
       ));
    }
    else{
        die(json_encode(
            array(
                
                'status'=> '0',
              
            )
           ));
    }
      
}
