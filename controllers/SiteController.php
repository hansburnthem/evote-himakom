<?php

namespace app\controllers;

use app\models\Candidate;
use app\models\Vote;
use http\Exception;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\ServerErrorHttpException;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                    'vote' => ['post']
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $user = Yii::$app->user->identity;
        $voteDate = Candidate::find()
            ->select('vote_date')
            ->limit(1)
            ->orderBy('vote_date DESC')
            ->scalar();
        $disabled = (empty($user) || !empty($user->vote)) || date('Y-m-d H:i:s') < $voteDate;
        return $this->render('index', [
            'disabled' => $disabled
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goHome();
        }
        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionStepVote()
    {
        return $this->render('step-vote');
    }

    public function actionVoteProof()
    {
        return $this->render('vote-proof', [
            'vote' => Yii::$app->user->identity->vote
        ]);
    }

    public function actionVote()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $post = Yii::$app->request->post();
        $ref = (int) $post['ref'];
        $user = Yii::$app->user->identity;
        if ($user && empty($user->vote) && $ref) {
            $vote = new Vote;
            $vote->user_id = $user->id;
            $vote->candidate_id = $ref;

            if (!$vote->save()) {
                throw new ServerErrorHttpException();
            }
        }
        return [
            'message' => 'Success Vote'
        ];
    }
}
