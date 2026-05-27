@props([
    'content' => ''
])

@php
    use Mews\Purifier\Facades\Purifier;

    $iframeRegexp = '%^(https?:)?//(' .
        'www\.youtube\.com/embed/|' .
        'youtube\.com/embed/|' .
        'www\.youtube-nocookie\.com/embed/|' .
        'youtube-nocookie\.com/embed/|' .
        'player\.vimeo\.com/video/|' .
        'www\.loom\.com/embed/|' .
        'loom\.com/embed/' .
        ')%';

    $allowedElements = [
        'p', 'br', 'hr',
        'h1', 'h2', 'h3', 'h4', 'h5', 'h6',
        'strong', 'b', 'em', 'i', 'u', 's', 'sub', 'sup', 'code', 'pre', 'blockquote',
        'ul', 'ol', 'li',
        'a', 'img',
        'figure', 'figcaption',
        'table', 'thead', 'tbody', 'tr', 'th', 'td',
        'span', 'div',
        'iframe', 'video', 'source',
    ];

    $allowedAttributes = [
        '*.style', '*.class', '*.id',
        'a.href', 'a.title', 'a.target', 'a.rel',
        'img.src', 'img.alt', 'img.title', 'img.width', 'img.height', 'img.loading',
        'iframe.src', 'iframe.width', 'iframe.height', 'iframe.frameborder',
        'iframe.allow', 'iframe.allowfullscreen', 'iframe.loading', 'iframe.referrerpolicy', 'iframe.title',
        'video.src', 'video.controls', 'video.poster', 'video.width', 'video.height',
        'source.src', 'source.type',
        'th.scope', 'th.colspan', 'th.rowspan',
        'td.colspan', 'td.rowspan',
    ];

    $purifierConfig = [
        'HTML.Doctype' => 'HTML 4.01 Transitional',
        'HTML.AllowedElements' => implode(',', $allowedElements),
        'HTML.AllowedAttributes' => implode(',', $allowedAttributes),
        'CSS.AllowedProperties' => 'color,background-color,font-size,font-weight,font-style,text-align,text-decoration,padding,padding-top,padding-right,padding-bottom,padding-left,margin,margin-top,margin-right,margin-bottom,margin-left,width,height,max-width,border,border-radius,line-height,letter-spacing,display,float,vertical-align',
        'Attr.AllowedFrameTargets' => ['_blank', '_self'],
        'Attr.AllowedRel' => ['noopener', 'noreferrer', 'nofollow'],
        'HTML.SafeIframe' => true,
        'URI.SafeIframeRegexp' => $iframeRegexp,
        'Attr.EnableID' => true,
        'AutoFormat.AutoParagraph' => false,
        'AutoFormat.RemoveEmpty' => false,
    ];

    $clean = Purifier::clean($content, $purifierConfig);
@endphp

<div {{ $attributes->merge(['class' => 'prose max-w-none']) }}>
    {!! $clean !!}
</div>
