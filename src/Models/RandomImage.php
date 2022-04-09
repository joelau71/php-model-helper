<?php

namespace MyFirstPackage\Models;

class RandomImage {
    public $width;
    public $height;
    public $name;

    public function __construct($width, $height, $name)
    {
        $this->width = $width;
        $this->height = $height;
        $this->name = $name;
    }

    public function store($path) {
        $url = "https://source.unsplash.com/{$this->width}x{$this->height}/?{$this->name}";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        if (preg_match('~Location: (.*)~i', $result, $match)) {
            $url = trim($match[1]);
        }

        $ch = curl_init($url);
        $fp = fopen($path, 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);
    }
}