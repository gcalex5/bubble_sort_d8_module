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

use Drupal\Core\Controller\ControllerBase;

class BubbleSortController extends ControllerBase {

  public function content() {
    return array(
      '#theme' => 'bubble_sort_d8_module',
    );
  }
}