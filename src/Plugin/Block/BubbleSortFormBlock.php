<?php
/**
 * Handles the creation of the Block containing the 'BubbleSortForm'
 *
 * User: Alex
 * Date: 7/14/16
 * Time: 12:42 PM
 */

namespace Drupal\bubble_sort_d8_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Bubble Sort Form Block Holds the 3 Buttons
 * @Block(
 *   id = "bubble_sort_form_block",
 *   admin_label = @Translation("Bubble Sort Form Block"),
 * )
 */
class BubbleSortFormBlock extends BlockBase {

	/**
	 * @return array -> Returns array containing the form
	 */
	public function build(){
		return \Drupal::formBuilder()->getForm('Drupal\bubble_sort_d8_module\Form\BubbleSortForm');
	}
}