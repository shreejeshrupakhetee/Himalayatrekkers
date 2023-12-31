<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class HtmlMifier
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $contentType = $response->headers->get('Content-Type');
        if (strpos($contentType, 'text/html') !== false) {
            // $enable_optimize = setting('options.lazy_load');
           // $enable_optimize = setting('options.optimise_site');
            $content = $response->getContent();
            // if ($enable_optimize == 1) {
            //     if (strpos($content, '<pre>') !== false) {
            //         $replace = array(
            //             '/<!--[^\[](.*?)[^\]]-->/s' => '',
            //             "/<\?php/" => '<?php ',
            //             "/\r/" => '',
            //             "/>\n</" => '><',
            //             "/>\s+\n</" => '><',
            //             "/>\n\s+</" => '><',
            //         );
            //     } else {
            //         $replace = array(
            //             '/<!--[^\[](.*?)[^\]]-->/s' => '',
            //             "/<\?php/" => '<?php ',
            //             "/\n([\S])/" => '$1',
            //             "/\r/" => '',
            //             "/\n/" => '',
            //             "/\t/" => '',
            //             "/ +/" => ' ',
            //         );
            //     }
            //     $content = preg_replace(array_keys($replace), array_values($replace), $content);
            //     $response->setContent($content);
            // }
            $lazy_load = setting('options.lazy_load');
            // $lazy_load = get_option('enable_lazyload', 'off');
            if ($lazy_load == 1) {
                $content = preg_replace('/(<img[^>]+)(src)([^>]+>)/i', '$1data-src$3', $content);
                $doc = new \DOMDocument();
                $doc->encoding = 'utf-8';
                libxml_use_internal_errors(true);
                $doc->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
                libxml_clear_errors();




                $img = $doc->getElementsByTagName("img");
                foreach ($img as $_img) {
                    $parent = $_img->parentNode;
                    $parent->setAttribute('class', $parent->getAttribute('class') . ' parent-lazy');
                    $_img->setAttribute('class', $_img->getAttribute('class') . ' lazyload');
                }
                $classname = "has-background-image";
                $finder = new \DomXPath($doc);
                $bgr = $finder->query("//*[contains(@class, '$classname')]");

                // $node = $doc->getElementsByTagName('body')[0];
                // $node->setAttribute('class','ht overflow-x-hidden');

                foreach ($bgr as $_bgr) {
                    $_bgr->removeAttribute('style');
                    $_bgr->setAttribute('class', $_bgr->getAttribute('class') . ' lazyload');
                }
                $content = $doc->saveHTML() . PHP_EOL . PHP_EOL;
            }
            $response->setContent($content);
        }

        return $response;

    }
}
