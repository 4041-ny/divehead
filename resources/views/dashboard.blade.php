<x-app-layout>
              <div class="mt-4">
                 <div class="w-full text-white bg-gray-800 rounded-full">
                          <div class="text-center text-2xl">
                              <p class="ttl">Today</p>
                          </div>
                          
                      </div>
                        </div>
                    <div class='posts'>
                            <ul>
                                @foreach ($posts as $post)
                                @csrf
                                <div class='post'>
                                    <div class="mx-auto max-w-lg border border-gray-800 rounded-xl text-center justify-between m-8">
                                      <ul class="space-y-4">
                                        <li class="flex gap-4">
                                          <div class="flex h-10 w-10 items-center justify-center rounded-full bg-primary-100 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                              <path stroke-linecap="round" stroke-linejoin="round" d="M21 10.5h.375c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125H21M3.75 18h15A2.25 2.25 0 0021 15.75v-6a2.25 2.25 0 00-2.25-2.25h-15A2.25 2.25 0 001.5 9.75v6A2.25 2.25 0 003.75 18z" />
                                            </svg>
                                          </div>
                                          <div class="flex-1">
                                            <a href= "/posts/{{ $post->id }}"><div class="text-xl font-medium leading-loose">{{ $post->title }}</h2></a>
                                          </div>
                                        </li>
                                        
                                        <li class="flex gap-4">
                                          <div class="flex h-10 w-10 items-center justify-center rounded-full bg-primary-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                              <path stroke-linecap="round" stroke-linejoin="round" d="M21 10.5h.375c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125H21M4.5 10.5h6.75V15H4.5v-4.5zM3.75 18h15A2.25 2.25 0 0021 15.75v-6a2.25 2.25 0 00-2.25-2.25h-15A2.25 2.25 0 001.5 9.75v6A2.25 2.25 0 003.75 18z" />
                                            </svg>
                                          </div>
                                          <div class="flex-1">
                                            <div class="text-xl font-medium leading-loose">{{ $post->body }}</div>
                                          </div>
                                        </li>
                                        
                                        <li class="flex gap-4">
                                          <div class="flex h-10 w-10 items-center justify-center rounded-full bg-primary-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                              <path stroke-linecap="round" stroke-linejoin="round" d="M21 10.5h.375c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125H21M4.5 10.5H18V15H4.5v-4.5zM3.75 18h15A2.25 2.25 0 0021 15.75v-6a2.25 2.25 0 00-2.25-2.25h-15A2.25 2.25 0 001.5 9.75v6A2.25 2.25 0 003.75 18z" />
                                            </svg>
                                          </div>
                                          <div class="flex-1">
                                            <div class="text-xl font-medium leading-loose">
                                            <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a></div>
                                          </div>
                                        </li>
                                      </ul>
                                    </div>
                                    <div>
                                      <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
                                    </div>
                                    <div class="m-8 flex items-center gap-4 before:h-px before:flex-1 before:bg-gray-300  before:content-[''] after:h-px after:flex-1 after:bg-gray-300  after:content-['']">Yesterday</div>
                                @endforeach
                            　</ul>
                            </div>
                        </div>
                    </div>
                    
                <div class="w-full text-white bg-gray-800 rounded-full">
                </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        {{ __("You're logged in!") }}
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
