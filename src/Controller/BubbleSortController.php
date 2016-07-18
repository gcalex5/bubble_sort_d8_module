<?php
/**
 * Controller for the BubbleSort D8 Module
 *
 * Created by PhpStorm.
 * User: Alex
 * Date: 7/14/16
 * Time: 12:22 PM
 */

namespace Drupal\bubble_sort_d8_module\Controller;

use Drupal\bubble_sort_d8_module\Logic\BubbleSort;
use Drupal\Core\Controller\ControllerBase;
use Drupal\bubble_sort_d8_module\Ajax\process_ajax;
use Drupal\bubble_sort_d8_module\Form\BubbleSortForm;

class BubbleSortController extends ControllerBase {

  /**
   * Controller function for the front page of the Bubble Sort module
   *
   * @return array - Render array containing the appropriate markup
   */
  public function content() {
    //Logic to call and create our Form holding the Shuffle/Step/Play buttons
    $bubble_sort_form_block = \Drupal::service('plugin.manager.block')->createInstance('bubble_sort_form_block', []);
    $block_content = $bubble_sort_form_block->build();
    if($_GET['op'] == "PLAY"){
      return BubbleSortForm::step();
    }
    else{
      $foo = 0;
      $foo++;
    }

    return array(
      '#theme' => 'bubble_sort_d8_module',
      '#form_content' => $block_content,
    );
  }

  public function play_callback(){
    $foo = 1 + 1;
    $foo+=1;
    return array(
      '#theme' => 'bubble_sort_d8_module',
    );
  }
}