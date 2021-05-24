const devPort = 8081;

module.exports = {
  devServer: {
    hot: true,
    writeToDisk: true,
    liveReload: false,
    sockPort: devPort,
    port: devPort,
    headers: { "Access-Control-Allow-Origin": "*" }
  },
  publicPath:
    process.env.NODE_ENV === "production"
      ? "/my_website/wp-content/plugins/wordpress-vue2-starter/vue/dist/"
      : `http://localhost:${devPort}/`,
  // ? process.env.ASSET_PATH || "/"
  configureWebpack: {
    output: {
      filename: "app.js",
      hotUpdateChunkFilename: "hot/hot-update.js",
      hotUpdateMainFilename: "hot/hot-update.json"
    },
    optimization: {
      splitChunks: false
    }
  },
  filenameHashing: false,
  css: {
    extract: {
      filename: "app.css"
    }
  }
};
