'use strict';

import gulp from 'gulp';
import plumber from 'gulp-plumber';
import sass from 'gulp-sass';
import postcss from 'gulp-postcss';
import autoprefixer from 'autoprefixer';
import browserSync from 'browser-sync';

const bs = browserSync.create();

/**
 * SCSS task
 *
 * Compiles SCSS files to CSS
 * Runs autoprefixer
 * Streams new files into the browser
 */
gulp.task('styles', () =>
  gulp.src(['style.scss', 'rtl.scss'])
    .pipe(plumber())
    .pipe(sass({
      indentType: 'tab',
      indentWidth: 1,
      outputStyle: 'expanded',
    }).on('error', sass.logError))
    .pipe(postcss([
      autoprefixer({
        browsers: ['last 2 versions'],
        cascade: false
      })
    ]))
    .pipe(gulp.dest('.'))
    .pipe(bs.stream()));

/**
 * Spin up the development server
 */
gulp.task('serve', ['styles'], () => {
  bs.init({
		proxy: 'http://localhost/wptrunk/milos',
    port: 3000,
    tunnel: false,
    open: false
  });

  gulp.watch(['style.scss', 'rtl.scss', 'assets/sass/**/*.scss'], ['styles']);
});

/**
 * Default task
 */
gulp.task('default', ['serve']);
