<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{  
    
    if($_POST['thang'] != 0|| $_POST['nam'] != 0)
    {
        $link ='/luongtaixe/export/?thang='.$_POST['thang'].'&nam='.$_POST['nam'];
          
    die(json_encode(
        array(
            
            'status'=> '1',
            'link'=> $link,
           
        )
       ));
    }
    elseif($_GET['thang'] != '' || $_GET['thang'] != '')
    {
        $link ='/luongtaixe/export/?thang='.$_GET['thang'].'&nam='.$_GET['nam'];
          
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
