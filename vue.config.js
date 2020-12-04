const ImageminPlugin = require('imagemin-webpack-plugin').default
const imageminMozjpeg = require('imagemin-mozjpeg')
const imageminOptipng = require('imagemin-optipng');

module.exports = {
  publicPath: '/advent-calendar/',

  devServer: {
    disableHostCheck: true
  },
  configureWebpack: {
    plugins: [
      new ImageminPlugin({
        plugins: [
          imageminMozjpeg({
            quality: 90
          }),
          imageminOptipng()
        ]
      })
    ]
  }
}
