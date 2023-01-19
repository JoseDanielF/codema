<?php
/**
 * @version     1.7
 * @package     mod_bootstrapnav
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @author      Brad Traversy <support@bootstrapjoomla.com> - http://www.bootstrapjoomla.com
 */
//No Direct Access
defined('_JEXEC') or die;
?>
<div class="row w-100 mt-4 mb-4 justify-content-between">
    <div class="col-md-12 col-lg text-white d-flex align-items-center justify-content-center">
        <div class="row justify-content-center">
            <div class="col text-center text-md-start">
                <?php foreach ($list as $i => &$item) : ?>
                <?php if($item->type == 'heading') : ?>
                <?php if($i != 0) : ?>
                </div><div class="col text-center text-md-start">
                <?php endif; ?>
                <h4 class="mt-3 mt-md-0"><?php echo $item->title ?></h4>
                <?php else : ?>
                <p class="mb-0">
                    <a style="text-decoration: none; color: rgb(211, 211, 211)"
                        href="<?php echo $item->flink; ?>"><?php echo $item->title ?></a>
                </p>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg text-white d-flex justify-content-center">
        <div class="row justify-content-center">
            <div class="col-md-10 d-flex justify-content-center border-md-right text-end mr-0">
                <div>
                    <div class="col-md-12">
                        <a target="_blank" href="https://www.instagram.com/prefgaranhuns/?igshid=NDk5N2NlZjQ%3D">
                            <img id="logo-instagram" src="<?php echo JURI::base(); ?>images/codema/logo-codema-footer.png"
                                alt="Logo instagram" style="width: 352px;">
                        </a>
                    </div>
                    <div class="col-md-12" style="color: rgb(211, 211, 211)">
                        <div> Endereço: Centro Administrativo II Avenida Irga, s/n – Novo Heliópolis Garanhuns – PE | 55297-256 </div>
                        <div> CNPJ: 12.345.678/0001- 23 </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 d-flex align-items-around justify-content-center">
                <div class="row w-100 justify-content-around align-items-center">
                    <div class="col-4 col-md-12 mt-2 mt-md-0 mb-2 mb-md-0 d-flex justify-content-center">
                        <a target="_blank" href="https://www.facebook.com/PrefeituradeGaranhuns/">
                            <img id="logo-facebook" src="<?php echo JURI::base(); ?>images/codema/facebook.svg"
                                alt="Logo facebook" style="min-width: 34px;">
                        </a>
                    </div>
                    <div class="col-4 col-md-12 mt-2 mt-md-0 mb-2 mb-md-0 d-flex justify-content-center">
                        <a target="_blank" href="https://www.instagram.com/prefgaranhuns/?igshid=NDk5N2NlZjQ%3D">
                            <img id="logo-instagram" src="<?php echo JURI::base(); ?>images/codema/instagram.svg"
                                alt="Logo instagram" style="min-width: 34px;">
                        </a>
                    </div>
                    <div class="col-4 col-md-12 mt-2 mt-md-0 mb-2 mb-md-0 d-flex justify-content-center">
                        <a target="_blank" href="mailto:comunicacao.ufape@ufrpe.br">
                            <img id="logo-email" src="<?php echo JURI::base(); ?>images/codema/contato.svg" alt="Logo email" style="min-width: 34px;">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>