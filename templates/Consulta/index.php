<?= $this->Html->css(['login.css']); ?>
<?= $this->Html->css(['index.css']); ?>
<?= $this->Form->create($pessoas, ['url' => ['controller' => 'Consulta', 'action' => 'index']]) ?>
    <!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Bem Vindo</title>
            <?php if ($sucess == 1) : ?>
                <p class="sucess-message"><?=('Usuário Cadastrado com sucesso.') ?></p>
            <?php endif; ?>
        </head>
        <body>
            <div class="login">
                <h2 class="titulo">Visualização de Cadastro</h2>
                <div>
                    <?= $this->Form->control('nome', ['label' => 'Nome', 'type' => 'text', 'class' => 'texto', 'required' => true, 'value' => $pessoas->nome, 'disabled' => true]) ?>
                </div>
            </div>
        </body>
    </html>
<?= $this->Form->end() ?>
