<x-app-layout>
<x-slot name="header">
<!--<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">-->
@vite(['resources/css/app.css','resources/js/app.js'])
</x-slot>

<x-slot name="slot">
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
                   <!-- グラフを描画ここまで -->
                   
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
            <div>
            <div class="w-full text-white bg-indigo-700 rounded-xl">
                <div class="text-center">
                    <p class="ttl">YOURTASK</p>
                        </div>
                            </div>
                    <div class='posts'>
                        <ul>
                            @foreach ($posts as $post)
                            <div class='post'>
                                <a href= "/posts/{{ $post->id }}"><h2 class='title'>{{ $post->title }}</h2></a>
                                    <p class='body'>{{ $post->body }}</p>
                                        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                                            <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                                             <p class='limit'>{{ $post->limit }}<p>
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="deletePost({{ $post->id }})">削除</button> 
                                        </form>
                            </div>
                            @endforeach
                        </ul>
                    </div>
            </div>
            
            <div>
                <div class="w-full text-white bg-indigo-700 rounded-xl">
                         <div class="text-center"><p class="ttl">COMPLETE!</p></div>
                          <ul>
                              <!-- ここに完了リストを追加する -->
                          </ul>
                </div>
            </div>
        </div>
                    <script>
                        function deletePost(id) {
                        'use strict'
                        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                        document.getElementById(`form_${id}`).submit();
                                }
                            }
                    </script>
                          
            <div class="text-center items-center">
                <div class='paginate'>
                    <div class=" inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                        <div class="font-semibold">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>
</x-app-layout>