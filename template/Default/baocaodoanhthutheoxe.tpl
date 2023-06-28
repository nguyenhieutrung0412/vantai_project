
    <div class="page">
        <div class="container">
            <div class="title">
                <h3>Báo cáo doanh thu theo xe -  <span class="color-0"> Tháng {str.thang} - {str.nam}</span></h3>
                <div class="title-link">
                    <a href="">
                        <p class="active">Dashboard</p>
                    </a>
                        <i class="fa-solid fa-angle-right"></i>
                        <p> Báo cáo doanh thu xe</p>
                </div>
            </div>
            <div class="table table_scroll">
            
                <div class="first-table">

                  <form class="form_search_table" id="form_search_table" method="post" onsubmit="return search_link('baocaodoanhthutheoxe','search','form_search_table')">
                            
                            <input type="text" name="tenxe_search" class="btn-phi_search" id="data_xesearch1" placeholder="Biển số xe"  onclick="return load_dulieu2('theodoidau','getxesearch-view','1',{str.thang},{str.nam})">
                            <input type="hidden" name="idxe_search" id="data_idxesearch1" >
                            <select name="thang_search" id="thang_search">
                                <option value="0">---Chọn tháng---</option>
                                <option value="1">Tháng 1</option>
                                <option value="2">Tháng 2</option>
                                <option value="3">Tháng 3</option>
                                <option value="4">Tháng 4</option>
                                <option value="5">Tháng 5</option>
                                <option value="6">Tháng 6</option>
                                <option value="7">Tháng 7</option>
                                <option value="8">Tháng 8</option>
                                <option value="9">Tháng 9</option>
                                <option value="10">Tháng 10</option>
                                <option value="11">Tháng 11</option>
                                <option value="12">Tháng 12</option>               
                            </select>
                            <select name="nam_search" id="nam_search">
                                <option value="0">---Chọn năm---</option>
                                {list_select.list_select}                 
                            </select>
                            <button class="info search_css"  type="submit">Search</button>
                        </form>
                </div>
                <table>
                    <thead>
                        <tr  class="title-table">
                            <th>Biển số xe</th>
                            <th>Số chuyến hàng trọn gói</th>                          
                            <th>Số chuyến hàng rời</th>                          
                            
                            <th>Phí nhiên liệu</th>
                            <th>Phí sửa chữa</th>
                            <th>Tổng sản lượng</th>
                            <th>Lợi nhuận ước tính</th>
                           
                        </tr>

                    </thead>
                    <tbody>
                      <!--BASIC detail-->
                        <tr>
                         
                            <td class="color-1 info" onclick="return info('doixe','info',{detail.id_security})">{detail.biensoxe}</td>
                            <td>{detail.count_donhangtrongoi}</td>
                            <td>{detail.count_donhangroi}</td>
                          
                            <td class="blue">{detail.total_phinhienlieu}</td>
                           <td class="blue">{detail.total_phisuachua}</td>
                           <td class="green">{detail.total_sanluong} </td>
                           <td class="color-0">{detail.loinhuan} </td>
                         
                           
                        </tr>
                    <!--BASIC detail-->
                    
                    <tr>
                    <td></td>
                    <td class="color-0">Tổng: {str.tong_donhangtrongoi} </td>
                    <td class="color-0">Tổng: {str.tong_donhangroi} </td>
                    <td class="blue">Tổng: {str.tong_phinhienlieu} </td>  
                    <td class="blue">Tổng: {str.tong_phisuachua} </td>  
                    <td class="green">Tổng: {str.tong_sanluongtrongnam} </td>  
                    <td class="color-0">Tổng: {str.tong_loinhuan} </td>  
                    
                </tr>
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
<div class="popup-upload-img">
   
</div>
<div class ="popup-dieulenh  popup-info">
</div>

