self.addEventListener('push', e => {    // プッシュ通知された時

    let json = e.data.json();
    let title = json.title;
    console.log(json);
    const options = {
        body: json.body,
        data: {
            url: json.data.url,
        }
    };
    e.waitUntil(
        self.registration.showNotification(title, options)
    );

});
self.addEventListener('notificationclick', e => {   // 通知がクリックされた時

    let data = e.notification.data;
    e.waitUntil(
        clients.openWindow(data.url)
    );

});