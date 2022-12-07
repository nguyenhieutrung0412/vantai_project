<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{   
    if( $_POST['data'] !=  '0' && $_POST['data2'] !=  '0')
    {

    
        $result = $oContent->view_table("php_luongtaixe", "`thang`=".$_POST['data']." AND nam = ".$_POST['data2']);
        $total = $result->num_rows();
        
       

        if($total == 0)
        {
            $taixe = $oContent->view_table("php_taixe");
            $num = 1;
            while($rs_taixe = $taixe->fetch()){
                if($num%4==0){$rs_taixe['fix'] = ' fix';};
                $str .= '   
                <div class="card '.$rs_taixe['fix'].'">
                    <input class="check" type="checkbox" name = "taixe['.$rs_taixe['id'].']" >
                    <label class="color-1">'.$rs_taixe['name_taixe'].'</label> <br>
                </div>
            ';
            $num++;
            }
            die(json_encode(
                array(
                    'status' => 1,
                    'str' => $str
                )
            ));
        }
        else{
            $taixe = $oContent->view_table("php_taixe");
            $num = 1;
            $str ='';
            while($rs_taixe = $taixe->fetch()){
                

                $result_luongtaixe = $model->db->query("SELECT * FROM php_luongtaixe WHERE user_id =".$rs_taixe['id']."  AND`thang`=".$_POST['data']." AND nam = ".$_POST['data2']." LIMIT 1");
                $total_taixe = $result_luongtaixe->num_rows();
                
                if($total_taixe == 0)
                {
                    if($num%4==0){$rs_taixe['fix'] = ' fix';};
                    $str .= '   
                        <div class="card '.$rs_taixe['fix'].'">
                            <input class="check" type="checkbox" name = "taixe['.$rs_taixe['id'].']" >
                            <label class="color-1">'.$rs_taixe['name_taixe'].'</label> <br>
                        </div>
                    ';
                    $num++;
                }
            }
            if($str == '')
            {
                $str = 'Đã tạo bảng lương cho tất cả tài xế của tháng '.$_POST['data'].' năm ' .$_POST['data2'] ;  
                die(json_encode(
                    array(
                        'status' => 0,
                        'str' => $str
                    )
                ));
            }
            die(json_encode(
                array(
                    'status' => 1,
                    'str' => $str
                )
            ));

        }
    }
    else{
        $str = 'Vui lòng chọn cả năm và tháng';

        die(json_encode(
            array(
                'status' => 0,
                'str' => $str
            )
        ));
    }
}