<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 7/18/16
 * Time: 3:02 PM
 */

namespace Drupal\bubble_sort_d8_module\Ajax;
class process_ajax{
    function testResponse(){
        return new jsonResponse('<p>TEST</p>');
    }
}
