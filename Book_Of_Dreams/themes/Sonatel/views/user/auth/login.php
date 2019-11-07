<?php

use yii\captcha\Captcha;
use \yii\helpers\Url;
use yii\widgets\ActiveForm;
use \humhub\compat\CHtml;
use humhub\modules\user\widgets\AuthChoice;

$this->pageTitle = Yii::t('UserModule.views_auth_login', 'Login');
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

<span style="font-style:italic; text-shadow: 2px 2px 5px white;" >
    <h5 style=" font-size:17px">
        So <b style="color:black">fun</b>, So <b style="color:black">innovant</b>
    <h5>
<br> 
  </span>


    <div class="panel panel-default animated bounceIn" id="login-form"
         style="max-width: 300px; margin: 0 auto 20px; text-align: left; align: left;">

        <div class="panel-heading"><?= Yii::t('UserModule.views_auth_login', '<strong>Please</strong> sign in'); ?></div>

        <div class="panel-body">

            <?php if (Yii::$app->session->hasFlash('error')): ?>
                <div class="alert alert-danger" role="alert">
                    <?= Yii::$app->session->getFlash('error') ?>
                </div>
            <?php endif; ?>

            <?php if (AuthChoice::hasClients()): ?>
                <?= AuthChoice::widget([]) ?>
            <?php else: ?>
                <?php if ($canRegister) : ?>
                    <p><?= Yii::t('UserModule.views_auth_login', "If you're already a member, please login with your username/email and password."); ?></p>
                <?php else: ?>
                    <p><?= Yii::t('UserModule.views_auth_login', "Connectez-vous avec votre username/email et password."); ?></p>
                <?php endif; ?>
            <?php endif; ?>

            <?php $form = ActiveForm::begin(['id' => 'account-login-form', 'enableClientValidation' => false]); ?>
            <?= $form->field($model, 'username')->textInput(['id' => 'login_username', 'placeholder' => $model->getAttributeLabel('username'), 'aria-label' => $model->getAttributeLabel('username')])->label(false); ?>
            <?= $form->field($model, 'password')->passwordInput(['id' => 'login_password', 'placeholder' => $model->getAttributeLabel('password'), 'aria-label' => $model->getAttributeLabel('password')])->label(false); ?>
            <?= $form->field($model, 'rememberMe')->checkbox(); ?>

            <hr>
            <div class="row">
                <div class="col-md-4">
                    <?= CHtml::submitButton(Yii::t('UserModule.views_auth_login', 'Connexion'), ['id' => 'login-button', 'data-ui-loader' => "", 'class' => 'btn btn-large btn-primary']); ?>
                </div>
                <div class="col-md-8 text-right">
                    <small>
                        <a id="password-recovery-link" href="<?= Url::toRoute('/user/password-recovery'); ?>" data-pjax-prevent><br><?= Yii::t('UserModule.views_auth_login', 'Mot de passe oublié?') ?></a>
                    </small>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

    </div>

    <br>

    <?php if ($canRegister) : ?>
        <div id="register-form"
             class="panel panel-default animated bounceInLeft"
             style="max-width: 300px; margin: 0 auto 20px; text-align: left;">

            <div class="panel-heading"><?= Yii::t('UserModule.views_auth_login', '<strong>Sign</strong> up') ?></div>

            <div class="panel-body">

                <p><?= Yii::t('UserModule.views_auth_login', "Don't have an account? Join the network by entering your e-mail address."); ?></p>

                <?php $form = ActiveForm::begin(['id' => 'invite-form']); ?>
                <?= $form->field($invite, 'email')->input('email', ['id' => 'register-email', 'placeholder' => $invite->getAttributeLabel('email'), 'aria-label' => $invite->getAttributeLabel('email')])->label(false); ?>
                <?php if ($invite->showCaptureInRegisterForm()) : ?>
                    <div id="registration-form-captcha" style="display: none;">
                        <div><?= Yii::t('UserModule.views_auth_login', 'Please enter the letters from the image.'); ?></div>

                        <?= $form->field($invite, 'captcha')->widget(Captcha::class, [
                            'captchaAction' => 'auth/captcha',
                        ])->label(false);?>
                    </div>
                <?php endif; ?>
                <hr>
                <?= CHtml::submitButton(Yii::t('UserModule.views_auth_login', 'Register'), ['class' => 'btn btn-primary', 'data-ui-loader' => '']); ?>

                <?php ActiveForm::end(); ?>
            </div>
        </div>

    <?php endif; ?>

    <?= humhub\widgets\LanguageChooser::widget(); ?>



</div>

<script type="text/javascript">
    $(function () {
        // set cursor to login field
        $('#login_username').focus();
    });

    // Shake panel after wrong validation
<?php if ($model->hasErrors()) { ?>
        $('#login-form').removeClass('bounceIn');
        $('#login-form').addClass('shake');
        $('#register-form').removeClass('bounceInLeft');
        $('#app-title').removeClass('fadeIn');
<?php } ?>

    // Shake panel after wrong validation
<?php if ($invite->hasErrors()) { ?>
        $('#register-form').removeClass('bounceInLeft');
        $('#register-form').addClass('shake');
        $('#login-form').removeClass('bounceIn');
        $('#app-title').removeClass('fadeIn');
<?php } ?>

<?php if ($invite->showCaptureInRegisterForm()) { ?>
    $('#register-email').on('focus', function () {
        $('#registration-form-captcha').fadeIn(500);
    });
<?php } ?>

</script>


