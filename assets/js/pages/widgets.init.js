function getChartColorsArray(e){if(null!==document.getElementById(e)){var a=document.getElementById(e).getAttribute("data-colors");if(a)return(a=JSON.parse(a)).map(function(e){var a=e.replace(" ","");if(-1===a.indexOf(",")){var t=getComputedStyle(document.documentElement).getPropertyValue(a);return t||a}var r=e.split(",");return 2!=r.length?a:"rgba("+getComputedStyle(document.documentElement).getPropertyValue(r[0])+","+r[1]+")"})}}var chartColumnStacked100Colors=getChartColorsArray("sales_figures");chartColumnStacked100Colors&&(options={series:[{name:"New users",data:[44,55,41,67,22,43,21,49,30,18,46,78,34,52]},{name:"Unique users",data:[13,23,20,8,13,27,33,12,10,18,22,5,10,14]}],dataLabels:{enabled:!1},chart:{type:"bar",height:400,stacked:!0,stackType:"100%",toolbar:{show:!1},borderRadius:30,animations:{enabled:!0,easing:"easeinout",speed:800,animateGradually:{enabled:!0,delay:150},dynamicAnimation:{enabled:!0,speed:350}}},stroke:{width:3,colors:["#fff"]},plotOptions:{bar:{borderRadius:6,columnWidth:"20%"}},responsive:[{breakpoint:850,options:{chart:{height:300},plotOptions:{bar:{columnWidth:"30%"}}}},{breakpoint:620,options:{series:[{data:[44,55,41,67,22,43,21,49,30]},{data:[13,23,20,8,13,27,33,12,10]}],plotOptions:{bar:{columnWidth:"40%"}}}},{breakpoint:480,options:{legend:{position:"bottom",offsetX:-10,offsetY:0}}},{breakpoint:350,options:{series:[{data:[44,55,41,67,22,43,21]},{data:[13,23,20,8,13,27,33]}],plotOptions:{bar:{columnWidth:"50%"}}}}],xaxis:{categories:["Jan","Feb","March","April","May","June","July","Aug","Sep","Oct","Nov","Dec"]},fill:{opacity:1},legend:{position:"top",offsetX:100,offsetY:0},colors:chartColumnStacked100Colors},(chart=new ApexCharts(document.querySelector("#sales_figures"),options)).render());var chartRadialbarMultipleColors=getChartColorsArray("support_requests");chartRadialbarMultipleColors&&(options={series:[55,67,83],chart:{height:202,type:"radialBar"},plotOptions:{radialBar:{dataLabels:{name:{fontSize:"22px"},value:{fontSize:"16px"},total:{show:!0,label:"Total",formatter:function(e){return 249}}}}},colors:chartRadialbarMultipleColors},(chart=new ApexCharts(document.querySelector("#support_requests"),options)).render());var chartRadarPolyradarColors=getChartColorsArray("products");chartRadarPolyradarColors&&(options={series:[{name:"Series 1",data:[48,100,40,68,56,80,92]}],chart:{height:400,type:"radar",toolbar:{show:!1}},dataLabels:{enabled:!1},plotOptions:{radar:{size:140,polygons:{strokeColor:"#e8e8e8",fill:{colors:["#f8f8f8","#fff"]}}}},colors:chartRadarPolyradarColors,markers:{size:7,colors:["#fff"],strokeColors:["#38c66c","#74788d","#fe5b5b","#4e7adf","#41c3a9","#ffd166","#343a40"],strokeWidth:5},tooltip:{y:{formatter:function(e){return e}}},xaxis:{categories:["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]},yaxis:{tickAmount:7,labels:{formatter:function(e,a){return a%2==0?e:""}}},responsive:[{breakpoint:420,options:{chart:{height:"300"},plotOptions:{radar:{size:110}}}}]},(chart=new ApexCharts(document.querySelector("#products"),options)).render());var chartGlobalSalesColors=getChartColorsArray("global_sales");chartGlobalSalesColors&&(options={series:[{name:"User A",data:[[16.4,5.4],[21.7,4],[25.4,3],[19,2],[10.9,1],[13.6,3.2],[10.9,7],[10.9,8.2],[16.4,4],[13.6,4.3],[13.6,12],[29.9,3],[10.9,5.2],[16.4,6.5],[10.9,8],[24.5,7.1],[10.9,7],[8.1,4.7]]},{name:"User B",data:[[6.4,5.4],[11.7,4],[15.4,3],[9,2],[10.9,11],[20.9,7],[12.9,8.2],[6.4,14],[11.6,12]]}],chart:{height:350,type:"scatter",animations:{enabled:!1},zoom:{enabled:!1},toolbar:{show:!1}},colors:chartGlobalSalesColors,xaxis:{tickAmount:10,min:0,max:40},yaxis:{tickAmount:7},markers:{size:20},fill:{type:"image",opacity:1,image:{src:["./assets/images/users/avatar-4.png","./assets/images/users/avatar-7.png"],width:40,height:40}},legend:{show:!1}},(chart=new ApexCharts(document.querySelector("#global_sales"),options)).render());var chartcoin1SparklineColors=getChartColorsArray("coin1_sparkline_charts");chartcoin1SparklineColors&&(options={series:[{data:[47,45,54,38,56,24,65,31,37,39,62,51,35,41,35,27,93,53,61,27,54,43,19,46]}],chart:{type:"area",height:40,sparkline:{enabled:!0}},stroke:{curve:"smooth"},yaxis:{min:0},colors:chartcoin1SparklineColors,tooltip:{enabled:!1}},(chart=new ApexCharts(document.querySelector("#coin1_sparkline_charts"),options)).render());var chartcoin2SparklineColors=getChartColorsArray("coin2_sparkline_charts");chartcoin2SparklineColors&&(options={series:[{data:[35,41,35,27,10,53,61,27,54,43,19,46,47,45,54,38,56,24,65,31,37,39,62,51]}],chart:{type:"area",height:40,sparkline:{enabled:!0}},stroke:{curve:"smooth"},yaxis:{min:0},colors:chartcoin2SparklineColors,tooltip:{enabled:!1}},(chart=new ApexCharts(document.querySelector("#coin2_sparkline_charts"),options)).render());var chartcoin3SparklineColors=getChartColorsArray("coin3_sparkline_charts");chartcoin3SparklineColors&&(options={series:[{data:[13,50,35,27,10,50,38,27,56,24,65,31,37,39,62,51,54,43,19,46,47,45,54,38]}],chart:{type:"area",height:40,sparkline:{enabled:!0}},stroke:{curve:"smooth"},yaxis:{min:0},colors:chartcoin3SparklineColors,tooltip:{enabled:!1}},(chart=new ApexCharts(document.querySelector("#coin3_sparkline_charts"),options)).render());var chartcoin4SparklineColors=getChartColorsArray("coin4_sparkline_charts");chartcoin4SparklineColors&&(options={series:[{data:[19,46,47,56,24,65,31,37,39,62,13,50,35,27,10,50,38,27,51,54,54,38,43,45]}],chart:{type:"area",height:40,sparkline:{enabled:!0}},stroke:{curve:"smooth"},yaxis:{min:0},colors:chartcoin4SparklineColors,tooltip:{enabled:!1}},(chart=new ApexCharts(document.querySelector("#coin4_sparkline_charts"),options)).render());var chartcoin5SparklineColors=getChartColorsArray("coin5_sparkline_charts");chartcoin5SparklineColors&&(options={series:[{data:[19,46,47,56,24,65,31,37,39,62,13,50,35,27,10,50,38,27,51,54,54,38,43,45]}],chart:{type:"area",height:40,sparkline:{enabled:!0}},stroke:{curve:"smooth"},yaxis:{min:0},colors:chartcoin5SparklineColors,tooltip:{enabled:!1}},(chart=new ApexCharts(document.querySelector("#coin5_sparkline_charts"),options)).render());var chartcoin6SparklineColors=getChartColorsArray("coin6_sparkline_charts");chartcoin6SparklineColors&&(options={series:[{data:[13,50,35,27,10,50,38,27,56,24,65,31,37,39,62,51,54,43,19,46,47,45,54,38]}],chart:{type:"area",height:40,sparkline:{enabled:!0}},stroke:{curve:"smooth"},yaxis:{min:0},colors:chartcoin6SparklineColors,tooltip:{enabled:!1}},(chart=new ApexCharts(document.querySelector("#coin6_sparkline_charts"),options)).render());var chartcoin7SparklineColors=getChartColorsArray("coin7_sparkline_charts");chartcoin7SparklineColors&&(options={series:[{data:[35,41,35,27,10,53,61,27,54,43,19,46,47,45,54,38,56,24,65,31,37,39,62,51]}],chart:{type:"area",height:40,sparkline:{enabled:!0}},stroke:{curve:"smooth"},yaxis:{min:0},colors:chartcoin7SparklineColors,tooltip:{enabled:!1}},(chart=new ApexCharts(document.querySelector("#coin7_sparkline_charts"),options)).render());var chartcoin8SparklineColors=getChartColorsArray("coin8_sparkline_charts");chartcoin8SparklineColors&&(options={series:[{data:[47,45,54,38,56,24,65,31,37,39,62,51,35,41,35,27,93,53,61,27,54,43,19,46]}],chart:{type:"area",height:40,sparkline:{enabled:!0}},stroke:{curve:"smooth"},yaxis:{min:0},colors:chartcoin8SparklineColors,tooltip:{enabled:!1}},(chart=new ApexCharts(document.querySelector("#coin8_sparkline_charts"),options)).render());var chartColumnDumbellColors=getChartColorsArray("user_traffic");chartColumnDumbellColors&&(options={series:[{data:[{x:"4am",y:[2800,4500]},{x:"5am",y:[3200,4100]},{x:"6am",y:[2950,7800]},{x:"7am",y:[3e3,4600]},{x:"8am",y:[3500,4100]},{x:"9am",y:[4500,6500]},{x:"10am",y:[4100,5600]}]}],chart:{height:400,type:"rangeBar",zoom:{enabled:!1}},plotOptions:{bar:{isDumbbell:!0,columnWidth:3,dumbbellColors:[chartColumnDumbellColors]}},legend:{show:!1},fill:{type:"gradient",gradient:{type:"vertical",gradientToColors:[chartColumnDumbellColors[1]],inverseColors:!0,stops:[0,100]}},grid:{xaxis:{lines:{show:!0}},yaxis:{lines:{show:!1}}},xaxis:{tickPlacement:"on"}},(chart=new ApexCharts(document.querySelector("#user_traffic"),options)).render());var chartStackedBarColors=getChartColorsArray("total_cov");function generateData(e,a,t){for(var r=0,o=[];r<a;){var s=Math.floor(750*Math.random())+1,n=Math.floor(Math.random()*(t.max-t.min+1))+t.min,i=Math.floor(61*Math.random())+15;o.push([s,n,i]),r++}return o}chartStackedBarColors&&(options={series:[{name:"Marine Sprite",data:[37,22,43,21]},{name:"Striking Calf",data:[52,13,43,32]},{name:"Tank Picture",data:[9,15,11,20]},{name:"Bucket Slope",data:[8,6,9,10]}],dataLabels:{enabled:!1},chart:{type:"bar",height:180,stacked:!0,toolbar:{show:!1}},plotOptions:{bar:{horizontal:!0,barHeight:"40%",borderRadius:4}},stroke:{width:2,colors:["#fff"]},xaxis:{categories:[2020,2021,2022,2023],labels:{formatter:function(e){return e+"K"}}},yaxis:{title:{text:void 0}},tooltip:{y:{formatter:function(e){return e+"K"}}},fill:{opacity:1},legend:{show:!1},colors:chartStackedBarColors},(chart=new ApexCharts(document.querySelector("#total_cov"),options)).render());var chartBubbleColors=getChartColorsArray("sales_dynamics");function generateHeatmapData(e,a){for(var t=0,r=[];t<e;){var o=(t+1).toString(),s=Math.floor(Math.random()*(a.max-a.min+1))+a.min;r.push({x:o,y:s}),t++}return r}chartBubbleColors&&(options={series:[{name:"Latest",data:generateData(new Date("11 Feb 2017 GMT").getTime(),20,{min:10,max:60})},{name:"New trends",data:generateData(new Date("11 Feb 2017 GMT").getTime(),20,{min:10,max:60})},{name:"Men",data:generateData(new Date("11 Feb 2017 GMT").getTime(),20,{min:10,max:60})},{name:"Women",data:generateData(new Date("11 Feb 2017 GMT").getTime(),20,{min:10,max:60})}],chart:{height:285,type:"bubble",toolbar:{show:!1}},dataLabels:{enabled:!1},fill:{type:"gradient"},xaxis:{tickAmount:12,type:"datetime",labels:{rotate:0}},yaxis:{max:70},theme:{palette:"palette2"},colors:chartBubbleColors},(chart=new ApexCharts(document.querySelector("#sales_dynamics"),options)).render());var data=[{name:"2000",data:generateHeatmapData(7,{min:0,max:90})},{name:"1600",data:generateHeatmapData(7,{min:0,max:90})},{name:"1200",data:generateHeatmapData(7,{min:0,max:90})},{name:"800",data:generateHeatmapData(7,{min:0,max:90})},{name:"400",data:generateHeatmapData(7,{min:0,max:90})},{name:"200",data:generateHeatmapData(7,{min:0,max:90})},{name:"100",data:generateHeatmapData(7,{min:0,max:90})}];data.reverse();var colors=["#f7cc53","#f1734f","#663f59","#6a6e94","#4e88b4","#00a7c6","#18d8d8","#a9d794","#46aF78","#a93f55","#8c5e58","#2176ff","#5fd0f3","#74788d","#51d28c"];colors.reverse();var chartHeatMapMultipleColors=getChartColorsArray("multiple_heatmap");chartHeatMapMultipleColors&&(options={series:data,chart:{height:242,type:"heatmap",toolbar:{show:!1}},dataLabels:{enabled:!1},colors:[chartHeatMapMultipleColors[0],chartHeatMapMultipleColors[1],chartHeatMapMultipleColors[2],chartHeatMapMultipleColors[3],chartHeatMapMultipleColors[4],chartHeatMapMultipleColors[5],chartHeatMapMultipleColors[6],chartHeatMapMultipleColors[7]],xaxis:{type:"category",categories:["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]},grid:{padding:{right:20}},stroke:{colors:[chartHeatMapMultipleColors[7]]}},(chart=new ApexCharts(document.querySelector("#multiple_heatmap"),options)).render());var chartTimelineMultiSeriesColors=getChartColorsArray("efficiency");chartTimelineMultiSeriesColors&&(options={series:[{name:"Pettern",data:[{x:"$100",y:[new Date("2023-03-05").getTime(),new Date("2023-03-08").getTime()]},{x:"$50",y:[new Date("2023-03-08").getTime(),new Date("2023-03-11").getTime()]},{x:"$10",y:[new Date("2023-03-11").getTime(),new Date("2023-03-16").getTime()]}]},{name:"Products",data:[{x:"$100",y:[new Date("2023-03-02").getTime(),new Date("2023-03-05").getTime()]},{x:"$50",y:[new Date("2023-03-06").getTime(),new Date("2023-03-09").getTime()]},{x:"$10",y:[new Date("2023-03-10").getTime(),new Date("2023-03-19").getTime()]}]}],chart:{height:300,type:"rangeBar",toolbar:{show:!1}},plotOptions:{bar:{horizontal:!0}},dataLabels:{enabled:!0,formatter:function(e){var a=moment(e[0]),t=moment(e[1]).diff(a,"days");return t+(1<t?" days":" day")}},fill:{type:"gradient",gradient:{shade:"light",type:"vertical",shadeIntensity:.25,gradientToColors:void 0,inverseColors:!0,opacityFrom:1,opacityTo:1,stops:[50,0,100,100]}},xaxis:{type:"datetime"},legend:{show:!1},colors:chartTimelineMultiSeriesColors},(chart=new ApexCharts(document.querySelector("#efficiency"),options)).render());var options,chart,chartNagetiveValuesColors=getChartColorsArray("monthly_states");chartNagetiveValuesColors&&(options={series:[{name:"Cash Flow",data:[1.45,5.42,-.42,-12.6,-18.1,-11.1,-6.09,3.88,13.07,5.8,8.1,-13.57,15.75,17.1,-27.03,-47.2,-43.3,-18.6,-48.6,-41.1,-39.6,-29.4]}],chart:{type:"bar",height:300,toolbar:{show:!1}},plotOptions:{bar:{colors:{ranges:[{from:-100,to:-46,color:chartNagetiveValuesColors[1]},{from:-45,to:0,color:chartNagetiveValuesColors[2]}]},columnWidth:"100%"}},dataLabels:{enabled:!1},colors:chartNagetiveValuesColors[0],yaxis:{labels:{formatter:function(e){return e.toFixed(0)+"k"}}},xaxis:{type:"datetime",categories:["2021-07-01","2021-08-01","2021-09-01","2021-10-01","2021-11-01","2022-01-01","2022-02-01","2022-03-01","2022-04-01","2022-05-01","2022-07-01","2022-08-01","2022-09-01","2022-10-01","2022-11-01","2023-01-01","2023-02-01","2023-03-01","2023-04-01","2023-05-01","2023-07-01","2023-08-01","2023-09-01"],labels:{rotate:-90}}},(chart=new ApexCharts(document.querySelector("#monthly_states"),options)).render());