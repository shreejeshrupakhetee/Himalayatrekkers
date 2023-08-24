<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;


use App\Models\Comment;


if (!function_exists('getThumbnail')) {
    function getThumbnail($image, $type = 'cropped')
    {
        // We need to get extension type ( .jpeg , .png ...)
        $ext = pathinfo($image, PATHINFO_EXTENSION);

        // We remove extension from file name so we can append thumbnail type
        $toRemove = '.' . $ext;
        $name = explode($toRemove, $image)[0];

        // We merge original name + type + extension
        return $name . '-' . $type . '.' . $ext;
    }
}

if (!function_exists('makeUrl')) {
    function makeUrl($url)
    {
        $components = parse_url($url);
        return (empty($components['host'])) ? env('APP_URL') . $url : $url;
    }
}

if (!function_exists('makeArchives')) {
    function makeArchives($dateArray)
    {
        $newDate = array();
        foreach ($dateArray as $date) {

            $newDate[] = $date->created_at->format('F Y');
        }
        $newDate = array_unique($newDate);
        $archives = [];
        foreach ($newDate as $d) {
            $archives[] = ['title' => $d, 'slug' => str_replace(' ', '-', $d)];
        }
        return $archives;
    }
}

function current_page($uri)
{

    if ($uri != '/') {
        $uri = ltrim($uri, '/');
    }
    return request()->path() == $uri;
    // return strstr(request()->path(),$uri);
}





function is_dashboard()
{
    $route = Route::current();
    $prefix = $route->getPrefix();

    return !!str_replace('/', '', $prefix) == Config::get('awebooking.prefix_dashboard');
}


function list_hours($step = 30)
{
    $return = [];
    $start = 1;
    $end = 12;
    $time = ['AM', 'PM'];

    $return['12:00 AM'] = '00:00 AM';
    foreach ($time as $subfix) {
        if ($subfix == 'PM') {
            $start = 1;
            $end = 11;
        }
        for ($i = $start; $i <= $end; $i++) {
            for ($j = 0; $j <= 45; $j += $step) {
                if ($i == 12 && $subfix == 'AM') {
                    $time = sprintf('%02d:%02d %s', $i, $j, 'PM');
                } else {
                    $time = sprintf('%02d:%02d %s', $i, $j, $subfix);
                }

                $return[$time] = $time;
            }
        }
    }

    return $return;
}


function review_rating_star($rate)
{
    if (!empty($rate)) {
        echo '<div class="star-rating">';
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $rate) {
                echo '<i class="fa fa-star"></i>';
            } else {
                echo '<i class="fa fa-star star-none"></i>';
            }
        }
        echo '</div>';
    }
}


function current_url()
{
    return \Illuminate\Support\Facades\Request::fullUrl();
}

