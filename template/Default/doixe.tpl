
    <div class="page">
        <div class="container">
            <div class="title">
                <h3>Đội xe</h3>
                <div class="title-link">
                    <a href="">
                        <p class="active">Dashboard</p>
                    </a>

                    <a >
                        <i class="fa-solid fa-angle-right"></i>
                        <p> Quản lý đội xe</p>
                    </a>
                </div>
            </div>
            <div class="table">
                <div class="first-table">
                    <div class="btn-new">
                        <a class="btn-create {xuly.them}"><i class="fa-solid fa-plus"></i> Tạo mới</a>
                    </div>
                        <form class="form-search-table" action="" method="post">
                            <input class="input" type="text" name="name_taixe" placeholder="Loại xe">
                      
                      
                            <input class="input" type="text" name="hangbanglai" placeholder="Tài xế phụ trách">
                            <button>Refresh</button>
                            <button type="submit">Search</button>
                        </form>
                </div>
                <table>
                    <thead>
                        <tr  class="title-table">
                            <th>Loại xe</th>
                      
                            <th>Biển số xe</th>
                            <th>Tài xế phụ trách</th>
                          
                            <th>Active</th>
                            <th>Lựa chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!--BASIC detail-->
                        <tr>
                         
                            <td>{detail.loaixe}</td>
                          
                            <td>{detail.biensoxe}</td>
                           <td>{detail.name_taixe}</td>
                         
                            <td class="active"><a {detail.active}  onclick="return active_user('doixe','active','{detail.id_security}')"> <i class="fa-solid fa-circle "></i> </a></td>
                            <td class="select">
                                <a class="btn-update {xuly.sua}" onclick="return update_view('doixe','update-view',{detail.id_security})" data-id ="{detail.id_security}"> <i class="fa-solid fa-pen icon-edit"></i></a>
                                <a class ="{xuly.xoa}" onclick= "return _delete('doixe','delete','{detail.id_security}')"> <i class="fa-solid fa-trash icon-delete"></i></a>
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
            <form autocomplete="off" name="frmAddDoiXe" id="frmAddDoiXe" method="post" onsubmit = "return add('doixe','add','frmAddDoiXe',1)"  enctype="multipart/form-data">
                
        <table class="table-input">
         <tbody>
             <tr>
                 <td class="td-first">Loại xe</td>
                 <td><input type="text" name="loaixe"  placeholder="Loại xe"  required></td>
             </tr>
             <tr>
                <td class="td-first">Biển số xe</td>
                <td>  <input type="text" name="biensoxe"  placeholder="Biển số xe" required></td>
            </tr>
            <tr>
                <td class="td-first">Tài xế phụ trách</td>
                <td><input list="list_tx" name="list_tx" >
                        <datalist id="list_tx">
                        <!--BASIC list_tx-->
                            <option value="{list_tx.name_taixe} {list_tx.phone_taixe}"></option>
                        <!--BASIC list_tx-->
                        </datalist></td>
            </tr>
         </tbody>
         </table>
                <div class="btn-submit">
                  
                    <button type="submit" class="submit">Thêm</button>
                      <button type="reset" class="cancel">Đóng</button>
                </div>
            </form>
        </div>
</div>

<div class="popup-update">    
</div>

