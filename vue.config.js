const ImageminPlugin = require('imagemin-webpack-plugin').default
const imageminMozjpeg = require('imagemin-mozjpeg')

module.exports = {
  configureWebpack: {
    devtool: 'source-map',
    plugins: [
      new ImageminPlugin({
        pngquant: {
          quality: '85'
        }
      }),
      imageminMozjpeg({
        quality: 85
      })
    ]
  },
  devServer: {
    disableHostCheck: true
  }
}
