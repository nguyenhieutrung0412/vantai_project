
<div class="nv-list">
<h2>Danh sách lệnh chưa nhận</h2>
<ul class="list">
    <!--BASIC trongoi-->
    <li>
       
            <a href="javascript:void(0)" class="select">
                <div class="icon-new">New</div>
                <div class="stt">Mã đơn: <span style="color:red">{trongoi.id}</span> - Ngày vận chuyển:  {trongoi.thoigian_nhanhang}</div>
                <div class="address">Đ/c lấy hàng: {trongoi.diachi_nhanhang}</div>
                <div class="address">Lương chuyến: <span style="color:red">{trongoi.luong_chuyen}</span></div>
                <div class="phivanchuyen">Loại đơn hàng: Trọn gói</div>
            </a>

        <ul class="detail">
            <li>
                <div class="content">
                    <h3>Khách hàng</h3>
                    <p><i class="fa-solid fa-building"></i> : {khachhang.ten_congty}</p>
                    <p><i class="fa-solid fa-location-dot"></i> : {khachhang.address_kh}</p>
                    <p><i class="fa-solid fa-qrcode"></i> MST: {khachhang.masothue}</p>
                    <p><i class="fa-solid fa-phone"></i> : {khachhang.phone_kh}</p>
                    <p><i class="fa-solid fa-user"></i> Số liên hệ khi đến(nếu có): {trongoi.phone_nguoinhan}</p>

                    <h3>Vận chuyển</h3>
                    <strong>Mã lệnh:</strong> <span style="color:red">{trongoi.id}</span><br>
                    <strong>Loại hàng:</strong> <span>56{trongoi.loaihang}56</span><br>
                    <strong>Trọng lượng hàng:</strong> <span>{trongoi.trongluong_hanghoa}</span><br>
                    <strong>Số lượng hàng:</strong> <span>{trongoi.soluong_hanghoa}</span><br>
                    <strong>Phí vận chuyển:</strong> <span style="color:red">{trongoi.phivanchuyen}</span><br>
                    <strong>Hình thức thanh toán:</strong> <span>{trongoi.hinhthucthanhtoan_text}</span><br>
                    <strong>Lương chuyến:</strong> <span style="color:red">{trongoi.luong_chuyen}</span><br>
                    
                    <h3>Nhiệm vụ</h3>
                    <strong>Xe thực hiện:</strong> <span>{trongoi.biensoxe}</span><br>
                    <strong>Lơ xe:</strong> <span>{trongoi.ten_phuxe} ({trongoi.sdt_phuxe})</span><br>
                    <strong>Lấy hàng:</strong> <span>{trongoi.diachi_nhanhang}</span><br>
                
                    <strong>Giao hàng:</strong> <span>{trongoi.diachi_giaohang}</span><br>
                </div>
                 <a class="btn-nhanlenh" href="javascript:void(0)" onclick="return nhan_lenh('ajax','nhanlenh',{trongoi.id},'donhangtrongoi')"><i class="fa-solid fa-plus fa-beat-fade"></i> Nhận lệnh</a>
                <a class="btn-hide" href="javascript:void(0)"><i class="fa-solid fa-arrow-up"></i> Thu gọn</a>
            </li>
        </ul>
        
        
    </li>
     <!--BASIC trongoi-->
     <!--BASIC roi-->
    <li>
        <a href="javascript:void(0)" class="select">
            <div class="icon-new">New</div>
            <div class="stt">Mã đơn: <span style="color:red">{roi.id}</span> - Ngày vận chuyển:  {donhangroi.thoigian_giaohang}</div>
            <div class="address">Tuyến: {tuyen_roi.ten_tuyen}</div>
            <div class="address">Lương chuyến: <span style="color:red">{roi.luong_chuyen}</span></div>
            <div class="phivanchuyen">Loại đơn hàng: rời</div>
        </a>
        <ul class="detail">
            <li>
                <div class="content">
                    
                    <h3>Vận chuyển</h3>
                    <strong>Mã lệnh:</strong> <span style="color:red">{roi.id}</span><br>
                   
                    <strong>Tổng trọng lượng chuyến:</strong> <span>{roi.tong_trongluong} kg</span><br>
                    <strong>Tổng số khối chuyến:</strong> <span>{roi.tong_khoi}</span><br>
                    <strong>Tổng phí vận chuyển:</strong> <span style="color:red">{roi.tong_phivanchuyen}</span><br>
                   
                    <strong>Lương chuyến:</strong> <span style="color:red">{roi.luong_chuyen}</span><br>
                    
                    <h3>Nhiệm vụ</h3>
                        <strong>Xe thực hiện:</strong> <span>{roi.biensoxe}</span><br>
                        <strong>Lơ xe:</strong> <span>{roi.ten_phuxe} {roi.sdt_phuxe}</span><br>
                        <strong>Tổng số đơn thực hiện:</strong> <span style="color:red;">{roi.soluong_donhangcon}</span><br>
                    
                      
                    </div>
                <a class="btn-nhanlenh" href="javascript:void(0)" onclick="return nhan_lenh('ajax','nhanlenh',{roi.id},'donhangroi')"><i class="fa-solid fa-plus fa-beat-fade"></i> Nhận lệnh</a>
                <a class="btn-hide" href="javascript:void(0)"><i class="fa-solid fa-arrow-up"></i> Thu gọn</a>
            </li>
        </ul>
    </li>
     <!--BASIC roi-->
    
    
