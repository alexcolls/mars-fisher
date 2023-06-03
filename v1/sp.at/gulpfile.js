

const { src, watch, series, dest } = require('gulp');
const concat = require('gulp-concat');
var wrap = require('gulp-wrap');
const minify = require('gulp-minify');
const javascriptObfuscator = require('gulp-javascript-obfuscator');





exports.default = function() {

}


exports.encrypt=function(){
	return src(['*/**/*.js','!bower_components/**/*','!node_modules/**/*','!modules/**/*'],{base: './'})
	.pipe(javascriptObfuscator())
	.pipe(dest("."));
}