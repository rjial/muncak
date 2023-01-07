<?= $this->extend('layout/layout') ?>

<?= $this->section('head') ?>
<script src="<?= base_url('js/home.js') ?>" defer></script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= $this->include('layout/navbar') ?>
<div id="app">



</div>


<?= $this->endSection() ?>