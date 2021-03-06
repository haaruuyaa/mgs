<?php

namespace app\transaction\controllers;

use Yii;
use yii\web\Controller;

/**
 * Default controller for the `transaction` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionReportKeuangan()
    {
        return $this->render('reportKeuangan');
    }

    public function actionReportHelper()
    {
        return $this->render('reportHelper');
    }

    public function actionReportHelperDetail($id)
    {
        return $this->render('reportHelperDetail',['id' => $id]);
    }

    public function actionReportCustomer()
    {
        return $this->render('reportCustomer');
    }

    public function actionReportCustomerDetail($id)
    {
        return $this->render('reportCustomerDetail',['id' => $id]);
    }

    public function actionReportSo()
    {
        return $this->render('reportSO');
    }

    public function actionReportSoDetail($id)
    {
        return $this->render('reportSODetail',['id' => $id]);
    }

    public function actionExportlaporanhelper() {
        ob_end_clean();
        return $this->render('exportlaporanhelper');
    }

    public function actionReportStockHistory()
    {
        if(Yii::$app->request->post())
        {
            $helper = Yii::$app->request->post('helper');
            $date = Yii::$app->request->post('tanggal');

            return $this->render('reportStockHistory',['helper' => $helper,'date' => $date]);
        } else {
            return $this->render('reportStockHistory');
        }
    }

    public function actionReportPengeluaranPribadi()
    {
      if(Yii::$app->request->post())
      {
          $date = Yii::$app->request->post('tanggal');

          return $this->render('reportPengeluaranPribadi',['date' => $date]);
      } else {
          return $this->render('reportPengeluaranPribadi');
      }
    }
}
