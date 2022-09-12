<?php 
// No direct access
defined('_JEXEC') or die; ?>
<div class="col-md-6">
    <div class="row">
        <div class="col-md-12">
            <h5 class="fw-bold"> ATALHOS </h5>
        </div>
    </div>
    <div class="row justify-content-center align-items-stretch">
        <?php foreach ($list as $i => &$item) : ?>
        <div class="col-xl-3 col-lg-4 col-md-6 align-self-stretch pb-2">
            <a href="<?php echo $item->flink ?>" class="d-block h-100 p-0 text-decoration-none">
                <div class="h-100 mt-2 shadow py-4 d-flex align-items-center flex-column justify-content-between bg-cassiopeia-primary"
                    style="border-radius: 14px;">
                    <img class="img-fluid" style="width: 50px;" src="<?php echo JURI::base().$item->getParams()->get('menu_image', ''); ?>"/>
                    <div class="mt-6 text-white p-0 fw-bold">
                        <?php echo $item->title; ?>
                    </div>
                </div>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
</div>
