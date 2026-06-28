<?php

namespace App\Helper;

use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Support\Facades\File;

class RichTextSanitizer
{
    protected HTMLPurifier $purifier;

    public function __construct()
    {
        $cachePath = storage_path('app/purifier');

        if (! File::isDirectory($cachePath)) {
            File::ensureDirectoryExists($cachePath);
        }

        $config = HTMLPurifier_Config::createDefault();

        $config->set('Cache.SerializerPath', $cachePath);
        $config->set('HTML.Doctype', 'HTML 4.01 Transitional');
        $config->set('HTML.Allowed', implode(',', [
            'p[style|class]',
            'br',
            'strong[style|class]',
            'b[style|class]',
            'em[style|class]',
            'i[style|class]',
            'u[style|class]',
            's[style|class]',
            'span[style|class]',
            'div[style|class]',
            'a[href|title|target|rel|class]',
            'ul[style|class]',
            'ol[style|class]',
            'li[style|class]',
            'blockquote[style|class]',
            'h1[style|class]',
            'h2[style|class]',
            'h3[style|class]',
            'h4[style|class]',
            'h5[style|class]',
            'h6[style|class]',
            'img[src|alt|title|width|height|class|style]',
            'table[style|class]',
            'thead[style|class]',
            'tbody[style|class]',
            'tfoot[style|class]',
            'tr[style|class]',
            'th[colspan|rowspan|style|class]',
            'td[colspan|rowspan|style|class]',
            'iframe[src|width|height|frameborder]',
        ]));
        $config->set(
            'URI.SafeIframeRegexp',
            '#^(https?:)?//(www\\.)?(youtube\\.com/embed/|youtube-nocookie\\.com/embed/|youtu\\.be/|player\\.vimeo\\.com/video/|vimeo\\.com/|www\\.google\\.[a-z.]+/maps/embed\\?|maps\\.google\\.[a-z.]+/maps/embed\\?)#i'
        );
        $config->set('HTML.SafeIframe', true);
        $config->set('Attr.AllowedFrameTargets', ['_blank']);
        $config->set('Attr.EnableID', false);
        $config->set('CSS.AllowTricky', false);
        $config->set('CSS.AllowedProperties', [
            'text-align',
            'font-style',
            'font-size',
            'font-weight',
            'font-family',
            'line-height',
            'letter-spacing',
            'text-decoration',
            'text-transform',
            'color',
            'background-color',
            'list-style-type',
            'width',
            'height',
            'margin-left',
            'margin-right',
            'margin-top',
            'margin-bottom',
            'padding-left',
            'padding-right',
        ]);
        $config->set('URI.AllowedSchemes', [
            'http' => true,
            'https' => true,
            'mailto' => true,
        ]);

        $this->purifier = new HTMLPurifier($config);
    }

    public function sanitize(?string $content): string
    {
        if (! is_string($content) || trim($content) === '') {
            return '';
        }

        return $this->purifier->purify($content);
    }
}
