<x-app-layout>
<!--<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">-->
@vite(['resources/css/app.css','resources/js/app.js'])
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.js"></script>
<script src="backend.js" charset="utf-8"></script>
<x-slot name="slot">
  <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="mt-5 p-4 relative z-10 bg-white  sm:mt-10 md:p-10">
    </div>
  </div>  
    <div class="mt-5 p-4 z-10 bg-gray border rounded-xl sm:mt-10 md:p-10">
           <div class="w-full text-white bg-gray-800  rounded-xl">
                    <div class="text-center text-2xl">
                        <p class="ttl">TASK MISSION</p>
                    </div>
                </div>
                  
          <div class="footer">
              <a href="/">タスクへ戻る</a>
          </div>
        </div>
    </div>
</x-slot>
</x-app-layout>


   