function isMobile()
{
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

function current_screen()
{
    return Route::currentRouteName();
}


function star_rating_render($rate = 0)
{
    $html = '<div class="hh-rating">';
    for ($i = 1; $i <= $rate; $i++) {
        if ($rate >= $i) {
            $html .= '<i class="fas fa-star"></i>';
        } else {
            $html .= '<i class="fas fa-star no-rate"></i>';
        }
    }
    $html .= '</div>';

    return $html;
}


function is_serialized($data, $strict = true)
{
    if (!is_string($data)) {
        return false;
    }
    $data = trim($data);
    if ('N;' == $data) {
        return true;
    }
    if (strlen($data) < 4) {
        return false;
    }
    if (':' !== $data[1]) {
        return false;
    }
    if ($strict) {
        $lastc = substr($data, -1);
        if (';' !== $lastc && '}' !== $lastc) {
            return false;
        }
    } else {
        $semicolon = strpos($data, ';');
        $brace = strpos($data, '}');
        // Either ; or } must exist.
        if (false === $semicolon && false === $brace) {
            return false;
        }
        // But neither must be in the first X characters.
        if (false !== $semicolon && $semicolon < 3) {
            return false;
        }
        if (false !== $brace && $brace < 4) {
            return false;
        }
    }
    $token = $data[0];
    switch ($token) {
        case 's':
            if ($strict) {
                if ('"' !== substr($data, -2, 1)) {
                    return false;
                }
            } elseif (false === strpos($data, '"')) {
                return false;
            }
        case 'a':
        case 'O':
            return (bool)preg_match("/^{$token}:[0-9]+:/s", $data);
        case 'b':
        case 'i':
        case 'd':
            $end = $strict ? '$' : '';
            return (bool)preg_match("/^{$token}:[0-9.E-]+;$end/", $data);
    }
    return false;
}

function get_icon($name = '', $color = '', $width = '', $height = '', $stroke = false, $force = false)
{
    $is_dashboard = is_dashboard();

    global $hh_fonts, $hh_lazyload;
    $class = '';
    if ($hh_lazyload == 'off' || $force || $is_dashboard) {
        if (!$hh_fonts) {
            include_once public_path('fonts/fonts.php');
            if (isset($fonts)) {
                $hh_fonts = $fonts;
            }
        }
        if (empty($hh_fonts)) {
            return '';
        }
        if (!isset($hh_fonts[$name])) {
            return '';
        }
        $icon = $hh_fonts[$name];
        if (!empty($color)) {
            if ($stroke) {
                $icon = preg_replace('/stroke="(.{7})"/', 'stroke="' . $color . '"', $icon);
                $icon = preg_replace('/stroke:(.{7})/', 'stroke:' . $color, $icon);
            } else {
                $icon = preg_replace('/fill="(.{7})"/', 'fill="' . $color . '"', $icon);
                $icon = preg_replace('/fill:(.{7})/', 'fill:' . $color, $icon);
            }
        }

        if (!empty($width)) {
            $icon = preg_replace('/width="(\d{2}[a-z]{2})"/', 'width="' . $width . '"', $icon);
        }

        if (!empty($height)) {
            $icon = preg_replace('/height="(\d{2}[a-z]{2})"/', 'height="' . $height . '"', $icon);
        }
    } else {
        $class = 'parent-lazy-svg';
        $stroke = $stroke ? 'true' : 'false';
        $icon = '<span class="lazy-svg" data-name="' . esc_attr($name) .
            '" data-color="' . esc_attr($color) .
            '" data-width="' . esc_attr($width) .
            '" data-height="' . esc_attr($height)
            . '" data-stroke="' . esc_attr($stroke) . '"></span>';
    }

    return '<i class="hh-icon ' . $class . ' fa">' . $icon . '</i>';
}



function esc_html($text)
{
    $text = trim($text);
    $safe_text = _check_invalid_utf8($text);
    $safe_text = _specialchars($safe_text, ENT_QUOTES);
    return $safe_text;
}

function esc_attr($text)
{
    $safe_text = _check_invalid_utf8($text);
    $safe_text = _specialchars($safe_text, ENT_QUOTES);
    return $safe_text;
}

function esc_sql($text)
{
    return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $text);
}

function esc_url($url)
{
    return str_replace(' ', '%20', $url);
}

function _check_invalid_utf8($string, $strip = false)
{
    $string = (string)$string;

    if (0 === strlen($string)) {
        return '';
    }

    // Store the site charset as a static to avoid multiple calls to get_option()
    static $is_utf8 = null;
    if (!isset($is_utf8)) {
        $is_utf8 = in_array('utf-8', array('utf8', 'utf-8', 'UTF8', 'UTF-8'));
    }
    if (!$is_utf8) {
        return $string;
    }

    // Check for support for utf8 in the installed PCRE library once and store the result in a static
    static $utf8_pcre = null;
    if (!isset($utf8_pcre)) {
        $utf8_pcre = @preg_match('/^./u', 'a');
    }
    // We can't demand utf8 in the PCRE installation, so just return the string in those cases
    if (!$utf8_pcre) {
        return $string;
    }

    // preg_match fails when it encounters invalid UTF8 in $string
    if (1 === @preg_match('/^./us', $string)) {
        return $string;
    }

    // Attempt to strip the bad chars if requested (not recommended)
    if ($strip && function_exists('iconv')) {
        return iconv('utf-8', 'utf-8', $string);
    }

    return '';
}

