<?php

namespace Igorwanbarros\Php2Html\Table;

/**
 * Class RowTableView
 * @package Igorwanbarros\Php2Html\Table
 */
class RowTableView 
{

    /**
     * @var array
     */
    protected $headers;

    /**
     * @var array
     */
    protected $attributes;

    /**
     * @var mixed
     */
    protected $data;

    /**
     * @var string
     */
    protected $lineLink;


    /**
     * @param array $headers
     * @param mixed $data
     */
    public function __construct(array $headers, $data)
    {
        $this->headers  = $headers;
        $this->setData($data);
    }


    /**
     * @param $header
     *
     * @return string
     */
    public function getDataValue($header)
    {
        return isset($this->data->{$header}) ? $this->data->{$header} : '';
    }


    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }


    /**
     * @param $headers
     *
     * @return $this
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;

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
     * @param $key
     * @param $value
     *
     * @return $this
     */
    public function addAttributes($key, $value)
    {
        $this->attributes .= "{$key}=\"{$value}\" ";

        return $this;
    }


    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }


    /**
     * @param mixed $data
     *
     * @return $this
     */
    public function setData($data)
    {
        $this->data = is_array($data) ? (object) $data : $data;

        return $this;
    }


    /**
     * @return string
     */
    public function getLineLink()
    {
        return strpos($this->lineLink, '%s') !== false
            ? sprintf($this->lineLink, isset($this->data->id) ? $this->data->id : '')
            : $this->lineLink;
    }


    /**
     * @param string $lineLink
     *
     * @return $this
     */
    public function setLineLink($lineLink)
    {
        $this->lineLink = $lineLink;

        return $this;
    }


    public function getValueKey($key)
    {
        $value = $this->data->{$key};

        if (strpos($key, '.') !== false) {
            $fields = explode('.', $key);
            $value = $this->data;

            foreach ($fields as $campo) {
                $value = $value->{$campo};
            }
        }

        return $value;
    }
}
