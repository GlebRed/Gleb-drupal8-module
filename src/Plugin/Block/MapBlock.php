<?php


namespace Drupal\gleb_module\Plugin\Block;


use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Gleb module' Block.
 *
 * @Block(
 *   id = "gleb_map_block",
 *   admin_label = @Translation("Gleb map block"),
 *   category = "Gleb"
 * )
 */

class MapBlock extends BlockBase
{

  public function build(){
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