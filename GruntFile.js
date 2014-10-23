/*!
 * Cover Gruntfile
 * http://eichefam.net/projects/cover
 * @author Paul Eiche
 */
 
'use strict';
 
/**
 * Grunt Module
 */
module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
        sass: {
            dev: {
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
            dist: {
                options: {
                    style: 'compressed',
                    noCache: true,
                    sourcemap: 'none',
                    unixNewlines: true
                },
                files: {
                    'style.min.css': 'sass/style.scss'
                }
            },
		},
        csslint: {
            options: {
                formatters: [
                    {
                        id: 'text',
                        dest: 'report/csslint.txt'
                    }
                ]
            },
            strict: {
                options: {
                    import: 2,
                    'box-sizing': false,
                    'adjoining-classes': false
                },
                src: ['style.css']
            }
        },
        jshint: {
            options: {
                "bitwise": true,
                "browser": true,
                "curly": true,
                "eqeqeq": true,
                "eqnull": true,
                "es5": true,
                "esnext": true,
                "immed": true,
                "jquery": true,
                "latedef": true,
                "newcap": true,
                "noarg": true,
                "node": true,
                "strict": false,
                "trailing": true,
                "undef": true,
                "globals": {
                "jQuery": true,
                    "alert": true
                }
            },
            all: [
                'Gruntfile.js',
                'src/cover.js'
            ]
        },
        uglify: {
            my_target: {
                files: {
                    'js/cover.min.js': ['src/cover.js'],
                    'js/customizer.min.js': ['src/customizer.js'],
                    'js/skip-link-focus-fix.min.js': ['src/skip-link-focus-fix.js']
                }
            }
        },
        watch: {
			css: {
				files: 'sass/*.scss',
				tasks: ['sass', 'csslint']
			},
            javascript: {
                files: 'src/*.js',
                tasks: ['uglify'] // FIXME: add jshint
            }
		}
	});
    
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-csslint');
	grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-watch');
    
	grunt.registerTask('sasslint', ['sass', 'csslint']); // FIXME: add jshint
    grunt.registerTask('default', ['sass', 'csslint', 'uglify', 'watch']); // FIXME: add jshint
};