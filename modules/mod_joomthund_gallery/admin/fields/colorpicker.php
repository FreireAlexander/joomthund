<?php
defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.formfield');

use Joomla\CMS\Form\Field\ListField;
use Joomla\CMS\HTML\HTMLHelper;

class JFormFieldColorpicker extends ListField {
    protected $type = 'colorpicker';

    public function getInput() {
        $doc = \Joomla\CMS\Factory::getDocument();
		$style = '.flex-inline-mod-'. $this->id .'{
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }
        #container__color-ball-'. $this->id .'{
            display: grid;
            place-items: center;
            width: fit-content;
            height: 120px;
            margin-inline: 50px;
            padding: 20px 40px; 
            border-radius: 20px;
            background-color: snow;
            background-image: url("data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'25\' height=\'25\' viewBox=\'0 0 200 200\'%3E%3Cdefs%3E%3ClinearGradient id=\'a\' gradientUnits=\'userSpaceOnUse\' x1=\'100\' y1=\'33\' x2=\'100\' y2=\'-3\'%3E%3Cstop offset=\'0\' stop-color=\'%23000\' stop-opacity=\'0\'/%3E%3Cstop offset=\'1\' stop-color=\'%23000\' stop-opacity=\'1\'/%3E%3C/linearGradient%3E%3ClinearGradient id=\'b\' gradientUnits=\'userSpaceOnUse\' x1=\'100\' y1=\'135\' x2=\'100\' y2=\'97\'%3E%3Cstop offset=\'0\' stop-color=\'%23000\' stop-opacity=\'0\'/%3E%3Cstop offset=\'1\' stop-color=\'%23000\' stop-opacity=\'1\'/%3E%3C/linearGradient%3E%3C/defs%3E%3Cg fill=\'%23c6c6c6\' fill-opacity=\'0.6\'%3E%3Crect x=\'100\' width=\'100\' height=\'100\'/%3E%3Crect y=\'100\' width=\'100\' height=\'100\'/%3E%3C/g%3E%3Cg fill-opacity=\'0.5\'%3E%3Cpolygon fill=\'url(%23a)\' points=\'100 30 0 0 200 0\'/%3E%3Cpolygon fill=\'url(%23b)\' points=\'100 100 0 130 0 100 200 100 200 130\'/%3E%3C/g%3E%3C/svg%3E");
            box-shadow: 2px 2px 2px 1px gray;
        }
        #color-ball-'. $this->id .'{
            justify-self: flex-start;
            width: 64px;
            height: 64px;
            border-radius: 50%;
            border: 2px solid snow;
            background-color: transparent;
        }
        
        ';
        $doc->addStyleDeclaration($style);

        $moduleParams = JFactory::getApplication()->input->get('params', '', 'string');
        $moduleId = JFactory::getApplication()->input->getInt('id');
        // Obtener la instancia de la base de datos
        $db = JFactory::getDbo();

        // Crear una nueva consulta
        $query = $db->getQuery(true)
                ->select($db->quoteName('params'))
                ->from($db->quoteName('#__modules'))
                ->where($db->quoteName('id') . ' = ' . (int) $moduleId);

        // Establecer la consulta y cargar el resultado
        $db->setQuery($query);
        $params = $db->loadResult();
        
        $moduleParams = new JRegistry($params);

        // Obtener el valor del parámetro 'colorPalette_'
        $colorPalette = $moduleParams->get('colorPalette_', []);
        $colorPalette = json_decode(json_encode($colorPalette), true);

        $options = [];
        $options[] = HTMLHelper::_('select.option', 
                    $this->default,
                    '‏‏‎‎‎‎‎‎‎‎‎‎‎‎‎‎');
        $html = '<div class="flex-inline-mod-'. $this->id .'">';
        foreach ($colorPalette as $color) {
            $options[]=HTMLHelper::_('select.option', $color['colors']['color_value'], $color['colors']['color_name']);
        }
        $html .= HTMLHelper::_('select.genericlist', $options, $this->name, 
            'class="form-select joomthund-card"', 
            'value', 'text', $this->value
            );
        $html .= '<div id="container__color-ball-'. $this->id .'" ><div id="color-ball-'. $this->id .'" class="color-ball" style="background-color:' . $this->value . ';"></div></div></div>';
        $modId = $this->name;
        $modIdName = str_replace(['[', ']'], '', $modId);
        $doc->addScriptDeclaration('
            document.addEventListener("DOMContentLoaded", function() {
                var selectElement = document.getElementById("' . $modIdName . '");
                var colorBall = document.getElementById("color-ball-' . $this->id . '");

                selectElement.addEventListener("change", function() {
                    var selectedColor = selectElement.value;
                    colorBall.style.backgroundColor = selectedColor;
                });
                var initialColor = selectElement.value;
                colorBall.style.backgroundColor = initialColor;
            });
        ');
        return $html;
    }
}


