/**
 * ajax-calls.js handles making the AJAX calls to 'index.php'
 * Whenever the 'shuffle/step/play buttons are pushed it will relay that to the server
 * Which will then handle generating the necessary data.
 *
 * Created by Alex on 7/13/2016.
 */
var done_yet = false; //Tester variable to see if we are done sorting.
document.write("<script src=\"https://code.jquery.com/jquery-3.1.0.min.js\" integrity=\"sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=\" crossorigin=\"anonymous\">");
(function ($, window, Drupal, drupalSettings) {

    'use strict';

    /**
     * Command to slide up content before removing it from the page.
     *
     * @param {Drupal.Ajax} [ajax]
     * @param {object} response
     * @param {string} response.selector
     * @param {string} response.markup
     * @param {object} [response.settings]
     * @param {number} [status]
     */
    Drupal.AjaxCommands.prototype.invokeBubble = function(ajax, response, status){
        for(var x=0; x<100; x++){
            bubbleSortCall("step", Drupal, drupalSettings);
            if(done_yet == true){
                break;
            }
        }
    }

})(jQuery, this, Drupal, drupalSettings);

function bubbleSortCall(operation, Drupal, drupalSettings){
    jQuery.ajax({
        url: drupalSettings.path.baseUrl + 'bubble_sort_d8?op=PLAY',
        type: "get",
        data: { operation: 'step' }
    }).done(function(result) {
        if(result.toString() == "disable"){
            console.log('DONE' + result[0].data);
            //document.getElementById("step").disabled = true;
            //document.getElementById("play").disabled = true;
            done_yet = true;
        }
        else{
            if(result != null){
                console.log(result);
                jQuery(".bubblesort-container").empty().append(result[0].data);
                done_yet = false;
            }
        }
    });
}