<?php
namespace Artista\Logic\Language;

use Artista\Logic\Output\AbstractOutput;
use Artista\Logic\Output\Filter\OutputFilterInterface;
use Artista\Logic\Output\TriggerableInterface;

/**
 * Run all script analysers and outputs their result.
 */
class Php
{
    /**
     * List of PHP analys integration classes.
     *
     * @return string[] array of class names.
     */
    public static function getAnalysisToolsClasses()
    {
        return [
            'Finder\Logic\Tools\CodeSniffer',
            'Finder\Logic\Tools\CopyPasteDetector',
            'Finder\Logic\Tools\MessDetector',
        ];
    }
}