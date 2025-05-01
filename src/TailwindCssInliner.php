<?php
namespace TailwindEmail;

use Premailer\Premailer;

class TailwindCssInliner
{
    public function inlineCss(string $htmlContent): string
    {
        $cssPath = base_path('resources/css/email-compiled.css');
        $cssContent = file_get_contents($cssPath);

        $premailer = new Premailer($htmlContent, [
            'css' => $cssContent,
            'method' => 'html',
        ]);

        return $premailer->transform();
    }
}