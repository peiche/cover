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
        scsslint: {
            allFiles: ['sass/*.scss'],
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
        // FIXME csslint?
        jshint: {
            files: ['GruntFile.js', 'src/*.js'],
            options: {
                'globals': {
                    jQuery: true,
                    alert: true,
                    Headroom: true,
                    skrollr: true,
                    wp: true
                }
            }
        },
        uglify: {
            build: {
                files: [{
                    expand: true,
                    cwd: 'src',
                    dest: 'js',
                    src: '**/*.js',
                    ext: '.min.js'
                }]
            }
        },
        watch: {
			css: {
				files: 'sass/*.scss',
				tasks: ['scsslint', 'sass'] // FIXME csslint?
			},
            javascript: {
                files: 'src/*.js',
                tasks: ['jshint', 'uglify']
            }
		}
	});
    
    grunt.loadNpmTasks('grunt-scss-lint');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    
    grunt.registerTask('build', ['scsslint', 'sass', 'jshint', 'uglify']); // FIXME csslint?
	grunt.registerTask('default', ['scsslint', 'sass', 'jshint', 'uglify', 'watch']); // FIXME csslint?
};
