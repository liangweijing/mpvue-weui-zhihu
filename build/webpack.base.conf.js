var path = require('path')
<<<<<<< HEAD
var fs = require('fs')
var utils = require('./utils')
var config = require('../config')
var vueLoaderConfig = require('./vue-loader.conf')
var MpvuePlugin = require('webpack-mpvue-asset-plugin')
var glob = require('glob')
var CopyWebpackPlugin = require('copy-webpack-plugin')
var relative = require('relative')
=======
var utils = require('./utils')
var config = require('../config')
var vueLoaderConfig = require('./vue-loader.conf')
>>>>>>> c35f5ceb1900c6c0fe3e22a9ab053a7dee3fab59

function resolve (dir) {
  return path.join(__dirname, '..', dir)
}

<<<<<<< HEAD
function getEntry (rootSrc) {
  var map = {};
  glob.sync(rootSrc + '/pages/**/main.js')
  .forEach(file => {
    var key = relative(rootSrc, file).replace('.js', '');
    map[key] = file;
  })
   return map;
}

const appEntry = { app: resolve('./src/main.js') }
const pagesEntry = getEntry(resolve('./src'), 'pages/**/main.js')
const entry = Object.assign({}, appEntry, pagesEntry)

module.exports = {
  // 如果要自定义生成的 dist 目录里面的文件路径，
  // 可以将 entry 写成 {'toPath': 'fromPath'} 的形式，
  // toPath 为相对于 dist 的路径, 例：index/demo，则生成的文件地址为 dist/index/demo.js
  entry,
  target: require('mpvue-webpack-target'),
=======
module.exports = {
  entry: {
    app: './src/main.js'
  },
>>>>>>> c35f5ceb1900c6c0fe3e22a9ab053a7dee3fab59
  output: {
    path: config.build.assetsRoot,
    filename: '[name].js',
    publicPath: process.env.NODE_ENV === 'production'
      ? config.build.assetsPublicPath
      : config.dev.assetsPublicPath
  },
  resolve: {
    extensions: ['.js', '.vue', '.json'],
    alias: {
<<<<<<< HEAD
      'vue': 'mpvue',
      '@': resolve('src')
    },
    symlinks: false,
    aliasFields: ['mpvue', 'weapp', 'browser'],
    mainFields: ['browser', 'module', 'main']
=======
      'vue$': 'vue/dist/vue.esm.js',
      '@': resolve('src'),
    }
>>>>>>> c35f5ceb1900c6c0fe3e22a9ab053a7dee3fab59
  },
  module: {
    rules: [
      {
<<<<<<< HEAD
        test: /\.(js|vue)$/,
        loader: 'eslint-loader',
        enforce: 'pre',
        include: [resolve('src'), resolve('test')],
        options: {
          formatter: require('eslint-friendly-formatter')
        }
      },
      {
        test: /\.vue$/,
        loader: 'mpvue-loader',
=======
        test: /\.vue$/,
        loader: 'vue-loader',
>>>>>>> c35f5ceb1900c6c0fe3e22a9ab053a7dee3fab59
        options: vueLoaderConfig
      },
      {
        test: /\.js$/,
<<<<<<< HEAD
        include: [resolve('src'), resolve('test')],
        use: [
          'babel-loader',
          {
            loader: 'mpvue-loader',
            options: {
              checkMPEntry: true
            }
          },
        ]
      },
      {
        test: /\.(png|jpe?g|gif|svg)(\?.*)?$/,
        loader: 'url-loader',
        options: {
          limit: 10000,
          name: utils.assetsPath('img/[name].[ext]')
=======
        loader: 'babel-loader',
        include: [resolve('src'), resolve('test')]
      },
      {
        test: /\.(png|jpe?g|gif|svg|ico)(\?.*)?$/,
        loader: 'url-loader',
        options: {
          limit: 10000,
          name: utils.assetsPath('img/[name].[hash:7].[ext]')
>>>>>>> c35f5ceb1900c6c0fe3e22a9ab053a7dee3fab59
        }
      },
      {
        test: /\.(mp4|webm|ogg|mp3|wav|flac|aac)(\?.*)?$/,
        loader: 'url-loader',
        options: {
          limit: 10000,
<<<<<<< HEAD
          name: utils.assetsPath('media/[name].[ext]')
=======
          name: utils.assetsPath('media/[name].[hash:7].[ext]')
>>>>>>> c35f5ceb1900c6c0fe3e22a9ab053a7dee3fab59
        }
      },
      {
        test: /\.(woff2?|eot|ttf|otf)(\?.*)?$/,
        loader: 'url-loader',
        options: {
          limit: 10000,
<<<<<<< HEAD
          name: utils.assetsPath('fonts/[name].[ext]')
        }
      }
    ]
  },
  plugins: [
    new MpvuePlugin(),
    new CopyWebpackPlugin([{
      from: '**/*.json',
      to: ''
    }], {
      context: 'src/'
    }),
    new CopyWebpackPlugin([
      {
        from: path.resolve(__dirname, '../static'),
        to: path.resolve(__dirname, '../dist/static'),
        ignore: ['.*']
      }
    ])
  ]
=======
          name: utils.assetsPath('fonts/[name].[hash:7].[ext]')
        }
      }
    ]
  }
>>>>>>> c35f5ceb1900c6c0fe3e22a9ab053a7dee3fab59
}
