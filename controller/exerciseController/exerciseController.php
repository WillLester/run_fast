<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/10/27
 * Time: 23:55
 */
class ExerciseController extends Controller {
    function __construct($view) {
        $this->model = new ExerciseModel($view);
    }

    function record($userId, $dataType){

    }

    function getTodayData($userId, $dataType) {

    }

    function getStatistics($userId, $dataType, $statisticType, $startTime, $endTime){

    }
}