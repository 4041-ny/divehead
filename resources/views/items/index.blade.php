<x-app-layout>
  <table>
    <tr>
    <div class="text-right">
        <button type="button" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold text-blue-500 hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm">
            <a href="/posts/create">Let's dive</a>
        </button>
            </div>
                 <canvas id="myChart"></canvas>
                		<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
                        	<!-- グラフを描画 -->
                           <script>
                        	//ラベル
                        	var labels = [
                        		"2023年10月1日",
                        		"2023年10月2日",
                        		"2023年10月3日",
                        		"2023年10月4日",
                        		"2023年10月5日",
                        		"2023年10月6日",
                        	  "2023年10月7日",
                        	];
                        	//平均達成ログ
                        	var average_task_log = [
                        		3.0,	
                        		5.0,	
                        	    6.0,	
                        		7.0,    
                        		7.0,	
                        		8.0,	
                        		8.0
                        	];
                        	//最大達成ログ
                        	var max_task_log = [
                        		4.0,	
                        		8.0,
                        		9.0,	
                        		7.0,
                        		8.0,
                        		10.0,   
                        		9.0
                        	];
                        	//最小達成ログ
                        	var min_task_log = [
                        		1.0,	
                        		2.0,
                        		3.0,
                        		4.0,
                        		5.0,
                        	    6.0,
                        	    4.0
                        		                       	];
                        
                        	//グラフを描画
                           var ctx = document.getElementById("myChart");
                           var myChart = new Chart(ctx, {
                        		type: 'line',
                        		data : {
                        			labels: labels,
                        			datasets: [
                        				{
                        					label: '達成率',
                        					data: average_task_log,
                        					borderColor: "rgba(0,0,255,1)",
                                 			backgroundColor: "rgba(0,0,0,0)"
                        				},
                        				{
                        					label: '最大達成率',
                        					data: max_task_log,
                        					borderColor: "rgba(0,255,0,1)",
                                 			backgroundColor: "rgba(0,0,0,0)"
                        				},
                        				{
                        					label: '最小達成率',
                        					data: min_task_log,
                        					borderColor: "rgba(255,0,0,1)",
                                 			backgroundColor: "rgba(0,0,0,0)"
                        				}
                        			]
                        		},
                        		options: {
                        			title: {
                        				display: true,
                        				text: ' タスク達成ログ'
                        			}
                        		}
                           });
                           </script>
    
</x-app-layout>