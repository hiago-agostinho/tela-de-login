<?= $this->Form->create(null, ['url' => ['controller' => 'Login', 'action' => 'index']]) ?>
    <?= $this->Html->css(['login.css']); ?>
    <?= $this->Html->script(['login.js']); ?>
    <!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Login</title>
            <?php if (@$error) : ?>
                <p class="error-message"><?= $error ?></p>
            <?php endif; ?>
        </head>
        <body>
            <div class="login">
                <div>
                    <?= $this->Form->control('email', ['label' => 'Email', 'type' => 'text', 'placeholder' => 'Insira seu email', 'class' => 'texto']) ?>
                    <?= $this->Form->control('senha', ['label' => 'Senha', 'type' => 'password', 'placeholder' => 'Insira sua senha', 'class' => 'texto']) ?>
                </div>
                <div class="row">
                    <button class="btn-login">Login</button>
                </div>
            </div>
        </body>
    </html>
<?= $this->Form->end() ?>
