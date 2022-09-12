<?php 
// No direct access
defined('_JEXEC') or die; ?>
<style>
    <?php include 'sidebar.css'; ?>
</style>

<div class="col-md-12 mt-0">
    <ul class="list-unstyled ps-0 mb-0">
        <li class="mb-1">
            <button class="btn btn-toggle align-items-center rounded collapsed p-0" data-bs-toggle="collapse" data-bs-target="#<?php echo $menu->menutype ?>-collapse" aria-expanded="true">
                <?php echo $menu->title ?>
            </button>
            <div class="collapse sidemenu show" id="<?php echo $menu->menutype ?>-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <?php foreach ($list as $i => &$item) : ?>
                        <li><a href="<?php echo $item->flink ?>" class="link-dark rounded"><?php echo $item->title; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </li>
    </ul>
</div>
