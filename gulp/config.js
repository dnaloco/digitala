export default {

  browserPort: 3000,
  UIPort: 3001,
  testPort: 3002,

  sourceDir: './app/',
  buildDir: './build/',

  indexFile: './app/index.php',

  browserify: {
    bundleName: 'main.js',
    prodSourcemap: false
  },

  generalStyle: {
    prodSourcemap: false,
    sassIncludePaths: ['library/scss/bourbon/', 'node_modules/foundation-sites/scss/']
  },

  gulpDir: 'gulp/**/*.js',

  php: {
    layout: {
      site: './module/DASite/view/layout/'
    }
  },

  blog: {
    styles: {
      src: 'blog/styles/**/*.scss',
      dest: 'blog/css',
    },

    scripts: {
      src: 'blog/js/**/*.js',
      dest: 'blog/js',
      test: 'test/blog/**/*.js',
    },

    images: {
      src: 'blog/images/**/*',
      dest: 'blog/images'
    },

    fonts: {
      src: 'blog/fonts/**/*',
      dest: 'blog/fonts'
    },
    views: {
      index: 'blog/index.html',
      src: 'blog/views/**/*.html',
      dest: 'blog/js'
    },
  },

  site: {
    layout: {
      site01: {
        src: 'site/site01.html',
        phpLayout: 'layout.site01.phtml'
      }
    },
    styles: {
      src: 'site/styles/**/*.scss',
      dest: 'site/css',
    },

    scripts: {
      src: 'site/js/**/*.js',
      dest: 'site/js',
      test: 'test/site/**/*.js',
    },

    images: {
      src: 'site/images/**/*',
      dest: 'site/images'
    },

    fonts: {
      src: 'site/fonts/**/*',
      dest: 'site/fonts'
    },
    views: {
      index: 'site/index.html',
      src: 'site/views/**/*.html',
      dest: 'site/js'
    },
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
      this.sourceDir + this.blog.views.index,
      this.sourceDir + this.blog.views.src
    ];

    this.site.views.watch = [
      this.sourceDir + this.site.layout.site01.src,
      this.sourceDir + this.site.views.src
    ];

    return this;
  },


}.init();
