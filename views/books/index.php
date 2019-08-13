<?php

use yii\helpers\Html;
use app\libraries\GridView;
use yii\widgets\Pjax;
use \kartik\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Book', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(['id' => 'grid-books', 'timeout' => false, 'enablePushState' => false]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'panel' => [
            'type' => GridView::TYPE_DEFAULT,
            'heading' => '<i class="glyphicon glyphicon-book"></i>  Listado de Libros',
            'options' => [
                'class' => 'kv-panel'
            ]
        ],
        'headerRowOptions' => ['class' => 'kartik-sheet-style'],
        'filterRowOptions' => ['class' => 'kartik-sheet-style'],
        'toolbar' =>  [
            ['content' =>
                Html::a('<i class="glyphicon glyphicon-plus"></i> New ', ['create'], ['title' => 'Nuevo', 'class'=>'btn btn-success']) . ' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i> ', ['index'], ['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => 'Resetear grid'])
            ]
        ],
        'columns' => [
            [
                'label' => 'Título',
                'attribute' => 'title',
                'headerOptions' => ['class' => 'kartik-sheet-style text-center'],
                'vAlign' => 'middle'
            ],
            [
                'label' => 'Descripción',
                'attribute' => 'description',
                'headerOptions' => ['class' => 'kartik-sheet-style text-center'],
                'vAlign' => 'middle'
            ],
            [
                'label' => 'Precio',
                'attribute' => 'price',
                'headerOptions' => ['class' => 'kartik-sheet-style text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'vAlign' => 'middle'
            ],
            [
                'label' => 'Autor',
                'attribute' => 'authorName',
                'headerOptions' => ['class' => 'kartik-sheet-style text-center'],
                'width' => '18%',
                'value' => 'author.name',
                'vAlign' => 'middle'
            ],
            [
                'header' => 'Acciones',
                'vAlign' => 'middle',
                'class' => ActionColumn::class,
                'headerOptions' => ['class' => 'kartik-sheet-style text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'template' => '{view} {update}',
                'width' => '12%',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-eye-open"></span>',
                            [
                                'detail',
                                'id' => $model->id
                            ],
                            [
                                'title' => Yii::t('app', 'lead-view'),
                                'class' => 'btn btn-default btn-sm'
                            ]
                        );
                    },

                    'update' => function ($url, $model) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-pencil"></span>',
                            [
                                'update',
                                'id' => $model->id
                            ],
                            [
                                'title' => Yii::t('app', 'lead-update'),
                                'class' => 'btn btn-primary btn-sm'
                            ]
                        );
                    },
                ]
            ]
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
