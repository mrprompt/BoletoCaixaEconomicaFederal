<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Converter;

use Knp\Snappy\Pdf as Converter;

/**
 * PDF Converter
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Pdf
{
    /**
     * Wkhtmltopdf executable
     *
     * @const string
     */
    const PDF_TOOL = '/usr/local/bin/wkhtmltopdf';

    /**
     * @param string $content
     * @param string $outputFile
     */
    public static function convert($content, $outputFile)
    {
        if (is_file(static::PDF_TOOL) && is_executable(static::PDF_TOOL)) {
            $snappy = new Converter(static::PDF_TOOL);
            $snappy->generateFromHtml($content, str_replace('.HTML', '.PDF', $outputFile), [], true);
        }
    }
}