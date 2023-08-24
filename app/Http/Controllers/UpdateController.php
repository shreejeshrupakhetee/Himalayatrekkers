<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;


class UpdateController extends Controller
{
    //
    public function _clearCache(Request $request, $name = '', $redirect = '')
    {
        $redirect = base64_decode($redirect);
        if (filter_var($redirect, FILTER_VALIDATE_URL) === FALSE) {
            $redirect = url('/');
        }

        $cache_path = public_path('caching');
        $types = ['header', 'footer'];
        $extensions = ['js', 'css'];
        foreach ($types as $type) {
            foreach ($extensions as $extension) {
                $file = $cache_path . '/' . $type . '-' . $name . '-minified-frontend.' . $extension;
                if (is_file($file)) {
                    File::delete($file);
                }
            }
        }

        // ResponseCache::clear();
        return redirect($redirect);
    }

    public function _setIconSVG(Request $request)
    {
        global $hh_fonts;
        if (!$hh_fonts) {
            include_once public_path('fonts/fonts.php');
            if (isset($fonts)) {
                $hh_fonts = $fonts;
            }
        }
        return $this->sendJson([
            'status' => 1,
            'icons' => $hh_fonts
        ]);
    }


    public function _getIconSVG(Request $request)
    {
        $name = $request->get('name', '');
        $color = $request->get('color', '');
        $width = $request->get('width', '');
        $height = $request->get('height', '');
        $stroke = $request->get('stroke', '');

        return $this->sendJson([
            'status' => 1,
            'icon' => get_icon($name, $color, $width, $height, $stroke, true)
        ]);
    }

    public function cache()
    {
        Artisan::call('config:cache');
        Artisan::call('route:cache');
        return redirect()->back();
    }
//     public function clear()
//     {
//         // Artisan::call('view:clear');
//         Artisan::call('cache:clear');
//         // Artisan::call('route:clear');

//         return redirect()->back();
//     }

    public function clear()
    {
        Artisan::call('view:clear');
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        
        Artisan::call('config:cache');
        Artisan::call('route:cache');
        return redirect()->back();
    }



    public function delete()
    {
        $file = new Filesystem;
        $fd = public_path('/page-cache/');

        $file->cleanDirectory($fd);
        return "done";
    }
}
