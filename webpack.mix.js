// const path = require('path')
// const fs = require('fs-extra')
// const mix = require('laravel-mix')
// require('laravel-mix-versionhash')
// // const { BundleAnalyzerPlugin } = require('webpack-bundle-analyzer')

// mix
//   .js('resources/js/app.js', 'public/dist/js')
//   .sass('resources/sass/app.scss', 'public/dist/css')

//   .disableNotifications()

// if (mix.inProduction()) {
//   mix
//     // .extract() // Disabled until resolved: https://github.com/JeffreyWay/laravel-mix/issues/1889
//     // .version() // Use `laravel-mix-versionhash` for the generating correct Laravel Mix manifest file.
//     .versionHash()
// } else {
//   mix.sourceMaps()
// }

// mix.webpackConfig({
//   plugins: [
//     // new BundleAnalyzerPlugin()
//   ],
//   resolve: {
//     extensions: ['.js', '.json', '.vue'],
//     alias: {
//       '~': path.join(__dirname, './resources/js')
//     }
//   },
//   output: {
//     chunkFilename: 'dist/js/[chunkhash].js',
//     path: mix.config.hmr ? '/' : path.resolve(__dirname, './public/build')
//   }
// })

// mix.then(() => {
//   if (!mix.config.hmr) {
//     process.nextTick(() => publishAseets())
//   }
// })

// function publishAseets () {
//   const publicDir = path.resolve(__dirname, './public')

//   if (mix.inProduction()) {
//     fs.removeSync(path.join(publicDir, 'dist'))
//   }

//   fs.copySync(path.join(publicDir, 'build', 'dist'), path.join(publicDir, 'dist'))
//   fs.removeSync(path.join(publicDir, 'build'))
// }
const path = require('path')
const fs = require('fs-extra')
const mix = require('laravel-mix')
// require('laravel-mix-versionhash')
require('laravel-mix-postcss-config');
// // const { BundleAnalyzerPlugin } = require('webpack-bundle-analyzer')

mix.browserSync({
  proxy: 'http://localhost:8000/',
  files: ["resources/css/main.css", "resources/js/**/*.vue"]
});

mix
  .js('resources/js/app.js', 'public/dist/js')
  .postCss('resources/css/main.css', 'public/dist/css',[
    require('tailwindcss'),
    require('autoprefixer'),
  ])
  .postCssConfig()
  .disableNotifications()

if (mix.inProduction()) {
  require('laravel-mix-versionhash')
  mix
    // .extract() // Disabled until resolved: https://github.com/JeffreyWay/laravel-mix/issues/1889
    // .version() // Use `laravel-mix-versionhash` for the generating correct Laravel Mix manifest file.
    .versionHash()
} else {
  mix.sourceMaps()
}

mix.webpackConfig({
  plugins: [
    // new BundleAnalyzerPlugin()
  ],
  resolve: {
    extensions: ['.js', '.json', '.vue'],
    alias: {
      '~': path.join(__dirname, './resources/js')
    }
  },
  output: {
    chunkFilename: 'dist/js/[chunkhash].js',
    path: mix.config.hmr ? '/' : path.resolve(__dirname, './public/build')
  }
})

mix.then(() => {
  if (!mix.config.hmr) {
    process.nextTick(() => publishAseets())
  }
})

function publishAseets () {
  const publicDir = path.resolve(__dirname, './public')

  if (mix.inProduction()) {
    fs.removeSync(path.join(publicDir, 'dist'))
  }

  fs.copySync(path.join(publicDir, 'build', 'dist'), path.join(publicDir, 'dist'))
  fs.removeSync(path.join(publicDir, 'build'))
}