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
      modules: './module/DAModules/view/layout/',
      fb: './module/DAFamilyBudget/view/layout/',
    }
  },

  fonts: {
    src: './app/fonts/**/*',
    dest: './build/fonts'
  },

  base: {
    styles: {
      src: 'base/styles/**/*.scss',
      dest: 'base/css',
    },

    scripts: {
      src: 'base/js/**/*.js',
      dest: './library/angular/modules/base',
      test: 'test/base/**/*.js',
    },

    images: {
      src: 'base/images/**/*',
      dest: 'base/images'
    },

    views: {
      index: 'base/index.html',
      src: 'base/views/**/*.html',
      dest: './library/angular/modules/base'
    },
  },

  fb: {
    layout: {
      src: 'family-budget/layout.html',
      phpLayout: 'layout.family-budget.phtml'
    },
    styles: {
      src: 'family-budget/styles/**/*.scss',
      dest: 'family-budget/css',
    },

    scripts: {
      src: 'family-budget/js/**/*.js',
      dest: 'family-budget/js',
      test: 'test/family-budget/**/*.js',
    },

    images: {
      src: 'family-budget/images/**/*',
      dest: 'family-budget/images'
    },

    views: {
      index: 'family-budget/layout.html',
      src: 'family-budget/views/**/*.html',
      dest: 'family-budget/js'
    },
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
      index: 'erp/layout.html',
      src: 'erp/views/**/*.html',
      dest: 'erp/js'
    },
  },

  modules: {
    layout: {
      src: 'modules/layout.html',
      phpLayout: 'layout.modules.phtml'
    },
    styles: {
      src: 'modules/styles/**/*.scss',
      dest: 'modules/css',
    },

    scripts: {
      src: 'modules/js/**/*.js',
      dest: 'modules/js',
      test: 'test/modules/**/*.js',
    },

    images: {
      src: 'modules/images/**/*',
      dest: 'modules/images'
    },

    views: {
      src: 'modules/views/**/*.html',
      dest: 'modules/js'
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
      this.sourceDir + this.blog.views.src,
      this.sourceDir + this.base.views.src
    ];

    this.fb.views.watch = [
      this.sourceDir + this.fb.views.index,
      this.sourceDir + this.fb.views.src,
      this.sourceDir + this.fb.views.src
    ];

    this.site.views.watch = [
      this.sourceDir + this.site.layout.src,
      this.sourceDir + this.site.views.src,
      this.sourceDir + this.base.views.src
    ];

    this.erp.views.watch = [
      this.sourceDir + this.erp.layout.src,
      this.sourceDir + this.erp.views.src,
      this.sourceDir + this.base.views.src
    ];

    this.modules.views.watch = [
      this.sourceDir + this.modules.layout.src,
      this.sourceDir + this.modules.views.src,
      this.sourceDir + this.base.views.src
    ];

    return this;
  },


}.init();
