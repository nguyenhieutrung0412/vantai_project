<div class="title">Đơn hàng - mã: <span class="color-0">{donhangtrongoi.id}</span></div>

<div class="table">
<div  class="scroll-x">
<table>
    <tbody>
        <tr>
        <td colspan="4">
            <div class="timeline">
                <div class="timeline-text child1">Xuất bến</div>
                <div class="timeline-line {donhangtrongoi.check-1}">
                    <a class="btn-timeline" href="javascript:void(0)" onclick="return add_view_timeline('ajax','timeline-donhangtrongoi-view','{donhangtrongoi.id_security}','xuatben')"><div class="timeline-line_check"><i  class="fa-solid fa-truck-fast {donhangtrongoi.check-1}"></i></div></a>
                </div>
            </div>
            <div class="timeline">
                <div class="timeline-text child2">Đã lấy hàng</div>
                <div class="timeline-line {donhangtrongoi.check-2}">
                    <a class="btn-timeline" href="javascript:void(0)" onclick="return add_view_timeline('ajax','timeline-donhangtrongoi-view','{donhangtrongoi.id_security}','danggiao')"><div class="timeline-line_check"><i class="fa-solid fa-truck-fast {donhangtrongoi.check-2}"></i></div></a>
                </div>
            </div>
            <div class="timeline">
                <div class="timeline-text child3">Đã giao</div>
                <div class="timeline-line {donhangtrongoi.check-3}">
                    <a class="btn-timeline" href="javascript:void(0)"  onclick="return add_view_timeline('ajax','timeline-donhangtrongoi-view','{donhangtrongoi.id_security}','giaohangtoidiachi')"><div class="timeline-line_check"><i class="fa-solid fa-truck-fast {donhangtrongoi.check-3}"></i></div></a>
                </div>
            </div>
            <div class="timeline">
                <div class="timeline-text child4">Hoàn thành/về bãi</div>
                <div class="timeline-line {donhangtrongoi.check-4}">
                    <a class="btn-timeline" href="javascript:void(0)" onclick="return add_view_timeline('ajax','timeline-donhangtrongoi-view','{donhangtrongoi.id_security}','hoanthanh')"><div class="timeline-line_check"><i class="fa-solid fa-truck-fast {donhangtrongoi.check-4}"></i></div></a>
                </div>
            </div>
        </td>
        
        </tr>
    </tbody>
</table>
</div>
<div class="cost">
    <a class="cost_btn" href="javascript:void(0)" onclick="return update_view('ajaxphiphatsinh','phiphatsinh-view',{donhangtrongoi.id_security})"><i class="fa-solid fa-circle-plus"></i> Thông tin phí phát sinh</a>
</div>
<table >
        <thead>
            <tr>
                <th colspan="4">  <h5>Thông tin đơn hàng</h5></th>
            </tr>
            <tr>
                <th> Tên mặt hàng</th>
                <th> Đơn vị tính</th>
                <th> Số lượng</th>
                <th> Ghi chú</th>
            </tr>
        </thead>
        <tbody>
        <!--BASIC mathang-->
           <tr>
                
                <td>{mathang.ten}</td>
                <td>{mathang.dvt}</td>
                <td>{mathang.soluong}</td>
                <td>{mathang.ghichu}</td>
            </tr>
        <!--BASIC mathang--> 

        </tbody>

        
    </table>
    
    <table >
        <thead>
            <tr>
                <th colspan="2">  <h5>Thông tin giao nhận</h5></th>
            </tr>
        </thead>
        <tbody>
     
           <tr>
                <td class="td-first">Địa chỉ nhận hàng:</td>
                <td>{donhangtrongoi.diachi_nhanhang}</td>
            </tr>
              <tr>
                <td class="td-first">Thời gian nhận hàng:</td>
                <td>{donhangtrongoi.thoigian_nhanhang}</td>
            </tr>
              <tr>
                <td class="td-first">Tên người nhận:</td>
                <td>{donhangtrongoi.ten_nguoinhan}</td>
            </tr>
              <tr>
                <td class="td-first">CMND:</td>
                <td>{donhangtrongoi.cmnd_nguoinhan}</td>
            </tr>
             <tr>
                <td class="td-first">Số điện thoại người nhận:</td>
                <td>{donhangtrongoi.phone_nguoinhan}</td>
            </tr>
              <tr>
                <td class="td-first">Địa chỉ giao hàng:</td>
                <td>{donhangtrongoi.diachi_giaohang}</td>
            </tr>         

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
                <td class="td-first">Phí vận chuyển:</td>
                <td>{donhangtrongoi.phivanchuyen}</td>
            </tr>
              <tr>
                <td class="td-first">Hình thức thanh toán:</td>
                <td>{donhangtrongoi.hinhthucthanhtoan}</td>
            </tr>
        </tbody>

        
    </table>
    <table >
        <thead>
            <tr>
                <th colspan="2">  <h5>Dữ liệu khách hàng</h5></th>
            </tr>
        </thead>
        <tbody>
 
      
            <tr>
                <td class="td-first">Tên khách hàng:</td>
                <td>{khachhang.name_kh}</td>
            </tr>
            <tr>
                <td class="td-first">Sđt khách hàng:</td>
                <td>{khachhang.phone_kh}</td>
            </tr>
               <tr>
                <td class="td-first">Email khách hàng:</td>
                <td>{khachhang.email_kh}</td>
            </tr>
            <tr>
                <td class="td-first">CMND khách hàng:</td>
                <td>{khachhang.cmnd}</td>
            </tr>
             <tr>
                <td class="td-first">Tên công ty:</td>
                <td>{khachhang.ten_congty}</td>
            </tr>
             <tr>
                <td class="td-first">Mã số thuế:</td>
                <td>{khachhang.masothue}</td>
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
<div class="popup-timeline">

</div>
<div class="popup-hoanthanh">

</div>
<div class="popup-upload-img">
   
</div>