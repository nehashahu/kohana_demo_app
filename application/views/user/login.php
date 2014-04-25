<div class="container">
<div class="row">
<div>
	<h2>Login Page</h2>
<? if ($message) : ?>
	<h3 class="message">
		<?= $message; ?>
	</h3>
<? endif; ?>
</div>
<div class="form-class">
<?= Form::open('user/login'); ?>
<div class="row">
<?= Form::label('username', 'Username'); ?>
<?= Form::input('username', HTML::chars(Arr::get($_POST, 'username'))); ?>
</div>
<div class="row">
<?= Form::label('password', 'Password'); ?>
<?= Form::password('password'); ?>
</div>
<div class="row">
<?= Form::checkbox('remember'); ?>
<?= Form::label('remember', 'Remember Me'); ?>
<p>(Remember Me keeps you logged in for 2 weeks)</p>
</div>
<div class="row">
<?= Form::submit('login', 'Login'); ?>
<?= Form::close(); ?>

<span>Or <?= HTML::anchor('user/create', 'create a new account'); ?></span>
</div>
</div>
</div>
</div>