<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/2
 * Time: 14:58
 */
require_once ("../View.php");
class BannerView extends View {
    private $selected;
    private $personalInfo;
    private $face;
    private $name;

    function selectedPage($selected){
        $this->selected = $selected;
    }

    function displayPersonal($personalInfo){

    }

    /**
     * @return mixed
     */
    public function getSelected(){
        return $this->selected;
    }

    /**
     * @return mixed
     */
    public function getFace()
    {
        return $this->face;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

}