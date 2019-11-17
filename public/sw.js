importScripts("https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js");

// Cache the underlying font files with a cache-first strategy for 1 year.
workbox.routing.registerRoute(
    /^https:\/\/fonts\.(?:googleapis|gstatic).com\/(.*)/,
    new workbox.strategies.CacheFirst({
        cacheName: 'google-fonts-webfonts',
        plugins: [
            new workbox.cacheableResponse.Plugin({
                statuses: [0, 200],
            }),
            new workbox.expiration.Plugin({
                maxAgeSeconds: 60 * 60 * 24 * 365,
                maxEntries: 30,
            }),
        ],
    })
)

workbox.precaching.precacheAndRoute([
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
    "url": "build/app.797a6365.js",
    "revision": "12ee14ac0a381baf6388cb63154e7963"
  },
  {
    "url": "build/entrypoints.json",
    "revision": "b3927e4c1687870b06c56e5c59dd0c16"
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
    "url": "build/images/icon-128x128.png",
    "revision": "38ddad620b692d5b47eccc45f3d43925"
  },
  {
    "url": "build/images/icon-144x144.png",
    "revision": "2f08e02b94c72952ed641f328ab94a67"
  },
  {
    "url": "build/images/icon-152x152.png",
    "revision": "e0a878978048b18d1892260f90892cc0"
  },
  {
    "url": "build/images/icon-192x192.png",
    "revision": "b01ba181f06e00af486edf3b9ae67bc2"
  },
  {
    "url": "build/images/icon-384x384.png",
    "revision": "d16da5e3e573caf628af410fbf5b789a"
  },
  {
    "url": "build/images/icon-512x512.png",
    "revision": "f030c5669a1bd63bd1c59d007dc286eb"
  },
  {
    "url": "build/images/icon-72x72.png",
    "revision": "e491b9d60d044aef3378bcea5bc9a2b5"
  },
  {
    "url": "build/images/icon-96x96.png",
    "revision": "8232e47e714e5f37a1a828d9b7fccaf7"
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
    "url": "build/manifest.json",
    "revision": "fbb2d2b3206a52652c7ae30517f97d77"
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
  {
    "url": "images/medias/0.jpg",
    "revision": "5f534834d388340bcf7ee15b52f952e8"
  },
  {
    "url": "images/medias/1-0.jpg",
    "revision": "e65dcb1b24966d609e981065218e1a63"
  },
  {
    "url": "images/medias/1-1.jpg",
    "revision": "66e75493ecffb6e9e12a2bc2882c1d9c"
  },
  {
    "url": "images/medias/1-2.jpg",
    "revision": "e9eaed5b2e4556dd67863e4004f4531f"
  },
  {
    "url": "images/medias/1.jpg",
    "revision": "805a1e13f5727356164af73ca134fe46"
  },
  {
    "url": "images/medias/10-0.jpg",
    "revision": "d41d8cd98f00b204e9800998ecf8427e"
  },
  {
    "url": "images/medias/10-1.jpg",
    "revision": "d41d8cd98f00b204e9800998ecf8427e"
  },
  {
    "url": "images/medias/10-2.jpg",
    "revision": "3d841c38d9b668cd5b664ccbd12d2dc8"
  },
  {
    "url": "images/medias/10.jpg",
    "revision": "d41d8cd98f00b204e9800998ecf8427e"
  },
  {
    "url": "images/medias/11-0.jpg",
    "revision": "d41d8cd98f00b204e9800998ecf8427e"
  },
  {
    "url": "images/medias/11-1.jpg",
    "revision": "d41d8cd98f00b204e9800998ecf8427e"
  },
  {
    "url": "images/medias/11-2.jpg",
    "revision": "d41d8cd98f00b204e9800998ecf8427e"
  },
  {
    "url": "images/medias/11.jpg",
    "revision": "6dba2dea32f35e93c6ec7c70e1f3ceab"
  },
  {
    "url": "images/medias/12-0.jpg",
    "revision": "6872c640fe5b2b151ebe62f2537a0cfb"
  },
  {
    "url": "images/medias/12-1.jpg",
    "revision": "401c69d5044029386e40f8cb1800c557"
  },
  {
    "url": "images/medias/12-2.jpg",
    "revision": "3d841c38d9b668cd5b664ccbd12d2dc8"
  },
  {
    "url": "images/medias/12.jpg",
    "revision": "401c69d5044029386e40f8cb1800c557"
  },
  {
    "url": "images/medias/13-0.jpg",
    "revision": "3bd7d224e4bdf1504e60e60dd0434b7a"
  },
  {
    "url": "images/medias/13-1.jpg",
    "revision": "d28b287d6da02e56cf9402485afa569b"
  },
  {
    "url": "images/medias/13-2.jpg",
    "revision": "d41d8cd98f00b204e9800998ecf8427e"
  },
  {
    "url": "images/medias/13.jpg",
    "revision": "d41d8cd98f00b204e9800998ecf8427e"
  },
  {
    "url": "images/medias/14-0.jpg",
    "revision": "d28b287d6da02e56cf9402485afa569b"
  },
  {
    "url": "images/medias/14-1.jpg",
    "revision": "ef39f4c9db7988d3bc1370a6bec9eefe"
  },
  {
    "url": "images/medias/14-2.jpg",
    "revision": "90308a1470099b947445fb3c3a15ac54"
  },
  {
    "url": "images/medias/14.jpg",
    "revision": "d41d8cd98f00b204e9800998ecf8427e"
  },
  {
    "url": "images/medias/15-0.jpg",
    "revision": "d41d8cd98f00b204e9800998ecf8427e"
  },
  {
    "url": "images/medias/15-1.jpg",
    "revision": "b3abf76e9dfeaf71f4c3bc432625dd68"
  },
  {
    "url": "images/medias/15-2.jpg",
    "revision": "6178b4d84a73224f5a5a3db6e05909a9"
  },
  {
    "url": "images/medias/15.jpg",
    "revision": "1382d3ac3d2276fef0b554e4347cbef1"
  },
  {
    "url": "images/medias/16-1.jpg",
    "revision": "8f0c42d8e5f06e8bc24a137255d50f53"
  },
  {
    "url": "images/medias/16.jpg",
    "revision": "642742916ad94952a1e6276c7aa19cff"
  },
  {
    "url": "images/medias/17-0.jpg",
    "revision": "8dfae81a9328ad5c1a92bf144c50a879"
  },
  {
    "url": "images/medias/17-1.jpg",
    "revision": "6178b4d84a73224f5a5a3db6e05909a9"
  },
  {
    "url": "images/medias/17-2.jpg",
    "revision": "aa82b66ef147182cead96605148ae8b6"
  },
  {
    "url": "images/medias/17.jpg",
    "revision": "92aad992018ca0349e22dbb26c81d8ba"
  },
  {
    "url": "images/medias/18-0.jpg",
    "revision": "ef39f4c9db7988d3bc1370a6bec9eefe"
  },
  {
    "url": "images/medias/18-1.jpg",
    "revision": "e81daa6781e17e269e4bde1015452838"
  },
  {
    "url": "images/medias/18-2.jpg",
    "revision": "8dfae81a9328ad5c1a92bf144c50a879"
  },
  {
    "url": "images/medias/18.jpg",
    "revision": "d41d8cd98f00b204e9800998ecf8427e"
  },
  {
    "url": "images/medias/19-0.jpg",
    "revision": "d41d8cd98f00b204e9800998ecf8427e"
  },
  {
    "url": "images/medias/19-1.jpg",
    "revision": "76e10dd5f58e125b4ae84dda4ca0fe2c"
  },
  {
    "url": "images/medias/19-2.jpg",
    "revision": "1dda2fbbdcb1e4381de5fd550ad7db3b"
  },
  {
    "url": "images/medias/19.jpg",
    "revision": "1aba1d42cb3f21c79c7e46de75d05b77"
  },
  {
    "url": "images/medias/2-0.jpg",
    "revision": "dbd170fe3faa5ae036217688830881d6"
  },
  {
    "url": "images/medias/2-1.jpg",
    "revision": "1382d3ac3d2276fef0b554e4347cbef1"
  },
  {
    "url": "images/medias/2-2.jpg",
    "revision": "7afaf9214e27da77969ea64325d25565"
  },
  {
    "url": "images/medias/20-0.jpg",
    "revision": "f08764f1b6f7eb6128ae243d0c2b6f3f"
  },
  {
    "url": "images/medias/20-1.jpg",
    "revision": "30f7a25d5c882bdf78fc0846d1c4b096"
  },
  {
    "url": "images/medias/20-2.jpg",
    "revision": "380fe4e79f970dd80764133fa62852e9"
  },
  {
    "url": "images/medias/22-0.jpg",
    "revision": "bb574743276a3c24402faed60e504591"
  },
  {
    "url": "images/medias/22-1.jpg",
    "revision": "9829456b7e90133d81cac708ada11caa"
  },
  {
    "url": "images/medias/22-2.jpg",
    "revision": "dbd170fe3faa5ae036217688830881d6"
  },
  {
    "url": "images/medias/23-0.jpg",
    "revision": "3e7381c1eeb810032d58ab56b627c96f"
  },
  {
    "url": "images/medias/23-1.jpg",
    "revision": "aa794250741533fead7bd913200dfc7d"
  },
  {
    "url": "images/medias/23-2.jpg",
    "revision": "8dfae81a9328ad5c1a92bf144c50a879"
  },
  {
    "url": "images/medias/24-0.jpg",
    "revision": "1aba1d42cb3f21c79c7e46de75d05b77"
  },
  {
    "url": "images/medias/24-1.jpg",
    "revision": "d41d8cd98f00b204e9800998ecf8427e"
  },
  {
    "url": "images/medias/24-2.jpg",
    "revision": "aa82b66ef147182cead96605148ae8b6"
  },
  {
    "url": "images/medias/25-0.jpg",
    "revision": "bc6d0df75b25610ab1215f007ec3962d"
  },
  {
    "url": "images/medias/25-1.jpg",
    "revision": "aa82b66ef147182cead96605148ae8b6"
  },
  {
    "url": "images/medias/25-2.jpg",
    "revision": "6e9dc4e5cfce100f7451adfcda30f4e2"
  },
  {
    "url": "images/medias/26-0.jpg",
    "revision": "b3abf76e9dfeaf71f4c3bc432625dd68"
  },
  {
    "url": "images/medias/26-1.jpg",
    "revision": "d41d8cd98f00b204e9800998ecf8427e"
  },
  {
    "url": "images/medias/26-2.jpg",
    "revision": "d41d8cd98f00b204e9800998ecf8427e"
  },
  {
    "url": "images/medias/3-0.jpg",
    "revision": "d41d8cd98f00b204e9800998ecf8427e"
  },
  {
    "url": "images/medias/3-1.jpg",
    "revision": "d41d8cd98f00b204e9800998ecf8427e"
  },
  {
    "url": "images/medias/3-2.jpg",
    "revision": "d41d8cd98f00b204e9800998ecf8427e"
  },
  {
    "url": "images/medias/3.jpg",
    "revision": "7df55c172dd1f9648e528b9f35f5d79d"
  },
  {
    "url": "images/medias/4-0.jpg",
    "revision": "d41d8cd98f00b204e9800998ecf8427e"
  },
  {
    "url": "images/medias/4-1.jpg",
    "revision": "dc24521925a432c4ca5697419eaa16ce"
  },
  {
    "url": "images/medias/4-2.jpg",
    "revision": "d41d8cd98f00b204e9800998ecf8427e"
  },
  {
    "url": "images/medias/4.jpg",
    "revision": "d41d8cd98f00b204e9800998ecf8427e"
  },
  {
    "url": "images/medias/5-0.jpg",
    "revision": "76e10dd5f58e125b4ae84dda4ca0fe2c"
  },
  {
    "url": "images/medias/5-1.jpg",
    "revision": "32ae9e249b2b45d1fa3f60a83b577825"
  },
  {
    "url": "images/medias/5-2.jpg",
    "revision": "d41d8cd98f00b204e9800998ecf8427e"
  },
  {
    "url": "images/medias/5.jpg",
    "revision": "aa82b66ef147182cead96605148ae8b6"
  },
  {
    "url": "images/medias/6-0.jpg",
    "revision": "a079177821dadd72c25b61a1ea25f699"
  },
  {
    "url": "images/medias/6-1.jpg",
    "revision": "8618f19be9f69166460d556d76ece2ef"
  },
  {
    "url": "images/medias/6-2.jpg",
    "revision": "76e10dd5f58e125b4ae84dda4ca0fe2c"
  },
  {
    "url": "images/medias/6.jpg",
    "revision": "d41d8cd98f00b204e9800998ecf8427e"
  },
  {
    "url": "images/medias/7-0.jpg",
    "revision": "f08764f1b6f7eb6128ae243d0c2b6f3f"
  },
  {
    "url": "images/medias/7-1.jpg",
    "revision": "bb574743276a3c24402faed60e504591"
  },
  {
    "url": "images/medias/7-2.jpg",
    "revision": "e945df98248ecc23f69b811126dc5e74"
  },
  {
    "url": "images/medias/7.jpg",
    "revision": "d41d8cd98f00b204e9800998ecf8427e"
  },
  {
    "url": "images/medias/8-0.jpg",
    "revision": "8618f19be9f69166460d556d76ece2ef"
  },
  {
    "url": "images/medias/8-1.jpg",
    "revision": "d41d8cd98f00b204e9800998ecf8427e"
  },
  {
    "url": "images/medias/8-2.jpg",
    "revision": "dc24521925a432c4ca5697419eaa16ce"
  },
  {
    "url": "images/medias/8.jpg",
    "revision": "76e10dd5f58e125b4ae84dda4ca0fe2c"
  },
  {
    "url": "images/medias/9-0.jpg",
    "revision": "3d841c38d9b668cd5b664ccbd12d2dc8"
  },
  {
    "url": "images/medias/9-1.jpg",
    "revision": "36a222d7274df897d3449be06b9d20fc"
  },
  {
    "url": "images/medias/9-2.jpg",
    "revision": "380fe4e79f970dd80764133fa62852e9"
  },
  {
    "url": "images/medias/9.jpg",
    "revision": "7afaf9214e27da77969ea64325d25565"
  },
  {
    "url": "images/medias/img1-5dbde2ffa4eb6751139058.jpg",
    "revision": "6acf316deb77067f3bbe82858ca09bcd"
  },
  {
    "url": "images/medias/img2-5dbde2ffa862a359455647.jpg",
    "revision": "9de0d279d11d24a9308cf9af7bde1154"
  },
  {
    "url": "images/medias/img2-5dbf24c672789275286475.jpg",
    "revision": "9de0d279d11d24a9308cf9af7bde1154"
  },
  {
    "url": "images/medias/img3-5dbde2ffa986f629707649.jpg",
    "revision": "cda74f27a833c650ed92667808f3d27c"
  },
  {
    "url": "images/medias/sydney-angove-gjjgpecwvms-unsplash-5dacc656dee9f236616766.jpg",
    "revision": "1c2da52a491db41c79772ae44164a3e3"
  },
  {
    "url": "images/medias/sydney-angove-gjjgpecwvms-unsplash-5db5c2419bbe2032706446.jpg",
    "revision": "1c2da52a491db41c79772ae44164a3e3"
  },
  {
    "url": "manifest.json",
    "revision": "df78123628003b49c7676e38272bc081"
  },
  {
    "url": "media/cache/lg_max_down_scale_filter/build/images/cour.jpg",
    "revision": "370d68193feeaf7dac2733624ba9d64f"
  },
  {
    "url": "media/cache/lg_max_down_scale_filter/images/medias/0.jpg",
    "revision": "ded290f418f2af9559e70b48c983fbed"
  },
  {
    "url": "media/cache/lg_max_down_scale_filter/images/medias/16-1.jpg",
    "revision": "34fe9941aaa33f0537bca11fba298fd8"
  },
  {
    "url": "media/cache/lg_max_down_scale_filter/images/medias/17-0.jpg",
    "revision": "343240c910f8042756aaa074e0b6dff6"
  },
  {
    "url": "media/cache/lg_max_down_scale_filter/images/medias/18-0.jpg",
    "revision": "e58c1cd7d1cdbf34ad414242862bb395"
  },
  {
    "url": "media/cache/lg_max_down_scale_filter/images/medias/18-1.jpg",
    "revision": "60033f84a3e7217904032c44411dc6cb"
  },
  {
    "url": "media/cache/lg_max_down_scale_filter/images/medias/18-2.jpg",
    "revision": "343240c910f8042756aaa074e0b6dff6"
  },
  {
    "url": "media/cache/lg_max_down_scale_filter/images/medias/20-0.jpg",
    "revision": "4321e7a1a2b5de2d324ff086459914d6"
  },
  {
    "url": "media/cache/lg_max_down_scale_filter/images/medias/20-1.jpg",
    "revision": "020f56dee1fa7b964d7d93c75fceda9f"
  },
  {
    "url": "media/cache/lg_max_down_scale_filter/images/medias/20-2.jpg",
    "revision": "2a29b1104a6cacdd7af69e07c513f90c"
  },
  {
    "url": "media/cache/lg_max_down_scale_filter/images/medias/4-0.jpg",
    "revision": "a65b25dd99264507b5ec24a0b4b3cb2e"
  },
  {
    "url": "media/cache/lg_max_down_scale_filter/images/medias/4-1.jpg",
    "revision": "c1a0e37720245613a320aef3f9291da9"
  },
  {
    "url": "media/cache/lg_max_down_scale_filter/images/medias/6-0.jpg",
    "revision": "be1021da4ccfe2eedb06061b7fada60e"
  },
  {
    "url": "media/cache/lg_max_down_scale_filter/images/medias/7-0.jpg",
    "revision": "4321e7a1a2b5de2d324ff086459914d6"
  },
  {
    "url": "media/cache/lg_max_down_scale_filter/images/medias/8-0.jpg",
    "revision": "d0cb916e3e28af722f1d122f26040185"
  },
  {
    "url": "media/cache/lg_max_down_scale_filter/images/medias/9-0.jpg",
    "revision": "517988721c92d8989e63ae8114b6455a"
  },
  {
    "url": "media/cache/lg_max_down_scale_filter/images/medias/img1-5dbde2ffa4eb6751139058.jpg",
    "revision": "75fecb94a4ca97c9a778ccf210195be7"
  },
  {
    "url": "media/cache/md_max_down_scale_filter/build/images/cour.jpg",
    "revision": "62f6e1526e05a78e238e954846c89957"
  },
  {
    "url": "media/cache/md_max_down_scale_filter/images/medias/16-1.jpg",
    "revision": "cb8238b345888bd2fa85a31cdf83ff52"
  },
  {
    "url": "media/cache/md_max_down_scale_filter/images/medias/17-0.jpg",
    "revision": "eed50f055e575a57bad89bdab0e062e1"
  },
  {
    "url": "media/cache/md_max_down_scale_filter/images/medias/18-0.jpg",
    "revision": "b119363cd174b6f4a6571b284f02d294"
  },
  {
    "url": "media/cache/md_max_down_scale_filter/images/medias/20-0.jpg",
    "revision": "0ef5dfaaa38708c1f1a72c6f2254d9b7"
  },
  {
    "url": "media/cache/md_max_down_scale_filter/images/medias/20-1.jpg",
    "revision": "5b3abae85b95af269e71ab56ec6ba612"
  },
  {
    "url": "media/cache/md_max_down_scale_filter/images/medias/20-2.jpg",
    "revision": "1f05d0a2c0b59e1316a98f9cf411d189"
  },
  {
    "url": "media/cache/md_max_down_scale_filter/images/medias/img1-5dbde2ffa4eb6751139058.jpg",
    "revision": "def4b68001fcfc412de5b2abe791ded2"
  },
  {
    "url": "media/cache/sm_max_down_scale_filter/build/images/cour.jpg",
    "revision": "4b0b27c2354e84e831048fee161ccb3d"
  },
  {
    "url": "media/cache/xl_max_down_scale_filter/images/medias/7-0.jpg",
    "revision": "fde1287af3d83d668b13289c71361007"
  },
  {
    "url": "media/cache/xl_max_down_scale_filter/images/medias/9-0.jpg",
    "revision": "7c5421b5b578320cf74b1afa6c4c4115"
  },
  {
    "url": "media/cache/xs_max_down_scale_filter/build/images/cour.jpg",
    "revision": "5053bc09e1cb2644404c850f63e986ef"
  },
  {
    "url": "media/cache/xs_max_down_scale_filter/images/medias/16-1.jpg",
    "revision": "5cc480ce52b4d215840cc96f49d5081a"
  },
  {
    "url": "media/cache/xs_max_down_scale_filter/images/medias/17-0.jpg",
    "revision": "daccbff20f45e53a75e722a96740c7bf"
  },
  {
    "url": "media/cache/xs_max_down_scale_filter/images/medias/18-0.jpg",
    "revision": "1ad67a0fbbb9236800fa0898463db9a1"
  },
  {
    "url": "media/cache/xs_max_down_scale_filter/images/medias/20-0.jpg",
    "revision": "ce449cfe7b9875a825b3ff52612dafc4"
  },
  {
    "url": "media/cache/xs_max_down_scale_filter/images/medias/20-1.jpg",
    "revision": "b58ae9dda97442bb5008aa45723d3d93"
  },
  {
    "url": "media/cache/xs_max_down_scale_filter/images/medias/20-2.jpg",
    "revision": "17633e319453cdcd99f0a9ef3f788503"
  },
  {
    "url": "media/cache/xs_max_down_scale_filter/images/medias/img1-5dbde2ffa4eb6751139058.jpg",
    "revision": "5a42ee7b2558baab652219ae7ba229da"
  }
])