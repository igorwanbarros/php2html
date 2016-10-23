<?php

namespace Igorwanbarros\Php2Html\Tags;

use Igorwanbarros\Php2Html\ViewAbstract;

/**
 * Class LabelView
 * @package Igorwanbarros\Php2Html\Tags
 */
class LabelView extends ViewAbstract
{

    /**
     * @var string
     */
    protected $template = 'templates/%s/label.php';
}