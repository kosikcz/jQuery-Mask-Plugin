<?php

namespace Kosik\Forms\Controls;

use Nette\Forms\Controls\TextInput;

/**
 * Masked text input form control.
 *
 * @see https://igorescobar.github.io/jQuery-Mask-Plugin/
 *
 * @author Tomáš Čepička <tomas.cepicka@kosik.cz>
 * @package Kosik\Forms\Controls
 */
class MaskedTextInput extends TextInput
{
    /** @var string */
    private $mask;

    /** @var string|null */
    private $placeholder;

    /** @var bool */
    private $reverse;

    /** @var bool */
    private $clearIfNotMatch;

    /** @var bool */
    private $selectOnFocus;


    /**
     * Creates a new instance of MaskedTextInput.
     *
     * @param string|null $label
     * @param string $mask
     * @param string|null $placeholder
     * @param bool $reverse
     * @param int|null $maxLength
     */
    public function __construct($label = NULL, $mask, $placeholder = NULL, $reverse = FALSE, $maxLength = NULL)
    {
        parent::__construct($label, $maxLength);
        $this->mask = $mask;
        $this->placeholder = $placeholder;
        $this->reverse = $reverse;
    }


    public function getControl()
    {
        $control = parent::getControl();

        $control->data('mask', $this->getMask());

        if($this->hasPlaceholder()) {
            $control->placeholder($this->getPlaceholder());
        }

        if($this->getReverse() === TRUE) {
            $control->data('mask-reverse', 'true');
        }

        if($this->getSelectOnFocus() === TRUE) {
            $control->data('mask-selectonfocus', 'true');
        }

        if($this->getClearIfNotMatch() === TRUE) {
            $control->data('mask-clearifnotmatch', 'true');
        }

        return $control;
    }


    /**
     * Sets the mask string.
     *
     * @param string $value
     * @return self
     */
    public function setMask(string $value) : self
    {
        $this->mask = $value;
        return $this;
    }

    /**
     * Returns the mask string.
     *
     * @return string
     */
    public function getMask() : string
    {
        return $this->mask;
    }


    /**
     * Returns a value indicating if the control has the placeholder string.
     *
     * @return bool
     */
    public function hasPlaceholder() : bool
    {
        return $this->placeholder !== NULL;
    }

    /**
     * Sets the placeholder string.
     *
     * @param string $value
     * @return self
     */
    public function setPlaceholder(string $value) : self
    {
        $this->placeholder = $value;
        return $this;
    }

    /**
     * Returns the placeholder string.
     *
     * @return string|null
     */
    public function getPlaceholder()
    {
        return $this->placeholder;
    }


    /**
     * Sets a value indicating if the input is reversed.
     *
     * @param bool $value
     * @return self
     */
    public function setReverse(bool $value = TRUE) : self
    {
        $this->reverse = $value;
        return $this;
    }

    /**
     * Returns a value indicating if the input is reversed.
     *
     * @return bool
     */
    public function getReverse() : bool
    {
        return $this->reverse ?? FALSE;
    }


    /**
     * Sets a value indicating if the control value is cleared when not matching the mask.
     *
     * @param bool $value
     * @return self
     */
    public function setClearIfNotMatch(bool $value = TRUE) : self
    {
        $this->clearIfNotMatch = $value;
        return $this;
    }

    /**
     * Returns a value indicating if the control value is cleared when not matching the mask.
     *
     * @return bool
     */
    public function getClearIfNotMatch() : bool
    {
        return $this->clearIfNotMatch ?? TRUE;
    }


    /**
     * Sets a value indicating if the control value is selected on focus.
     *
     * @param bool $value
     * @return self
     */
    public function setSelectOnFocus(bool $value = TRUE) : self
    {
        $this->selectOnFocus = $value;
        return $this;
    }

    /**
     * Returns a value indicating if the control value is selected on focus.
     *
     * @return bool
     */
    public function getSelectOnFocus() : bool
    {
        return $this->selectOnFocus ?? TRUE;
    }
}