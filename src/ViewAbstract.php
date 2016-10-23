<?php
namespace Igorwanbarros\Php2Html;

/**
 * Class ViewAbstract
 * @package Igorwanbarros\Php2Html
 */
abstract class ViewAbstract
{
    const PANEL_BOOTSTRAP_DEFAULT = 'panel-default';
    const PANEL_BOOTSTRAP_SUCCESS = 'panel-success';
    const PANEL_BOOTSTRAP_PRIMARY = 'panel-primary';
    const PANEL_BOOTSTRAP_WARNING = 'panel-warning';
    const PANEL_BOOTSTRAP_DANGER = 'panel-danger';
    const PANEL_SEMANTIC_DEFAULT = '';
    const PANEL_SEMANTIC_SUCCESS = 'green';
    const PANEL_SEMANTIC_PRIMARY = 'blue';
    const PANEL_SEMANTIC_WARNING = 'yellow';
    const PANEL_SEMANTIC_DANGER = 'red';
    const FRONT_BOOTSTRAP = 'bootstrap';
    const FRONT_SEMANTIC = 'semantic';
    const TABLE_SEMANTIC = 'ui striped selectable table';
    const TABLE_BOOTSTRAP = 'table table-striped table-hover';

    /**
     * @var string
     */
    protected $output;

    /**
     * @var string
     */
    protected $template;

    /**
     * @var string
     */
    protected $basePath;

    /**
     * @var array
     */
    protected $vars;

    /**
     * @var string
     */
    protected $front = self::FRONT_BOOTSTRAP;


    /**
     * @return $this
     */
    public static function source()
    {
        $args   = func_get_args();
        $class  = new \ReflectionClass(get_called_class());

        return $class->newInstanceArgs($args);
    }


    /**
     * @return string
     */
    public function getBasePath()
    {
        return $this->basePath ? $this->basePath : __DIR__ . '/';
    }


    /**
     * @param string $basePath
     *
     * @return $this
     */
    public function setBasePath($basePath)
    {
        $this->basePath = $basePath;
        return $this;
    }


    /**
     * @return array
     */
    public function getVars()
    {
        return is_array($this->vars) ? $this->vars : ['this' => $this];
    }


    /**
     * @param array $vars
     *
     * @return $this
     */
    public function setVars(array $vars)
    {
        $this->vars = $vars;
        return $this;
    }


    /**
     * @param null|string $template
     *
     * @return string
     * @throws \Exception
     */
    public function render($template = null)
    {
        ob_start();

        $template = $template ? $template : $this->getBasePath() . $this->getTemplate();

        if (!file_exists($template)) {
            throw new \Exception("O caminho do template '{$template}' informado não foi encontrado :(");
        }

        extract($this->getVars(), EXTR_OVERWRITE);

        include $template;

        $this->output = ob_get_contents();

        ob_end_clean();
        return $this->output;
    }


    /**
     * @return string
     * @throws \Exception
     */
    public function __toString()
    {
        return $this->render();
    }


    /**
     * @return string
     */
    public function getOutput()
    {
        return $this->output;
    }


    /**
     * @param string $output
     *
     * @return $this
     */
    public function setOutput($output)
    {
        $this->output = $output;
        return $this;
    }


    /**
     * @return string
     */
    public function getTemplate()
    {
        if (strpos($this->template, '%s') !== false)
            $this->template = sprintf($this->template, $this->front);

        return $this->template;
    }


    /**
     * @param string $template
     *
     * @return $this
     */
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }


    /**
     * Retorna qual front o elemento esta utilizando
     *
     * @return string
     */
    public function getFront()
    {
        return $this->front;
    }


    /**
     * Definir qual front o elemento vai utilizar
     *
     * @param string $front
     *
     * @return $this
     */
    public function setFront($front)
    {
        $this->front = $front;

        return $this;
    }
}
