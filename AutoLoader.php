<?php
class AutoLoader {
    public function register($path): void
    {
        if (is_dir($path)) {
            $files = scandir($path);

            foreach ($files as $file) {
                if (strripos($file, '.php')) {
                    require "$path/$file";
                }
            }

        } else {
            throw new Exception("Fail register $path");
        }
    }
}
