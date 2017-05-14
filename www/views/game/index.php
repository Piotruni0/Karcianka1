<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

?>
<h1>game/index</h1>


<?=Html::a(Yii::t('app', 'Graj'), ['game/play'], ['class'=>'btn btn-success']);?>
<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>
