$(document).ready(function() {

    $.ajax({
        type: "POST",
        url: "ajax/chart_doanhthu",
        data: {
            id: 1,
        },
        cache: false,
        dataType: "json",
        // beforeSend: function() {

        //     $('.div-beforeSuccess').addClass('pop-up_display');
        // },

        success: function(rs) {

            const labels = [
                'Tháng 1',
                'Tháng 2',
                'Tháng 3',
                'Tháng 4',
                'Tháng 5',
                'Tháng 6',
                'Tháng 7',
                'Tháng 8',
                'Tháng 9',
                'Tháng 10',
                'Tháng 11',
                'Tháng 12',

            ];
            //lấy data theo tháng  bằng ajax

            //end
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Doanh thu đơn hàng trọn gói',
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(255, 159, 64, 0.8)',
                        'rgba(255, 205, 86, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(153, 102, 255, 0.8)',
                        'rgba(201, 203, 207, 0.8)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],

                    data: rs['data'],

                }]

            };

            //console.log(rs['data']);


            const config = {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,

                        }
                    }
                }
            };

            const myChart = new Chart(
                document.getElementById('myChart_donhangtrongoi'),
                config
            );



        }
    });
    $.ajax({
        type: "POST",
        url: "ajax/chart_doanhthudonhangroi",
        data: {
            id: 1,
        },
        cache: false,
        dataType: "json",
        // beforeSend: function() {

        //     $('.div-beforeSuccess').addClass('pop-up_display');
        // },

        success: function(rs) {

            const labels = [
                'Tháng 1',
                'Tháng 2',
                'Tháng 3',
                'Tháng 4',
                'Tháng 5',
                'Tháng 6',
                'Tháng 7',
                'Tháng 8',
                'Tháng 9',
                'Tháng 10',
                'Tháng 11',
                'Tháng 12',

            ];
            //lấy data theo tháng  bằng ajax

            //end
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Doanh thu đơn hàng rời',
                    backgroundColor: [
                        'rgba(160 ,82, 45, 0.8)',
                        'rgba(255 ,228 ,181, 0.8)',
                        'rgba(238, 203, 173, 0.8)',
                        'rgba(122, 103 ,238, 0.8)',
                        'rgba(99, 184, 255, 0.8)',
                        'rgba(0, 255, 0, 0.8)',
                        'rgba(255, 106, 106, 0.8)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],

                    data: rs['data'],

                }]

            };

            //console.log(rs['data']);


            const config = {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,

                        }
                    }
                }
            };

            const myChart = new Chart(
                document.getElementById('myChart_donhangroi'),
                config
            );



        }
    });
    $.ajax({
        type: "POST",
        url: "ajax/chart_doanhthuphisuachua",
        data: {
            id: 1,
        },
        cache: false,
        dataType: "json",
        // beforeSend: function() {

        //     $('.div-beforeSuccess').addClass('pop-up_display');
        // },

        success: function(rs) {

            const labels = [
                'Tháng 1',
                'Tháng 2',
                'Tháng 3',
                'Tháng 4',
                'Tháng 5',
                'Tháng 6',
                'Tháng 7',
                'Tháng 8',
                'Tháng 9',
                'Tháng 10',
                'Tháng 11',
                'Tháng 12',

            ];
            //lấy data theo tháng  bằng ajax

            //end
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Phí sửa chữa',
                    backgroundColor: [
                        'rgba(255,0,0, 0.8)',
                        'rgba(255,0,255, 0.8)',
                        'rgba(0,255,0, 0.8)',
                        'rgba(255,255,0, 0.8)',
                        'rgba(201, 203, 207, 0.8)',
                        'rgba(0,0,128, 0.8)',

                        'rgba(54, 162, 235, 0.8)',
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],

                    data: rs['data'],

                }]

            };

            //console.log(rs['data']);


            const config = {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,

                        }
                    }
                }
            };

            const myChart = new Chart(
                document.getElementById('myChart_phisuachua'),
                config
            );



        }
    });
    $.ajax({
        type: "POST",
        url: "ajax/chart_doanhthuphidau",
        data: {
            id: 1,
        },
        cache: false,
        dataType: "json",
        // beforeSend: function() {

        //     $('.div-beforeSuccess').addClass('pop-up_display');
        // },

        success: function(rs) {

            const labels = [
                'Tháng 1',
                'Tháng 2',
                'Tháng 3',
                'Tháng 4',
                'Tháng 5',
                'Tháng 6',
                'Tháng 7',
                'Tháng 8',
                'Tháng 9',
                'Tháng 10',
                'Tháng 11',
                'Tháng 12',

            ];
            //lấy data theo tháng  bằng ajax

            //end
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Phí nhiên liệu',
                    backgroundColor: [

                        'rgba(201, 203, 207, 0.8)',
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(255, 159, 64, 0.8)',
                        'rgba(255, 205, 86, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(153, 102, 255, 0.8)',





                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],

                    data: rs['data'],

                }]

            };

            //console.log(rs['data']);


            const config = {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,

                        }
                    }
                }
            };

            const myChart = new Chart(
                document.getElementById('myChart_phidau'),
                config
            );



        }
    });
    $.ajax({
        type: "POST",
        url: "ajax/chart_luongtaixe",
        data: {
            id: 1,
        },
        cache: false,
        dataType: "json",
        // beforeSend: function() {

        //     $('.div-beforeSuccess').addClass('pop-up_display');
        // },

        success: function(rs) {

            const labels = [
                'Tháng 1',
                'Tháng 2',
                'Tháng 3',
                'Tháng 4',
                'Tháng 5',
                'Tháng 6',
                'Tháng 7',
                'Tháng 8',
                'Tháng 9',
                'Tháng 10',
                'Tháng 11',
                'Tháng 12',

            ];
            //lấy data theo tháng  bằng ajax

            //end
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Lương tài xế',
                    backgroundColor: [

                        'rgba(255, 110, 180, 0.8)',
                        'rgba(224 ,102, 255, 0.8)',
                        'rgba(199 ,21, 133, 0.8)',
                        'rgba(0 ,128, 128, 0.8)',
                        'rgba(255, 204, 153, 0.8)',
                        'rgba(255, 211, 155, 0.8)',
                        'rgba(255, 159, 64, 0.8)',





                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],

                    data: rs['data'],

                }]

            };

            //console.log(rs['data']);


            const config = {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,

                        }
                    }
                }
            };

            const myChart = new Chart(
                document.getElementById('myChart_luongtaixe'),
                config
            );



        }
    });


});