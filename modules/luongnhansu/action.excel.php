<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{  
    if($_POST['thang'] != 0|| $_POST['nam'] != 0)
    {
        $link ='/luongnhansu/export/?thang='.$_POST['thang'].'&nam='.$_POST['nam'];
          
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
