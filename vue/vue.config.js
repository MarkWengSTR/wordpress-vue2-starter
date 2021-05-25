const devPort = 8081;
const path = require("path");

module.exports = {
  chainWebpack: config => {
    config.resolve.alias.set(
      "vue$",
      // If using the runtime only build
      path.resolve(__dirname, "node_modules/vue/dist/vue.runtime.esm.js")
      // Or if using full build of Vue (runtime + compiler)
      // path.resolve(__dirname, 'node_modules/vue/dist/vue.esm.js')
    );
  },
  runtimeCompiler: true,
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
      ? "/sandbox/wp-content/plugins/wordpress-vue2-starter/vue/dist/"
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
