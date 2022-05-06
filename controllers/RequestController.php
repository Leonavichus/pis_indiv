<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\db\Query;

use app\models\Req1Form;
use app\models\Req2Form;
use app\models\Req3Form;
use app\models\Req4Form;
use app\models\Req5Form;
use app\models\Req6Form;
use app\models\Req7Form;
use app\models\Req8Form;
use app\models\Req9Form;
use app\models\Req10Form;
use app\models\Req11Form;
use app\models\Req12Form;
use app\models\Req13Form;
use app\models\Req14Form;
use app\modules\admin\models\Sector;

class RequestController extends Controller
{
    public function actionReq1()
    {
        //1.Получить перечень видов изделий отдельной категории и в целом, собираемых указанным цехом, предприятием. 
        $model = new Req1Form();
        $query = null;
        if (!$model->load(Yii::$app->request->post())) {
            $model->category = '%';
            $model->workshop = '%';
            $model->company = '%';
        }
        $query = (new Query())
            ->select('product.name as pname, category.name as cname, sector.name as sname, workshop.name as wname, company.name as coname')
            ->from('log')
            ->innerJoin('product', 'log.id_product = product.id')
            ->innerJoin('category', 'product.id_category = category.id')
            ->innerJoin('sector', 'sector.id = log.id_sector')
            ->innerJoin('workshop', 'workshop.id = sector.id_workshop')
            ->innerJoin('company', 'company.id = workshop.id_company')
            ->where(['like', 'product.id_category', $model->category, false])
            ->andWhere(['like', 'sector.id_workshop', $model->workshop, false])
            ->andWhere(['like', 'workshop.id_company', $model->company, false]);
        $search = $query->all();
        return $this->render('req1', [
            'search' => $search,
            'model' => $model,
        ]);
    }

    //2.Получить число и перечень изделий отдельной категории и в целом, собранных указанным цехом, участком, предприятием в целом за определенный отрезок времени.
    public function actionReq2()
    {
        $model = new Req2Form();
        $query = null;
        if (!$model->load(Yii::$app->request->post())) {
            $model->category = '%';
            $model->workshop = '%';
            $model->company = '%';
            $model->sdate = '1970-01-01';
            $model->edate = '9999-12-31';
        }
        $query = (new Query())
            ->select('product.name as pname, log.count, category.name as cname, sector.name as sname, workshop.name as wname, company.name as coname, log.date_start, log.date_end')
            ->from('log')
            ->innerJoin('product', 'log.id_product = product.id')
            ->innerJoin('category', 'product.id_category = category.id')
            ->innerJoin('sector', 'sector.id = log.id_sector')
            ->innerJoin('workshop', 'workshop.id = sector.id_workshop')
            ->innerJoin('company', 'company.id = workshop.id_company')
            ->where(['like', 'product.id_category', $model->category, false])
            ->andWhere(['like', 'sector.id_workshop', $model->workshop, false])
            ->andWhere(['like', 'workshop.id_company', $model->company, false])
            ->andWhere(['>', 'log.date_start', $model->sdate])
            ->andWhere(['<', 'log.date_end', $model->edate]);
        $search = $query->all();
        return $this->render('req2', [
            'search' => $search,
            'model' => $model,
        ]);
    }

    //3.Получить данные о кадровом составе цеха, предприятия в целом и по указанным категориям инженерно-технического персонала и рабочих.
    public function actionReq3()
    {
        $model = new Req3Form();
        $query = null;
        if (!$model->load(Yii::$app->request->post())) {
            $model->post = '%';
            $model->workshop = '%';
            $model->company = '%';
        }
        $query = (new Query())
            ->select('workers.fullname, post.name as pname, sector.name as sname, workshop.name as wname, company.name as coname')
            ->from('workers')
            ->innerJoin('post', 'post.id = workers.id_post')
            ->innerJoin('sector', 'sector.id = workers.id_sector')
            ->innerJoin('workshop', 'workshop.id = sector.id_workshop')
            ->innerJoin('company', 'company.id = workshop.id_company')
            ->where(['like', 'workers.id_post', $model->post, false])
            ->andWhere(['like', 'sector.id_workshop', $model->workshop, false])
            ->andWhere(['like', 'workshop.id_company', $model->company, false]);
        $search = $query->all();
        return $this->render('req3', [
            'search' => $search,
            'model' => $model,
        ]);
    }

