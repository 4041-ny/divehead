<x-app-layout>
  <table>
    <tr>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
            <!-- グラフ描画エリア -->
            @foreach($completion as $c)
            <div style="width:100%">
               <canvas id="myBarChart{{ $c }}"></canvas>
            </div>
            @endforeach
            <!-- グラフ更新ボタン -->
            <button type="button" id="btn">グラフを更新</button>
            
            <script>
            var chartVal = []; // グラフデータ（描画するデータ）
            
            // ページ読み込み時にグラフを描画
            getRandom(); // グラフデータにランダムな値を格納
            drawChart(); // グラフ描画処理を呼び出す
            
            
            // ボタンをクリックしたら、グラフを再描画
            document.getElementById('btn').onclick = function() {
              // すでにグラフ（インスタンス）が生成されている場合は、グラフを破棄する
              if (myChart) {
                myChart.destroy();
              }
            
              getRandom(); // グラフデータにランダムな値を格納
              drawChart(); // グラフを再描画
            }
            
            
            // グラフデータをランダムに生成
            function getRandom() {
              chartVal = []; // 配列を初期化
              var length = 12;
              for (i = 0; i < length; i++) {
                chartVal.push(Math.floor(Math.random() * 20));
                 
              }
            }
            
            
            // グラフ描画処理
            function drawChart() {
              var ctx = document.getElementById('canvas').getContext('2d');
              window.myChart = new Chart(ctx, { // インスタンスをグローバル変数で生成
                type: 'bar',
                data: { // ラベルとデータセット
                  labels: ['月曜日','火曜日','水曜日','木曜日','金曜日','土曜日','日曜日',],
                  datasets: [{
                      data: chartVal, // グラフデータ
                      backgroundColor: 'rgb(0, 134, 197, 0.7)', // 棒の塗りつぶし色
                      borderColor: 'rgba(0, 134, 197, 1)', // 棒の枠線の色
                      borderWidth: 1, // 枠線の太さ
                  }],
                },
                options: {
                  legend: {
                    display: false, // 凡例を非表示
                  }
                }
              });
            }
            </script>
            
</x-app-layout>