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
            options: {
                style: 'compressed',
                noCache: true,
				sourcemap: 'none',
				unixNewlines: true
            },
			dist: {
				files: {
					'style.css' : 'sass/style.scss'
				}
			}
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
				tasks: ['sass']
			},
            javascript: {
                files: 'src/*.js',
                tasks: ['uglify']
            }
		}
	});
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
	
	grunt.registerTask('default', ['watch']);
}