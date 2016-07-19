<?php
/**
 * Custom Ajax Command that provides the Bubble Sort module with 'Play'
 * functionality
 *
 * User: Alex
 * Date: 7/18/16
 * Time: 12:27 PM
 */
namespace Drupal\bubble_sort_d8_module\Ajax;

use Drupal\Core\Ajax\CommandInterface;

class PlayCommand implements CommandInterface {
  protected $markup;

  /**
   * PlayCommand constructor.
   * @param $markup -> table markup
   */
  public function __construct($markup) {
    $this->markup = $markup;
  }

  /**
   * @return array -> Return a render array calling out custom Ajax Command
   * with its identifier and markup we want to draw
   */
  public function render() {
    return array(
      'command' => 'invokeBubble',
      'markup' => $this->markup,
    );
  }


}