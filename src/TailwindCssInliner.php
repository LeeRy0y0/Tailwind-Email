<?php
namespace TailwindEmail;

use Premailer\Premailer;
use Illuminate\Support\Facades\Http;

class TailwindCssInliner
{
    /**
     * Inline Tailwind CSS-klasser i en HTML e-mail.
     *
     * @param  string  $htmlContent
     * @return string
     */
    public function inlineCss(string $htmlContent)
    {
        // Download Tailwind CSS fra CDN
        $tailwindCssUrl = 'https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css';
        $cssContent = Http::get($tailwindCssUrl)->body();

        // Inline CSS i HTML
        $premailer = new Premailer($htmlContent, [
            'css' => $cssContent,
            'method' => 'html',
        ]);

        return $premailer->transform();
    }
}
