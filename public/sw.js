/**
 * Welcome to your Workbox-powered service worker!
 *
 * You'll need to register this file in your web app and you should
 * disable HTTP caching for this file too.
 * See https://goo.gl/nhQhGp
 *
 * The rest of the code is auto-generated. Please don't update this file
 * directly; instead, make changes to your Workbox build configuration
 * and re-run your build process.
 * See https://goo.gl/2aRDsh
 */

importScripts("https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js");

self.addEventListener('message', (event) => {
  if (event.data && event.data.type === 'SKIP_WAITING') {
    self.skipWaiting();
  }
});

/**
 * The workboxSW.precacheAndRoute() method efficiently caches and responds to
 * requests for URLs in the manifest.
 * See https://goo.gl/S9QRab
 */
self.__precacheManifest = [
  {
    "url": "build/0.b1e48501.js",
    "revision": "6565298dea2d7c6c444de6685babbf3a"
  },
  {
    "url": "build/1.af803370.js",
    "revision": "d455d7de30f209e063ba56da9991b5db"
  },
  {
    "url": "build/2.daeb8bd6.js",
    "revision": "48d88b2d22fd18e1ec0a3f4805d49e97"
  },
  {
    "url": "build/3.3e47bf56.js",
    "revision": "dceaa8d56bd8686959e6967e1129fb59"
  },
  {
    "url": "build/app-admin-style.b849c526.css",
    "revision": "dcbb45a6e40227e139b8e4f1450be757"
  },
  {
    "url": "build/app-admin.1cd5cbee.js",
    "revision": "1e12d704e35717e4f47646adb2363097"
  },
  {
    "url": "build/app-style.5fdd982c.css",
    "revision": "fc6e871ad98933096c2b4bb7bb36d0b5"
  },
  {
    "url": "build/app.c4bf5392.js",
    "revision": "b85e7a61ac31e7e50bbd05d6e21bddea"
  },
  {
    "url": "build/house-form.daef2fcd.js",
    "revision": "376b8790f4cd469255c395bc4ff46788"
  },
  {
    "url": "build/hover.58246b53.css",
    "revision": "c2705b6b8d7b1fb2e7302f024ce51a38"
  },
  {
    "url": "build/images/chez-norbert-logo.svg",
    "revision": "a19dbd9ad7576df269512f64b7b1623a"
  },
  {
    "url": "build/images/cour.jpg",
    "revision": "fd17a2176d49d9914e81e1d6ef31280d"
  },
  {
    "url": "build/images/layers-2x.4f0283c6.png",
    "revision": "4f0283c6ce28e888000e978e537a6a56"
  },
  {
    "url": "build/images/layers.a6137456.png",
    "revision": "a6137456ed160d7606981aa57c559898"
  },
  {
    "url": "build/images/marker-icon.2273e3d8.png",
    "revision": "2273e3d8ad9264b7daa5bdbf8e6b47f8"
  },
  {
    "url": "build/lg.8f142a77.css",
    "revision": "248c1b44001145abe3d164480db394fc"
  },
  {
    "url": "build/md.8c927660.css",
    "revision": "d2a3fad31df529016daed392fd99d296"
  },
  {
    "url": "build/runtime.df9c463a.js",
    "revision": "e7b26ad1cccfdabd22795e4b6a76b5b0"
  },
  {
    "url": "build/sm.118f6318.css",
    "revision": "5b0fe23616dbf783f9e70a3654101ddc"
  },
  {
    "url": "build/xl.17646785.css",
    "revision": "a37fac6ad797f961dca0f1a5b6b8df18"
  },
].concat(self.__precacheManifest || []);
workbox.precaching.precacheAndRoute(self.__precacheManifest, {});
