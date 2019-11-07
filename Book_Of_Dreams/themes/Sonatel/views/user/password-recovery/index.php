<?php

use yii\helpers\Url;
use yii\helpers\Html;
use humhub\compat\CActiveForm;

$this->pageTitle = Yii::t('UserModule.views_auth_recoverPassword', 'Password recovery');
?>

<div id="content-desktop"; style="float:left; width: 10vw; height: 8vw; border-radius: 50%; background: #add8e6; margin-top: 15%;">
	<div id="content-desktop"; style="float:left; height: 7vw; width: 7vw; background-color: #90EE90; border-radius: 50%;margin-top: 200%; margin-left: 110%"></div>
</div>

<div id="content-desktop"; style="float:right; height: 4vw; width: 4vw; background-color: pink; border-radius: 50%;margin-top: 20%">
	<div id="content-desktop"; style="float:right; height: 8vw; width: 7vw; background-color: #ffa500; border-radius: 50%;margin-top: 200%; margin-right: 210%"></div>
</div>


<style>
    #content-desktop {display: block;}

    @media screen and (max-width: 768px) {
    #content-desktop {display: none;}
    }
</style>


<img src="https://www.orangesv.com/wp-content/uploads/2019/04/sonatel-300x79.png" class="animated slower bounceIn "  id="animated-img1" style="text-align: center; width: 20vw;height: 3vw; margin-left: 30%">
<br>

<div class="w3-row" style="text-align: center; font-size:8vw;;">

<b>
<span style="width:100px; color:orange; font-family: Palatino, URW Palladio L, serif; text-shadow: 2px 2px 5px white;  margin-top: 10px;">
    		B
</span>
	
<span style="width:100px; color:pink; font-family: Palatino, URW Palladio L, serif; text-shadow: 2px 2px 5px white; ">
    		o
</span>

<span style="width:100px; color:yellow; font-family: Palatino, URW Palladio L, serif; text-shadow: 2px 2px 5px white;">
    		o
</span>


<span style="width:100px; color:green; font-family: Palatino, URW Palladio L, serif; text-shadow: 2px 2px 5px white;">
    		k
</span>

<span style="width:100px; color:orange; font-family: Palatino, URW Palladio L, serif; text-shadow: 2px 2px 5px white; margin-left: 20px;">
    		O
</span>

<span style="width:100px; color:black; font-family: Palatino, URW Palladio L, serif; text-shadow: 2px 2px 5px white;">
    		f
</span>

<span style="width:100px; color:orange; font-family: Palatino, URW Palladio L, serif; text-shadow: 2px 2px 5px white; margin-left: 20px;">
    		D
</span>

<span style="width:100px; color:brown; font-family: Palatino, URW Palladio L, serif; text-shadow: 2px 2px 5px white;">
    		r
</span>

<span style="width:100px; color:green; font-family: Palatino, URW Palladio L, serif; text-shadow: 2px 2px 5px white;">
    		e
</span>

<span style="width:100px; color:gray; font-family: Palatino, URW Palladio L, serif; text-shadow: 2px 2px 5px white;">
    		a
</span>

<span style="width:100px; color:red; font-family: Palatino, URW Palladio L, serif; text-shadow: 2px 2px 5px white;">
    		m
</span>

<span style="width:100px; color:black; font-family: Palatino, URW Palladio L, serif; text-shadow: 2px 2px 5px white;">
    		s
</span>
</b>
</div>



<div class="container" style="text-align: center;">

<span style="width:100px; color:black; font-style: italic; text-shadow: 2px 2px 5px white;" >
   <h5>
   <b>Etre créatif</b>, c'est penser à de nouvelles idées.    <b>Innover</b>, c'est faire des choses nouvelles.
    <h5>
<br> 
  </span>

    <div class="row">
        <div id="password-recovery-form" class="panel panel-default animated bounceIn" style="max-width: 300px; margin: 0 auto 20px; text-align: left;">
            <div class="panel-heading"><?php echo Yii::t('UserModule.views_auth_recoverPassword', '<strong>Password</strong> recovery'); ?></div>
            <div class="panel-body">

                <?php $form = CActiveForm::begin(['enableClientValidation' => false]); ?>

                <p><?= Yii::t('UserModule.views_auth_recoverPassword', 'Just enter your e-mail address. We\'ll send you recovery instructions!'); ?></p>

                <?= $form->field($model, 'email')->textInput(['class' => 'form-control', 'id' => 'email_txt', 'placeholder' => Yii::t('UserModule.views_auth_recoverPassword', 'Your email')])->label(false) ?>

                <div class="form-group">
                    <?=\yii\captcha\Captcha::widget([
                        'model' => $model,
                        'attribute' => 'verifyCode',
                        'captchaAction' => '/user/auth/captcha',
                        'options' => ['class' => 'form-control', 'placeholder' => Yii::t('UserModule.views_auth_recoverPassword', 'Enter security code above')]
                    ]);
                    ?>
                    <?= $form->error($model, 'verifyCode'); ?>
                </div>

                <hr>
                <?= Html::submitButton(Yii::t('UserModule.views_auth_recoverPassword', 'Reset password'), ['class' => 'btn btn-primary', 'data-ui-loader' => ""]); ?> <a class="btn btn-primary" data-ui-loader href="<?php echo Url::home(); ?>"><?php echo Yii::t('UserModule.views_auth_recoverPassword', 'Back') ?></a>

                <?php CActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(function () {
        // set cursor to email field
        $('#email_txt').focus();
    });

    // Shake panel after wrong validation
<?php if ($model->hasErrors()) : ?>
        $('#password-recovery-form').removeClass('bounceIn');
        $('#password-recovery-form').addClass('shake');
        $('#app-title').removeClass('fadeIn');
<?php endif; ?>
</script>
