<?php
/**
 * https://ui.toast.com/tui-image-editor/
 */

namespace Artista\Components\View\Editores;

use Log;

class TuiImageEditor
{
    
    public function getDependences()
    {
        $this->getCdn();
    }
    
    /**
     * 
     */
    public function getCdn()
    {
        return [
            '<link rel="stylesheet" href="https://uicdn.toast.com/tui-image-editor/latest/tui-image-editor.css">',
            '<script src="https://uicdn.toast.com/tui-image-editor/latest/tui-image-editor.js"></script>'
        ];
    }
    
    public function executeJs()
    {
        return "var ImageEditor = require('tui-image-editor');
        var blackTheme = require('./js/theme/black-theme.js');
        var locale_ru_RU = { // override default English locale to your custom
            'Crop': 'Обзрезать',
            'Delete-all': 'Удалить всё'
            // etc...
        };
        var instance = new ImageEditor(document.querySelector('#tui-image-editor'), {
             includeUI: {
                 loadImage: {
                     path: 'img/sampleImage.jpg',
                     name: 'SampleImage'
                 },
                 locale: locale_ru_RU,
                 theme: blackTheme, // or whiteTheme
                 initMenu: 'filter',
                 menuBarPosition: 'bottom'
             },
            cssMaxWidth: 700,
            cssMaxHeight: 500,
            selectionStyle: {
                cornerSize: 20,
                rotatingPointOffset: 70
            }
        });";
    }

    public function executeJs2()
    {
        return "var ImageEditor = require('tui-image-editor');
        var instance = new ImageEditor(document.querySelector('#tui-image-editor'), {
            cssMaxWidth: 700,
            cssMaxHeight: 500,
            selectionStyle: {
                cornerSize: 20,
                rotatingPointOffset: 70
            }
        });";
    }
}
