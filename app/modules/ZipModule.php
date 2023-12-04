<?php

/**
 * Class ZipModule
 */
class ZipModule {
    /**
     * @param $src
     * @param $out
     * @return string
     * @throws \Exception
     */
    public static function extract($src, $out = null)
    {
        $zip = new ZipArchive();
        if (!$zip->open($src)) {
            throw new \Exception('Failed to open archive: ' . $src);
        }

        if ($out === null) {
            $name = md5(random_bytes(55) . date('Y-m-d H:i:s'));
        } else {
            $name = $out;
        }
        
        $zip->extractTo(public_path() . '/archives/' . $name);
        $zip->close();

        return $name;
    }
}
