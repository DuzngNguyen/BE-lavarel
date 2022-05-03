import Chart from 'chart.js/dist/chart.min';
import Helper from "../common/_function_helper";
import Highcharts from 'highcharts';
import Exporting from 'highcharts/modules/exporting';

var Dashboard = {
    init : function ()
    {
        this.load()
        this.changeStatus()
        this.changeMonth()
    },
    changeMonth()
    {
        let _this = this
        $(".js-change-month").change( function (event){
            let $this = $(this)
            let month = $this.val()
            let status = $('.js-change-status').find(":selected").val();

            $.ajax({
                url : URL_GET_CHAR_REVENUE,
                method : "GET",
                async : false,
                beforeSend: function (xhr) {
                    Helper.showLoading()
                },
                data : {
                    status : status,
                    month : month
                },
                success : function(results)
                {
                    let dataArrTransactionMonth = results.arrRevenueTransactionsMonth;
                    let dataTransaction  =  JSON.parse(dataArrTransactionMonth);

                    let listday = results.listDay;
                    let listDayParse = JSON.parse(listday);
                    _this.appendDataChartTransactions(listDayParse, dataTransaction)
                }
            });
        })
    },
    changeStatus()
    {
        let _this = this
        $(".js-change-status").change( function (event){
            let $this = $(this)
            let status = $this.val()
            let month = $('.js-change-month').find(":selected").val();
            $.ajax({
                url : URL_GET_CHAR_REVENUE,
                method : "GET",
                async : false,
                beforeSend: function (xhr) {
                    Helper.showLoading()
                },
                data : {
                    status : status,
                    month : month
                },
                success : function(results)
                {
                    let dataArrTransactionMonth = results.arrRevenueTransactionsMonth;
                    let dataTransaction  =  JSON.parse(dataArrTransactionMonth);

                    let listday = results.listDay;
                    let listDayParse = JSON.parse(listday);
                    _this.appendDataChartTransactions(listDayParse, dataTransaction)
                }
            });
        })
    },

    load()
    {
        let _this = this
        $(window).on('load', function() {
            if (typeof URL_GET_CHAR_REVENUE !== "undefined")
            {
                $.ajax({
                    url : URL_GET_CHAR_REVENUE,
                    method : "GET",
                    async : false,
                    success : function(results)
                    {
                        console.log(results)
                        let dataArrTransactionMonth = results.arrRevenueTransactionsMonth;
                        let dataTransaction  =  JSON.parse(dataArrTransactionMonth);

                        let listday = results.listDay;
                        let listDayParse = JSON.parse(listday);
                        let transactionsYears =  JSON.parse(results.transactionsYears);
                        console.log('----- transactionsYears: ', transactionsYears)
                        _this.appendDataChartTransactions(listDayParse, dataTransaction)
                        _this.appendDataChartTransactionByYears(transactionsYears);
                        let dataSale = JSON.parse(results.dataSale);
                        _this.loadSales(dataSale)
                        let dataMonth = JSON.parse(results.transactionMonth)
                        _this.loadMonth(dataMonth);
                    }
                });
            }
        });
    },

    appendDataChartTransactionByYears(transactionsYears)
    {
        // Create the chart
        Highcharts.chart('container-body-chart-year', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Doanh thu các năm'
            },
            subtitle: {
                text: 'Dữ liệu được cập nhật sau 10 - 20p'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                },
                point: {
                    valueSuffix: 'VNĐ'
                }
            },

            plotOptions: {
                series: {
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}: {point.y:.1f}%'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.price:.2f} VNĐ</b><br/>'
            },

            series: [
                {
                    name: "Năm",
                    colorByPoint: true,
                    data : transactionsYears
                }
            ],
        });
        $("#body-chart-year .loader").hide();
    },

    loadMonth(dataMonth)
    {
        Highcharts.chart('month-dashboard', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Doanh thu theo từng tháng'
            },
            subtitle: {
                text: 'Dữ liệu được cập nhật sau 10 - 20p'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Đơn vị tính VNĐ ( Triệu ) '
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.price:.1f} đ'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.price:.2f} VNĐ</b> Doanh số<br/>'
            },

            series: [
                {
                    name: "Sale Admin",
                    colorByPoint: true,
                    data: dataMonth
                }
            ],
        });
    },

    loadSales(dataSale)
    {
        // Create the chart
        Highcharts.chart('sale-dashboard', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Doanh thu theo từng nhân viên'
            },
            subtitle: {
                text: 'Dữ liệu được cập nhật sau 10 - 20p'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Đơn vị tính VNĐ ( Triệu ) '
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.price:.1f} đ'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.price:.2f} VNĐ</b> Doanh số<br/>'
            },

            series: [
                {
                    name: "Sale Admin",
                    colorByPoint: true,
                    data: dataSale
                }
            ],
        });
        $("#box-sale .loader").hide();
    },

    appendDataChartTransactions(days, moneyMonth)
    {
        $("#body-line-chart").html(`<canvas id="line-chart" width="400" height="100"></canvas>`);
        var lineChart = document.getElementById('line-chart');
        if(window.myChart !== undefined)
        {
            // window.myChart.destroy();
        }

        window.myChart = new Chart(lineChart, {
            type: 'line',
            height: 300,
            data: {
                labels: days,
                datasets: [
                    {
                        label: 'Doanh thu các ngày trong tháng',
                        data: moneyMonth,
                        backgroundColor: 'rgba(0, 128, 128, 0.3)',
                        borderColor: 'rgba(0, 128, 128, 0.7)',
                        borderWidth: 1
                    },
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true,
                            userCallback: function(value, index, values) {
                                value = value.toString();
                                value = value.split(/(?=(?:...)*$)/);
                                value = value.join('.');
                                return  value;
                            }
                        }
                    }]
                },
            }
        });
        Helper.hideLoading()
    }
}

export default Dashboard
