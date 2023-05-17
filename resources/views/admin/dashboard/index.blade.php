@extends('admin.layouts.index')

@section('title', 'Thống kê')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Thống kê</h1>

<!-- Content Row -->
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Body -->
            <div class="card-body">
                <form action="{{ route('filter.dashboard') }}" method="GET" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="start_date">Ngày bắt đầu: <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ date('Y-m-d', strtotime($start_date)) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="end_date">Ngày kết thúc: <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ date('Y-m-d', strtotime($end_date)) }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" onclick="return validateReportDate()">Lọc</button>
                    </div>
                </form>
                <div class="col-lg-12" style="margin-top:1rem;">
                    <h5 class="mb-2">Lượt xem của truyện</h5>
                    <div id="viewColumnChart" style="width: 100%;"></div>
                </div>
                <div class="col-lg-12" style="margin-top:1rem;">
                    <h5 class="mb-2">Lượt theo dõi của tác giả</h5>
                    <div id="followColumnChart" style="width: 100%;"></div>
                </div>
                <div class="col-lg-12" style="margin-top:1rem;">
                    <h5 class="mb-2">Lượt truy cập của người dùng vào website</h5>
                    <div id="trafficColumnChart" style="width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <input type="hidden" id="view" value="{{ json_encode($viewData) }}" />
    <input type="hidden" id="follow" value="{{ json_encode($followData) }}" />
    <input type="hidden" id="traffic" value="{{ json_encode($traffics) }}" />
    <input type="hidden" id="start_date" value="{{ $start_date }}" />
    <input type="hidden" id="end_date" value="{{ $end_date }}" />
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        var startDate = document.getElementById('start_date').value;
        var endDate = document.getElementById('end_date').value;
        var arr = [['Truyện', 'Lượt xem', { role: "style" }]];
        var viewData = JSON.parse(document.getElementById("view").value);
        if (viewData.length < 1) {
            arr.push(['', 0, '#3366CC']);
        }
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        for(x of viewData){
            arr.push([x.story, parseInt(x.view), '#3366CC'])
        }  
        function drawChart() {

            var data = google.visualization.arrayToDataTable(
                arr
            );

            var options = {
                title: `Thống kê lượt xem của truyện từ ngày ${startDate} đến ngày ${endDate}`,
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('viewColumnChart'));

            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript">
        var arr1 = [['Tác giả', 'Lượt theo dõi', { role: "style" }]];
        var followData = JSON.parse(document.getElementById("follow").value);
        if (followData.length < 1) {
            arr1.push(['', 0, '#3366CC']);
        }
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        for(x of followData){
            arr1.push([x.author, parseInt(x.follow), '#3366CC'])
        }  
        function drawChart() {

            var data = google.visualization.arrayToDataTable(
                arr1
            );

            var options = {
                title: `Thống kê lượt theo dõi của tác giả từ ngày ${startDate} đến ngày ${endDate}`,
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('followColumnChart'));

            chart.draw(data, options);
        }
    </script>
        <script type="text/javascript">
            var arr2 = [['Ngày', 'Lượt truy cập', { role: "style" }]];
            var followData = JSON.parse(document.getElementById("traffic").value);
            if (followData.length < 1) {
                arr2.push(['', 0, '#3366CC']);
            }
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            for(x of followData){
                arr2.push([x.date, parseInt(x.count_traffic), '#3366CC'])
            }  
            function drawChart() {
    
                var data = google.visualization.arrayToDataTable(
                    arr2
                );
    
                var options = {
                    title: `Thống kê lượt truy cập của người dùng từ ngày ${startDate} đến ngày ${endDate}`,
                };
    
                var chart = new google.visualization.ColumnChart(document.getElementById('trafficColumnChart'));
    
                chart.draw(data, options);
            }
        </script>
    <script>
        function validateReportDate()
        {
            var start_date = $('#start_date').val();
            var end_date = $('#end_date').val();
            var date = new Date();
            var month = '' + (date.getMonth() + 1);
            var day = '' + date.getDate();
            var year = date.getFullYear();
            if (month.length < 2) {
                month = '0' + month;
            }
            if (day.length < 2) {
                day = '0' + day;
            }
            var today_date = [year, month, day].join('-');
            if (start_date > end_date) {
                alert('Ngày bắt đầu phải nhỏ hơn ngày kết thúc');
                return false;
            }
        }
    </script>
@endsection
