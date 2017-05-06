module.exports = (grunt) => {

  grunt.initConfig({
      sass: {
        dist: {
          files: {
            'css/main.css': 'css/scss/main.scss'
          }
        }
      },
      imagemin: {
         dynamic: {
           files: [{
             expand: true,
             cwd: 'pre-img',
             src: ['images/*.{png,jpg,gif}'],
             dest: 'images'
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
            'css/main.min.css': ['css/main.css']
          }
        }
      },
      uglify: {
        my_target: {
          files: {
            'js/scripts.min.js': ['js/libs/*.js','js/partials/*.js']
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
          files: ['js/libs/*.js','js/partials/*.js'],
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
