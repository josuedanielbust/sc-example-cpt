module.exports =  function(grunt) {
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-sass');

	grunt.initConfig({
		copy: {
			main: {
				expand: true,
				src: ['*.php', 'admin/**', 'includes/**', 'languages/**', 'public/**', 'README.md', 'LICENSE.md'],
				dest: '/Users/josuedanielbust/Local\ Sites/tt/app/public/wp-content/plugins/cpt_example/',
			},
			dist: {
				expand: true,
				src: ['*.php', 'admin/**', 'includes/**', 'languages/**', 'public/**', 'README.md', 'LICENSE.md'],
				dest: 'dist/',
			}
		},
		watch: {
			copy: {
				files: ['*.*', 'admin/**', 'includes/**', 'languages/**', 'public/**', 'README.md', 'LICENSE.md', '!dist/**'],
				tasks: ['dist'],
				options: {
					event: ['all'],
					dateFormat: function(time) {
						grunt.log.writeln(('COPY watch finished in ' + time + 'ms')['cyan']);
						grunt.log.writeln('Waiting for more changes...'['green']);
					},
				},
			},
			sass: {
				files: ['sass/*.scss'],
				tasks: ['sass'],
				options: {
					event: ['all'],
					dateFormat: function(time) {
						grunt.log.writeln(('SASS watch finished in ' + time + 'ms')['cyan']);
						grunt.log.writeln('Waiting for more changes...'['green']);
					},
				},
			}
		},
		sass: {
			dist: {
				options: {
					style: 'compact'
				},
				files: {
					'admin/css/cpt-example-admin.css': 'sass/cpt-example-admin.scss',
					'public/css/cpt-example-public.css': 'sass/cpt-example-public.scss',
				}
			}
		},
	});

	grunt.registerTask('default', ['watch']);
	grunt.registerTask('dist', ['copy:main']);
	grunt.registerTask('styles', ['sass']);
};
