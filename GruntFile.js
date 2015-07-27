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
    copy: {
      build: {
        files: [
          {
            cwd: 'bower_components/font-awesome/fonts',
            src: '**/*',
            dest: 'fonts',
            expand: true
          },
          {
            cwd: 'bower_components/headroom.js/dist',
            src: 'headroom.min.js',
            dest: 'js',
            expand: true
          },
          {
            cwd: 'bower_components/skrollr/dist',
            src: 'skrollr.min.js',
            dest: 'js',
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
            dest: 'js',
            expand: true
          },
        ]
      }
    },
    scsslint: {
      allFiles: ['sass/*.scss'],
      options: {
        config: '.scss-lint.yml',
        exclude: 'sass/FontAwesome',
        reporterOutput: 'report/scss-lint-report.xml',
        colorizeOutput: true
      },
    },
    sass: {
      build: {
        options: {
          style: 'expanded',
          noCache: true,
          sourcemap: 'none',
          unixNewlines: true
        },
        files: {
          'style.css': 'sass/style.scss'
        }
      },
    },
    autoprefixer: {
      build: {
        files: {
          'style.css': 'style.css'
        }
      }
    },
    jshint: {
      files: ['GruntFile.js', 'js/src/*.js'],
      options: {
        'jshintrc': true
      }
    },
    uglify: {
      options: {
        compress: {
          //pure_funcs: [ 'console.log' ]
        }
      },
      build: {
        files: [{
          expand: true,
          cwd: 'js/src',
          dest: 'js',
          src: '**/*.js',
          ext: '.min.js'
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
        files: 'sass/*.scss',
        tasks: ['scsslint', 'sass', 'autoprefixer']
      },
      javascript: {
        files: 'js/src/*.js',
        tasks: ['jshint', 'uglify']
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
              '!GruntFile.js',
              '!bower_components/**',
              '!js/src/**',
              '!node_modules/**',
              '!releases/**',
              '!report/**',
              '!sass/**'
            ]
          }
        ]
      }
    }
  });

  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-contrib-compress');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-pot');
  grunt.loadNpmTasks('grunt-scss-lint');

  grunt.registerTask('build', ['copy', 'sass', 'autoprefixer', 'uglify']);
  grunt.registerTask('validate', ['scsslint', 'jshint']);
  grunt.registerTask('default', ['scsslint', 'watch']);

  grunt.registerTask('zip', 'Make a zip file for installation.', function() {
    grunt.log.writeln('Zipping up the project.');
    grunt.task.run('compress');
  });
};
