
    <div class="page">
        <div class="container">
            <div class="title">
                <h3>Báo cáo doanh thu - <span class="color-0"> năm {str.nam}</span></h3>
                <div class="title-link">
                    <a href="">
                        <p class="active">Dashboard</p>
                    </a>
                        <i class="fa-solid fa-angle-right"></i>
                        <p> Báo cáo</p>
                </div>
            </div>
            <div class="table">
            
                <div class="first-table">

                  <form class="form_search_table" id="form_search_table" method="post" onsubmit="return search_link('baocaodoanhthunam','search','form_search_table')">
                           
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
                            <th>Tháng năm</th>
                            <th>Tổng các loại chi</th>                          
                            <th>Tổng các loại thu</th>
                            <th>Tổng lương nhân sự</th>
                           
                        </tr>

                    </thead>
                    <tbody>
                       {str.thangnam}
                    <tr>
                    <td></td>
                    <td class="color-0">Tổng: {str.tong_tien_chi_cua_nam} </td>
                    <td class="color-0">Tổng: {str.tong_tien_thu_cua_nam} </td>
                    <td class="color-0">Tổng: {str.tong_luong_cua_nam} </td>  
                    
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


