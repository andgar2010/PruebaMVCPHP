'use strict';

module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    watch: { },
    browserSync: {
            default_options: {
                bsFiles: {
                    src: [
                        "./src/assets/css/*.css",
                        "./src/assets/js/*.js",
                        "./src/*.html",
                        "./src/*.php"
                    ]
                },
                options: {
                    watchTask: true,
                    proxy: "http://localhost:8080/testempleado/src/"
                }
            }
        }
  });

  // These plugins provide necessary tasks.
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks("grunt-browser-sync");

  // Default task.
  grunt.registerTask('default', ['browserSync' ,'watch']);

};
