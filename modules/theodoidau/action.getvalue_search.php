<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_REQUEST['id_taixe'] != '')
    {
        $count = count($_REQUEST['id_taixe']);
        $i = 1;
        foreach($_REQUEST['id_taixe'] as $key=>$value)
        {
            if($i == $count)
            {
                $id .= $value;
            }
            else{
                $id .= $value.',';
            }
          
             //lấy tên tài xế
             $taixe = $model->db->query("SELECT * FROM php_taixe where id = ".$value ." LIMIT 1");
            $rs_taixe = $taixe->fetch();
            $name .= $rs_taixe['name_taixe'] .';';
            $i++;
        }
    }
    else if($_REQUEST['id_xe'] != '')
    {  $count_xe = count($_REQUEST['id_xe']);
        $j = 1;
        foreach($_REQUEST['id_xe'] as $key=>$value)
        {
          
            if($j == $count_xe)
            {
                $id .= $value;
            }
            else{
                $id .= $value.',';
            }
          
             //lấy tên tài xế
             $taixe = $model->db->query("SELECT * FROM php_doixe where id = ".$value ." LIMIT 1");
            $rs_taixe = $taixe->fetch();
            $name .= $rs_taixe['biensoxe'] .';';
            $j++;
        }
    }
   
   
    die(json_encode(
        array(
            
            'status'=> '1',
          
            'name'=>$name,
            'id' => $id
        )
       ));
}