    //4.Получить число и перечень участков указанного цеха, предприятия в целом и их начальников. 
    public function actionReq4()
    {
        $model = new Req4Form();
        $query = null;
        if (!$model->load(Yii::$app->request->post())) {
            $model->workshop = '%';
            $model->company = '%';
        }

        $query = (new Query())
            ->select('workshop.id, workshop.name as wname, company.name as cname, workers.fullname')->distinct()
            ->from('workshop')
            ->leftJoin('sector', 'workshop.id = sector.id_workshop')
            ->leftJoin('company', 'workshop.id_company = company.id')
            ->leftJoin('workers', 'workers.id_sector = sector.id')
            ->where(['like', 'workers.id_post', 9, false])
            ->andWhere(['like', 'company.id', $model->company, false])
            ->andWhere(['like', 'workshop.id', $model->workshop, false]);

        $query2 = (new \yii\db\Query())
            ->select('workshop.id, count(sector.name) as spcount')
            ->from('workshop')
            ->innerJoin('sector', 'workshop.id=sector.id_workshop')
            ->groupBy('workshop.id');

        $query->leftJoin(['w' => $query2], 'w.id = workshop.id')->addSelect('spcount');
        $helpquery = Sector::find()->all();
        $search = $query->all();

        return $this->render('req4', [
            'search' => $search,
            'model' => $model,
            'support' => $helpquery,
        ]);
    }

    //5.Получить перечень работ, которые проходит указанное изделие.
    public function actionReq5()
    {
        $model = new Req5Form();
        $query = null;
        if (!$model->load(Yii::$app->request->post())) {
            $model->product = '%';
        }
        $query = (new Query())
            ->select('product.name as pname, work_prod.name as wname')
            ->from('prod_work')
            ->innerJoin('product', 'product.id = prod_work.id_product')
            ->innerJoin('work_prod', 'work_prod.id = prod_work.id_work')
            ->where(['like', 'prod_work.id_product', $model->product, false]);
        $search = $query->all();
        return $this->render('req5', [
            'search' => $search,
            'model' => $model,
        ]);
    }

    //6.Получить состав бригад указанного участка, цеха. 
    public function actionReq6()
    {
        $model = new Req6Form();
        $query = null;
        if (!$model->load(Yii::$app->request->post())) {
            $model->sector = '%';
            $model->workshop = '%';
        }
        $query = (new Query())
            ->select('brigade.name as bname, workers.fullname, sector.name as sname, workshop.name as wname')
            ->from('workers')
            ->innerJoin('brigade', 'brigade.id = workers.id_brigade')
            ->innerJoin('sector', 'sector.id = workers.id_sector')
            ->innerJoin('workshop', 'workshop.id = sector.id_workshop')
            ->where(['like', 'workers.id_sector', $model->sector, false])
            ->andWhere(['like', 'sector.id_workshop', $model->workshop, false]);
        $search = $query->all();
        return $this->render('req6', [
            'search' => $search,
            'model' => $model,
        ]);
    }

    //7.Получить перечень мастеров указанного участка, цеха. 
    public function actionReq7()
    {
        $model = new Req7Form();
        $query = null;
        if (!$model->load(Yii::$app->request->post())) {
            $model->sector = '%';
            $model->workshop = '%';
        }
        $query = (new Query())
            ->select('workers.fullname, post.name as pname, sector.name as sname, workshop.name as wname')
            ->from('workers')
            ->innerJoin('post', 'post.id = workers.id_post')
            ->innerJoin('sector', 'sector.id = workers.id_sector')
            ->innerJoin('workshop', 'workshop.id = sector.id_workshop')
            ->where(['like', 'workers.id_sector', $model->sector, false])
            ->andWhere(['like', 'sector.id_workshop', $model->workshop, false])
            ->andWhere(['like', 'workers.id_post', '7', false]);
        $search = $query->all();
        return $this->render('req7', [
            'search' => $search,
            'model' => $model,
        ]);
    }

