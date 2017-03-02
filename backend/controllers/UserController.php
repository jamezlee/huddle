<?php

namespace backend\controllers;

use Yii;
use backend\models\User;
use backend\models\UserSearch;

use backend\models\Project;
use backend\models\ProjectSearch;
use backend\models\Activity;
use backend\models\Task;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\Session;
/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['create', 'update','index','view'],
                'rules' => [
                    // deny all POST requests
                    [
                        'allow' => true,
                        'verbs' => ['POST'],
                        'roles' => ['@'],
                    ],
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // everything else is denied
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           // $model->created_at = new Expression('NOW()');
           $logo= Html::img('http://ceto.murdoch.edu.au/~team62/huddle/admin/images/logo_huddle.png');
            $urltext =  \Yii::$app->urlManagerFrontEnd->createAbsoluteUrl(['site/confirm','id'=> $model->id,'key'=>$model->auth_key]);
            $header ='<meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                        <style type="text/css">
                            /* CLIENT-SPECIFIC STYLES */
                            body, table, td, a{-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
                            table, td{mso-table-lspace: 0pt; mso-table-rspace: 0pt;} /* Remove spacing between tables in Outlook 2007 and up */
                            img{-ms-interpolation-mode: bicubic;} /* Allow smoother rendering of resized image in Internet Explorer */

                            /* RESET STYLES */
                            img{border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none;}
                            table{border-collapse: collapse !important;}
                            body{height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important;}

                            /* iOS BLUE LINKS */
                            a[x-apple-data-detectors] {
                                color: inherit !important;
                                text-decoration: none !important;
                                font-size: inherit !important;
                                font-family: inherit !important;
                                font-weight: inherit !important;
                                line-height: inherit !important;
                            }

                            /* MOBILE STYLES */
                            @media screen and (max-width: 525px) {

                                /* ALLOWS FOR FLUID TABLES */
                                .wrapper {
                                  width: 100% !important;
                                    max-width: 100% !important;
                                }

                                /* ADJUSTS LAYOUT OF LOGO IMAGE */
                                .logo img {
                                  margin: 0 auto !important;
                                }

                                /* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
                                .mobile-hide {
                                  display: none !important;
                                }

                                .img-max {
                                  max-width: 100% !important;
                                  width: 100% !important;
                                  height: auto !important;
                                }

                                /* FULL-WIDTH TABLES */
                                .responsive-table {
                                  width: 100% !important;
                                }

                                /* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
                                .padding {
                                  padding: 10px 5% 15px 5% !important;
                                }

                                .padding-meta {
                                  padding: 30px 5% 0px 5% !important;
                                  text-align: center;
                                }

                                .padding-copy {
                                    padding: 10px 5% 10px 5% !important;
                                  text-align: center;
                                }

                                .no-padding {
                                  padding: 0 !important;
                                }

                                .section-padding {
                                  padding: 50px 15px 50px 15px !important;
                                }

                                /* ADJUST BUTTONS ON MOBILE */
                                .mobile-button-container {
                                    margin: 0 auto;
                                    width: 100% !important;
                                }

                                .mobile-button {
                                    padding: 15px !important;
                                    border: 0 !important;
                                    font-size: 16px !important;
                                    display: block !important;
                                }

                            }

                            /* ANDROID CENTER FIX */
                            div[style*="margin: 16px 0;"] { margin: 0 !important; }
                        </style>';
            $bodymsg='
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">


                                <tr>
                                    <td bgcolor="#ffffff" align="center" style="padding: 25px 15px 70px 15px;" class="section-padding">
                                        <table border="0" cellpadding="0" cellspacing="0" width="500" class="responsive-table">
                                            <tr>
                                                <td>
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td>
                                                                <!-- COPY -->
                                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td align="center" style="font-size: 25px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 30px;" class="padding-copy">'.$logo. '</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="center" style="font-size: 25px; font-family: Helvetica, Arial, sans-serif; color: #333333; padding-top: 30px;" class="padding-copy">Our Best Product Ever</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td align="center" style="padding: 20px 0 0 0; font-size: 16px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">
                                                                        <h2 style="font-size: 16px; line-height: 25px;>Welcome to huddle</h2>
                                                                        <p style="font-size: 14px; line-height: 17px>Please activate your account now</p>

                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center">
                                                                <!-- BULLETPROOF BUTTON -->
                                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                        <td align="center" style="padding-top: 25px;" class="padding">
                                                                            <table border="0" cellspacing="0" cellpadding="0" class="mobile-button-container">
                                                                                <tr>
                                                                                    <td align="center" style="border-radius: 3px;" bgcolor="#256F9C">
                        <a href="'.$urltext.'" target="_blank" style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 15px 25px; border: 1px solid #256F9C; display: inline-block;" class="mobile-button">confirm &rarr;</a>'
                .' </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                            </table>';
            $email = \Yii::$app->mailer->compose()

                ->setTo($model->email)
                ->setFrom([\Yii::$app->params['supportEmail'] => 'Huddle - Project Management'])
                ->setSubject('Signup Confirmation')
                ->setHtmlBody(
                    ''.$header
                    .$bodymsg
//                            'Click this link'
//                            .\yii\helpers\Html::a('confirm',
//                            Yii::$app->urlManager->createAbsoluteUrl(['site/confirm','id'=>$user->id,'key'=>$user->auth_key]))

                )
                ->send();
            if($email){
                Yii::$app->getSession()->setFlash('success','Check Your email!');
            }
            else{
                Yii::$app->getSession()->setFlash('warning','Failed, contact Admin!');
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {


           // $model->updated_at=new Expression('NOW()');
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $dataProviderP= Project::findAll(['userid' => $id]);
        $dataProviderT= Task::findAll(['userid' => $id]);

        if($dataProviderP){
            Yii::$app->getSession()->setFlash('error', 'Unable to delete Project is still link with user');
            //Yii::$app->getSession()->setFlash('error', 'Unable to delete');
            return $this->redirect(['index']);
        }
        if($dataProviderT){
            Yii::$app->getSession()->setFlash('error', 'Unable to delete Task is still link with user');
            //Yii::$app->getSession()->setFlash('error', 'Unable to delete');
            return $this->redirect(['index']);
        }

        else{
            $this->findModel($id)->delete();
            Yii::$app->getSession()->setFlash('error', 'User have deleted-'.$model->username);
            return $this->redirect(['index']);

        }
    }





    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {

            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
