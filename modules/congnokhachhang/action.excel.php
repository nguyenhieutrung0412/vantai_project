<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{  
    
    
    if($_POST['id_security'] != 0 )
    {
        $link ='/congnokhachhang/export/?code='.$_POST['id_security'];
          
    die(json_encode(
        array(
            
             'status'=> '1',
            'link'=> $link,
           
        )
       ));
    }
    elseif($_GET['thang'] != '' || $_GET['nam'] != '')
    {
        $link ='/congnokhachhang/export/?thang='.$_GET['thang'].'&nam='.$_GET['nam'];
          
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
