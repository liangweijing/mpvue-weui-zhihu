var utils = require('./utils')
var config = require('../config')
<<<<<<< HEAD
// var isProduction = process.env.NODE_ENV === 'production'
// for mp
var isProduction = true
=======
var isProduction = process.env.NODE_ENV === 'production'
>>>>>>> c35f5ceb1900c6c0fe3e22a9ab053a7dee3fab59

module.exports = {
  loaders: utils.cssLoaders({
    sourceMap: isProduction
      ? config.build.productionSourceMap
      : config.dev.cssSourceMap,
    extract: isProduction
  }),
  transformToRequire: {
    video: 'src',
    source: 'src',
    img: 'src',
    image: 'xlink:href'
  }
}
