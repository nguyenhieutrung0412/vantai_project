
    <div class="page">
    <div class="container">
     <div class="back">
                <a onclick="return back_prev();"><i class="fa-solid fa-arrow-left"></i> Back</a>
            </div>
        <div class="thongbao">
            <h3>THÔNG BÁO</h3>
            <strong>Chủ đề: </strong><p>{notification.title}</p>
            <strong>Nội dung: </strong>
            <div class="content"><p>{notification.content}</p></div>
            <strong>Tệp đính kèm: </strong>
            <table>  
                <tbody>
                   {notification.file}
                </tbody>
            </table>
        </div>
    </div>
    </div>
