module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    postcss: {
      options: {
        map: true, // inline sourcemaps 

        // or 
        map: {
            inline: false, // save all sourcemaps as separate files... 
            annotation: '/' // ...to the specified directory 
        },

        processors: [
          require('autoprefixer')({browsers: 'last 2 versions'}), // add vendor prefixes 
          require('cssnano')(), // minify the result 
          require('postcss-flexibility'), // add vendor prefix for flex-fallback
        ]
      },
      dist: {
        src: '*.css'
      }
    },
    watch: {
      scripts: {
        files: ['**/*.css'],
        tasks: ['postcss'],
      },
    }
  });

  grunt.loadNpmTasks('grunt-postcss');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.registerTask('default', ['postcss']);

};