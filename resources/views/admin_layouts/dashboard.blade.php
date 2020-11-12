@extends('admin_layouts.main')
@section('page_css')
@endsection
@section('main_content')
<!-- BEGINNING OF CARDS -->
<div class="row row-stat">
    <div class="col-md-4">
        <div class="panel panel-success-alt noborder">
            <div class="panel-heading noborder">
                <div class="panel-btns">
                    <a href="#" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
                </div><!-- panel-btns -->
                <div class="panel-icon"><i class="fa fa-users"></i></div>
                <div class="media-body">
                    <h5 class="md-title nomargin">Total Number Of Patients</h5>
                    <h1 class="mt5">{{$count_patients}}</h1>
                </div><!-- media-body -->
                <hr>
                <div class="clearfix mt20">
                    
                </div>
                
            </div><!-- panel-body -->
        </div><!-- panel -->
    </div><!-- col-md-4 -->
    
    <div class="col-md-4">
        <div class="panel panel-primary noborder">
            <div class="panel-heading noborder">
                <div class="panel-btns">
                    <a href="#" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
                </div><!-- panel-btns -->
                <div class="panel-icon"><i class="fa fa-users"></i></div>
                <div class="media-body">
                    <h5 class="md-title nomargin">Total Visits</h5>
                    <h1 class="mt5">{{ $count_visits }}</h1>
                </div><!-- media-body -->
                <hr>
                <div class="clearfix mt20">
                    
                </div>
                
            </div><!-- panel-body -->
        </div><!-- panel -->
    </div><!-- col-md-4 -->
    
    <div class="col-md-4">
        <div class="panel panel-dark noborder">
            <div class="panel-heading noborder">
                <div class="panel-btns">
                    <a href="#" class="panel-close tooltips" data-toggle="tooltip" data-placement="left" title="Close Panel"><i class="fa fa-times"></i></a>
                </div><!-- panel-btns -->
                <div class="panel-icon"><i class="fa fa-pencil"></i></div>
                <div class="media-body">
                    <h5 class="md-title nomargin">Total Appointments</h5>
                    <h1 class="mt5">{{ $count_visits }}</h1>
                </div><!-- media-body -->
                <hr>
                <div class="clearfix mt20">
                    
                </div>
                
            </div><!-- panel-body -->
        </div><!-- panel -->
    </div><!-- col-md-4 -->
</div>
<!-- END OF CARDS -->

<!-- BEGINNING OF GRAPHS-->
<div class="row">
        <div class="col-md-6 mb30">
            <h5 class="lg-title mb10">Bar Chart</h5>
            <p class="mb15">This chart represents the number of Patients versus their age</p>
            <div id="" class="flotGraph">
            <canvas id="barchart"  ></canvas>
            </div>
        </div><!-- col-md-6 -->
        <div class="col-md-6 mb30">
            <h5 class="lg-title mb10">Pie Chart</h5>
            <p class="mb15">Number of patients </p>
            <div id="piechart" class="flotGraph"></div>
        </div><!-- col-md-6 -->
    </div><!-- row -->
</div>
<!-- END OF GRAPHS -->
@endsection
@section('page_js')
<script>
    function renderBarGraph(data, labels) {
    var ctx = document.getElementById("barchart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'AGE',
                data: data,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 1,
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true                        
                    }
                }]
            },
            title: {
                display: true,
                text: " Age against Patients"
            },
        }
    });
}



function getBarGraph() {   

    $.ajax({
        url: '/get-graphs',
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        dataType: 'json',
        success: function (res) {

           // console.log(data);
            var data = [];
            var labels = [];

            for (var i in res) {
                data.push(res[i].age);
                labels.push(res[i].first_name);

            }

            renderBarGraph(data, labels);
        },
        error: function (data) {

            console.log(data);
        }
    });
}
$(document).ready(function(){
    getBarGraph();
});
// $("#renderBtn").click(
//     function () {
//         getChartData();
//     }
// );

function renderPieChart(data, labels) {
    var ctx = document.getElementById("piechart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                label: 'ordenes',
                data: data,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 1,
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true                        
                    }
                }]
            },
            title: {
                display: true,
                text: " Age against Patients"
            },
        }
    });
}
function getPieChart() {   

$.ajax({
    url: '/get-piechart',
    type: 'GET',
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
    dataType: 'json',
    success: function (res) {

       // console.log(data);
        var data = [];
        var labels = [];

        for (var i in res) {
            data.push(res[i].age);
            labels.push(res[i].first_name);

        }

        renderPieChart(data, labels);
    },
    error: function (data) {

        console.log(data);
    }
});
}
$(document).ready(function(){
getPieChart();
});

</script>
@endsection
