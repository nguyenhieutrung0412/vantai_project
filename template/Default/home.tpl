<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript" src="template/Default/js/chartjs.js"></script>
        
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
                    <a  href="/donhang">
                        <div class="box">
                            <h1>{total.donhangtrongoi}</h1>
                            <h6>Đơn hàng trọn gói</h6>
                        </div>
                        </a>
                    </div>
                    <div class="card">
                      <a  href="/donhangroi">
                        <div class="box">
                            <h1>{total.donhangroi}</h1>
                            <h6>Đơn hàng rời</h6>
                        </div>
                        </a>
                    </div>
                    <div class="card">
                      <a  href="/tai-xe">
                        <div class="box">
                            <h1>{total.taixe}</h1>
                            <h6>Tổng số tài xế</h6>
                        </div>
                           </a>
                    </div>
                    <div class="card card4">
                            <a  href="/doixe">
                        <div class="box">
                            <h1>{total.doixe}</h1>
                            <h6>Tổng số xe</h6>
                        </div>
                         </a>
                    </div>
                </div>
                <div class="row">
                    <div class="content">
                        <div class="dothi">
                            <div>
                                <canvas id="myChart_donhangtrongoi"></canvas>
                            </div>
                        </div>
                        <div class="dothi">
                            <div>
                                <canvas id="myChart_donhangroi"></canvas>
                            </div>
                        </div>
                      
                        
                
                    </div>

                </div>
                <div class="row">
                    <div class="content">
                        <div class="dothi">
                            <div>
                                <canvas id="myChart_phisuachua"></canvas>
                            </div>
                        </div>
                        <div class="dothi">
                            <div>
                                <canvas id="myChart_phidau"></canvas>
                            </div>
                        </div>
                      
                        
                      
                    </div>

                </div>
                <div class="row">
                    <div class="content">
                        <div class="dothi">
                            <div>
                                <canvas id="myChart_luongtaixe"></canvas>
                            </div>
                        </div>
                        
                      
                        
                      <div class="active-menber">
                            <h2>Danh sách khách hàng có đơn nhiều nhất tháng {thang_prev.thang_prev} </h2>
                            <ul>
                            <!--BASIC khachhang-->
                                <li>
                                    <img src="images/infomation.jpg" alt="infomation">
                                    <div class="info-user">
                                        <h5 >{khachhang.name_kh} </h5> <span class="color-0">(Tổng: {khachhang.tong_donhangthang} đơn)</span><br>
                                        <span>Đơn trọn gói: {khachhang.count_donhangtrongoi} - Đơn rời: {khachhang.count_donhangroi}</span>
                                    </div>

                                </li>
                                <!--BASIC khachhang-->
                                
                            </ul>
                        </div>
                     
                    </div>

                </div>
                <div class="row">
                    <div class="list">
                        <h2>Danh sách lịch xe từ ngày <span class="green">{ngay.ngayhientai}</span> đến ngày <span class="green">{ngay.ngaycongbay}</span></h2>
                          <div class="table">
             
                <table>
                    <thead>
                        <tr  class="title-table">
                            <th>STT</th>
                            <th>Mã VĐ</th>
                            <th>Loại VĐ</th>
                            <th>Tên tài xế</th>
                            <th>Biển số xe</th>
                        
                            <th>Ngày vận chuyển</th>
                           
                
                           
                           
                        </tr>
                    </thead>
                    <tbody>
                     <!--BASIC detail-->
                        <tr>
                            <td>{detail.stt}</td>
                            <td>{detail.id}</td>
                            <td>{detail.loai_don}</td>
                            <td>{detail.name_taixe}</td>
                            <td>{detail.biensoxe}</td>
                            <td class="color-0">{detail.thoigian_giaohang}</td>
                           
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
            </div>
        </div>
    <div class="popup-create">
        
</div>
