var staticCacheName = "pwa-v" + new Date().getTime();
var filesToCache = [
    // '/',
    '/offline',
    // '/compiled/css/index.css',
    // '/compiled/css/learn-more.css',
    // '/compiled/css/sweetalert2.min.css',
    // '/compiled/js/index.js',
    // '/compiled/js/jquery.min.js',
    // '/compiled/js/pagination.js',
    // '/compiled/js/sweetalert2.min.js',
    '/web/images/pwa/icons/icon72.png',
    '/web/images/pwa/icons/icon96.png',
    '/web/images/pwa/icons/icon128.png',
    '/web/images/pwa/icons/icon144.png',
    '/web/images/pwa/icons/icon150.png',
    '/web/images/pwa/icons/icon192.png',
    '/web/images/pwa/icons/icon256.png',
    '/web/images/pwa/icons/icon512.png',
];

// Cache on install
self.addEventListener("install", event => {
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                return cache.addAll(filesToCache);
            })
    )
});

// Clear cache on activate
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("pwa-")))
                    .filter(cacheName => (cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

// Serve from Cache
self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                return response || fetch(event.request);
            })
            .catch(() => {
                return caches.match('offline');
            })
    )
});
