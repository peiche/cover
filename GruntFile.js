/*!
 * Cover Gruntfile
 * http://eichefam.net/projects/cover
 * @author Paul Eiche
 */
 
/**
 * Grunt Module
 */
module.exports = function(grunt) {
	
    var target = grunt.option('target') || 'prod';
    
    grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
        copy: {
            main: {
                files: [
                    {
                        cwd: 'bower_components/font-awesome/fonts',
                        src: '**/*',
                        dest: 'fonts',
                        expand: true
                    },
                    {
                        cwd: 'bower_components/skrollr/dist',
                        src: 'skrollr.min.js',
                        dest: 'js',
                        expand: true
                    },
                    {
                        cwd: 'bower_components/headroom.js/dist',
                        src: 'headroom.min.js',
                        dest: 'js',
                        expand: true
                    }
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
            prod: {
                options: {
                    style: 'compressed',
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
            dist: {
                files: {
                    'style.css': 'style.css'
                }
            }
        },
        jshint: {
            files: ['GruntFile.js', 'js/src/*.js'],
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
                    cwd: 'js/src',
                    dest: 'js',
                    src: '**/*.js',
                    ext: '.min.js'
                }]
            }
        },
        watch: {
			css: {
				files: 'sass/*.scss',
				tasks: ['scsslint', 'sass:' + target, 'autoprefixer']
			},
            javascript: {
                files: 'js/src/*.js',
                tasks: ['jshint', 'uglify']
            }
		},
        compress: {
            main: {
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
    grunt.loadNpmTasks('grunt-scss-lint');
    
    grunt.registerTask('build', ['copy', 'sass:' + target, 'autoprefixer', 'uglify']);
	grunt.registerTask('validate', ['scsslint', 'jshint']);
	grunt.registerTask('default', ['scsslint', 'watch']);
    
    grunt.registerTask('zip', 'Make a zip file for installation.', function() {
        grunt.log.writeln('Zipping up the project.');
        grunt.task.run('compress');
    });
};
