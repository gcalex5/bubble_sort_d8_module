/**
 * ajax-call.js handles the multiple loops needed for the 'Play' button
 * functionality. It is called from the custom AJAX command located under
 * 'src/Ajax/PlayCommand' and is then intercepted in the controller located
 * under 'src/Controller/BubbleSortController'
 *
 * Created by Alex on 7/13/2016.
 */
var done_yet = false; //Tester variable to see if we are done sorting.
var passData = null; //temp variable used to pass an AJAX result to successfulCall()
(function ($, window, Drupal, drupalSettings) {
    Drupal.AjaxCommands.prototype.invokeBubble = function(ajax, response, status){
        for(var x=0; x<100; x++){
            jQuery.ajax({
                async: true,
                url: drupalSettings.path.baseUrl + 'bubble_sort_d8?op=PLAY',
                type: "get",
                data: { operation: "PLAY" },
                success: function(data){
                    passData = data;
                }
            }).then(function(){
                    successfulCall(passData);
            });
            console.log(x);
            if(x == 99){
                //workaround for always doing 100 iterations and never hitting done_yet
                console.log("We are enabling");
                jQuery( "#edit-shuffle" ).prop( "disabled", false );
            }
            if(done_yet == true){
                console.log("We are done");
                jQuery( "#edit-shuffle" ).prop( "disabled", false );
                break;
            }
        }

    }
})(jQuery, this, Drupal, drupalSettings);

/**
 * Handles the results of a successful call
 * Either stops the looping structure or empties and appends the appropriate div.
 * @param data - Result from the successful AJAX request
 */
function successfulCall(data){
    if(data[0].toString() == "disable"){
        done_yet = true;
    }
    else{
        if(data != null){
            jQuery(".bubblesort-container").empty().append(data[0].data);
            done_yet = false;
        }
    }
}
/**
 *
 */
jQuery( document ).ready(function() {
    jQuery( "#edit-step" ).prop( "disabled", true );
    jQuery( "#edit-play" ).prop( "disabled", true );
});