    //8.Получить перечень изделий отдельной категории и в целом, собираемых в настоящий момент указанным участком, цехом, предприятием. 
    public function actionReq8()
    {
        $model = new Req8Form();
        $query = null;
        if (!$model->load(Yii::$app->request->post())) {
            $model->sector = '%';
            $model->workshop = '%';
            $model->company = '%';
        }
        $query = (new Query())
            ->select('product.name as pname, category.name as cname, sector.name as sname, workshop.name as wname, company.name as coname')
            ->from('log')
            ->innerJoin('product', 'log.id_product = product.id')
            ->innerJoin('category', 'product.id_category = category.id')
            ->innerJoin('sector', 'sector.id = log.id_sector')
            ->innerJoin('workshop', 'workshop.id = sector.id_workshop')
            ->innerJoin('company', 'company.id = workshop.id_company')
            ->where(['like', 'log.id_sector', $model->sector, false])
            ->andWhere(['like', 'sector.id_workshop', $model->workshop, false])
            ->andWhere(['like', 'workshop.id_company', $model->company, false])
            ->andWhere(['like', 'isReady', '0', false]);
        $search = $query->all();
        return $this->render('req8', [
            'search' => $search,
            'model' => $model,
        ]);
    }

    //9.Получить состав бригад, участвующих в сборке указанного изделия. 
    public function actionReq9()
    {
        $model = new Req9Form();
        if (!$model->load(Yii::$app->request->post())) {
            $model->product = '%';
        }
        $query = (new Query())
            ->select('brigade.name as bname, workers.fullname, product.name as pname')
            ->from('brig_prod')
            ->innerJoin('workers', 'workers.id = brig_prod.id_workers')
            ->innerJoin('product', 'product.id = brig_prod.id_product')
            ->innerJoin('brigade', 'brigade.id = workers.id_brigade')
            ->where(['like', 'brig_prod.id_product', $model->product, false]);
        $search = $query->all();

        return $this->render('req9', [
            'search' => $search,
            'model' => $model,
        ]);
    }

    //10.Получить перечень испытательных лабораторий, участвующих в испытаниях некоторого конкретного изделия. 
    public function actionReq10()
    {
        $model = new Req10Form();
        if (!$model->load(Yii::$app->request->post())) {
            $model->product = '%';
        }
        $query = (new Query())
            ->select('laboratory.name as lname, product.name as pname')
            ->from('lab_info')
            ->innerJoin('laboratory', 'laboratory.id = lab_info.id_lab')
            ->innerJoin('product', 'product.id = lab_info.id_product')
            ->where(['like', 'lab_info.id_product', $model->product, false]);
        $search = $query->all();

        return $this->render('req10', [
            'search' => $search,
            'model' => $model,
        ]);
    }

    //11.Получить перечень изделий отдельной категории и в целом, проходивших испытание в указанной лаборатории за определенный период. 
    public function actionReq11()
    {
        $model = new Req11Form();
        if (!$model->load(Yii::$app->request->post())) {
            $model->category = '%';
            $model->laboratory = '%';
            $model->sdate = '1970-01-01';
            $model->edate = '9999-12-31';
        }
        $query = (new \yii\db\Query())
            ->select('product.name as pname, category.name as cname, laboratory.name as lname, lab_info.date_start, lab_info.date_end')
            ->from('lab_info')
            ->leftJoin('laboratory', 'laboratory.id = lab_info.id_lab')
            ->leftJoin('product', 'product.id = lab_info.id_product')
            ->leftJoin('category', 'category.id = product.id_category')
            ->where(['like', 'product.id_category', $model->category, false])
            ->andWhere(['like', 'lab_info.id_lab', $model->laboratory, false])
            ->andWhere(['>', 'lab_info.date_start', $model->sdate])
            ->andWhere(['<', 'lab_info.date_end', $model->edate]);
        $search = $query->all();

        return $this->render('req11', [
            'search' => $search,
            'model' => $model,
        ]);
    }

