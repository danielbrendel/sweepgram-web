<?php

/**
 * Class DirModule
 */
class DirModule {
    /**
     * @param $folder
     * @return void
     * @throws \Exception
     */
    public static function clearFolder($folder)
    {
        try {
            if (!is_dir($folder)) {
                throw new \Exception('Invalid folder: ' . $folder);
            }

            if (substr($folder, strlen($folder) - 1, 1) !== DIRECTORY_SEPARATOR) {
                $folder .= DIRECTORY_SEPARATOR;
            }

            $items = glob($folder . '*', GLOB_MARK);
            foreach ($items as $key => $value) {
                if (is_dir($value)) {
                    static::clearFolder($value);
                } else {
                    unlink($value);
                }
            }
            
            rmdir($folder);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
