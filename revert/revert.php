<?php

namespace Revert;

class Revert
{
    /**
     * @param string $str
     * @return string - reversed string
     */
    public static function revertCharacters(string $str): string
    {
        $words = explode(' ', $str);
        $result = '';

        foreach ($words as $k => $word) {
            $str = mb_str_split($word, 1, 'UTF-8');
            $uppercase = [];
            $subWord = [];

            $i = 0;
            foreach ($str as $symbol) {
                if (ctype_punct($symbol)) {
                    $reversed = array_reverse($subWord);
                    foreach ($uppercase as $index) {
                        $reversed[$index] = mb_strtoupper($reversed[$index], "utf-8");
                    }
                    $result .= implode($reversed) . $symbol;
                    $uppercase = [];
                    $subWord = [];
                    $i = 0;
                    continue;
                }
                if ($symbol === mb_strtoupper($symbol, 'UTF-8') && !ctype_digit($symbol)) {
                    $uppercase[] = $i;
                }
                $subWord[] = mb_strtolower($symbol, 'UTF-8');
                $i++;
            }
            if ($i !== 0) {
                $reversed = array_reverse($subWord);
                foreach ($uppercase as $index)
                    $reversed[$index] = mb_strtoupper($reversed[$index], "utf-8");
                $result .= implode($reversed);
            }
            if ($k !== (count($words) - 1))
                $result .= ' ';
        }

        return $result;
    }

}
