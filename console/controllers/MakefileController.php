<?php
namespace console\controllers;
use yii\console\Controller;
use yii\console\controllers;

Class MakefileController extends Controller{


    public function actionMake(){
        // root of directory yii2
        // /var/www/html/<yii2>
        $rootyii = realpath(dirname(__FILE__).'/../../');

        // create file <jam:menit:detik>.txt
        $filename = date('H:i:s') . '.txt';
        $folder = $rootyii.'/cronjob/'.$filename;
        $f = fopen($folder, 'w');
        $fw = fwrite($f, 'now : ' . $filename);
        fclose($f);
    }

}


?>