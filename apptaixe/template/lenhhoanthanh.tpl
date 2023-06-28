
<div class="nv-list-nhan">
<h2>Lệnh đã hoàn thành</h2>

<ul class="list">
    <!--BASIC trongoi-->
    <li>
        <a href="?mod=trangchu&act=detaildonhang&code={trongoi.id}&type=donhangtrongoi">
           
            <div class="stt">Mã đơn: <span style="color:red">{trongoi.id}</span> - Ngày vận chuyển:  {trongoi.thoigian_nhanhang}</div>
            <div class="address">Lương chuyến: {trongoi.luong_chuyen}</div>
      
            <div class="address">Thời gian hoàn thành: {trongoi.date_hoanthanh_timeline}</div>
            <div class="address">Tình trạng: <span style="    color: #3dd14b;">Hoàn thành</span></div>
            <div class="address">Loại đơn hàng: trọn gói</div>
              <div class="btn-detail"><i class="fa-sharp fa-solid fa-circle-info"></i> Chi tiết</div>
        </a>
      
    </li>
    <!--BASIC trongoi-->
    <!--BASIC roi-->
    <li>
        <a href="?mod=trangchu&act=detaildonhangroi&code={roi.id}&type=donhangroi">
           
            <div class="stt">Mã đơn: <span style="color:red">{roi.id}</span> - Ngày vận chuyển:  {roi.thoigiao_nhanhang}</div>
            <div class="address">Lương chuyến: {roi.luong_chuyen}</div>
     
            
            <div class="address">Thời gian hoàn thành: {roi.date_hoanthanh_timeline}</div>
            <div class="address">Tình trạng: <span style="    color: #3dd14b;">Hoàn thành</span></div>
            <div class="address">Loại đơn hàng: rời</div>
                    <div class="btn-detail" ><i class="fa-sharp fa-solid fa-circle-info"></i> Chi tiết</div>
        </a>

    </li>
    <!--BASIC roi-->
</ul>


</div>

