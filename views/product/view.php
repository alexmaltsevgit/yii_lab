<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Comment;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h1><?= 'Товар ' . Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'product_id',
            'title:ntext',
            'description:ntext',
        ],
    ]) ?>

    <ul>

        <?php Pjax::begin(); ?>

        <?php
        if (isset($_GET['p'])) {
            $p = $_GET['p'] + 10;
        } else {
            $p = 10;
        } ?>

        <?php foreach (Comment::findbysql("SELECT content, username from comment where product_id = '$model->product_id' limit $p")->all() as $comment) : ?>
            <li>
                <?php echo "Комментарий пользователя $comment->username:"; ?>
                <?= $comment->content ?>
            </li>
        <?php endforeach; ?>

    </ul>

    <div">
        <?= Html::a("Написать комментарий", ['comment/create', 'id' => $_GET['id'], 'product_id' => $_GET['id']], ['class' => 'btn btn-md btn-primary']) ?>
    </div>

    <div style="margin-top: 15px;">
        <?= Html::a("Ещё", ['view', 'id' => $_GET['id'], 'p' => $p], ['class' => 'btn btn-md btn-primary']) ?>
    </div>

    <?php Pjax::end(); ?>

</div>