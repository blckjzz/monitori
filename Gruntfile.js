module.exports = () => {

  grunt.initConfig({
      sass: {
        dist: {
          files: {
            'hackathon-unirio/public/css/main.css': 'hackathon-unirio/public/css/scss/main.scss'
          }
        }
      },
      imagemin: {
         dynamic: {
           files: [{
             expand: true,
             cwd: 'hackathon-unirio/public/pre-img',
             src: ['images/*.{png,jpg,gif}'],
             dest: 'hackathon-unirio/public/images'
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
            'hackathon-unirio/public/css/main.min.css': ['hackathon-unirio/public/css/main.css']
          }
        }
      },
      uglify: {
        my_target: {
          files: {
            'hackathon-unirio/public/js/scripts.min.js': ['hackathon-unirio/public/js/libs/*.js','hackathon-unirio/public/js/partials/*.js']
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
          files: ['hackathon-unirio/public/js/libs/*.js','hackathon-unirio/public/js/partials/*.js'],
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
