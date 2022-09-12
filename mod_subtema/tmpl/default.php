<?php 
// No direct access
defined('_JEXEC') or die; ?>
<div class="col-md-6">
    <div class="col-md-12">
        <h5 class="fw-bold"> SUBTEMAS </h5>
    </div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-2">
        <?php foreach ($list as $i => &$item) : ?>
        <div class="col">
            <a href="<?php echo $item->flink ?>" class="text-decoration-none p-0">
                <div class="card subtema-color border-0 shadow rounded h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="row align-items-center justify-content-between w-100">
                            <div class="col-md-4 p-0 d-flex align-items-center justify-content-center">
                                <img src="<?php echo JURI::base().$item->getParams()->get('menu_image', ''); ?>">
                            </div>
                            <div class="col-md-8 p-0 d-flex align-items-center justify-content-center">
                                <p class="text-cassiopeia-primary fw-bold fs-6 m-0 text-uppercase text-center"> <?php echo $item->title; ?> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
</div>