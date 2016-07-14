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

class BubbleSortForm extends FormBase{

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

	public function initialize(){
		//TODO: Call out to the BubbleSort Initialize function
	}

	public function step(){
		//TODO: Call out to the BubbleSort Step function
	}

	public function play(){
		//TODO: Figure out how we want to handle the play logic
	}
}