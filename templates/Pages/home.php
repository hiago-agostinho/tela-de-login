<?= $this->Html->css(['login.css']); ?>
<?= $this->Html->script(['login.js']); ?>
<?= $this->Form->create(null, ['url' => ['method' => 'POST', 'controller' => 'Pages', 'action' => 'display']]) ?>
    <!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Cadastro</title>
        </head>
        <body>
            <div>
                <?php if (!empty($errors)): ?>
                    <?php foreach ($errors as $field => $error): ?>
                        <?php foreach ($error as $message): ?>
                            <p class="error-message"><?= __($message) ?></p>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="login">
                <div>
                    <?= $this->Form->control('nome', ['label' => 'Nome', 'type' => 'text', 'placeholder' => 'Insira seu Nome Completo', 'class' => 'texto']) ?>
                    <?= $this->Form->control('email', ['label' => 'Email', 'type' => 'text', 'placeholder' => 'Insira seu email', 'class' => 'texto']) ?>
                    <?= $this->Form->control('senha', ['label' => 'Senha', 'type' => 'text', 'placeholder' => 'Insira sua senha', 'class' => 'texto']) ?>
                </div>
                <div class="row">
                    <button class="btn-login">Criar Conta</button>
                </div>
                <div class="row login-link">
                    Já tem conta? <?= $this->Html->link('Login', ['controller' => 'Login', 'action' => 'index', 'class' => 'login-link']); ?>
                </div>
            </div>
        </body>
    </html>
<?= $this->Form->end() ?>