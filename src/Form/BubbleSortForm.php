<?php
/**
 * Handle the buttons and their responses
 *
 * Created by PhpStorm.
 * User: Alex
 * Date: 7/14/16
 * Time: 12:24 PM
 */

namespace Drupal\bubble_sort_d8_module\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\ReplaceCommand;
use Drupal\bubble_sort_d8_module\Logic\BubbleSort;

class BubbleSortForm extends FormBase{
protected $toggle = FALSE; //Toggle for enable/disable buttons //TODO: Switch to false
	/**
	 * {@inheritdoc}
	 */
	public function getFormId(){
		return 'bubble_sort_form';
	}

	/**
	 * {@inheritdoc}
	 */
	public function buildForm(array $form, FormStateInterface $form_state){
		$form['buttons']['shuffle'] = array(
			'#type' => 'submit',
			'#value' => 'Shuffle',
			'#ajax' => array(
				'callback' => '::initialize',
				'progress' => array(
					'type' => 'throbber',
					'message' => "Initializing Array",
				),
			),
		);
		$form['buttons']['step'] = array(
			'#type' => 'submit',
			'#value' => 'Step',
			'#disabled' => $this->toggle,
			'#ajax' => array(
				'callback' => '::step',
				'progress' => array(
					'type' => 'throbber',
					'message' => "Running 1 Step",
				),
			),
		);
		$form['buttons']['play'] = array(
			'#type' => 'submit',
			'#value' => 'Play',
			'#disabled' => $this->toggle,
			'#ajax' => array(
				'callback' => '::play',
				'progress' => array(
					'type' => 'throbber',
					'message' => "Running Sort To Completion",
				),
			),
		);
		return $form;
	}

	/**
	 * {@inheritdoc}
	 */
	public function validateForm(array  &$form, FormStateInterface $form_state){
		//Nothing to validate so just return TRUE
		return TRUE;
	}

	/**
	 * {@inheritdoc}
	 */
	public function submitForm(array &$form, FormStateInterface $form_state){
		//Placeholder at the moment
	}

	/**
	 * Called via the 'Shuffle' Button
	 * Initializes the array of 10 Random integers and
	 * Draws the table for the first time
	 * 
	 * @return \Drupal\Core\Ajax\AjaxResponse -> Replace the 'bubblesort-cotainer' div
	 */
	public function initialize($form){

		//TODO: Enable Step/Play Buttons. On hold for now.
		/**
		$this->toggle = false;
		//$form_state->getCompleteForm()['buttons']['step']['disabled'] = $this->toggle;
		//$form_state->getCompleteForm()['buttons']['step']['disabled'] = $this->toggle;
		$form_state = new FormState();
		$form_state ->setRebuild();
		$form = $this->buildForm($form, $form_state);
		 **/

		//We need an instance of the BubbleSort object
		$bubble_sort = new BubbleSort;
		$markup = $bubble_sort->initialize();
		$_SESSION['bubblesort']['entity'] = $bubble_sort;
		$response = new AjaxResponse();
		$response->addCommand(new ReplaceCommand(
			'.bubblesort-container',
			'<div class="bubblesort-container">'. $markup .'</div>'));
		return $response;
	}


	/**
	 * Called via the 'Step' Button
	 * Runs one 'Step' of the Bubble Sort Algorithm and
	 * Then redraws the updated table
	 * 
	 * @return \Drupal\Core\Ajax\AjaxResponse -> Replace the 'bubblesort-container' div
	 */
	//TODO: Needs the win condition to be handled
	public function step(){
		$response = new AjaxResponse();
		$bubble_sort = $_SESSION['bubblesort']['entity'];
		$markup = $bubble_sort->step();
		$response->addCommand(new ReplaceCommand(
			'.bubblesort-container',
			'<div class="bubblesort-container">'. $markup . '</div>'));
		return $response;
	}

	/**
	 * Figure out last
	 */
	public function play(){
		//TODO: Figure out how we want to handle the play logic
	}
}