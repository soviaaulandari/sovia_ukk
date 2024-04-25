<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Likephoto> $likephotos
 */
?>
<div class="likephotos index content">
    <?= $this->Html->link(__('New Likephoto'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Likephotos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('photo_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($likephotos as $likephoto): ?>
                <tr>
                    <td><?= $this->Number->format($likephoto->id) ?></td>
                    <td><?= h($likephoto->created) ?></td>
                    <td><?= $likephoto->hasValue('user') ? $this->Html->link($likephoto->user->nama, ['controller' => 'Users', 'action' => 'view', $likephoto->user->id]) : '' ?></td>
                    <td><?= $likephoto->hasValue('photo') ? $this->Html->link($likephoto->photo->nama, ['controller' => 'Photos', 'action' => 'view', $likephoto->photo->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $likephoto->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $likephoto->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $likephoto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $likephoto->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
