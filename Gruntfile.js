module.exports = function(grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON("package.json"),
        basedir: require("path").resolve("."),
        test_app_uri: "http://localhost/webino/<%= pkg.name %>/._test/ZendSkeletonApplication/public/",
        clean: {
            log: {
                src: ["._log"]
            },
            test_app_vendor: {
                src: ["._test/ZendSkeletonApplication/vendor"]
            },
            test_app_cfg: {
                src: ["._test/ZendSkeletonApplication/config/application.config.php"]
            }
        },
        mkdir: {
            log: {
                options: {
                    create: [
                        "._log",
                        "._log/api",
                        "._log/code-browser",
                        "._log/coverage"
                    ]
                }
            }
        },
        exec: {
            classmap: {
                cmd: "php vendor/bin/classmap_generator.php -l src/<%= pkg.name %>"
            },
            didef: {
                cmd: "php bin/definition_generator.php"
            },
            phploc: {
                cmd: "vendor/bin/phploc --log-csv ._log/phploc.csv src"
            },
            pdepend: {
                cmd: "vendor/bin/pdepend --summary-xml=._log/pdepend.xml --jdepend-xml=._log/jdepend.xml --jdepend-chart=._log/dependencies.svg --overview-pyramid=._log/overview-pyramid.svg src"
            },
            phpcb: {
                cmd: "vendor/bin/phpcb --log ._log --source src --output ._log/code-browser"
            },
            phpdoc: {
                cmd: "vendor/bin/phpdoc.php"
            },
            selenium: {
                cmd: "URI='" + (grunt.option('uri') || "<%= test_app_uri %>") + "' vendor/bin/phpunit -c test/selenium"
            },
            link_precommit: {
                cmd: "ln -s <%= basedir %>/pre-commit <%= basedir %>/.git/hooks/pre-commit && chmod +x <%= basedir %>/pre-commit"
            },
            add_classmap: {
                cmd: "git add src/<%= pkg.name %>/autoload_classmap.php"
            },
            add_didef: {
                cmd: "git add data/di"
            },
            get_composer: {
                cmd: "curl -sS https://getcomposer.org/installer | php"
            },
            composer_self_update: {
                cmd: "php composer.phar self-update"
            },
            composer_update_dev: {
                cmd: "php composer.phar update --dev --no-interaction"
            },
            get_test_app: {
                cmd: "git clone git://github.com/zendframework/ZendSkeletonApplication.git ._test/ZendSkeletonApplication"
            },
            test_app_reset: {
                cmd: "cd ._test/ZendSkeletonApplication && git reset HEAD --hard"
            },
            test_app_clean: {
                cmd: "cd ._test/ZendSkeletonApplication && git clean -fdx"
            },
            test_app_pull: {
                cmd: "cd ._test/ZendSkeletonApplication && git pull origin master"
            },
            test_app_link_vendor: {
                cmd: "ln -s <%= basedir %>/vendor <%= basedir %>/._test/ZendSkeletonApplication/vendor"
            },
            test_app_link_cfg: {
                cmd: "ln -s <%= basedir %>/test/resources/config/application.config.php <%= basedir %>/._test/ZendSkeletonApplication/config/application.config.php"
            }
        },
        phplint: {
            src: ["src/**/*.php"],
            test: ["test/**/*.php"],
            config: ["config/**/*.php"]
        },
        phpunit: {
            options: {
                configuration: "test",
                bin: "vendor/bin/phpunit",
                coverageHtml: "<%= basedir %>/._log/coverage",
                testdoxHtml: "<%= basedir %>/._log/testdox.html",
                coverageClover: "<%= basedir %>/._log/clover.html",
                logJunit: "<%= basedir %>/._log/junit.xml",
                colors: true
            },
            package: {dir: ""}
        },
        phpcs: {
            options: {
                standard: "PSR2",
                extensions: "php",
                bin: "vendor/bin/phpcs",
                report: "checkstyle",
                reportFile: "._log/checkstyle.html",
                verbose: true
            },
            package: {dir: ["src", "test"]}
        },
        phpmd: {
            options: {
                bin: "vendor/bin/phpmd",
                rulesets: "codesize,design,naming,unusedcode",
                reportFile: "._log/phpmd.xml"
            },
            package: {dir: "src/<%= pkg.name %>"}
        },
        phpcpd: {
            options: {
                bin: "vendor/bin/phpcpd",
                reportFile: "._log/pmd-cpd.xml"
            },
            package: {dir: "src"}
        },
        todos: {
            options: {
                priorities : {
                    low : null,
                    med : /(TODO|todo)/,
                    high : /(FIXME|fixme)/
                },
                reporter: {
                    header: function (options) {
                        grunt.file.write("._log/todos.txt", "");
                        return "-- Begin Task List --\n";
                    },
                    fileTasks: function (file, tasks, options) {
                        if (!tasks.length) {
                            return "";
                        }
                        var result = "";
                        result += "For " + file + "\n";
                        tasks.forEach(function (task) {
                            result += "[" + task.lineNumber + " - " + task.priority + "] " + task.line + "\n";
                        });
                        result += "\n";
                        grunt.file.write("._log/todos.txt", grunt.file.read("._log/todos.txt") + result);
                        return result;
                    },
                    footer: function () {
                        return "-- End Task List--\n";
                    }
                },
                verbose: false
            },
            package: {
                src: ["src/**/*.php"]
            }
        }
    });
    //
    grunt.registerTask(
        "build",
        "Build the package",
        [
            "update",
            "test",
            "exec:selenium",
            "analyze",
            "api"
        ]
    );
    grunt.registerTask(
        "update",
        "Update the package development environment",
        [
            "precommit:init",
            "composer:init",
            "test_app:init",
            "clean:test_app_vendor",
            "exec:test_app_link_vendor",
            "exec:composer_update_dev",
            "clean:test_app_cfg",
            "exec:test_app_link_cfg"
        ]
    );
    grunt.registerTask(
        "test",
        "Run PHPUnit tests",
        [
            "clean:log",
            "mkdir:log",
            "phplint",
            "phpunit",
            "phpcs"
        ]
    );
    grunt.registerTask(
        "analyze",
        "Analyze the code",
        [
            "phpmd",
            "exec:phploc",
            "exec:pdepend",
            "exec:phpcb",
            "todos"
        ]
    );
    grunt.registerTask(
        "api",
        "Generate API",
        ["exec:phpdoc"]
    );
    grunt.registerTask(
        "precommit:init",
        "Initialize git pre-commit",
        function() {
            if (grunt.file.isLink(".git/hooks/pre-commit")) {
                grunt.log.ok("Git pre-commit hook OK ...");
                return;
            }
            grunt.log.ok("Installing git pre-commit hook ...");
            grunt.task.run("exec:link_precommit");
        }
    );
    grunt.registerTask(
        "precommit",
        "Git pre-commit",
        [
            "exec:classmap",
            "test",
            "exec:didef",
            "exec:add_classmap",
            "exec:add_didef"
        ]
    );
    grunt.registerTask(
        "composer:init",
        "Initialize PHP composer",
        function() {
            if (grunt.file.isFile("composer.phar")) {
                grunt.log.ok("Updating composer.phar ...");
                grunt.task.run("exec:composer_self_update");
                return;
            }
            grunt.log.ok("Downloading composer.phar ...");
            grunt.task.run("exec:get_composer");
        }
    );
    grunt.registerTask(
        "test_app:init",
        "Initialize test application",
        function() {
            if (grunt.file.isDir("._test/ZendSkeletonApplication")) {
                grunt.log.ok("Updating test application ...");
                grunt.task.run(["exec:test_app_reset", "exec:test_app_clean", "exec:test_app_pull"]);
                return;
            }
            grunt.log.ok("Downloading test application ...");
            grunt.task.run("exec:get_test_app");
        }
    );
    //
    grunt.loadNpmTasks("grunt-exec");
    grunt.loadNpmTasks("grunt-contrib-clean");
    grunt.loadNpmTasks("grunt-mkdir");
    grunt.loadNpmTasks("grunt-phplint");
    grunt.loadNpmTasks("grunt-phpunit");
    grunt.loadNpmTasks("grunt-phpcs");
    grunt.loadNpmTasks("grunt-phpmd");
    grunt.loadNpmTasks("grunt-phpcpd");
    grunt.loadNpmTasks("grunt-todos");
};
