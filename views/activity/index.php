<?php

/* @var $this \yii\web\View */
/* @var $model \app\models\ActivitySearch */
/* @var $provider \yii\data\ActiveDataProvider */
/* @var $model \app\models\Activity */



use yii\grid\GridView;

?>
<div class="row">
    <div class="col-md-12">
        <?= \yii\grid\GridView::widget([
            'dataProvider' => $provider,
            'filterModel' => $model,
            'columns' => [
                ['class'=>\yii\grid\SerialColumn::class],
                'id',
                [
                    'attribute'=>'title',
                    'label' => 'Название активности',
                    'value' => function($model){
                        return \yii\helpers\Html::a(\yii\helpers\Html::encode($model->title),['/activity/view2','id'=>$model->id]);
                    },
                    'format' => 'raw'
                ],
                'dateStart',
                'userId',
                [
                    'attribute' => 'user.email'
                ],
                [
                    'attribute' => 'createAt',
                    'value' => function(\app\models\Activity $model){
                        $model->attachBehavior('dc',['class'=>DateCreateBehavior::class,'attributeName'=> 'createAt'])
                        return $model->getDateCreated();
                    }
                ]
            ]
        ]); 
        ?>
    </div>
</div>