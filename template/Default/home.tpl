

        
        <div class="page">
            <div class="container">
                <div class="title">
                    <h3>Dashboard</h3>
                    <div class="title-link">
                        <a href="">
                            <p class="active">Dashboard</p>
                        </a>

                        <a >
                            <i class="fa-solid fa-angle-right"></i>
                            <p> Dashboard</p>
                        </a>
                    </div>
                </div>
               <div class="row">
                    <div class="card">
                        <div class="box">
                            <h1>{total.nhansu}</h1>
                            <h6>Nhân sự</h6>
                        </div>
                    </div>
                    <div class="card">
                        <div class="box">
                            <h1>{total.doixe}</h1>
                            <h6>Tổng số xe</h6>
                        </div>
                    </div>
                    <div class="card">
                        <div class="box">
                            <h1>{total.taixe}</h1>
                            <h6>Tổng số tài xế</h6>
                        </div>
                    </div>
                    <div class="card card4">
                        <div class="box">
                            <h1>{total.donhang}</h1>
                            <h6>Tổng số đơn hàng</h6>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="content">
                        <div class="dothi">
                            <div>
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                        <div class="active-menber">
                            <h2>Hoạt động gần đây</h2>
                            <ul>
                            <!--BASIC nhansu-->
                                <li>
                                    <img src="images/infomation.jpg" alt="infomation">
                                    <div class="info-user">
                                        <h5>{nhansu.name} </h5> <span>({nhansu.position})</span><br>
                                        <span><i class="fa-solid fa-circle online"></i> Đang hoạt động</span>
                                    </div>

                                </li>
                                <!--BASIC nhansu-->
                                
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    
