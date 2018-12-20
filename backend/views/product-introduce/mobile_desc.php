<?php

/* @var $this yii\web\View */
use backend\models\ImageForm;
use common\widgets\CKEditorWidget;
use yii\bootstrap\Html;
use yii\helpers\Url;

/* @var $introduce \common\models\ProductIntroduce */
/* @var $images \common\models\ProductImage[] */
/** @var \common\models\Product $product */
$this->title = '添加手机端描述';
if($product->isPackage())
{
    $breadcrumbsUrl = ['product/package-list'];
}
else
{
    $breadcrumbsUrl = ['product/list'];
}
$this->params['breadcrumbs'] = [
    ['label' => '商品管理', 'url' => $breadcrumbsUrl],
    $this->title
];
?>
<div class="wrapper wrapper-content animated fadeIn">
    <div class="row">
        <div class="col-xs-12">
            <div class="tabs-container">
                <?php if($product->isPackage()):?>
                    <?= $this->render('/product/package-nav-tabs', ['product' => $product]) ?>
                <?php else:?>
                    <?= $this->render('/product/nav-tabs', ['product' => $product]) ?>
                <?php endif;?>
                <div class="tab-content">
                    <div class="panel-body" style="border-top: none">
                        <?php
                        $model = new ImageForm();
                        $form = \yii\bootstrap\ActiveForm::begin([
                            'action' => ['product-introduce/update-mobile', 'product_id' => $introduce->product_id],
                            'layout' => 'horizontal',
                            'fieldConfig' => [
                                'horizontalCssClasses' => [
                                    'label' => 'col-sm-2',
                                    'offset' => 'col-sm-offset-2',
                                    'wrapper' => 'col-sm-8',
                                ],
                            ],
                        ]); ?>

                        <?= $form->field($introduce, 'description_m')->widget(CKEditorWidget::className()); ?>

                        <?= Html::activeHiddenInput($introduce, 'product_id') ?>
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <button type="submit" class="btn btn-primary sure-btn">保存</button>
                            </div>
                        </div>
                        <?php \yii\bootstrap\ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





