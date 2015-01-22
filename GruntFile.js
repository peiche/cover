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
		}
        
        /*
        wp_readme_to_markdown: {
            your_target: {
                files: {
                    'readme.md': 'readme.txt'
                }
            },
        }
        */
	});
    
    grunt.loadNpmTasks('grunt-scss-lint');
    grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    
    //grunt.loadNpmTasks('grunt-wp-readme-to-markdown');
    
    grunt.registerTask('build', ['sass:' + target, 'autoprefixer', 'uglify']); // wp_readme_to_markdown
	grunt.registerTask('validate', ['scsslint', 'jshint']);
	grunt.registerTask('default', ['scsslint', 'watch']);
};
