<?php
/**
 * Handles all of the Bubble Sort specific logic as well as generating
 * the necessary markup that is returned to the frontend
 *
 * Created by PhpStorm.
 * User: Alex
 * Date: 7/14/16
 * Time: 12:59 PM
 */

namespace Drupal\bubble_sort_d8_module\Logic;

class BubbleSort {
	//Declaration of protected globals
	protected $integer_array = array(); //Array holding 10 integers to be sorted
	protected $cur_pos; //Current position we are at in the array
	protected $swap_counter=0; //Counter variable to determine if we've made a full pass

	/**
	 * Initialize the data needed to run the sort and redraw the table
	 *
	 * @return string -> markup for the table
	 */
	function initialize(){
		$this->setCurPos(0);
		$local_array = $this->getIntegerArray();
		for($x=0; $x<10; $x++){
			$local_array[$x] = rand(0, 100);
		}
		$this->setIntegerArray($local_array);
		return $this->redraw_table();
	}

	/**
	 * Run one round of the bubble sort algorithm
	 *
	 * Use the $cur_pos variable to compare the two values in the array.
	 * Swap if the first value is higher. Call the function we are using to draw the table
	 * in order to update it. Or call sort_finished to exit out of the algorithm.
	 */
	function step(){
		$local_array = $this->getIntegerArray();
		$temp_counter = $this->getSwapCounter();
		if($this->getCurPos()+1 != 10){
			if($local_array[$this->getCurPos()] > $local_array[$this->getCurPos()+1]){
				$temp_counter++;
				$a = $local_array[$this->getCurPos()];
				$b = $local_array[$this->getCurPos()+1];
				$local_array[$this->getCurPos()] = $b;
				$local_array[$this->getCurPos()+1] = $a;
				$this->setIntegerArray($local_array);
				$this->setSwapCounter($temp_counter);
			}
		}
		//We are at the end of the array is 'step_counter' = 0? If not reset to 0 and try again.
		else{
			if($this->getSwapCounter() == 0){
				$this->sort_finished();
				return 'Critical Error: [step()] We have returned nothing to render';
			}
			else{
				$this->setSwapCounter(0);
			}
		}
		return $this->redraw_table();
	}

	/**
   * Generates the necessary markup to redraw the table
	 */
	function redraw_table(){
		//Why would we ever be here if the IntegerArray is empty.
		if(sizeof($this->getIntegerArray())>0){
			$tmp='<table><thead><th>Bubble Sort Table</th></thead><tbody>';
			for ($x=0; $x<10; $x++) {
				if ($x == $this->getCurPos() || $x == ($this->getCurPos() + 1)){
					$tmp .= '<tr class="highlighted-row"><td><div class="color-bar" style="width: '
						. $this->getIntegerArray()[$x] . '%;">' . $this->getIntegerArray()[$x]
            . '</div></td></tr>';
				}
				else{
					$tmp .= '<tr><td><div class="color-bar" style="width: '. $this->getIntegerArray()[$x]
            . '%;">' . $this->getIntegerArray()[$x] . '</div></td></tr>';
				}
			}
			$tmp.='</tbody></table>';
			if($this->getCurPos() == 9){
				$this->setCurPos(0);
			}
			else{
				$this->setCurPos($this->getCurPos()+ 1);
			}
			return $tmp;
		}
		else{
			return 'Critical Error: [redraw_table()]The Integer Array was never defined.';
		}
	}

	/**
	 *
	 */
	function sort_finished(){
		echo 'disable';
	}

	/**
	 * @return array
	 */
	public function getIntegerArray() {
		return $this->integer_array;
	}

	/**
	 * @return mixed
	 */
	public function getCurPos() {
		return $this->cur_pos;
	}

	/**
	 * @param array $integer_array
	 */
	public function setIntegerArray($integer_array) {
		$this->integer_array = $integer_array;
	}

	/**
	 * @param mixed $cur_pos
	 */
	public function setCurPos($cur_pos) {
		$this->cur_pos = $cur_pos;
	}

	/**
	 * @return int
	 */
	public function getSwapCounter() {
		return $this->swap_counter;
	}

	/**
	 * @param int $swap_counter
	 */
	public function setSwapCounter($swap_counter) {
		$this->swap_counter = $swap_counter;
	}


}