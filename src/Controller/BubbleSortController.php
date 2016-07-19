<?php
/**
 * Controller for the BubbleSort D8 Module extends ControllerBase and provides
 * the controller function for the only page in the module
 *
 * Created by PhpStorm.
 * User: Alex
 * Date: 7/14/16
 * Time: 12:22 PM
 */

namespace Drupal\bubble_sort_d8_module\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\bubble_sort_d8_module\Form\BubbleSortForm;

class BubbleSortController extends ControllerBase {

  /**
   * Controller for the BubbleSort Module, handles passing the render array
   * to the frontend as well as intercepting the GET request and passing it to
   * the correct function to return an AjaxResponse
   *
   * @return array|\Drupal\Core\Ajax\AjaxResponse -> render array|ajax response (table markup)
   */
  public function content() {
    //Logic to call and create our Form holding the Shuffle/Step/Play buttons
    $bubble_sort_form_block = \Drupal::service('plugin.manager.block')
      ->createInstance('bubble_sort_form_block', []);
    $block_content = $bubble_sort_form_block->build();
    if($_GET['op'] == "PLAY"){
      //TODO: abstract this out to its own function/file calling a Form like this probably isn't the best thing to do
      return BubbleSortForm::step();
    }
    return array(
      '#theme' => 'bubble_sort_d8_module',
      '#form_content' => $block_content,
    );
  }
}