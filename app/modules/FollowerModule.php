<?php

/**
 * Class FollowerModule
 */
class FollowerModule {
    private static $nonfollowers = [];

    /**
     * @param $src
     * @return void
     * @throws \Exception
     */
    public static function generate($src)
    {
        if (!is_dir($src . '/followers_and_following')) {
            throw new \Exception('No follower data found in source');
        }

        if (!file_exists($src . '/followers_and_following/following.json')) {
            throw new \Exception('File \'/followers_and_following/following.json\' does not exist');
        }

        $following = json_decode(file_get_contents($src . '/followers_and_following/following.json'), true);
        if (!isset($following['relationships_following'])) {
            throw new \Exception('Key \'relationships_following\' not found in following.json');
        }

        $followers = [];

        $files = scandir($src . '/followers_and_following');
        foreach ($files as $file) {
            if (strpos($file, 'followers') !== false) {
                $followers[] = json_decode(file_get_contents($src . '/followers_and_following/' . $file), true);
            }
        }

        $followers_all = [];

        foreach ($followers as $followers_subarr) {
            foreach ($followers_subarr as $key => $value) {
                $followers_all[$key] = $value;
            }
        }

        $followers = $followers_all;

        static::$nonfollowers = [];

        array_walk($following['relationships_following'], function($value, $key) use ($followers) {
            if (isset($value['string_list_data'])) {
                $username = $value['string_list_data'][0]['value'];
                
                $found = false;

                array_walk($followers, function($value2, $key2) use ($username, &$found) {
                    if (isset($value2['string_list_data'][0]['value'])) {
                        if ($username === $value2['string_list_data'][0]['value']) {
                            $found = true;
                        }
                    }
                });

                if (!$found) {
                    static::$nonfollowers[] = $value['string_list_data'][0];
                }
            }
        });
    }

    /**
     * @return array
     */
    public static function getNonfollowers()
    {
        return static::$nonfollowers;
    }
}
