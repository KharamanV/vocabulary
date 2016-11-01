<?php

namespace App\Helpers;

class HashHelper
{
    /**
     * Get the md5 hash
     *
     * @param string $word Word, that you want to hash
     * @return string Hashed word
     */
    public static function hashByMd5($word) {
        return  md5($word->name);
    }

    /**
     * Get the sha1 hash
     *
     * @param string $word Word, that you want to hash
     * @return string Hashed word
     */
    public static function hashBySha1($word) {
        return sha1($word->name);
    }

    /**
     * Get the crypt hash
     *
     * @param string $word Word, that you want to hash
     * @return string Hashed word
     */
    public static function hashByCrypt($word) {
        return crypt($word->name, str_random(10));
    }

    /**
     * Get the crc32 hash
     *
     * @param string $word Word, that you want to hash
     * @return string Hashed word
     */
    public static function hashByCrc32($word) {
        return hash('crc32', $word->name);
    }

    /**
     * Get the sha256 hash
     *
     * @param string $word Word, that you want to hash
     * @return string Hashed word
     */
    public static function hashBySha256($word) {
        return hash('sha256', $word);
    }
}