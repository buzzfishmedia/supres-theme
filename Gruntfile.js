module.exports = function(grunt) {

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		watch: {
			sass: {
				files: ["**/*.scss"],
				tasks: ['sass']
			}
		},
		sass:{
			dist: {
				options: {
					style: 'expanded'
				},
				files: {
					'assets/css/main.css': 'scss/main.scss',
					'assets/css/owl.custom.theme.css': 'scss/owltheme.scss'
				}
			}
		},
		bowercopy: {
			scss: {
				options: {
					destPrefix: 'scss/'
				},
				files: {
					'scss/': 'grout/scss/'
				}
			}
		}

	});

	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-bowercopy');

	grunt.registerTask('default', ['sass']);
};