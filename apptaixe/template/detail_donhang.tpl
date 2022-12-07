<div class="title">Đơn hàng - mã: <span class="color-0">{donhangtrongoi.id}</span></div>

<div class="table">
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