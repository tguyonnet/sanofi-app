<?php

namespace App\V\Career;


use \RedBeanPHP\R as R;


class  ListeView extends \Core\View {
    /**
     * ListeView constructor.
     * @param $title
     */
    public function __construct()
    {
        $this->setFile('Career/listeTemplate.php');

    }

    public function getTitle()
    {
        return '';
    }




}