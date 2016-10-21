/*!
* Cover Gruntfile
* http://eichefam.net/projects/cover
* @author Paul Eiche
*/

/**
* Grunt Module
*/
module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    hub: {
      all: {
        src: ['gruntfile-hub.js']
      }
    },
    clean: {
      build: [
        'assets/sass/plugins/aesop/_ai-core.scss',
        'dist',
        '*.css',
        '*.css.map'
      ]
    },
    copy: {
      build: {
        files: [
          {
            cwd: 'node_modules/font-awesome/fonts',
            src: '*',
            dest: 'dist/fonts',
            expand: true,
            filter: 'isFile'
          },
          {
            cwd: 'node_modules/headroom.js/dist',
            src: 'headroom.min.js',
            dest: 'dist/js',
            expand: true
          },
          {
            cwd: 'node_modules/unslider/dist/js',
            src: 'unslider-min.js',
            dest: 'dist/js',
            expand: true
          },
          {
            cwd: 'node_modules/masonry-layout/dist',
            src: 'masonry.pkgd.min.js',
            dest: 'dist/js',
            expand: true
          },
          {
            cwd: 'node_modules/aesop-core/public/assets/css',
            src: 'ai-core.css',
            dest: 'assets/sass/plugins/aesop',
            expand: true,
            rename: function(dest, src) {
              return dest + '/_' + src.replace('.css', '.scss');
            }
          },
          {
            cwd: 'node_modules/aesop-core/public/assets/img',
            src: '*',
            dest: 'dist/img',
            expand: true
          },
          {
            cwd: 'node_modules/jquery.event.move/js',
            src: '*',
            dest: 'dist/js',
            expand: true
          },
          {
            cwd: 'node_modules/jquery.event.swipe/js',
            src: '*',
            dest: 'dist/js',
            expand: true
          },
          {
            cwd: 'assets/svg',
            src: '*.svg',
            dest: 'dist/svg',
            expand: true
          },
          {
            cwd: 'node_modules/@vimeo/player/dist',
            src: 'player.min.js',
            dest: 'dist/js',
            expand: true
          }
        ]
      }
    },
    todo: {
			options: {
        marks: [
					{
						name: 'NOTE',
						pattern: /NOTE/,
						color: 'blue'
					},
					{
						name: 'TODO',
						pattern: /TODO/,
						color: 'green'
					},
					{
						name: 'FIXME',
						pattern: /FIXME/,
						color: 'yellow'
					},
					{
						name: 'XXX',
						pattern: /XXX/,
						color: 'red'
					}
				],
				file: 'report/report.md',
				colophon: true,
				usePackage: true
			},
			src: [
        'assets/**/*',
        '**/*.php',
        'inc/**/*',
        '!node_modules/**/*'
			]
		},
    scsslint: {
      allFiles: [
        'assets/sass/**/*.scss',
        '!assets/sass/plugins/aesop/_ai-core.scss'
      ],
      options: {
        config: '.scss-lint.yml',
        reporterOutput: 'report/scss-lint-report.xml',
        colorizeOutput: true
      },
    },
    sass: {
      dev: {
        options: {
          style: 'expanded',
          noCache: true,
          sourcemap: 'auto',
          unixNewlines: true
        },
        files: {
          'style.css': 'assets/sass/style.scss'
        }
      },
      prod: {
        options: {
          style: 'compressed',
          noCache: true,
          sourcemap: 'none',
          unixNewlines: true
        },
        files: {
          'style.css': 'assets/sass/style.scss'
        }
      },
      wporg: {
        options: {
          style: 'expanded',
          noCache: true,
          sourcemap: 'none',
          unixNewlines: true
        },
        files: {
          'style.css': 'assets/sass/style.scss'
        }
      }
    },
    autoprefixer: {
      dev: {
        options: {
          map: true
        },
        files: {
          'style.css': 'style.css'
        }
      },
      prod: {
        files: {
          'style.css': 'style.css'
        }
      }
    },
    jshint: {
      files: ['gruntfile.js', 'assets/js/*.js'],
      options: {
        'jshintrc': true
      }
    },
    uglify: {
      dev: {
        options: {
          mangle: false,
          beautify: true
        },
        files: [{
          expand: true,
          cwd: 'assets/js',
          dest: 'dist/js',
          src: '**/*.js',
          ext: '.js'
        }]
      },
      prod: {
        options: {
          compress: {
            pure_funcs: [
              'console.log',
              'alert'
            ]
          }
        },
        files: [{
          expand: true,
          cwd: 'assets/js',
          dest: 'dist/js',
          src: '**/*.js',
          ext: '.js'
        }]
      }
    },
    checktextdomain: {
      standard: {
        options: {
          text_domain: 'cover',
          correct_domain: false, // correct text-domain instances
          force: true, // continue after correcting "errors"
          keywords: [
            '__:1,2d',
            '_e:1,2d',
            '_x:1,2c,3d',
            'esc_html__:1,2d',
            'esc_html_e:1,2d',
            'esc_html_x:1,2c,3d',
            'esc_attr__:1,2d',
            'esc_attr_e:1,2d',
            'esc_attr_x:1,2c,3d',
            '_ex:1,2c,3d',
            '_n:1,2,4d',
            '_nx:1,2,4c,5d',
            '_n_noop:1,2,3d',
            '_nx_noop:1,2,3c,4d'
          ]
        },
        files: [{
          src: [
            '**/*.php',
            '!node_modules/**'
          ],
          expand: true
        }]
      }
    },
    pot: {
      options: {
        text_domain: 'cover',
        dest: 'languages/',
        keywords: [
          '__',
          '_e',
          'esc_html__',
          'esc_html_e',
          'esc_attr__',
          'esc_attr_e',
          'esc_attr_x',
          'esc_html_x',
          'ngettext',
          '_n',
          '_ex',
          '_nx'
        ]
      },
      build: {
        src: [
          '**/*.php',
          '!node_modules/**'
        ],
        expand: true
      }
    },
    compress: {
      build: {
        options: {
          mode: 'zip',
          archive: function() {
            return 'releases/cover.zip';
          }
        },
        files: [
          {
            expand: true,
            src: [
              '**',
              '!.*',
              '!*.json',
              '!*.log',
              '!*.md',
              '!*.xml',
              '!gruntfile.js',
              '!gruntfile-hub.js',
              '!assets/**',
              '!node_modules/**',
              '!releases/**',
              '!report/**'
            ]
          }
        ]
      }
    },
    watch: {
      css: {
        files: 'assets/sass/**/*.scss',
        tasks: ['scsslint', 'sass:dev', 'autoprefixer']
      },
      javascript: {
        files: 'assets/js/*.js',
        tasks: ['jshint', 'uglify:dev']
      }
    },
    browserSync: {
      dev: {
        files: {
          src : [
            './style.css',
            'js/*.js',
            '**/*.php'
          ]
        },
        options: {
          proxy: 'localhost/wp',
          watchTask: true
        }
      }
    }
  });

  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-browser-sync');
  grunt.loadNpmTasks('grunt-checktextdomain');
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-compress');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-hub');
  grunt.loadNpmTasks('grunt-pot');
  grunt.loadNpmTasks('grunt-scss-lint');
  grunt.loadNpmTasks('grunt-todo');

  grunt.registerTask('validate', ['todo', 'scsslint', 'jshint']);

  grunt.registerTask('dev', ['clean', 'copy', 'sass:dev', 'autoprefixer:dev', 'uglify:dev', 'checktextdomain', 'pot']);
  grunt.registerTask('prod', ['clean', 'copy', 'sass:prod', 'autoprefixer:prod', 'uglify:prod', 'checktextdomain', 'pot']);
  grunt.registerTask('wporg', ['clean', 'copy', 'sass:wporg', 'autoprefixer:prod', 'uglify:prod', 'checktextdomain', 'pot']);

  grunt.registerTask('zip', 'Make a zip file for installation.', function() {
    grunt.log.writeln('Zipping up the project.');
    grunt.task.run('compress');
  });

  grunt.registerTask('default', ['browserSync', 'watch']);
};
