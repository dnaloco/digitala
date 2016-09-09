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
      site: './module/DASite/view/layout/',
      erp: './module/DAErp/view/layout/',
    }
  },

  fonts: {
    src: './app/fonts/**/*',
    dest: './build/fonts'
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

    views: {
      index: 'blog/index.html',
      src: 'blog/views/**/*.html',
      dest: 'blog/js'
    },
  },

  site: {
    layout: {
      src: 'site/layout.html',
      phpLayout: 'layout.site.phtml'
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

    views: {
      index: 'site/index.html',
      src: 'site/views/**/*.html',
      dest: 'site/js'
    },
  },

  erp: {
    layout: {
      src: 'erp/layout.html',
      phpLayout: 'layout.erp.phtml'
    },
    styles: {
      src: 'erp/styles/**/*.scss',
      dest: 'erp/css',
    },

    scripts: {
      src: 'erp/js/**/*.js',
      dest: 'erp/js',
      test: 'test/erp/**/*.js',
    },

    images: {
      src: 'erp/images/**/*',
      dest: 'erp/images'
    },

    views: {
      index: 'erp/index.html',
      src: 'erp/views/**/*.html',
      dest: 'erp/js'
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
      this.sourceDir + this.site.layout.src,
      this.sourceDir + this.site.views.src
    ];

    this.erp.views.watch = [
      this.sourceDir + this.erp.layout.src,
      this.sourceDir + this.erp.views.src
    ];

    return this;
  },


}.init();
