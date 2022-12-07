
<div class="nv-list">
<h2>Danh sách đơn hàng của bạn</h2>
<ul>
    <!--BASIC donhangtrongoi-->
    <li>
        <a href="./trangchu/detaildonhang/?code={donhangtrongoi.id}&&type=donhangtrongoi">
            <div class="stt">Mã đơn: {donhangtrongoi.id}</div>
            <div class="address">Đ/c lấy hàng: {donhangtrongoi.diachi_nhanhang}</div>
            <div class="time">Ngày lấy hàng:  {donhangtrongoi.thoigian_nhanhang}</div>
            <div class="phivanchuyen">Phí vận chuyển: {donhangtrongoi.phivanchuyen}</div>
             <div class="phivanchuyen">Loại đơn hàng: Đơn hàng trọn gói</div>
        </a>
    </li>
     <!--BASIC donhangtrongoi-->
    
    
</ul>
<ul>
    <!--BASIC donhangroi-->
    <li>
        <a href="./trangchu/detaildonhangroi/?code={donhangroi.id}&&type=donhangroi">
            <div class="stt">Mã đơn: {donhangroi.id}</div>
             <div class="address color-0">Số đơn hàng:  {donhangroi.soluong_donhangcon}</div>
         
            <div class="phivanchuyen">Tổng phí vận chuyển: {donhangroi.tong_phivanchuyen}</div>
             <div class="phivanchuyen">Loại đơn hàng: Đơn hàng rời</div>
        </a>
    </li>
     <!--BASIC donhangroi-->
    
    
</ul>
</div>

