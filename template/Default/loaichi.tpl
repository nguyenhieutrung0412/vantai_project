
    <div class="page">
        <div class="container">
            <div class="title">
                <h3>Loại chi</h3>
                <div class="title-link">
                    <a href="">
                        <p class="active">Dashboard</p>
                    </a>
                    <a >
                        <i class="fa-solid fa-angle-right"></i>
                        <p> Loại chi</p>
                    </a>
                </div>
            </div>
            <div class="table">
                <div class="first-table">
                    <div class="btn-new">
                        <a class="btn-create {xuly.them}"><i class="fa-solid fa-plus"></i> Tạo mới</a>
                    </div> 
                </div>
                <table>
                    <thead>
                        <tr  class="title-table">
                            <th>Mã loại</th>
                            <th>Tên loại chi</th>
                            <th>Hạn mức chi</th>
                            <th>Báo cáo</th>
                            <th>Active</th>
                            <th>Lựa chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!--BASIC detail-->
                        <tr>
                            <td>{detail.id}</td>
                            <td>{detail.loai_chi}</td>
                            <td>{detail.hanmucchi}</td>
                            <td class="active" ><a {detail.baocao}  onclick="return active_user('loaichi','baocao','{detail.id_security}')"> <i class="fa-solid fa-square-check"></i> </a></td>
                            <td class="active" ><a {detail.active}  onclick="return active_user('loaichi','baocao','{detail.id_security}')"> <i class="fa-solid fa-circle "></i> </a></td>
                            <td class="select">
                                <a class="btn-update {xuly.sua}" onclick="return update_view('loaichi','update-view',{detail.id_security})" data-id ="{detail.id_security}"> <i class="fa-solid fa-pen icon-edit"></i></a>
                                <a class=" {xuly.xoa} " onclick= "return _delete('loaichi','delete','{detail.id_security}')"> <i class="fa-solid fa-trash icon-delete"></i></a>
                            </td>
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
        <div class="pop-up">
            <h3>Thêm mới</h3>
            <form autocomplete="off" name="frmAddloaichi" id="frmAddloaichi" method="post" onsubmit = "return add('loaichi','add','frmAddloaichi',1)"  enctype="multipart/form-data">
                
        <table class="table-input">
         <tbody>
            <tr>
                <td class="td-first">Tên loại chi</td>
                 <td><input type="text" name="name_loaichi"  placeholder="Tên loại chi" required></td>
            </tr>
             <tr>
                 <td class="td-first">Hạn mức chi</td>
                <td><input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57"  name="hanmucchi"  placeholder="Hạn mức chi"></td>
             </tr>
            
         </tbody>
         </table>
                
                
                <div class="btn-submit">
                   
                    <button type="submit" class="submit">Thêm</button>
                     <button type="reset" class="cancel">Đong</button>
                </div>
            </form>
        </div>
</div>

<div class="popup-update">    
</div>

