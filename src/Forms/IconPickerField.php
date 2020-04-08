<?php

namespace SilverStripe\Colorpicker\Forms;


class IconPickerField extends ColorPickerField
{
    protected $optionClass = '';
    protected $cssClassPrefix = '';

    /**
     * Set CSS class that will be added to every option
     *
     * @param String $class
     * @return $this
     */
    public function setOptionClass(String $class)
    {
        $this->optionClass = $class;
        return $this;
    }

    /**
     * Set CSS class prefix that will be added to every option
     *
     * @param String $prefix
     * @return $this
     */
    public function setCSSClassPrefix(String $prefix)
    {
        $this->cssClassPrefix = $prefix;
        return $this;
    }

    public function getSource()
    {
        $source = $this->source;

        if ($this->optionClass) {
            $source = array_map(function ($option) {
                $cssClass = ($this->cssClassPrefix ? "{$this->cssClassPrefix}-" : "") . $option['CSSClass'];
                $option['OptionClass'] = "{$cssClass} {$this->optionClass}";
                return $option;
            }, $source);
        }

        return $source;
    }
}
