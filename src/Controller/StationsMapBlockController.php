<?php


namespace Drupal\gleb_module\Controller;


use Drupal\Core\Controller\ControllerBase;

class StationsMapBlockController extends ControllerBase
{
  public function content(){
    return array(
        '#theme' => 'gleb_module_block_template',
        '#attached' => array(
            'library' => array(
                'gleb_module/mapael'
            )
        )
    );
  }

}