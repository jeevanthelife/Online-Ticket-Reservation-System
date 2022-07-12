<h1>Create an account</h1>

<?php $form = \App\Core\Form\Form::begin('', "post") ?>

<?php echo $form->field($model, 'name'); ?>
<br>
<div class="form-group">
    <label>Gender</label>
    <br>
    <input type="radio" name="gender"
    <?php
    if (isset($model->gender) && $model->gender == "Female") {
        echo "checked";
    }
    ?>
    value="Female">Female  

    <input type="radio" name="gender"
    <?php
    if (isset($model->gender) && $model->gender == "Male") {
        echo "checked";
    }
    ?>
    value="Male">Male  

    <input type="radio" name="gender"
    <?php
    if (isset($model->gender) && $model->gender == "Other") {
        echo "checked";
    }
    ?>
    value="Other">Other
    </div>
    <br>

    <div class="row">
        <div class="col">
            <?php echo $form->field($model, 'email'); ?>
        </div>

        <div class="col">
            <?php echo $form->field($model, 'phone'); ?>
        </div>
    </div>
    <br>
    <?php echo $form->field($model, 'username'); ?>
    <br>

    <div class="row">
        <div class="col">
            <?php echo $form->field($model, 'password')->passwordField(); ?>
        </div>
        <div class="col">
        <?php echo $form->field($model, 'confirmpassword')->passwordField(); ?>
        </div>
    </div>
    <br>

<button name="submit" type="submit" value="Register">Register</button>

<?php echo \App\Core\Form\Form::end() ?>

Already a Member? <button><a href="/login">Log In</a></button>