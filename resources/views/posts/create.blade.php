<x-app-layout>
    @vite(['resources/css/app.css','resources/js/app.js'])
    
<x-slot name="slot"><div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="mt-5 p-4 relative z-10 bg-white border rounded-xl sm:mt-10 md:p-10">
    
    <div class="text-center">
    <h1>今日は何をしますか</h1>
    <form action="/posts" method="POST">
            @csrf
            <div class="title">
                <div class="mb-4 sm:mb-8">
                    <label for="hs-feedback-post-comment-name-1" class="block mb-2 text-sm font-medium">タスクタイトル</label>
                        <input type="text"name="post[title]" d="hs-feedback-post-comment-name-1" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 sm:p-4" placeholder="飛び込むこと"><value="{{ old('post.title') }}"/>
                            <p class='title__error' style='color:red'> {{ $errors->first('post.title') }}</p>
                </div>
            </div>
    
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                <div class="category">
                    <div class="mb-4 sm:mb-8">
                        <label for="hs-feedback-post-comment-name-1" class="block mb-2 text-sm font-medium">タスク種類</label>
                            <select name="post[category_id]" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 sm:p-4">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                    </div>
                </div>
                <div class="limit">
                    <label for="hs-feedback-post-comment-name-1" class="block mb-2 text-sm font-medium">目安</label>
                            <input type="text"name="post[limit]" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 sm:p-4" placeholder="時期や状況でもいいいです"><value="{{ old('post.limit') }}"/>
                                <p class='limit__error' style='color:red'> {{ $errors->first('post.limit') }}</p>
                    </div>
            </div>
            <div class="body">
                <div class="mb-4 sm:mb-8">
                    <label for="hs-feedback-post-comment-name-1" class="block mb-2 text-sm font-medium">タスク詳細</label>
                      <textarea name="post[body]"  id="hs-feedback-post-comment-textarea-1" name="hs-feedback-post-comment-textarea-1" rows="3" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 sm:p-4" placeholder="具体的な検討内容、心情でもいいです">{{ old('post.body') }}</textarea>
                        <p class='body__error' style='color:red'> {{ $errors->first('post.body') }}</p>
                </div>
            </div>
        </div>    
          <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-gray-900 text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all">
            <input type="submit" value="保存"/>
            </button>
                 <div id="app">
                    <div v-if="processing">処理中...</div>
                    <div v-else>
                          <button type="button" @click="subscribe" v-if="!isSubscribed">通知を登録</button>
                        　<button type="button" @click="unsubscribe" v-else>通知を解除</button>
                    </div>
                <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
                <script>
                    new Vue({
                        el: '#app',
                        data: {
                            vapidPublicKey: '{{ config('webpush.vapid.public_key') }}',
                            registration: null,
                            isSubscribed: false,
                            processing: false,
                            csrfToken: '{{ csrf_token() }}'
                        },
                        methods: {
                            subscribe() {   // プッシュ通知を許可する
            
                                this.processing = true;
                                const applicationServerKey = this.base64toUint8(this.vapidPublicKey);
                                const options = {
                                    userVisibleOnly: true,
                                    applicationServerKey: applicationServerKey
                                };
                                this.registration.pushManager.subscribe(options)
                                    .then(subscription => {
            
                                        // Laravel側へデータを送信
                                        fetch('/web_push', {
                                            method: 'POST',
                                            body: JSON.stringify(subscription),
                                            headers: {
                                                'Accept': 'application/json',
                                                'Content-Type': 'application/json',
                                                'X-CSRF-Token': this.csrfToken
                                            }
                                        })
                                        .then(response => {
            
                                            this.isSubscribed = true;
                                            alert('プッシュ通知が登録されました');
            
                                        })
                                        .catch(error => {
            
                                            console.log(error);
            
                                        });
            
                                    })
                                    .finally(() => {
            
                                        this.processing = false;
            
                                    });
            
                            },
                            unsubscribe() { // プッシュ通知を解除する
            
                                this.processing = true;
                                this.registration.pushManager.getSubscription()
                                    .then(subscription => {
                                        subscription.unsubscribe()
                                            .then(result => {
            
                                                if(result) {
            
                                                    this.isSubscribed = false;
                                                    alert('プッシュ通知が解除されました');
            
                                                }
            
                                            });
                                    })
                                    .finally(() => {
            
                                        this.processing = false;
            
                                    });
            
                            },
                            base64toUint8(str) {
            
                                str += '='.repeat((4 - str.length % 4) % 4);
                                const base64 = str
                                    .replace(new RegExp('\-', 'g'), '+')
                                    .replace(new RegExp('_', 'g'), '/');
            
                                const binary = window.atob(base64);
                                const binaryLength = binary.length;
                                let uint8Array = new Uint8Array(binaryLength);
            
                                for(let i = 0; i < binaryLength; i++) {
            
                                    uint8Array[i] = binary.charCodeAt(i);
            
                                }
            
                                return uint8Array.buffer;
                            }
                        },
                        mounted() {
            
                            if('serviceWorker' in navigator && 'PushManager' in window) {
            
                                // Service Workerをブラウザにインストールする
                                navigator.serviceWorker.register('/sw.js')
                                    .then(registration => {
            
                                        console.log('Service Worker が登録されました。');
                                        this.registration = registration;
                                        this.registration.pushManager.getSubscription()
                                            .then(subscription => {
            
                                                this.isSubscribed = !(subscription === null);
            
                                            });
            
                                    });
            
                            } else {
            
                                console.log('このブラウザは、プッシュ通知をサポートしていません。');
            
                            }
            
                        }
                    });
                </script>
                </div>
                <div class="footer">
                  <a href="/">キャンセル</a>
                </div>
           </form>
  </x-slot>
</x-app-layout>
