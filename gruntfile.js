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
        src: ['gruntfile-secondary.js']
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
            cwd: 'bower_components/font-awesome/fonts',
            src: '**/*',
            dest: 'dist/fonts',
            expand: true
          },
          {
            cwd: 'bower_components/headroom.js/dist',
            src: 'headroom.min.js',
            dest: 'dist/js',
            expand: true
          },
          {
            cwd: 'bower_components/tgm-plugin-activation',
            src: 'class-tgm-plugin-activation.php',
            dest: 'inc',
            expand: true
          },
          {
            cwd: 'bower_components/unslider/src',
            src: 'unslider.min.js',
            dest: 'dist/js',
            expand: true
          },
          {
            cwd: 'bower_components/masonry/dist',
            src: 'masonry.pkgd.min.js',
            dest: 'dist/js',
            expand: true
          },
          {
            cwd: 'bower_components/aesop-core/public/assets/css',
            src: 'ai-core.css',
            dest: 'assets/sass/plugins/aesop',
            expand: true,
            rename: function(dest, src) {
              return dest + '/_' + src.replace('.css', '.scss');
            }
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
				githubBoxes: true,
				colophon: true,
				usePackage: true
			},
			src: [
        'assets/**/*',
        '*.php',
        'inc/**/*',
        '!inc/class-tgm-plugin-activation.php'
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
          correct_domain: true, // correct text-domain instances (i.e., in class-tgm-plugin-activation)
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
            '*.php',
            'inc/*.php' // no way to flag all and ignore certain directories?
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
          '!bower_components/**',
          '!node_modules/**'
        ],
        expand: true
      }
    },
    watch: {
      css: {
        files: 'assets/sass/*.scss',
        tasks: ['scsslint', 'sass:dev', 'autoprefixer']
      },
      javascript: {
        files: 'assets/js/*.js',
        tasks: ['jshint', 'uglify:dev']
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
              '!assets/**',
              '!bower_components/**',
              '!node_modules/**',
              '!releases/**',
              '!report/**'
            ]
          }
        ]
      }
    }
  });

  grunt.loadNpmTasks('grunt-autoprefixer');
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

  grunt.registerTask('dev', ['clean', 'copy', 'sass:dev', 'autoprefixer:dev', 'uglify:dev', 'checktextdomain', 'checktextdomain', 'pot']);
  grunt.registerTask('prod', ['clean', 'copy', 'sass:prod', 'autoprefixer:prod', 'uglify:prod', 'checktextdomain', 'checktextdomain', 'pot']);
  grunt.registerTask('wporg', ['clean', 'copy', 'sass:wporg', 'autoprefixer:prod', 'uglify:prod', 'checktextdomain', 'checktextdomain', 'pot']);

  grunt.registerTask('default', ['scsslint', 'jshint', 'watch']);

  grunt.registerTask('zip', 'Make a zip file for installation.', function() {
    grunt.log.writeln('Zipping up the project.');
    grunt.task.run('compress');
  });
};
