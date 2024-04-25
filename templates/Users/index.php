<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Photo[]|\Cake\Collection\CollectionInterface $photos
 * @var int $jumlahFoto
 * @var int $jumlahKoleksiPribadi
 * @var int $jumlahLikes
 */
?>
<link rel="stylesheet" href="c:\Users\serverk11\Pictures\deretan_gunung_tertinggi_di_indonesia_salah_satunya_gunung_semeru_-_dok._shutterstock_1700805928.jpg/6.0.0-beta3/css/all.min.css">

<!-- Style CSS -->
<style>
    /* Tombol Like default */
    .like-button {
        color: red; /* Warna tulisan */
        border-color: red; /* Warna border */
        transition: color 0.3s, background-color 0.3s; /* Transisi perubahan warna */
    }

    /* Ketika tombol di-hover */
    .like-button:hover {
        background-color: red; /* Warna background saat di-hover */
        color: white; /* Warna tulisan saat di-hover */
        transition: color 0.3s, background-color 0.3s; /* Transisi perubahan warna */
    }

    /* Ikon hati default */
    .heart-icon {
        color: red; /* Warna ikon hati */
        transition: color 0.3s; /* Transisi perubahan warna */
    }

    /* Ketika tombol di-hover, ikon hati juga berubah warna */
    .like-button:hover .heart-icon {
        color: white; /* Warna ikon saat di-hover */
        transition: color 0.3s; /* Transisi perubahan warna */
    }    
    .like-button.on .heart-icon {
        color: white; /* Warna ikon saat di-hover */
        transition: color 0.3s; /* Transisi perubahan warna */
    }

    /* Style untuk tombol ter-disable */
    .like-button.on {
        background-color: red; /* Warna background saat ter-disable */
        color: white; /* Warna tulisan saat ter-disable */
        border-color: red; /* Warna border saat ter-disable */
    }
</style>

<?php
$this->assign('title', __('Users'));
$this->Breadcrumbs->add([
    ['title' => __('Home'), 'url' => '/'],
    ['title' => __('Halaman Utama')],
]);
?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <!-- Tambahkan sidebar dengan informasi user dan koleksi -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <!-- Informasi user -->
                        <div class="text-center">
                            <!-- Tambahkan gambar profil user -->
                            <img class="profile-user-img img-fluid img-circle" src="https://yt3.googleusercontent.com/qtMmAJXAuHBU33NKdjmcD3DQmiSDvqeUXaP4nl-0B2iTc0K3M5aZtb7b8iXw53PojyOLwaJ2FJE=s900-c-k-c0x00ffffff-no-rj" alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center"><?= $this->Identity->get('username') ?></h3>
                        <p class="text-muted text-center"><?= $this->Identity->get('email') ?></p>
                        <!-- Informasi statistik -->
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Jumlah Foto</b> <span class="float-right"><?= $jumlahFoto ?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Jumlah Koleksi Pribadi</b> <span class="float-right"><?= $jumlahKoleksiPribadi ?></span>
                            </li>
                            <li class="list-group-item">
                                <b>Total Suka</b> <span class="float-right"><?= $jumlahLikes ?></span>
                            </li>
                        </ul>
                        <!-- Tombol follow -->
                        <?= $this->Html->link(__('View Profile'), ['action' => 'view', $this->Identity->get('id')], ['class' => 'btn btn-primary btn-block', 'escape' => false]) ?>
                    </div>
                </div>
            </div>
            <!-- Konten utama -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-primary p-3">
                        <h3 class="card-title fw-bold">Galeri</h3>
                    </div>
                    <div class="card-body">
                        <!-- Isi tab -->
                        <div class="tab-content">
                            <!-- Tab Aktivitas -->
                            <div class="active tab-pane" id="activity">
                                <!-- Looping untuk menampilkan koleksi foto -->
                                <?php foreach ($photos as $photo): ?>
                                    <div class="post">
                                        <!-- Informasi pengguna yang memposting -->
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="https://akcdn.detik.net.id/visual/2022/01/18/upin-ipin-1_169.jpeg?w=650" alt="user image">
                                            <span class="username">
                                                <a href="#"><?= $photo->user->username ?></a>
                                            </span>
                                            <span class="description"><?= $photo->created->timeAgoInWords() ?></span>
                                        </div>
                                        
                                        <!-- Gambar foto -->
                                        <img class="img-fluid" src="<?= $this->Url->build('postingan' . $photo->foto) ?>
                                        <!-- Deskripsi foto -->
                                        <br><br>
                                        <p><?= $photo->deskripsi ?></p>
                                        <p>
                                            <!-- Tombol aksi Like -->
                                            <?php
                                            $likeClass = 'btn btn-outline-danger like-button link-black text-sm';
                                            if ($photo->is_liked) {
                                                $likeClass .= ' on'; // Menambahkan class disabled jika sudah dilike
                                            }
                                            ?>
                                            <?= $this->Form->postLink(
                                                '<i class="far fa-heart heart-icon mr-1"></i> ' . ($photo->is_liked ? 'Unlike' : 'Like'), // Label tombol disesuaikan dengan status like
                                                ['controller' => 'Likephotos', 'action' => ($photo->is_liked ? 'delete' : 'add')], // URL aksi Like atau Unlike
                                                ['class' => $likeClass, 'escape' => false, 'data' => ['photo_id' => $photo->id]] // Opsi tambahan, seperti class, data tambahan
                                            ) ?>
                                        </p>

                                        <div class="card direct-chat direct-chat-primary">
    <div class="card-header ui-sortable-handle" style="cursor: move;">
        <h3 class="card-title">Lihat Komentar</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>

    <div class="card-body" style="display: block;">
    <div class="direct-chat-messages">
        <!-- Chat bubbles -->
        <?php foreach ($photo->comments as $comment): ?>
            <div class="direct-chat-msg">
                <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name float-left"><?= $comment->user->username ?></span>
                    <span class="direct-chat-timestamp float-right"><?= $comment->created->format('d M Y H:i') ?></span>
                    <!-- Ubah format timestamp sesuai kebutuhan -->
                </div>
                <div class="direct-chat-text">
                    <?= $comment->isi ?>
                </div>

                
            </div>
        <?php endforeach; ?>



    <!-- Chat input form -->
    <div class="card-footer" style="display: block; ">
        <form action="#" method="post">
            <div class="input-group">
                <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                <span class="input-group-append">
                <?= $this->Html->link(__('Tambah'),['controller' => 'Photocomments', 'action' => 'add'], ['class' => 'btn btn-primary']) ?>
                </span>
            </div>
        </form>
    </div>

    </div>
        </div>
</div>

                                     </div>
                                    <hr>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- JavaScript untuk menghilangkan tombol Like saat sudah dilike -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const likeButtons = document.querySelectorAll('.like-button');
        likeButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                const isLiked = this.classList.contains('on');
                if (isLiked) {
                    this.style.display = 'none'; // Menghilangkan tombol Like saat sudah dilike
                }
            });
        });
    });
</script>
