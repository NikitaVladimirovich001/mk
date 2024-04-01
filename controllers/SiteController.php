<?php

namespace app\controllers;

use app\models\Basket;
use app\models\Catalog;
use app\models\CategoryCatalog;
use app\models\CategoryRent;
use app\models\Proposal;
use app\models\Rent;
use app\models\Session;
use app\models\Sessions;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

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
                ],
            ],
        ];
    }


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


    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if (!Yii::$app->user->isGuest) {
                return $this->redirect(['/admin']);
            }else{
                return $this->redirect(['site/index']);
            }
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }


    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

//    Корзина
    public function actionBasket()
    {
        // Получаем экземпляр корзины пользователя из сессии
        $session = Yii::$app->session;
        $basket = $session->get('basket', []);

        // Получаем информацию о товарах в корзине из БД на основе идентификаторов в сессии
        $catalog = Catalog::find()->where(['id' => $basket])->all();
        $rent = Rent::find()->where(['id' => $basket])->all();

        // Создаем экземпляр модели заявки
        $model = new Proposal();

        // Проверяем, была ли отправлена форма
        if ($model->load(Yii::$app->request->post())) {

            // Создаем новую сессию и сохраняем в базе данных
            $sessionsModel = new Sessions();
            $sessionsModel->cookie = serialize($basket);
            $sessionsModel->save();

            // Сохраняем каждый товар в корзине по очереди
            foreach ($catalog as $catalogItem) {
                $basketModel = new Basket();
                $basketModel->catalog_id = $catalogItem->id;
                $basketModel->session_id = $sessionsModel->id;
                $basketModel->save();
            }

            foreach ($rent as $rentItem) {
                $basketModel = new Basket();
                $basketModel->rent_id = $rentItem->id;
                $basketModel->session_id = $sessionsModel->id;
                $basketModel->save();
            }

            $allItems = array_merge($catalog, $rent);

            // Связываем заявку с корзиной
            $model->basket_id = $basketModel->id;

            // Проверяем успешное сохранение данных в заявке
            if ($model->save()) {

                // Отправляем сообщение на почту с информацией о товарах
                Yii::$app->mailer->compose('order', ['allItems' => $allItems, 'model'=>$model, 'catalog'=>$catalog, 'rent'=>$rent])
                    ->setFrom('mk.sound@kpk45.ru')
                    ->setTo('mk.sound@kpk45.ru')
                    ->setSubject('Товары в корзине')
                    ->send();

                // Очищаем корзину в сессии
                $session->remove('basket');

                Yii::$app->session->setFlash('success', 'Заявка успешно отправлена.');
                return $this->redirect(['site/index']);
            } else {
                // Если сохранение не удалось, обработка ошибки
                Yii::$app->session->setFlash('error', 'Произошла ошибка при сохранении заявки.');
            }
        }

        // Возвращаем представление с формой и данными корзины
        return $this->render('basket', ['model' => $model, 'catalog' => $catalog, 'rent' => $rent, 'basket' => $basket]);
    }


//    Добовление товара в карзину

    // Добавление товара в корзину из каталога
    public function actionAddCatalog()
    {
        $id = Yii::$app->request->get('id');

        // Получаем экземпляр корзины пользователя из сессии
        $session = Yii::$app->session;
        $basket = $session->get('basket', []);

        // Добавляем товар в корзину в сессии
        $basket[] = ['id' => $id, 'type' => 'catalog'];
        $session->set('basket', $basket);

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }


    public function actionRemoveCatalog($id)
    {
        // Получаем экземпляр корзины пользователя из сессии
        $session = Yii::$app->session;
        $basket = $session->get('basket', []);

        // Ищем элемент с заданным id в корзине
        foreach ($basket as $index => $item) {
            if ($item['id'] == $id) {
                // Если найден элемент с заданным id, удаляем его из корзины
                unset($basket[$index]);
                // Обновляем данные корзины в сессии
                $session->set('basket', $basket);
                break;
            }
        }

        // Перенаправляем пользователя на страницу корзины
        return $this->redirect(['basket']);
    }


    // Добавление товара в корзину из аренды
    public function actionAddRent()
    {
        $id = Yii::$app->request->get('id');

        // Получаем экземпляр корзины пользователя из сессии
        $session = Yii::$app->session;
        $basket = $session->get('basket', []);

        // Добавляем товар в корзину в сессии
        $basket[] = ['id' => $id, 'type' => 'rent'];
        $session->set('basket', $basket);

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }


    // Удаление товара из аренды
    public function actionRemoveRent($id)
    {
        // Получаем экземпляр корзины пользователя из сессии
        $session = Yii::$app->session;
        $basket = $session->get('basket', []);

        // Ищем элемент с заданным id в корзине
        foreach ($basket as $index => $item) {
            if ($item['id'] == $id) {
                // Если найден элемент с заданным id, удаляем его из корзины
                unset($basket[$index]);
                // Обновляем данные корзины в сессии
                $session->set('basket', $basket);
                break;
            }
        }

        // Перенаправляем пользователя на страницу корзины
        return $this->redirect(['basket']);
    }


//  Каталог
    public function actionIndex()
    {
        $categories = CategoryCatalog::find()->all();
        $catalog = Catalog::find()->all();

        return $this->render('index', ['categories' => $categories, 'catalog' => $catalog,]);
    }

    public function actionOpisanieCatalog($id)
    {
        $catalog = Catalog::findOne($id);
        $rent = Rent::findOne($id);

        return $this->render('opisaniecatalog', ['catalog' => $catalog, 'rent'=>$rent]);
    }

    public function actionFiltercatalog($category_id)
    {
        $categories = CategoryCatalog::find()->all();
        $catalog = Catalog::find()->where(['category_id' => $category_id])->all();

        return $this->render('index', ['categories' => $categories, 'catalog' => $catalog,
        ]);
    }

//    Аренда
    public function actionRent()
    {
        $categories = CategoryRent::find()->all();
        $rent = Rent::find()->all();

        $context = ['categories'=>$categories, 'rent'=>$rent];

        return $this->render('rent', $context);
    }

    public function actionFilterrent($category_id)
    {
        $categories = CategoryRent::find()->all();
        $rent = Rent::find()->where(['category_id' => $category_id])->all();

        return $this->render('rent', ['categories' => $categories, 'rent' => $rent,]);
    }
}
