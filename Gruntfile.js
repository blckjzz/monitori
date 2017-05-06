module.exports = (grunt) => {

  grunt.initConfig({
      sass: {
        dist: {
          files: {
            'interface/css/main.css': 'interface/css/scss/main.scss'
          }
        }
      },
      imagemin: {
         dynamic: {
           files: [{
             expand: true,
             cwd: 'interface/pre-img',
             src: ['images/*.{png,jpg,gif}'],
             dest: 'interface/images'
           }]
         }
       },
      cssmin: {
        options: {
          mergeIntoShorthands: false,
          roundingPrecision: -1
        },
        target: {
          files: {
            'interface/css/main.min.css': ['interface/css/main.css']
          }
        }
      },
      uglify: {
        my_target: {
          files: {
            'interface/js/scripts.min.js': ['interface/js/libs/*.js','interface/js/partials/*.js']
          }
        }
      },
      watch: {
        css: {
          files: ['**/*.scss'],
          tasks: ['sass', 'cssmin'],
          options: {
            spawn: false,
          },
        },
        scripts: {
          files: ['interface/js/libs/*.js','interface/js/partials/*.js'],
          tasks: ['uglify'],
          options: {
            spawn: false,
          },
        }
      }
    });

    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-imagemin');

    grunt.registerTask('development', ['watch']);
    grunt.registerTask('production', ['imagemin']);
};
