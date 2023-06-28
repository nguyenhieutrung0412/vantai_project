
    <div class="page">
        <div class="container">
            <div class="title">
                <h3>Bảng theo dõi km của xe</h3>
                <div class="title-link">
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
             
               <div class="tools">
                 <form class="form_tools" autocomplete="off" id="form_tools" method="post" onsubmit="return _edit('theodoikm','update','form_tools',1)">
                    <div style="float:left;padding: 0px 25px 0 0;">
                        <label>Số km định mức thay nhớt</label><br>
                        <input type="text" name="km_dinhmucthaynhot" value="{master.km_dinhmucthaynhot}" placeholder="">
                    </div>
                    <div style="float:left;padding: 0px 25px 0 0;">
                        <label>Số km định mức thay lốp</label><br>
                        <input type="text" name="km_dinhmucthaylop" value="{master.km_dinhmucthaylop}" placeholder="">
                    </div>
                     <!--BOX boxadmin-->
                    <div style="float:left; ;padding: 0px 25px 0 0;">
                        <label class="green">Chú ý: Nhập định mức để nhận cảnh báo khi đến hạn</label>
                        <br>
                        <button type="submit"><i class="fa fa-check-circle"></i> Cập nhật ngay</button>
                    </div>
                    <!--BOX boxadmin-->
                </form>
                    <!--BOX boxadmin-->
                    <div style="float:left;">
                        <label class="green">Chú ý: Cập nhật xe nếu còn thiếu</label>
                        <br>
                        <a onclick ="return update_xe('theodoikm','add_theodoilopxe')"><i class="fa fa-check-circle"></i> Cập nhật ngay</a>
                    </div>
                    <!--BOX boxadmin-->
                       
               </div>

            </div>
          
            <div class="table table_scroll">
                <br>
                <br>
                <table>
                    <thead>
                        <tr  class="title-table">
                            <th>STT</th>
                            <th>Biển số xe</th>
                            <th style="width:9%;">Km đi từ khi thay nhớt</th>
                            <th>1P1</th>
                            <th>1T1</th>
                            <th>2P1</th>
                            <th>2T1</th>
                            <th>3P1</th>
                            <th>3P2</th>
                            <th>3T1</th>
                            <th>3T2</th>
                            <th>4P1</th>
                            <th>4P2</th>
                            <th>4T1</th>
                            <th>4T2</th>
                           
                           
                
                           
                           
                        </tr>
                    </thead>
                    <tbody>
                     <!--BASIC detail-->
                        <tr>
                            <td>{detail.stt}</td>
                            <td class="color-1 info" onclick="return info('doixe','info',{detail.id_security_doixe})">{detail.biensoxe}</td>
                            <td class="{detail.color_nhot}">{detail.km_tukhithaynhot}</td>
                            <td class="{detail.color_1p1}">{detail.1p1}</td>
                            <td class="{detail.color_1t1}">{detail.1t1}</td>
                            <td class="{detail.color_2p1}">{detail.2p1}</td>
                            <td class="{detail.color_2t1}">{detail.2t1}</td>
                            <td class="{detail.color_3p1}">{detail.3p1}</td>
                            <td class="{detail.color_3p2}">{detail.3p2}</td>
                            <td class="{detail.color_3t1}">{detail.3t1}</td>
                            <td class="{detail.color_3t2}">{detail.3t2}</td>
                            <td class="{detail.color_4p1}">{detail.4p1}</td>
                            <td class="{detail.color_4p2}">{detail.4p2}</td>
                            <td class="{detail.color_4t1}">{detail.4t1}</td>
                            <td class="{detail.color_4t2}">{detail.4t2}</td>
                           

                         
                           
                        </tr>
                    <!--BASIC detail-->
                    </tbody>
                </table>
                <div class="pagination">
                {divpage}
                </div>
            </div>
        </div>
    </div>
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
<div class ="popup-dieulenh  popup-info">
</div>
<div class="popup-images">
   
</div>
