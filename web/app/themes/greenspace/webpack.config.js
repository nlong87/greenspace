const path = require('path');

module.exports = {
    mode: 'production',
    entry: './src/js/main.js',

    output: {
        path: path.resolve(__dirname, "assets/js"),
        filename: "[name].js", // string (default)
    },
    externals: {
        'jquery': 'jQuery'
    }
};