var gulp        = require('gulp'),
    concat      = require('gulp-concat'),
    less        = require('gulp-less'),
    ngAnnotate  = require('gulp-ng-annotate'),
    rename      = require('gulp-rename'),
    uglify      = require('gulp-uglify');

var lessPaths = [
  './app/Resources/assets/less',
  './bower_components/bootstrap/less'
];

var angularJS = [
  './bower_components/angular/angular.js',
  './bower_components/angular-route/angular-route.js',
  './bower_components/ngstorage/ngStorage.js',
  './bower_components/angular-bootstrap/ui-bootstrap.js',
  './bower_components/angular-bootstrap/ui-bootstrap-tpls.js',
  './bower_components/restangular/dist/restangular.js'
];

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
});

// Compiles Less
gulp.task('less', function() {
  return gulp.src('./app/Resources/assets/less/app.less')
    .pipe(less({
      paths: lessPaths
    }))
    .pipe(gulp.dest('./web/css/'))
  ;
});

// Compiles and copies JavaScript files
gulp.task('uglify', function() {

  gulp.src('./bower_components/lodash/lodash.js')
    .pipe(gulp.dest('./web/js/lib/'))
    .pipe(rename('lodash.min.js'))
    .pipe(uglify())
    .pipe(ngAnnotate())
    .pipe(gulp.dest('./web/js/lib/'))
  ;

  // Bootstrap JavaScript
  gulp.src('./bower_components/bootstrap/dist/js/bootstrap.js')
    .pipe(uglify())
    .pipe(concat('bootstrap.min.js'))
    .pipe(gulp.dest('./web/js/lib/'))
  ;

  // Angular JavaScript
  gulp.src(angularJS)
    .pipe(uglify())
    .pipe(concat('angular.min.js'))
    .pipe(gulp.dest('./web/js/lib/'))
  ;

  // App JavaScript
  return gulp.src(['./app/Resources/assets/js/**/*.js'])
    .pipe(uglify())
    .pipe(concat('app.min.js'))
    .pipe(gulp.dest('./web/js/app/'))
  ;
});

// Builds your entire app once, without starting a server
gulp.task('build', ['copy', 'less', 'uglify']);

// Watch changes
gulp.task('watch', function() {

  // Watch Less
  gulp.watch(['./app/Resources/assets/less/**/*.less'], ['less']);

  // Watch JavaScript
  gulp.watch(['./app/Resources/assets/js/**/*'], ['uglify']);

  // Watch static files
  gulp.watch(['./app/Resources/assets/**/*.html', '!./app/Resources/assets/{less}/**/*.*'], ['copy']);
});

// Default task: builds your app and recompiles assets when they change
gulp.task('default', ['copy', 'less', 'uglify', 'watch']);
