<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Producto> $productos
 */
?>
<div class="productos index content">
    <?= $this->Html->link(__('Nuevo Producto'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Catálogo de Productos - Zoigrafa') ?></h3>

    <div class="search-form" style="background: #f4f4f4; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
        <?= $this->Form->create(null, ['type' => 'get']) ?>
        <div style="display: flex; gap: 10px; align-items: flex-end;">
            <div style="flex: 1;">
                <?= $this->Form->control('buscar', [
                    'label' => 'Buscar por nombre o categoría:',
                    'placeholder' => 'Ej: Botines, Cascos...',
                    'value' => $this->request->getQuery('buscar')
                ]) ?>
            </div>
            <div>
                <?= $this->Form->button(__('🔍 Buscar'), ['style' => 'margin-bottom: 0;']) ?>
                <?= $this->Html->link(__('Limpiar'), ['action' => 'index'], ['class' => 'button secondary', 'style' => 'margin-bottom: 0;']) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', 'ID') ?></th>
                    <th><?= $this->Paginator->sort('nombre', 'Nombre del Producto') ?></th>
                    <th><?= $this->Paginator->sort('categoria', 'Categoría') ?></th>
                    <th><?= $this->Paginator->sort('precio', 'Precio (Bs.)') ?></th>
                    <th><?= $this->Paginator->sort('stock', 'Stock') ?></th>
                    <th><?= $this->Paginator->sort('estado', 'Estado') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?= $this->Number->format($producto->id) ?></td>
                    <td>**<?= h($producto->nombre) ?>**</td>
                    <td><?= h($producto->categoria) ?></td>
                    <td><?= $this->Number->format($producto->precio) ?> Bs.</td>
                    <td><?= $producto->stock === null ? '0' : $this->Number->format($producto->stock) ?> unidades</td>
                    <td>
                        <span style="color: <?= $producto->estado ? 'green' : 'red' ?>;">
                            <?= $producto->estado ? 'Activo' : 'Inactivo' ?>
                        </span>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $producto->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $producto->id]) ?>
                        <?= $this->Form->postLink(
                            __('Eliminar'),
                            ['action' => 'delete', $producto->id],
                            ['confirm' => __('¿Estás seguro de eliminar el producto {0}?', $producto->nombre)]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primero')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}')) ?></p>
    </div>
</div>