<!-- <?php
/** @var $model \app\models\User */
?>

<h1>Admin Login</h1>

<div class="container">
  
<?php $form = \App\Core\Form\Form::begin('', "post") ?>
<div class="form-group">
<?php echo $form->field($model, 'username'); ?>
</div>
<br>

<div class="form-group">
<?php echo $form->field($model, 'password')->passwordField(); ?>
</div>
<br>

<button type="submit" class="btn btn-primary">Log In</button>
</div>
<?php echo \App\Core\Form\Form::end() ?>

<br>

Not a Member? <button><a href="/register">Register</a></button>
 -->
