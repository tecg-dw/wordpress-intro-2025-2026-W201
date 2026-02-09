import {defineConfig} from "vite";
import {globSync} from "glob";
import fs from "fs";

export default defineConfig({
  plugins: [
    {
      name: 'bundle-js',
      buildStart() {
        // Récupère tous les fichiers JS dans le répertoire spécifié
        const files = globSync('./wp-content/themes/dw/assets/js/app/*.js');

        // Fusionner tous les fichiers JS dans un seul fichier
        const combinedJs = files.map(file => fs.readFileSync(file, 'utf8')).join('\n\n');

        // Crée un fichier combiné dans le fichier main.js
        fs.writeFileSync('./wp-content/themes/dw/assets/js/main.js', combinedJs);
      }
    }
  ],
  build: {
    manifest: true,
    rollupOptions: {
      input: {
        js :  './wp-content/themes/dw/assets/js/main.js',
        scss :  './wp-content/themes/dw/assets/css/styles.scss',
      },
      output: {
        dir: './wp-content/themes/dw/public',
      }
    },
    assetsInlineLimit: 0,
    target: ["es2015"],
  }
});
