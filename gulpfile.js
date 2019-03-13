//modules
var gulp = require('gulp');
// ejs
var fs = require('fs');
var ejs = require("gulp-ejs");
//sass
var sass = require('gulp-sass');
var browserSync = require('browser-sync');
var plumber = require('gulp-plumber');
var notify = require('gulp-notify');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var mmq = require('gulp-merge-media-queries');
var csscomb = require('gulp-csscomb');
var sassGlob = require("gulp-sass-glob");
//js
var rename = require("gulp-rename");
var uglify = require("gulp-uglify");
//image
var changed = require('gulp-changed');
var imagemin = require('gulp-imagemin');
var imageminJpg = require('imagemin-jpeg-recompress');
var imageminPng = require('imagemin-pngquant');
var imageminGif = require('imagemin-gifsicle');
//svg
var svgmin = require('gulp-svgmin');
var svgSprite = require('gulp-svg-sprite');


//develop directory
var srcDir = 'src/';
var src = {
  'ejs': srcDir + 'assets/ejs/**/*.ejs',
  'json': srcDir + 'assets/ejs/**/var.json',
  'scss': srcDir + 'assets/scss/*.scss',
  'scssmudule': srcDir + 'assets/scss/**/*.scss',
  'js': srcDir + 'assets/js/**/*.js',
  'images': srcDir + 'assets/images/**/*.+(jpg|jpeg|png|gif)',
  'svg': srcDir + 'assets/images/**/*.+(svg)'
};
//public directory（WordPress）
var distDir = '';
var dist = {
  'html': distDir + '*.html',
  'css': distDir + 'css',
  'js': distDir + 'js',
  'images': distDir + 'images'
};

//scss
gulp.task('sass', function(){
  return gulp.src(src.scss)
  .pipe(sourcemaps.init()) //map生成
  .pipe(plumber({errorHandler: notify.onError('Error: <%= error.message %>')}))
  .pipe(sassGlob())//sassをimportできるようにする
  .pipe(sass({
      outputStyle: 'expanded',//リリースの時はcompressed
      indentWidth: 2
    })
  )
  .pipe(autoprefixer({
    browsers: ['last 3 versions','ie >=11','android >=4.4'],
    cascade: false
  }))
  .pipe(mmq({//gulp-merge-media-queries
    log: false
  }))
  .pipe(csscomb())//gulp-csscomb
  .pipe(sourcemaps.write('../map')) //一個上の階層にmap追加
  .pipe(gulp.dest(dist.css));
});

// jpg,png,gif
gulp.task('imagemin', function(){
    return gulp.src( src.images )
    .pipe(changed( dist.images ))
    .pipe(imagemin([
        imageminPng(),
        imageminJpg(),
        imageminGif({
            interlaced: false,
            optimizationLevel: 3,
            colors:180
        })
    ]
    ))
    .pipe(gulp.dest( dist.images ));
});

//js
gulp.task("js", function() {
    return gulp.src(src.js)
    .pipe(changed(src.js))
    .pipe(uglify())//圧縮
    .pipe(rename({//リネーム
        extname: '.min.js'
    }))
    .pipe(gulp.dest(dist.js));
});

//browser sync
// gulp.task('browser-sync', function() {
//     browserSync({
//         server: {
//             baseDir: "./dist/"   //サーバとなるrootディレクトリ
//         }
//     });
//     gulp.watch(dist.html, gulp.task('reload'));
//     gulp.watch(dist.css, gulp.task('reload'));
//     gulp.watch(dist.js, gulp.task('reload'));
//     gulp.watch(dist.images, gulp.task('reload'));
// });
// gulp.task('reload', function() {
//     browserSync.reload();
// });

//watch
gulp.task('dev', gulp.series(
  gulp.parallel('sass', 'imagemin', 'js'),
  function(){
    gulp.watch([src.scss, src.scssmudule], gulp.task('sass'));
    gulp.watch(src.images, gulp.task('imagemin'));
    gulp.watch(src.js, gulp.task('js'));
  }));

//dev
// gulp.task('dev', gulp.parallel('browser-sync', 'watch'));


// svg-compression
gulp.task('svgmin', function(){
    return gulp.src( src.svg )
    .pipe(changed( dist.images ))
    .pipe(svgmin())
    .pipe(gulp.dest( dist.images ));
});
// svg-sprite
gulp.task('svg-sprite', function () {
  return gulp.src(src.svg)
    .pipe(svgSprite({
      mode: {
        symbol: {
          'dest': '.', // where
          'sprite' : 'sprite.svg' // file-name
        }
      },
      shape: {
        transform: [
          {
            svgo: { // svg style option
              plugins: [
                { 'removeTitle': true }, // titleを削除
                { 'removeStyleElement': true }, // <style>を削除
                { 'removeAttrs': { 'attrs': 'fill' } } // fill属性を削除
              ]
          }}
        ]
      },
      // 吐き出す際のオプション
      svg : {
        xmlDeclaration: true, // xml宣言をつける
        doctypeDeclaration: true // doctype宣言をつける
      }
    }))
    .pipe(gulp.dest(dist.images));
});
