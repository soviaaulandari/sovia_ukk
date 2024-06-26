<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Photo $photo
 */
?>

<?php
$this->assign('title', __('Edit Photo'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('List Photos'), 'url' => ['action' => 'index']],
    ['title' => __('View'), 'url' => ['action' => 'view', $photo->id]],
    ['title' => __('Edit')],
]);
?>

<div class="card card-primary card-outline">
<?= $this->Form->create($photo,['type'=>'file'])?>
    <div class="card-body">
        <?= $this->Form->control('nama') ?>
        <?= $this->Form->control('deskripsi') ?>
        <?= $this->Form->control('foto',['type'=>'hidden']) ?>
        <?= $this->Form->control('gambar',['type'=>'file']) ?>
        <?= $this->Form->control('album_id', ['options' => $albums, 'class' => 'form-control']) ?>
        <?= $this->Form->hidden('user_id', ['value' => $this->Identity->get('id'), 'readonly' => true]) ?>
    </div>
    <div class="card-footer d-flex">
        <div class="mr-auto">
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $photo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $photo->id), 'class' => 'btn btn-danger']
            ) ?>
        </div>
        <div class="ml-auto">
            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'view', $photo->id], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>