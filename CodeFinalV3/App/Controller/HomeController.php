<?php

namespace App\Controller;

use App\Model\Type;
use App\Model\Series;

class HomeController
{
    public function home()
    {
        $typeModel = new Type();
        $seriesModel = new Series();
        $typesObjects = $typeModel->getAllType();
        $types = [];
        foreach ($typesObjects as $typeObj) {
            $types[$typeObj->getIdType()] = $typeObj->getName();
        }
        $series = [];
        foreach ($types as $id_type => $type_name) {
            $series[$id_type] = $seriesModel->getSeriesByType($id_type);
        }
        include "App/View/viewHome.php";
    }
}

