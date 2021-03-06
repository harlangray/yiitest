<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use mdm\admin\components\MenuHelper;
/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'My Company',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
//            echo Nav::widget([
//                'options' => ['class' => 'navbar-nav navbar-right'],
//                'items' => [
//                    ['label' => 'Home', 'url' => ['/site/index']],
//                    ['label' => 'Continent', 'url' => ['/continent/index']],
//                    ['label' => 'Country', 'url' => ['/country/index']],
//                    ['label' => 'About', 'url' => ['/site/about']],
//                    ['label' => 'Contact', 'url' => ['/site/contact']],
//                    ['label' => 'Admin', 'url' => ['/admin']],
//                    Yii::$app->user->isGuest ?
//                        ['label' => 'Login', 'url' => ['/user/security/login']] :
//                        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
//                            'url' => ['/user/security/logout'],
//                            'linkOptions' => ['data-method' => 'post']],
//                
//                    ['label' => 'User',
//                        'items' => [
//                            ['label' => 'Register', 'url' => ['/user/registration/register']],
//                            ['label' => 'Login', 'url' => ['/user/security/login']],
//                            ['label' => 'Request', 'url' => ['/user/recovery/request']],
//                            ['label' => 'Reset', 'url' => ['/user/recovery/reset']],
//                            ['label' => 'Profile', 'url' => ['/user/settings/profile']],
//                            ['label' => 'email', 'url' => ['/user/settings/email']],
//                            ['label' => 'Password', 'url' => ['/user/settings/password']],
//                            ['label' => 'Profile Show', 'url' => ['/user/profile/show']],
//                            ['label' => 'Manage Users', 'url' => ['/user/admin/index']],
//                            
//                        ],
//                        ],
//                    
//                    Yii::$app->lang->getMenuItems()
//                    ],                
//            ]);
         
$menuArr = MenuHelper::getAssignedMenu(Yii::$app->user->id);
$languageArr = Yii::$app->lang->getMenuItems();

array_push($menuArr, $languageArr);
//echo '<pre>';
//echo print_r($menuArr);
//echo '<pre>';
//die();
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' =>  $menuArr//array_merge($menuArr, $languageArr)
]);

            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
