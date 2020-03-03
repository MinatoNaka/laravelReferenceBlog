<?php

use Gregwar\Captcha\CaptchaBuilderInterface;

if (!function_exists('captcha')) {

    function captcha()
    {
        $captcha = app(CaptchaBuilderInterface::class);
        $captcha->build();
        session(['captcha.phrase' => $captcha->getPhrase()]);
        return $captcha->inline();
    }
}