</ul>
</div>
<div class="nv-list-nhan">
<h2>Lệnh đang thực hiện</h2>
<p>Hiện có: <span style="color:red">{count_nhanlenh.nhan_lenh}</span> lệnh</p>
<ul class="list">
    <!--BASIC trongoi_nhanlenh-->
    <li>
        <a href="?mod=trangchu&act=detaildonhang&code={trongoi_nhanlenh.id}&type=donhangtrongoi">
           
            <div class="stt">Mã đơn: <span style="color:red">{trongoi_nhanlenh.id}</span> - Ngày vận chuyển:  {trongoi_nhanlenh.thoigian_nhanhang}</div>
            <div class="address">Lương chuyến: {trongoi_nhanlenh.luong_chuyen}</div>
            <div class="address">Đ/c nhận: {trongoi_nhanlenh.diachi_nhanhang}</div>
            <div class="address">Đ/c giao: {trongoi_nhanlenh.diachi_giaohang}</div>
            <div class="address">Nhận lệnh lúc: {trongoi_nhanlenh.thoigian_nhanlenh}</div>
            <div class="address">Tình trạng: <span style="color:red">Chưa hoàn tất <i class="fa-solid fa-plus fa-spinner fa-spin-pulse"></i></span></div>
            <div class="address">Loại đơn hàng: trọn gói</div>
              <div class="btn-detail"><i class="fa-sharp fa-solid fa-circle-info"></i> Chi tiết</div>
        </a>
      
    </li>
    <!--BASIC trongoi_nhanlenh-->
    <!--BASIC roi_nhanlenh-->
    <li>
        <a href="?mod=trangchu&act=detaildonhangroi&code={roi_nhanlenh.id}&type=donhangroi">
           
            <div class="stt">Mã đơn: <span style="color:red">{roi_nhanlenh.id}</span> - Ngày vận chuyển:  {roi_nhanlenh.thoigiao_nhanhang}</div>
            <div class="address">Lương chuyến: {roi_nhanlenh.luong_chuyen}</div>
            <div class="address">Tuyến: {roi_nhanlenh.ten_tuyen}</div>
            
            <div class="address">Nhận lệnh lúc: {roi_nhanlenh.thoigian_nhanlenh}</div>
            <div class="address">Tình trạng: <span style="color:red">Chưa hoàn tất <i class="fa-solid fa-plus fa-spinner fa-spin-pulse"></i></span></div>
            <div class="address">Loại đơn hàng: rời</div>
                    <div class="btn-detail" ><i class="fa-sharp fa-solid fa-circle-info"></i> Chi tiết</div>
        </a>

    </li>
    <!--BASIC roi_nhanlenh-->
</ul>


</div>

