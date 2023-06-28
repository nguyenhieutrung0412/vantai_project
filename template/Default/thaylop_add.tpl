
    <div class="page">
        <div class="container">
            <div class="title">
                <h3>ĐỀ XUẤT THAY LỐP</h3>
                <div class="title-link">
                    <a href="">
                        <p class="active">Dashboard</p>
                    </a>
                    <a >
                        <i class="fa-solid fa-angle-right"></i>
                        <p> Theo dõi thay lốp</p>
                    </a>
                </div>
            </div>
            <div class="back">
                <a onclick="return back_prev();"><i class="fa-solid fa-arrow-left"></i> Back</a>
            </div>
            <form name="frmLop" id="frmLop" method="post" onsubmit="return add('thaylop','add','frmLop','img_file')" enctype="multipart/form-data">
                <div class="table_cont">  
                    <h3 style="padding:0 0 10px 0">Sơ đồ mô tả vị trí lốp xe</h3>  
                    <table class="tablecont">     
                        <tbody>
                            <tr >        
                                <td rowspan="2">1P1</td>          
                                <td rowspan="2" style="padding:27.1px 8px;background:#fff;border-top:1px solid #ffff"></td>          
                                <td rowspan="2">2P1</td>          
                                       
                            </tr>        
                            <tr>
                                      
                                  
                            </tr>        
                            <tr>        
                                <td colspan="6"><h2 style="padding:30px 0;margin:0">ĐẦU XE</h2></td>        
                            </tr>        
                            <tr colspan="2">        
                                <td rowspan="2">1T1</td>          
                                <td rowspan="2" style="padding:27.1px 8px;background:#fff;border-bottom:1px solid #ffff"></td>          
                                <td rowspan="2">2T1</td>          
                                  
                            </tr>        
                            <tr>        
                                 
                                       
                            </tr>      
                        </tbody>
                    </table>
                    <table class="tablecont2">      
                        <tbody>
                            <tr>          
                                <td width="60%">&nbsp;</td>        
                                <td>3P1</td>        
                                <td>4P1</td>          
                                  
                            </tr>        
                            <tr>            
                                <td>&nbsp;</td>        
                                <td>3P2</td>        
                                <td>4P2</td>          
                               
                            </tr>        
                            <tr>        
                                <td colspan="4"><h2 style="padding:30px 0;margin:0">ĐUÔI XE</h2></td>        
                            </tr>        
                            <tr>            
                                <td>&nbsp;</td>        
                                <td>3T2</td>        
                                <td>4T2</td>          
                               
                            </tr>        
                            <tr>            
                                <td>&nbsp;</td>        
                                <td>3T1</td>        
                                <td>4T1</td>          
                              
                            </tr>      
                        </tbody>
                    </table>  
                </div>
                <div class="table frm table_scroll" style="padding:0">
                    <table class="table1366">  
                    
                    <tbody id="container_id"></tbody>    
                    <tbody>
                        <tr>    
                            <td width="20%"><strong>Ngày yêu cầu thay lốp (*)</strong></td>      
                            <td><input class="picker" type="text" name="data[ngay_thaylop]" placeholder="Ngày xuất lốp" autocomplete="off" maxlength="10" class="picker2 hasDatepicker" required="" id="dp1679367146405"></td>
                        </tr>    
                        <tr>    
                            <td><strong>Đơn vị thay lốp (*)</strong></td>      
                            <td>
                                <input type="text" name="data[ten_donvi]" class="btn-phi" id="ten_donvi1"  placeholder="Chọn bên thay"  autocomplete="off"  onclick="return load_dulieu('thaylop','getdonvi-view',1)">
                            <input type="hidden" name="data[id_donvi]" id="id_donvi1" >
                            </td>    
                        </tr>    
                        <tr>    
                            <td><strong>Tài xế yêu cầu thay lốp (*)</strong></td>      
                            <td>
                                <input type="text" name="data[tentaixe]" class="btn-phi" id="data_ten1" placeholder="Chọn tài xế" autocomplete="off" required=""  onclick="return load_dulieu('thaylop','gettaixe-view',1)">
                                <input type="hidden" name="data[id_taixe]" id="data_id1" >

                            </td>    
                        </tr>        
                        <tr>    
                            <td><strong>Xe cần thay (*)</strong></td>      
                            <td>
                                <input type="text" name="data[biensoxe]" class="btn-phi" id="biensoxe1" autocomplete="off" placeholder="Chọn xe"  onclick="return load_dulieu('thaylop','getxe-view',1)">
                                <input type="hidden" name="data[id_xe]" id="idxe1" >
                                      
                            </td>    
                        </tr>    
                        <tr>    
                            <td><strong>Vị trí lốp đầu xe cần thay? </strong></td>      
                            <td>
                                <label for="id01P1" style="float:left;margin:0 10px 0 0;width: auto;display: inline-block;">
                                <input type="checkbox" name="vitri[]" value="1P1" id="id01P1"> 1P1</label>
                                <label for="id12P1" style="float:left;margin:0 10px 0 0;width: auto;display: inline-block;">
                                <input type="checkbox" name="vitri[]" value="2P1" id="id12P1"> 2P1</label>
                                <label for="id22P2" style="float:left;margin:0 10px 0 0;width: auto;display: inline-block;">
                                
                               
                                
                                <label for="id51T1" style="float:left;margin:0 10px 0 0;width: auto;display: inline-block;">
                                <input type="checkbox" name="vitri[]" value="1T1" id="id51T1"> 1T1</label>
                                <label for="id62T1" style="float:left;margin:0 10px 0 0;width: auto;display: inline-block;">
                                <input type="checkbox" name="vitri[]" value="2T1" id="id62T1"> 2T1</label>
                                <label for="id72T2" style="float:left;margin:0 10px 0 0;width: auto;display: inline-block;">
                               
                               
                             
                            </td>    
                        </tr>        
                           
                        <tr>    
                            <td><strong>Vị trí lốp đuôi xe cần thay?</strong></td>      
                            <td>
                                <label for="id03P1" style="float:left;margin:0 10px 0 0;width: auto;display: inline-block;">
                                <input type="checkbox" name="vitri[]" value="3P1" id="id03P1"> 3P1</label>
                                <label for="id13P2" style="float:left;margin:0 10px 0 0;width: auto;display: inline-block;">
                                <input type="checkbox" name="vitri[]" value="3P2" id="id13P2"> 3P2</label>
                                <label for="id24P1" style="float:left;margin:0 10px 0 0;width: auto;display: inline-block;">
                                <input type="checkbox" name="vitri[]" value="4P1" id="id24P1"> 4P1</label>
                                <label for="id34P2" style="float:left;margin:0 10px 0 0;width: auto;display: inline-block;">
                                <input type="checkbox" name="vitri[]" value="4P2" id="id34P2"> 4P2</label>
                                <label for="id45P1" style="float:left;margin:0 10px 0 0;width: auto;display: inline-block;">
                               
                                <label for="id63T1" style="float:left;margin:0 10px 0 0;width: auto;display: inline-block;">
                                <input type="checkbox" name="vitri[]" value="3T1" id="id63T1"> 3T1</label>
                                <label for="id73T2" style="float:left;margin:0 10px 0 0;width: auto;display: inline-block;">
                                <input type="checkbox" name="vitri[]" value="3T2" id="id73T2"> 3T2</label>
                                <label for="id84T1" style="float:left;margin:0 10px 0 0;width: auto;display: inline-block;">
                                <input type="checkbox" name="vitri[]" value="4T1" id="id84T1"> 4T1</label>
                                <label for="id94T2" style="float:left;margin:0 10px 0 0;width: auto;display: inline-block;">
                                <input type="checkbox" name="vitri[]" value="4T2" id="id94T2"> 4T2</label>
                               
                               
                            </td>    
                        </tr>        
                        <tr>    
                            <td><strong>Số KM lúc thay lốp</strong></td>      
                            <td><input type="text" name="data[km_luc_thaylop]" placeholder=" VD: 1500.5" maxlength="30"></td>    
                        </tr>    
                         
                       
                        <tr>    
                            <td><strong>Nội dung (*)</strong></td>      
                            <td><textarea name="data[noidung]" maxlength="500" placeholder="Nội dung..." required=""></textarea></td>    
                        </tr>   
                               
                        <tr>
                            <td><b>Hình ảnh hiện trạng lốp trước khi thay (*)</b></td>
                            <td><input type="file" name="img_file[]" id="img_file" onchange="previewImg(event,12);" multiple="" accept="image/*;capture=camera"><p class="color_0" style="padding:5px 0 0 0">Hình ảnh hiện trạng lốp trước khi thay &lt; 10 MB (Được chọn nhiều hình ảnh cùng lúc)</p>
                                <div class="view_pics"></div>
                            </td>
                        </tr>  
                    </tbody>
                </table>
            </div>                  
            <div class="wpbottom"><button type="submit" style="display:block;float:none;margin:10px auto"><i class="fa fa-floppy-o"></i> Tạo đề xuất</button>
            </div>
            </form>
        </div>

    </div>
     <script type="text/javascript" src="template/Default/js/main_load.js"></script>
<div class="div-beforeSuccess">
    <div class="div-beforeSuccess_popup">
        <img src="images/loading.gif" alt="loading">
        <h4>Đang xử lý!!!</h4>
    </div> 
</div>
<div class="div-Success ">
    <div class="div-Success_popup">
        <img src="images/icon-success.png" alt="success">
        <h4>Thành công!!!</h4>
    </div> 
</div>
<div class="div-fail">
    <div class="div-fail_popup">
        <img src="images/error1.png" alt="error1">
        <h4>Xảy ra lỗi !!!</h4>
    </div> 
</div>

<div class="popup-create">
        
</div>

<div class="popup-update">    
</div>
<div class="popup-upload-img">
   
</div>
<div class ="popup-dieulenh  popup-info">

</div>

