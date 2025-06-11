//asignar un nombre y versión al cache
const CACHE_NAME = 'v1_cache_panel',
  urlsToCache = [
    'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700',
    './Assets/vendor/nucleo/css/nucleo.css',
    './Assets/vendor/@fortawesome/fontawesome-free/css/all.min.css',
    './Assets/css/argon.css?v=1.2.0',
    './Assets/vendor/jquery/dist/jquery.min.js',
    './Assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js',
    './Assets/vendor/js-cookie/js.cookie.js',
    './Assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js',
    './Assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js',
    './Assets/js/argon.js?v=1.2.0',
    './Assets/js/plugins/pace.min.js',
    './Assets/js/plugins/sweetalert.min.js',
    'https://unpkg.com/sweetalert/dist/sweetalert.min.js',
    './Assets/img/icons/icon_5000.png',
    './Assets/img/icons/icon_4000.png',
    './Assets/img/icons/icon_3000.png',
    './Assets/img/icons/icon_2000.png',
    './Assets/img/icons/icon_1000.png',
    './Assets/img/icons/icon_500.png',
    './Assets/img/brand/loading.svg',
    './Assets/img/brand/logo-adn-azul.png',
    './Assets/img/brand/logo-adn-blanco.png',
    './Assets/img/brand/logo.png',
    './Assets/img/brand/logoadn.ico',
    './img/favicon.png'
  ]

//durante la fase de instalación, generalmente se almacena en caché los activos estáticos
self.addEventListener('install', e => {
  e.waitUntil(
    caches.open(CACHE_NAME)
      .then(cache => {
        return cache.addAll(urlsToCache)
          .then(() => self.skipWaiting())
      })
      .catch(err => console.log('Falló registro de cache', err))
  )
})

//una vez que se instala el SW, se activa y busca los recursos para hacer que funcione sin conexión
self.addEventListener('activate', e => {
  const cacheWhitelist = [CACHE_NAME]

  e.waitUntil(
    caches.keys()
      .then(cacheNames => {
        return Promise.all(
          cacheNames.map(cacheName => {
            //Eliminamos lo que ya no se necesita en cache
            if (cacheWhitelist.indexOf(cacheName) === -1) {
              return caches.delete(cacheName)
            }
          })
        )
      })
      // Le indica al SW activar el cache actual
      .then(() => self.clients.claim())
  )
})

//cuando el navegador recupera una url
self.addEventListener('fetch', e => {
  //Responder ya sea con el objeto en caché o continuar y buscar la url real
  e.respondWith(
    caches.match(e.request)
      .then(res => {
        if (res) {
          //recuperar del cache
          return res
        }
        //recuperar de la petición a la url
        return fetch(e.request)
      })
  )
})