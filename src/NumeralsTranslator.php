<?php
namespace Pixxet;

class NumeralsTranslator
{
    protected static $map = [
        'arabic'          => ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'],
        'bengali'         => ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'],
        'chinese_simple'  => ['〇', '一', '二', '三', '四', '五', '六', '七', '八', '九'],
        'chinese_complex' => ['零', '壹', '貳', '參', '肆', '伍', '陸', '柒', '捌', '玖'],
        'hua_ma'          => ['〇', '〡', '〢', '〣', '〤', '〥', '〦', '〧', '〨', '〩'],
        'devanagari'      => ['०', '१', '२', '३', '४', '५', '६', '७', '८', '९'],
        'gujarati'        => ['૦', '૧', '૨', '૩', '૪', '૫', '૬', '૭', '૮', '૯'],
        'gurmukhi'        => ['੦', '੧', '੨', '੩', '੪', '੫', '੬', '੭', '੮', '੯'],
        'kannada'         => ['೦', '೧', '೨', '೩', '೪', '೫', '೬', '೭', '೮', '೯'],
        'khmer'           => ['០', '១', '២', '៣', '៤', '៥', '៦', '៧', '៨', '៩'],
        'lao'             => ['໐', '໑', '໒', '໓', '໔', '໕', '໖', '໗', '໘', '໙'],
        'limbu'           => ['᥆', '᥇', '᥈', '᥉', '᥊', '᥋', '᥌', '᥍', '᥎', '᥏'],
        'malayalam'       => ['൦', '൧', '൨', '൩', '൪', '൫', '൬', '൭', '൮', '൯'],
        'mongolian'       => ['᠐', '᠑', '᠒', '᠓', '᠔', '᠕', '᠖', '᠗', '᠘', '᠙'],
        'myanmar'         => ['၀', '၁', '၂', '၃', '၄', '၅', '၆', '၇', '၈', '၉'],
        'odia'            => ['୦', '୧', '୨', '୩', '୪', '୫', '୬', '୭', '୮', '୯'],
        'tamil'           => ['௦', '௧', '௨', '௩', '௪', '௫', '௬', '௭', '௮', '௯'],
        'telugu'          => ['౦', '౧', '౨', '౩', '౪', '౫', '౬', '౭', '౮', '౯'],
        'thai'            => ['๐', '๑', '๒', '๓', '๔', '๕', '๖', '๗', '๘', '๙'],
        'tibetan'         => ['༠', '༡', '༢', '༣', '༤', '༥', '༦', '༧', '༨', '༩'],
        'urdu'            => ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'],
        'geez_ethiopic'   => ['0', '፩', '፪', '፫', '፬', '፭', '፮', '፯', '፰', '፱'],
        // 'roman'           => ['0', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX'],
    ];

    protected static $numerals_regex = [
        'arabic'          => '([٠١٢٣٤٥٦٧٨٩])',
        'bengali'         => '([০১২৩৪৫৬৭৮৯])',
        'chinese_simple'  => '([〇一二三四五六七八九])',
        'chinese_complex' => '([零壹貳參肆伍陸柒捌玖])',
        'hua_ma'          => '([〇〡〢〣〤〥〦〧〨〩])',
        'devanagari'      => '([०१२३४५६७८९])',
        'geez_ethiopic'   => '([0፩፪፫፬፭፮፯፰፱])',
        'gujarati'        => '([૦૧૨૩૪૫૬૭૮૯])',
        'gurmukhi'        => '([੦੧੨੩੪੫੬੭੮੯])',
        'kannada'         => '([೦೧೨೩೪೫೬೭೮೯])',
        'khmer'           => '([០១២៣៤៥៦៧៨៩])',
        'lao'             => '([໐໑໒໓໔໕໖໗໘໙])',
        'limbu'           => '([᥆᥇᥈᥉᥊᥋᥌᥍᥎᥏])',
        'malayalam'       => '([൦൧൨൩൪൫൬൭൮൯])',
        'mongolian'       => '([᠐᠑᠒᠓᠔᠕᠖᠗᠘᠙])',
        'myanmar'         => '([၀၁၂၃၄၅၆၇၈၉])',
        'odia'            => '([୦୧୨୩୪୫୬୭୮୯])',
        'tamil'           => '([௦௧௨௩௪௫௬௭௮௯])',
        'telugu'          => '([౦౧౨౩౪౫౬౭౮౯])',
        'thai'            => '([๐๑๒๓๔๕๖๗๘๙])',
        'tibetan'         => '([༠༡༢༣༤༥༦༧༨༩])',
        'urdu'            => '([۰۱۲۳۴۵۶۷۸۹])',
        // 'roman'           => 'M{0,4}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})',
    ];

    /**
     * Translates any numeral string or array value to western arabic numerals
     *
     * @param  {array|string} $input
     *
     * @return {array|string} translated string or array
     */
    public static function TranslateNumerals($input)
    {

        if (is_array($input)) {
            foreach ($input as $key => $value) {
                $input[$key] = self::TranslateNumerals($value);
            }
        } else {
            $input = self::_TranslateNumerals($input);
        }

        return $input;
    }

    /**
     * Translates any numeral string to western arabic numerals
     *
     * @param  {string} $string
     *
     * @return {string} translated string
     */
    private static function _TranslateNumerals($string)
    {
        if (!is_string($string)) {
            return $string;
        }

        foreach (self::$numerals_regex as $regex_name => $regex) {
            if (preg_match_all('/' . $regex . '/u', $string, $matches)) {
                foreach ($matches[0] as $search) {
                    $replace = array_search($search, self::$map[$regex_name]);
                    $string  = str_replace($search, $replace, $string);
                }
            }
        }

        return $string;
    }

}
