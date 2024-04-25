<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Likephoto $likephoto
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $photos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $likephoto->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $likephoto->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Likephotos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="likephotos form content">
            <?= $this->Form->create($likephoto) ?>
            <fieldset>
                <legend><?= __('Edit Likephoto') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('photo_id', ['options' => $photos]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
