
    <div class="page">
        <div class="container">
            <div class="title">
                <h3>Danh sách lương - {name.name}</h3>
                <div class="title-link">
                    <a href="">
                        <p class="active">Dashboard</p>
                    </a>

                    <a >
                        <i class="fa-solid fa-angle-right"></i>
                        <p> Chi tiết lương</p>
                    </a>
                </div>
            </div>
            <div class="list_luongnhansu">
                <ul>
                <!--BASIC detail-->
                    <li> <i class="fa-regular fa-folder-open"></i> <a href="{detail.link}&thang={detail.thang}&nam={detail.nam}">  Tháng {detail.thang} - {detail.nam} </a></li>
                <!--BASIC detail-->
                   
                </ul>
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



