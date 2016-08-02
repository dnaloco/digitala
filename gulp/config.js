export default {

  browserPort: 3000,
  UIPort: 3001,
  testPort: 3002,

  blog: {
    sourceDir: './app/',
    buildDir: './build/',
    styles: {
      src: 'app/blog/styles/**/*.scss',
      dest: 'build/blog/css',
      prodSourcemap: false,
      sassIncludePaths: ['app/blog/styles/bourbon/', 'node_modules/foundation-sites/scss/']
    },

    scripts: {
      src: 'app/blog/js/**/*.js',
      dest: 'build/blog/js',
      test: 'test/**/*.js',
      gulp: 'gulp/**/*.js'
    },

    images: {
      src: 'app/blog/images/**/*',
      dest: 'build/blog/images'
    },

    fonts: {
      src: ['app/blog/fonts/**/*'],
      dest: 'build/blog/fonts'
    },
    views: {
      index: 'app/blog/index.html',
      src: 'app/blog/views/**/*.html',
      dest: 'app/blog/js'
    },
    browserify: {
      bundleName: 'main.js',
      prodSourcemap: false
    }
  },

  admin: {
    sourceDir: './app/admin/',
    buildDir: './build/admin/',
    styles: {
      src: 'app/admin/styles/**/*.scss',
      dest: 'build/admin/css',
      prodSourcemap: false,
      sassIncludePaths: ['app/admin/styles/bourbon/', 'node_modules/foundation-sites/scss/']
    },

    scripts: {
      src: 'app/admin/js/**/*.js',
      dest: 'build/admin/js',
      test: 'test/**/*.js',
      gulp: 'gulp/**/*.js'
    },

    images: {
      src: 'app/admin/images/**/*',
      dest: 'build/admin/images'
    },

    fonts: {
      src: ['app/admin/fonts/**/*'],
      dest: 'build/admin/fonts'
    },
    views: {
      index: 'app/admin/index.html',
      src: 'app/admin/views/**/*.html',
      dest: 'app/admin/js'
    },
    browserify: {
      bundleName: 'main.js',
      prodSourcemap: false
    }
  },

  assetExtensions: [
    'js',
    'css',
    'png',
    'jpe?g',
    'gif',
    'svg',
    'eot',
    'otf',
    'ttc',
    'ttf',
    'woff2?'
  ],

  gzip: {
    src: 'build/**/*.{html,php,xml,json,css,js,js.map,css.map}',
    dest: 'build/',
    options: {}
  },

  test: {
    karma: 'test/karma.conf.js',
    protractor: 'test/protractor.conf.js'
  },

  init: function() {
    this.blog.views.watch = [
      this.blog.views.index,
      this.blog.views.src
    ];

    this.admin.views.watch = [
      this.admin.views.index,
      this.admin.views.src
    ];

    return this;
  },


}.init();
