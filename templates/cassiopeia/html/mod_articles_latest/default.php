<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_latest
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

if (!$list) {
  return;
}

?>
<div class="col-md-6">
  <div class="row">
    <h5 style="font-weight: bold;">
      NOTÍCIAS
    </h5>
  </div>
  <div class="row justify-content-center">
    <div class="col-lg-9 col-md-12" style="padding-left: 0px; padding-right: 0px">
      <div id="carouselNoticiasCaptions" class="carousel slide" data-bs-ride="carousel">
        <img id="icon-prev-carousel" class="carousel-control-prev alinhar-verticalmente" role="button" data-bs-target="#carouselNoticiasCaptions" data-bs-slide="prev" src="images/back-green-com.svg" data-path="local-images:/back-green-com.svg" alt="" style="width: 50px; padding-top: 25%;">
        <div class="carousel-inner">
          <?php foreach ($list as $i => $noticia) : ?>
            <div class="carousel-item <?php if ($i == 0) { ?> active <?php } ?>">
              <a class="link-carousel" href="<?php echo $noticia->link; ?>">
                <img src="<?php echo json_decode($noticia->images)->image_intro ?>" />
              </a>
              <div class="carousel-caption pb-0 w-100 text-start ps-1 pe-1" style="background-color: rgba(0, 0, 0, 0.8);left: 0; right: 0; bottom: 0;">
                <a class="link-carousel text-white" style="text-decoration: none;" href="<?php echo $noticia->link; ?>">
                  <h5><?php echo $noticia->title; ?></h5>
                </a>
                <p class="d-none d-lg-block">
                  <?php echo mb_strimwidth(strip_tags($noticia->introtext), 0, 200, "..."); ?>
                </p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <img id="icon-next-carousel" class="carousel-control-next alinhar-verticalmente" data-bs-target="#carouselNoticiasCaptions" data-bs-slide="next" role="button" src="images/next-green-com.svg" data-path="local-images:/next-green-com.svg" alt="" style="width: 50px; padding-top: 25%;">
      </div>
    </div>
    <div class="col-lg-3 col-md-12 d-none d-lg-block" style="background-color: rgba(31, 26, 23, 0.15);" style="padding-left: 0px; padding-right: 0px">
      <?php foreach ($list as $i => $noticia) : ?>
        <?php if ($i < 2) { ?>
          <a href="<?php echo $noticia->link; ?>" style="text-decoration:none" onmouseover="style='text-decoration:underline'" onmouseout="style='text-decoration:none'">
            <br>
            <div class="form-row col-md-12" style="font-size: 10px; color: rgb(87, 87, 87); font-weight: bold;">
              <?php echo date('d/m/Y', strtotime($noticia->created)); ?>
            </div>
            <div class="form-row col-md-12" style="font-weight: bold; font-size: 12px; color: black">
              <?php echo $noticia->title; ?>
              <br>
              <span style="font-weight: bold; font-size: 10px;">
                <?php echo mb_strimwidth(strip_tags($noticia->introtext), 0, 100, "..."); ?>
              </span>
            </div>
          </a>
        <?php } ?>
      <?php endforeach; ?>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12" style="text-align: right">
      <a href="<?php echo \Joomla\Component\Content\Site\Helper\RouteHelper::getCategoryRoute($noticia->catid) ?>" style="font-weight: bold; font-style: italic; text-decoration: underline; color: black">
        Ver todas as notícias
      </a>
    </div>
  </div>
</div>
<?php \Joomla\CMS\HTML\HTMLHelper::_('bootstrap.carousel', '#carouselNoticiasCaptions', []); ?>