    //12.Получить перечень испытателей, участвующих в испытаниях указанного изделия, изделий отдельной категории и в целом в указанной лаборатории за определенный период. 
    public function actionReq12()
    {
        $model = new Req12Form();
        if (!$model->load(Yii::$app->request->post())) {
            $model->product = '%';
            $model->category = '%';
            $model->laboratory = '%';
            $model->sdate = '1970-01-01';
            $model->edate = '9999-12-31';
        }
        $query = (new \yii\db\Query())
            ->select('workers.fullname, product.name as pname, category.name as cname, laboratory.name as lname, lab_info.date_start, lab_info.date_end')
            ->from('lab_info')
            ->leftJoin('laboratory', 'laboratory.id = lab_info.id_lab')
            ->leftJoin('product', 'product.id = lab_info.id_product')
            ->leftJoin('category', 'category.id = product.id_category')
            ->leftJoin('workers', 'workers.id = lab_info.id_workers')
            ->where(['like', 'product.id_category', $model->category, false])
            ->andWhere(['like', 'lab_info.id_lab', $model->laboratory, false])
            ->andWhere(['>', 'lab_info.date_start', $model->sdate])
            ->andWhere(['<', 'lab_info.date_end', $model->edate]);
        $search = $query->all();

        return $this->render('req12', [
            'search' => $search,
            'model' => $model,
        ]);
    }

    //13.Получить состав оборудования, использовавшегося при испытании указанного изделия, изделий отдельной категории и в целом в указанной лаборатории за определенный период. 
    public function actionReq13()
    {
        $model = new Req13Form();
        if (!$model->load(Yii::$app->request->post())) {
            $model->product = '%';
            $model->category = '%';
            $model->laboratory = '%';
            $model->sdate = '1970-01-01';
            $model->edate = '9999-12-31';
        }
        $query = (new \yii\db\Query())
            ->select('lab_quipment.name as qname, product.name as pname, category.name as cname, laboratory.name as lname, lab_info.date_start, lab_info.date_end')
            ->from('lab_info')
            ->leftJoin('laboratory', 'laboratory.id = lab_info.id_lab')
            ->leftJoin('product', 'product.id = lab_info.id_product')
            ->leftJoin('category', 'category.id = product.id_category')
            ->leftJoin('lab_quipment', 'lab_quipment.id = lab_info.id_quipment')
            ->where(['like', 'product.id_category', $model->category, false])
            ->andWhere(['like', 'lab_info.id_lab', $model->laboratory, false])
            ->andWhere(['>', 'lab_info.date_start', $model->sdate])
            ->andWhere(['<', 'lab_info.date_end', $model->edate]);
        $search = $query->all();

        return $this->render('req13', [
            'search' => $search,
            'model' => $model,
        ]);
    }

    //14.Получить число и перечень изделий отдельной категории и в целом, собираемых указанным цехом, участком, предприятием в настоящее время. 
    public function actionReq14()
    {
        $model = new Req14Form();
        $query = null;
        if (!$model->load(Yii::$app->request->post())) {
            $model->category = '%';
            $model->workshop = '%';
            $model->company = '%';
        }
        $query = (new Query())
            ->select('product.name as pname, log.count, category.name as cname, sector.name as sname, workshop.name as wname, company.name as coname, log.isReady')
            ->from('log')
            ->innerJoin('product', 'log.id_product = product.id')
            ->innerJoin('category', 'product.id_category = category.id')
            ->innerJoin('sector', 'sector.id = log.id_sector')
            ->innerJoin('workshop', 'workshop.id = sector.id_workshop')
            ->innerJoin('company', 'company.id = workshop.id_company')
            ->where(['like', 'product.id_category', $model->category, false])
            ->andWhere(['like', 'sector.id_workshop', $model->workshop, false])
            ->andWhere(['like', 'workshop.id_company', $model->company, false])
            ->andWhere(['like', 'isReady', '0', false]);
        $search = $query->all();
        return $this->render('req14', [
            'search' => $search,
            'model' => $model,
        ]);
    }
}
