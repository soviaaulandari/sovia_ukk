<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Likephoto $likephoto
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Likephoto'), ['action' => 'edit', $likephoto->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Likephoto'), ['action' => 'delete', $likephoto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $likephoto->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Likephotos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Likephoto'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="likephotos view content">
            <h3><?= h($likephoto->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $likephoto->hasValue('user') ? $this->Html->link($likephoto->user->nama, ['controller' => 'Users', 'action' => 'view', $likephoto->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Photo') ?></th>
                    <td><?= $likephoto->hasValue('photo') ? $this->Html->link($likephoto->photo->nama, ['controller' => 'Photos', 'action' => 'view', $likephoto->photo->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($likephoto->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($likephoto->created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