function _specialchars($string, $quote_style = ENT_NOQUOTES, $charset = false, $double_encode = false)
{
    $string = (string)$string;

    if (0 === strlen($string)) {
        return '';
    }

    // Don't bother if there are no specialchars - saves some processing
    if (!preg_match('/[&<>"\']/', $string)) {
        return $string;
    }

    // Account for the previous behaviour of the function when the $quote_style is not an accepted value
    if (empty($quote_style)) {
        $quote_style = ENT_NOQUOTES;
    } elseif (!in_array($quote_style, array(0, 2, 3, 'single', 'double'), true)) {
        $quote_style = ENT_QUOTES;
    }

    // Store the site charset as a static to avoid multiple calls to wp_load_alloptions()
    if (!$charset) {
        static $_charset = null;
        if (!isset($_charset)) {
            $alloptions = [];
            $_charset = isset($alloptions['blog_charset']) ? $alloptions['blog_charset'] : '';
        }
        $charset = $_charset;
    }

    if (in_array($charset, array('utf8', 'utf-8', 'UTF8'))) {
        $charset = 'UTF-8';
    }

    $_quote_style = $quote_style;

    if ($quote_style === 'double') {
        $quote_style = ENT_COMPAT;
        $_quote_style = ENT_COMPAT;
    } elseif ($quote_style === 'single') {
        $quote_style = ENT_NOQUOTES;
    }

    if (!$double_encode) {
        // Guarantee every &entity; is valid, convert &garbage; into &amp;garbage;
        // This is required for PHP < 5.4.0 because ENT_HTML401 flag is unavailable.
        $string = kses_normalize_entities($string);
    }

    $string = @htmlspecialchars($string, $quote_style, $charset, $double_encode);

    // Back-compat.
    if ('single' === $_quote_style) {
        $string = str_replace("'", '&#039;', $string);
    }

    return $string;
}

function kses_normalize_entities($string)
{
    // Disarm all entities by converting & to &amp;
    $string = str_replace('&', '&amp;', $string);

    // Change back the allowed entities in our entity whitelist
    $string = preg_replace_callback('/&amp;([A-Za-z]{2,8}[0-9]{0,2});/', 'kses_named_entities', $string);
    $string = preg_replace_callback('/&amp;#(0*[0-9]{1,7});/', 'kses_normalize_entities2', $string);
    $string = preg_replace_callback('/&amp;#[Xx](0*[0-9A-Fa-f]{1,6});/', 'kses_normalize_entities3', $string);

    return $string;
}

function kses_named_entities($matches)
{
    global $allowedentitynames;

    if (empty($matches[1]) && is_array($matches[1])) {
        return '';
    }

    $i = $matches[1];

    if (is_array($allowedentitynames)) {
        return (!in_array($i, $allowedentitynames)) ? "&amp;$i;" : "&$i;";
    } else {
        return '';
    }
}

function kses_normalize_entities2($matches)
{
    if (empty($matches[1])) {
        return '';
    }

    $i = $matches[1];
    if (valid_unicode($i)) {
        $i = str_pad(ltrim($i, '0'), 3, '0', STR_PAD_LEFT);
        $i = "&#$i;";
    } else {
        $i = "&amp;#$i;";
    }

    return $i;
}

function kses_normalize_entities3($matches)
{
    if (empty($matches[1])) {
        return '';
    }

    $hexchars = $matches[1];
    return (!valid_unicode(hexdec($hexchars))) ? "&amp;#x$hexchars;" : '&#x' . ltrim($hexchars, '0') . ';';
}

function valid_unicode($i)
{
    return ($i == 0x9 || $i == 0xa || $i == 0xd ||
        ($i >= 0x20 && $i <= 0xd7ff) ||
        ($i >= 0xe000 && $i <= 0xfffd) ||
        ($i >= 0x10000 && $i <= 0x10ffff));
}

function get_comment_number($post_id, $type = 'posts')
{
    $comment = new Comment();
    $comment_count = $comment->getCommentCountByPostID($post_id, $type);
    return $comment_count;
}

function d($arr)
{
    echo '<pre style="background: #000; padding: 20px; color: #fff;">';
    print_r($arr);
    echo '</pre>';
}
