<div class="title">Đơn hàng - mã: <span class="color-0">{donhangroi.id}</span></div>

<div class="table">
<div  class="scroll-x">
<table>
    <tbody>
        <tr>
        <td colspan="2">
            <div class="timeline timeline2">
                <div class="timeline-text  child1">Đang thực hiện chuyến</div>
                 <div class="timeline-line {donhangroi.check-1}">
                    <a class="btn-timeline" href="javascript:void(0)" onclick="return add_view_timeline('ajaxdonhangroi','timeline-donhangroi-view','{donhangroi.id_security}','1')"><div class="timeline-line_check"><i  class="fa-solid fa-truck-fast {donhangroi.check-1}"></i></div></a>
                </div>
            </div>
            <div class="timeline timeline2">
                <div class="timeline-text child2">Hoàn thành</div>
                <div class="timeline-line {donhangroi.check-2}">
                    <a class="btn-timeline" href="javascript:void(0)" onclick="return add_view_timeline('ajaxdonhangroi','timeline-donhangroi-view','{donhangroi.id_security}','2')"><div class="timeline-line_check"><i  class="fa-solid fa-truck-fast {donhangroi.check-2}"></i></div></a>
                </div>
            </div>
           
        </td>
        
        </tr>
    </tbody>
</table>
</div>

    <table >
        <thead>
            <tr>
                <th colspan="6">  <h5>Danh sách đơn hàng thực hiện</h5></th>
            </tr>
            <tr>
                <th> #</th>
                <th> ID</th> 
                <th> Địa chỉ giao hàng</th>
                <th> Tình trạng hàng</th>
                <th> Tình trạng đơn</th>
                <th> Action</th>
               
            </tr>
        </thead>
        <tbody>
        <!--BASIC donhangroi_s-->
           <tr>
                
                <td>{donhangroi_s.stt}</td>
                <td>{donhangroi_s.id}</td>
                <td>{donhangroi_s.diachi_giaohang}</td>
                <td class="{donhangroi_s.color_layhang}">{donhangroi_s.layhang_text}</td>
                <td class="{donhangroi_s.color}">{donhangroi_s.tinhtrangdon_text}</td>
                <td><a class="color-1 btn-info" href="javascript:void(0)" onclick="return info('trangchu','info_donhangcon',{donhangroi_s.id_security})">chi tiết<a></td>
            </tr>
        <!--BASIC donhangroi_s--> 

        </tbody>

        
    </table>
  
    <table >
        <thead>
            <tr>
                <th colspan="2">  <h5>Thông tin thu phí</h5></th>
            </tr>
        </thead>
        <tbody>
     
           <tr>
                <td class="td-first">Tổng phí vận chuyển:</td>
                <td>{donhangroi.tong_phivanchuyen}</td>
            </tr>
            
        </tbody>

        
    </table>
    <table >
        <thead>
            <tr>
                <th colspan="2">  <h5>Thông tin xe và phụ xe</h5></th>
            </tr>
        </thead>
        <tbody>
     
           <tr>
                <td class="td-first">Loại xe:</td>
                <td>{xe.loaixe}</td>
            </tr>
              <tr>
                <td class="td-first">Biển số xe:</td>
                <td>{xe.biensoxe}</td>
            </tr>
             <tr>
                <td class="td-first">Tên người phụ xe:</td>
                <td>{nhansu.name}</td>
            </tr>
            <tr>
                <td class="td-first">Số điện thoại:</td>
                <td>{nhansu.phone}</td>
            </tr>
            <tr>
                <td class="td-first">Địa chỉ:</td>
                <td>{nhansu.diachi}</td>
            </tr>
            <tr>
                <td class="td-first">CMND:</td>
                <td>{nhansu.cmnd}</td>
            </tr>
        </tbody>

        
    </table>
      
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
<div class="popup_detail">

</div>
<div class="popup-timeline">

</div>
<div class="popup-hoanthanh">

</div>