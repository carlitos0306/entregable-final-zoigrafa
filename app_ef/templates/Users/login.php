<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="users form content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Ingreso a Zoigrafa - Ingrese su correo y contraseña') ?></legend>
        <?php
            // CAMBIO CLAVE: Cambiamos 'username' por 'correo'
            echo $this->Form->control('correo', ['label' => 'Correo Electrónico', 'required' => true]);
            echo $this->Form->control('password', ['label' => 'Contraseña', 'required' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Login')); ?>
    <?= $this->Form->end() ?>
</div>