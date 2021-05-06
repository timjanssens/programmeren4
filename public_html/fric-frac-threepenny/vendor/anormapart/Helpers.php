<?php


namespace AnOrmApart;


class Helpers
{
    public static function escape($html) {
        return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
    }

    public static function escapeAssoc($assoc) {
        // cleanup $_POST array
        // omdat array_map niet met een associatieve array werkt
        // geven we die in twee keer door, de eerste keer de key's
        // de tweede keer de values
        return array_map(
            function($key, $value) {
                return array($key => self::escape($value));
            },
            array_keys($assoc),
            array_values($assoc)
        );
    }

    public static function cleanUpInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public static function isAssoc($var) {
        return is_array($var) && array_diff_key($var, array_keys(array_keys($var)));
    }

    /** ------------------ escapeArray  --------------------------
     *
     * Escapes scripts tags from input
     *
     * @lastmodified 26/01/2019
     * @author Jef Inghelbrecht - Entreprise de Modes et de Manieres Modernes - e3M
     * @version 1.0
     * @param $array with the values to be escaped
     * @return array
     */
    public static function escapeArray($array) {
        $cleanArray = array();
        foreach ($array as $key => $value) {
            $cleanArray[$key] = self::escape($value);
        }
        return $cleanArray;
    }
}