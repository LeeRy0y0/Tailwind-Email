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
   
        // Tilføj <style> tag øverst i HTML'en, som fedeisas/laravel-mail-css-inliner vil inline automatisk
        return "<style>{$cssContent}</style>\n" . $htmlContent;
    }
}