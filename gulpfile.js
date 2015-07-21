var gulp       = require('gulp'),
    $          = require('gulp-load-plugins')(),
    rimraf     = require('gulp-rimraf'),
    sequence   = require('run-sequence');

var lessPaths = [
  './app/Resources/assets/less',
  './bower_components/bootstrap/less'
];

var angularJS = [
  'bower_components/angular/angular.js',
  'bower_components/angular-resource/angular-resource.js',
  'bower_components/angular-route/angular-route.js'
];

// These files are for your app's JavaScript
var appJS = [
  './app/Resources/assets/js/app.js'
];

// Cleans the build directory
gulp.task('clean', function() {
  return gulp.src(['./web/{css,js,templates}'], { read: false })
    .pipe(rimraf({ force: true }));
});

gulp.task('copy', function() {
  // Fontawesome
  gulp.src(['./bower_components/fontawesome/fonts/*'])
    .pipe(gulp.dest('./web/fonts/'));

  // jQuery
  gulp.src(['./bower_components/jquery/dist/jquery.min.{map,js}'])
    .pipe(gulp.dest('./web/js/lib/'));

  // Modernizr
  gulp.src(['./bower_components/modernizr/modernizr.js'])
    .pipe(gulp.dest('./web/js/lib/'));

  // Templates
  gulp.src(['./app/Resources/assets/templates/**/*.html'])
    .pipe(gulp.dest('./web/templates/'));

  // App
  gulp.src(['./app/Resources/assets/js/**/*.js'])
    .pipe(gulp.dest('./web/js/app/'));
});

// Compiles Less
gulp.task('less', function() {
  return gulp.src('./app/Resources/assets/less/app.less')
    .pipe($.less({
      paths: lessPaths
    })).on('error', function(e) {
      console.log(e);
    })
    .pipe($.autoprefixer({
      browsers: ['last 2 versions', 'ie 10']
    }))
    .pipe(gulp.dest('./web/css/'));
});

// Compiles and copies JavaScript files
gulp.task('uglify', function() {
  // Bootstrap JavaScript
  gulp.src('bower_components/bootstrap/dist/js/bootstrap.js')
    .pipe($.uglify({
      beautify: true,
      mangle: false
    }).on('error', function(e) {
      console.log(e);
    }))
    .pipe($.concat('bootstrap.js'))
    .pipe(gulp.dest('./web/js/lib/'))
  ;

  // Angular JavaScript
  gulp.src(angularJS)
    .pipe($.uglify({
      beautify: true,
      mangle: false
    }).on('error', function(e) {
      console.log(e);
    }))
    .pipe($.concat('angular.js'))
    .pipe(gulp.dest('./web/js/lib/'))
  ;

  // App JavaScript
  return gulp.src(appJS)
    .pipe(gulp.dest('./web/js/app/'))
  ;
});

// Builds your entire app once, without starting a server
gulp.task('build', function(callback) {
  sequence('clean', ['copy', 'less', 'uglify'], callback);
});

// Default task: builds your app, starts a server, and recompiles assets when they change
gulp.task('default', ['build'], function() {

  // Watch Less
  gulp.watch(['./app/Resources/assets/less/**/*'], ['less']);

  // Watch JavaScript
  gulp.watch(['./app/Resources/assets/js/**/*'], ['uglify']);

  // Watch static files
  gulp.watch(['./app/Resources/assets/**/*.*', '!./app/Resources/assets/{less}/**/*.*'], ['copy']);
});
