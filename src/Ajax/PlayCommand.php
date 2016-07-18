<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 7/18/16
 * Time: 12:27 PM
 */
namespace Drupal\bubble_sort_d8_module\Ajax;

use Drupal\Core\Ajax\CommandInterface;

class PlayCommand implements CommandInterface {
    protected $selector;
    protected $markup;

    public function __construct($selector, $markup) {
        $this->selector = $selector;
        $this->markup = $markup;
    }

    public function render() {
        $f = 0;
        $f+= 1;
        return array(
            'command' => 'invokeBubble',
            'selector' => $this->selector,
            'markup' => $this->markup,
        );
    }


}