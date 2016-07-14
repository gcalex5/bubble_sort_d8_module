<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 7/14/16
 * Time: 12:25 PM
 */

namespace Drupal\bubble_sort_d8_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Bubble Sort Table Block handles creating the render array of the table
 * @Block(
 *   id = "bubble_sort_table",
 *   admin_label = @Translation("Bubble Sort Table Block"),
 * )
 */

class BubbleSortTableBlock extends BlockBase {

	/**
	 * @return array
	 */
	public function build() {
		//TODO: Generate and Return our Table here
		return ['<p>Empty Array</p>'];
	}
}