<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{  
    
    if($_POST['thang_search'] != 0|| $_POST['nam_search'] != 0)
    {
        $link ='/luongtaixe/export/?thang='.$_POST['thang_search'].'&nam='.$_POST['nam_search'];
          
    die(json_encode(
        array(
            
            'status'=> '1',
            'link'=> $link,
           
        )
       ));
    }
    elseif($_GET['thang'] != '' || $_GET['thang'] != '')
    {
        $link ='/luongtaixe/export/?thang='.$_GET['thang'].'&nam='.$_GET['thang'];
          
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
