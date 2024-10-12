import {defineConfig} from 'vite';
export default defineConfig({
    build: {
        emptyOutDir: false,
        rollupOptions: {
            input: ['resources/js/easymde.js', "resources/css/easymde.css"],
          output: {
            entryFileNames: `easymde.js`,
            assetFileNames: file => {
              let ext = file.name.split('.').pop()

              return '[name].[ext]'
            }
          }
        },
        outDir: 'public',
    },
});
