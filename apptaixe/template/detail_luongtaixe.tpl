
    <div class="page">
        <div class="container">
            <div class="title">
                <h3>Chi tiết lương tháng {detail.thang} năm {detail.nam}</h3>
                
            </div>

             <div class="back">
                <a href="javascript:void(0)" onclick="history.go(-1)"><i class="fa-solid fa-arrow-left"></i> Back</a>
            </div>
            <div class="list_luongnhansu">
               <table class="detail-container">
                    <tbody>
                        <tr>
                            <td class="first">Tên tài xế: </td>
                            <td>{detail.name}</td>
                        </tr>
                        <tr>
                            <td class="first">Số ngày công: </td>
                            <td>{detail.ngay_cong} Ngày</td>
                        </tr>
                         <tr>
                            <td class="first">Lương thỏa thuận: </td>
                            <td>{detail.luong_thoa_thuan} </td>
                        </tr>
                        <tr>
                            <td class="first">Tiền hoa hồng: </td>
                            <td>{detail.tien_hoahong} </td>
                        </tr>
                        <tr>
                            <td class="first">Tiền đóng bảo hiểm: </td>
                            <td>{detail.tien_bao_hiem}</td>
                        </tr>
                          <tr>
                            <td class="first">Trừ tiền ngày nghỉ không phép: </td>
                            <td>{detail.tong_so_ngay_nghi_khong_phep} </td>
                        </tr>
                          <tr>
                            <td class="first">Tiền lương ứng: </td>
                            <td>{detail.tong_ungluong} </td>
                        </tr>
                          <tr>
                            <td class="first">Phụ cấp: </td>
                            <td>{detail.phu_cap}</td>
                        </tr>
                        
                          <tr>
                            <td class="first">Thưởng nóng: </td>
                            <td>{detail.thuong_nong} </td>
                        </tr>
                        
                          <tr>
                            <td class="first">Tổng nhận: </td>
                            <td class="last">{detail.tong_luong} </td>
                        </tr>
                    </tbody>
               </table>

    {detail.calendar}
                <div class="note_calendar"><h3 style="padding: 10px;font-size: 19px; ">Ghi chú:</h3>
                </div>
                <div class="note_calendar">
                     <div class="note_before color-cophep"></div><p>Nghỉ cả ngày (có phép)</p><br> 
                </div>
                <div class="note_calendar">
                     <div class="note_before color-khongphep"></div><p>Nghỉ cả ngày (không phép)</p><br> 
                </div>
                <div class="note_calendar">
                     <div class="note_before color-cophepnuangay"></div><p>Nghỉ nửa ngày (có phép)</p><br> 
                </div>
                <div class="note_calendar">
                    <div class="note_before color-khongphepnuangay"></div><p>Nghỉ nửa ngày (không phép)</p><br> 
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



