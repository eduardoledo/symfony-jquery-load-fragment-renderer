<?php

namespace EduardoLedo\JQueryLoadBundle\Twig;
use Twig\TwigFunction;

/**
 * Class JQueryLoadExtension
 * @package EduardoLedo\JQueryLoadBundle\Twig
 * @author Eduardo Ledo <eduardo.ledo@gmail.com>
 */
class JQueryLoadExtension extends \Twig_Extension
{

    public function getFunctions()
    {
        return [
            new TwigFunction('jqload_include_js', [$this, 'includeJs'], array('is_safe' => array('all')))
        ];
    }

    public function includeJs()
    {
        return "<script>(function ($) { if ($ !== 'undefined' && $ != null) { $(document).ready(function () { $('jqload-include').each(function () { $(this).load($(this).data('src')); }); }); } })(jQuery);</script>";
    }

}