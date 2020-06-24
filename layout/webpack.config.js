"use strict";

const path = require("path");
const webpack = require("webpack");
const FriendlyErrorsPlugin = require("friendly-errors-webpack-plugin");
const VueLoaderPlugin = require("vue-loader/lib/plugin");
const MiniCSSExtractPlugin = require("mini-css-extract-plugin");
const environmentConfig = require("./.env");

module.exports = function (env, argv) {
  const isDev = argv.mode === "development";
  const isStaging = env && env.staging;
  const environment = !isDev
    ? !isStaging
      ? "production"
      : "staging"
    : "development";
  const environmentVars = environmentConfig(environment);

  return {
    mode: !isDev ? "production" : "development",
    entry: "./src/entry",
    devtool: !isDev ? "source-maps" : "cheap-module-eval-source-map",
    output: {
      path: path.resolve(__dirname, "dist"),
      chunkFilename: "[id].main.js",
      filename: "main.bundle.js",
      publicPath: "/wp-content/themes/qudsinfo-wp-theme/layout/dist/",
    },
    resolve: {
      extensions: [".js", ".vue"],
      alias: {
        vue$: isDev ? "vue/dist/vue.runtime.js" : "vue/dist/vue.runtime.min.js",
        "@": path.resolve(__dirname, "src"),
      },
    },
    module: {
      rules: [
        {
          test: /\.vue$/,
          loader: "vue-loader",
          exclude: /node_modules/,
        },
        {
          test: /\.js$/,
          loader: "babel-loader",
          exclude: /node_modules/,
        },
        {
          test: /\.css$/,
          use: [
            MiniCSSExtractPlugin.loader,
            { loader: "css-loader", options: { sourceMap: isDev } },
          ],
          sideEffects: true,
        },
        {
          test: /\.scss$/,
          use: [
            MiniCSSExtractPlugin.loader,
            { loader: "css-loader", options: { sourceMap: isDev } },
            { loader: "sass-loader", options: { sourceMap: isDev } },
          ],
        },
        {
          test: /\.svg$/,
          oneOf: [
            {
              resourceQuery: /inline/,
              use: ["babel-loader", "vue-svg-loader"],
            },
            {
              loader: "file-loader",
              options: { esModule: false, outputPath: "assets" },
            },
          ],
        },
        {
          test: /\.(png|jpg|jpeg|gif)$/,
          use: [
            {
              loader: "file-loader",
              options: { esModule: false, outputPath: "assets" },
            },
          ],
        },
        {
          test: /\.(woff|woff2|eot|ttf|otf)$/,
          use: [
            {
              loader: "file-loader",
              options: { esModule: false, outputPath: "assets" },
            },
          ],
        },
      ],
    },
    plugins: [
      new webpack.DefinePlugin(environmentVars),
      new FriendlyErrorsPlugin(),
      new VueLoaderPlugin(),
      new MiniCSSExtractPlugin({
        filename: "[name].css",
      }),
      new webpack.ProvidePlugin({
        $: "jquery",
        jQuery: "jquery",
        "window.jQuery": "jquery",
      }),
    ],
  };
};
