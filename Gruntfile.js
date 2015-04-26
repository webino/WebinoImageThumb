var root = '';
if (undefined === process.env.NODE_PATH) {
    console.error('NODE_PATH is not configured, trying to resolve.');
    root = (function () {
        try {
            require('shelljs/global');
            return exec('npm root -g', {silent: true}).output.trim() + '/';
        } catch(exc) {
            console.error('Assuming default NODE_PATH, did you initialize the module?');
        }
    })();

    root || (root = '/usr/lib/node_modules/');
    process.env.NODE_PATH = root;
}
module.exports = function(grunt) {
    grunt.initConfig((function () {
        return require(root + 'webino-devkit');
    })().config(grunt, ['module', 'github', 'zend']));
};
