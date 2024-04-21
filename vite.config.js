import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { resolve } from 'path';
import * as glob from 'glob';

function getJavaScriptFiles(src) {
    return glob.sync(resolve(__dirname, src)).map(path => path.replace(resolve(__dirname, 'resources'), ''));
}

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                ...getJavaScriptFiles('/resources/**/*.js')
            ],
            refresh: true,
        }),
    ],
});
