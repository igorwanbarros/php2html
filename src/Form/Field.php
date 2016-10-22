<?php

namespace Igorwanbarros\Php2Html\Form;

use Igorwanbarros\Php2Html\AbstractHtml;
use Igorwanbarros\Php2Html\TagHtml;

/**
 * Class Field
 * @package Igorwanbarros\Php2Html\Form
 */
abstract class Field
{

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var null|string
     */
    protected $value;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var null|string
     */
    protected $id;

    /**
     * @var array
     */
    protected $attributes;

    /**
     * @var string
     */
    protected $tagName  = 'input';

    /**
     * @var int|string
     */
    protected $size     = 4;

    /**
     * @var string
     */
    protected $rules;


    /**
     * @param string        $name
     * @param string        $label
     * @param null|string   $value
     */
    public function __construct($name, $label = '', $value = null)
    {
        $this->name     = $name;
        $this->value    = $value;
        $this->label    = $label;
    }


    /**
     * @param string        $name
     * @param string        $label
     * @param null|string   $value
     *
     * @return $this
     */
    public static function create($name, $label = '', $value = null)
    {
        return new static($name, $label, $value);
    }


    /**
     * @return string
     */
    public function render()
    {
        $field = $this->_createFieldHtml();

        $this->_addAttributesFieldHtml($field);

        return $field->render();
    }


    /**
     * @return $this|AbstractHtml
     */
    protected function _createFieldHtml()
    {
        $field = TagHtml::source($this->tagName)
            ->addAttributeRaw('type', $this->type)
            ->addAttributeRaw('name', $this->name)
            ->addAttributeRaw('id', $this->getId())
            ->addAttributeRaw('value', $this->value);

        return $field;
    }


    /**
     * @param AbstractHtml $field
     */
    protected function _addAttributesFieldHtml(AbstractHtml $field)
    {
        if (count($this->attributes) > 0) {
            foreach ($this->attributes as $key => $value) {
                $field->addAttributeRaw($key, $value);
            }
        }
    }


    /**
     * @return string
     */
    public function __toString()
    {
        return $this->render();
    }


    /**
     * @return null|string
     */
    public function getId()
    {
        if ($this->id == null) {
            $this->id = $this->name;
        }

        return $this->id;
    }


    /**
     * @param string $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }


    /**
     * @param string $label
     *
     * @return $this
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }


    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }


    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }


    /**
     * @return null|string
     */
    public function getValue()
    {
        return $this->value;
    }


    /**
     * @param string $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }


    /**
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }


    /**
     * @param string $key
     * @param string $value
     *
     * @return $this
     */
    public function addAttribute($key, $value)
    {
        $this->attributes[$key] = $value;

        return $this;
    }


    /**
     * @param array $attributes
     *
     * @return $this
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }


    /**
     * @return int|string
     */
    public function getSize()
    {
        return $this->size;
    }


    /**
     * @param int|string $size
     *
     * @return $this
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }


    /**
     * @return string
     */
    public function getRules()
    {
        return $this->rules;
    }


    /**
     * @param string $rule
     *
     * @return $this
     */
    public function addRule($rule)
    {
        $this->rules .= $rule;

        return $this;
    }
}
