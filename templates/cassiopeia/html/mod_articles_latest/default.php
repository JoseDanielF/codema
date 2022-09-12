<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_latest
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

if (!$list)
{
	return;
}

?>
<div class="col-md-6">
  <div class="row">
    <h5 style="font-weight: bold;">
      NOTÍCIAS
    </h5>
  </div>
  <div class="row">
      <div class="col-12">
          <div class="row justify-content-between">
              <div class="col-md-9" style="padding-left: 0px; padding-right: 0px">
                  <div id="carouselNoticiasCaptions" class="carousel slide" data-bs-ride="carousel">
                      <div class="row">
                          <div class="col-md-12">
                              <img id="icon-prev-carousel" class="carousel-control-prev alinhar-verticalmente" role="button" data-bs-target="#carouselNoticiasCaptions" data-bs-slide="prev" src="images/back-green-com.svg" data-path="local-images:/back-green-com.svg" alt="" style="width: 50px; padding-top: 25%;">
                              <ol class="carousel-indicators">
                                  <?php foreach ($list as $i => $item) : ?>
                                      <?php if ($i == 0){ ?>
                                          <li data-bs-target="#carouselNoticiasCaptions" data-bs-slide-to="<?php echo $i; ?>" class="active"></li>
                                      <?php } else { ?>
                                          <li data-bs-target="#carouselNoticiasCaptions" data-bs-slide-to="<?php echo $i; ?>"></li>
                                      <?php } ?>
                                  <?php endforeach; ?>
                              </ol>
                              <div class="carousel-inner">
                                  <?php foreach ($list as $i => $noticia) : ?>
                                      <div class="carousel-item <?php if($i == 0) { ?> active <?php } ?>">
                                          <a class="link-carousel" href="<?php echo $noticia->link; ?>" target="_blank">
                                          	  <img src="<?php echo json_decode($noticia->images)->image_intro ?>" />
                                          </a>
                                          <div class="carousel-caption" style="right: 0%; left: 0%; bottom: 0%; text-align: left;">
                                              <div style="
                                              bottom: 0;
                                              background: rgb(0, 0, 0);
                                              background: rgba(0, 0, 0, 0.8);
                                              color: #f1f1f1;
                                              padding: 20px;
                                              padding-bottom: 0;
                                              padding-top: 5;">
                                                  <a class="link-carousel" href="<?php echo $noticia->link; ?>" target="_blank" style="color: white;"><h5><?php echo $noticia->title; ?></h5></a>
                                                  <p style="font-size: 12px; color: rgb(202, 202, 202);">
                                                      <?php echo mb_strimwidth(strip_tags($noticia->introtext), 0, 200, "..."); ?>
                                                  </p>
                                              </div>
                                          </div>
                                      </div>
                                  <?php endforeach; ?>
                              </div>
                            <img id="icon-next-carousel" class="carousel-control-next alinhar-verticalmente" data-bs-target="#carouselNoticiasCaptions" data-bs-slide="next" role="button" src="images/next-green-com.svg" data-path="local-images:/next-green-com.svg" alt="" style="width: 50px; padding-top: 25%;">
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-3" style="background-color: rgba(31, 26, 23, 0.15);" style="padding-left: 0px; padding-right: 0px">
                  <?php foreach ($list as $i => $noticia) : ?>
                      <?php if($i < 2) { ?>
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
      </div>
  </div>
  <div class="row">
    <div class="col-md-12" style="text-align: right">
      <a href="" style="font-weight: bold; font-style: italic; text-decoration: underline; color: black">
        Ver todas as notícias
      </a>
    </div>
  </div>
 </div>
 <?php \Joomla\CMS\HTML\HTMLHelper::_('bootstrap.carousel', '#carouselNoticiasCaptions', []); ?>

