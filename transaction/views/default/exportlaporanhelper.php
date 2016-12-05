<?phperror_reporting(E_ALL);ini_set('display_errors', TRUE);ini_set('display_startup_errors', TRUE);define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');date_default_timezone_set('Asia/Jakarta');/** Include PHPExcel_IOFactory */use PHPExcel_IOFactory as IO;use app\master\models\MasterHelper;use app\master\models\HargaHelper;use app\transaction\models\SetoranD;$file = "FormatLaporanHelper";$id = Yii::$app->request->get('id','xxx');$year = Yii::$app->request->get('year',date('o'));$month = Yii::$app->request->get('month',date('m'));$formatDate = DateTime::createFromFormat('!m', $month);$monthname = $formatDate->format('F');$datasetoranbytipe = SetoranD::find()                ->select("sd.JenisId,mj.JenisName")                ->distinct(true)                ->from("SetoranD sd")                ->leftJoin("SetoranH sh","sh.SetoranIdH = sd.SetoranIdH")                ->leftJoin("MasterJenis mj",'mj.JenisId = sd.JenisId')                ->where(['sh.HelperId' => $id])                ->all();$datahelper = MasterHelper::find()->where(['HelperId' => $id])->one();$namahelper = $datahelper['HelperName'];$datahargahelper = HargaHelper::find()->where(['HelperId' => $id])->one();$objPHPExcel = IO::load("./files/".$file.'.xls');$objPHPExcel->setActiveSheetIndex(0);$Sheet1 = $objPHPExcel->getSheet(0);$Sheet2 = $objPHPExcel->getSheet(1);$Sheet3 = $objPHPExcel->getSheet(2);$Sheet1->setCellValue('C3', ucfirst(strtolower($namahelper)));$Sheet1->setCellValue('C2', $monthname);$rowstart = '3';$rowend = '4';$countdatasetoranbytipe = count($datasetoranbytipe);for($j = 0;$j < $countdatasetoranbytipe;$j++){    $colstart = 'H';//    $colend = 'H';        for($i = 0;$i < $countdatasetoranbytipe;$i++)    {        foreach($datasetoranbytipe as $index => $value)        {            $Sheet1->setCellValue($colstart.$rowstart,$datasetoranbytipe[$index]['JenisName']);        }        $colstart++;    }   }header('Content-Type: application/vnd.ms-excel');header('Content-Disposition: attachment;filename="'.$file.'-'.$namahelper.'".xls');header('Cache-Control: max-age=0');ob_end_clean();$objWriter = IO::createWriter($objPHPExcel, 'Excel5');$objWriter->save('php://output');