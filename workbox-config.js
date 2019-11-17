module.exports = {
  "globDirectory": "public/",
  "globPatterns": [
    "**/*.{css,js,svg,jpg,png,json}"
  ],
  "globIgnores": [
      "images/**/*", "media/**/*", "build/{sm,md,lg,xl}.*.css"
  ],
  "swDest": "public\\sw.js",
  "swSrc": "src-sw.js"
};