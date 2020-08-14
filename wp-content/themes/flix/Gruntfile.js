module.exports = function(grunt) {

    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        uglify: {
            js: {
                options: {
                    sourceMap: true
                },
                files: {
                    'assets/js/min.js' : [
                        'assets/js/imagesloaded.js',
                        'assets/js/fitvids.js',
                        'assets/js/sticky-kit.js',
                        'assets/js/owl-carousel.js',
                        'assets/js/modernizr.js',
                        'assets/js/dlmenu.js',
                        'assets/js/main.js'
                    ]
                }
            }
        },
        cssmin: {
            css: {
                files: {
                    'assets/css/min.css' : [
                        'assets/css/font-awesome.css',
                        'assets/css/vlog-font.css',
                        'assets/css/bootstrap.css',
                        'assets/css/animate.css',
                        'assets/css/owl-carousel.css',
                        'assets/css/dynamic-css.css',
                        'assets/css/main.css'
                    ]
                }
            }
        }
    });
};
