<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\helpers\Html;
use backend\models\User;
use backend\models\UserSearch;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

//    public function actionConfirm()
//    {
//      //  Yii::$app->user->
//        return $this->render('confirm');
//    }
//    public function actionAdminhome()
//    {
//        return $this->render('adminhome');
//    }
    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                $logo= Html::img('http://ceto.murdoch.edu.au/~team62/huddle/admin/images/logo_huddle.png');
                 $urltext =  \Yii::$app->urlManager->createAbsoluteUrl(['site/confirm','id'=>$user->id,'key'=>$user->auth_key]);
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

                    ->setTo($user->email)
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
                return $this->goHome();

            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
    public function actionConfirm($id, $key)
    {
        //$user = new User();
       // $user::find
//        $userid=Yii::$app->request->get($id);
//        $userkey=Yii::$app->request->get($key);

        $user = \backend\models\User::find()->where(['id'=>$id, 'auth_key'=>$key, 'status'=>0])->one();
        //echo $id;
        if(!empty($user)){
            $user->status=10;
            $user->save();
            Yii::$app->getSession()->setFlash('success','Success! ');

        }
        else{
            Yii::$app->getSession()->setFlash('warning','Failed!'. $id);

        }
        return $this->render('confirm');
        //return $this->goHome();
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
