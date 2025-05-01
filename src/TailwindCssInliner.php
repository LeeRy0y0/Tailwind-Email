<?php
namespace TailwindEmail;

use Premailer\Premailer;

class TailwindCssInliner
{
    public function inlineCss(string $htmlContent): string
    {
        $cssPath = __DIR__ . '/../resources/css/email-compiled.css';

        if (!file_exists($cssPath)) {
            throw new \Exception("CSS-stien findes ikke: $cssPath");
        }
    
        $cssContent = file_get_contents($cssPath);

        $premailer = new Premailer($htmlContent, [
            'css' => $cssContent,
            'method' => 'html',
        ]);

        return $premailer->transform();
    }
}