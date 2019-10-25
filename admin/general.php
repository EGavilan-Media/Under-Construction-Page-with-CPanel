<?php

  include('include/header.php');

?>
  <!-- Section: Event -->
  <section class="section grey lighten-4">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <span class="card-title"><h5>Event Date and Time</h5></span>
              <div class="row">
                <div class="col s12">              
                  <div class="row">
                    <div class="col s12 m6">
                    <span>Event Date</span>
                      <h3 id="viewDate"></h3></span>
                    </div>
                    <div class="col s12 m6">
                    <span>Event Time</span>
                      <h3 id="viewTime"></h3></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section: Manage Event -->
  <section class="section grey lighten-4">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <span class="card-title"><h5>Manage Event Timer</h5></span>
              <div class="row">
                <div class="col s12">
                  <form id="form-eventDate">
                    <div class="row">                    
                      <div class="input-field col s3">
                        <input type="text" id="date" name='date' value=" " placeholder="(YYYY/MM/DD)" >
                        <label>Date</label>
                        <div id="date_error_message" class="red-text"></div>
                      </div>
                      <div class="input-field col s3">
                        <input type="text" id="hour" name="hour" value=" " onkeypress="isInputNumber(event)">
                        <label>Hour</label>
                        <div id="hour_error_message" class="red-text"></div>
                      </div>
                      <div class="input-field col s3">
                        <input type="text" id="minute" name="minute" value=" " onkeypress="isInputNumber(event)">
                        <label>Minute</label>
                        <div id="minute_error_message" class="red-text"></div>
                      </div>
                      <div class="input-field col s3">
                        <input type="text"  id="second" name="second" value=" " onkeypress="isInputNumber(event)">
                        <label>Second</label>
                        <div id="second_error_message" class="red-text"></div>
                      </div>
                      <div class="col s12 m12 l12">
                        <input type="hidden" id="id_event" name="id_event"/>
                        <input type="hidden" name="action" id="action" value="event_edit"/>
                        <button type='button' id='btnEvent' class='btn blue'>Update</button>
                      </div>                    
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Section: Description -->
  <section class="section grey lighten-4">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <div class="row">
              <span class="card-title"><h5>Description</h5></span>
              </div>
              <div class="row">
                <div class="col s12">
                  <form id="form-description">
                    <div class="row">
                      <div class="input-field s12 m6">
                        <input type="text" id="title" name="title" value=" " maxlength="50">
                        <label>Title</label>
                        <div id="title_error_message" class="red-text"></div>
                      </div>
                      <div class="input-field s12 m6">
                        <input type="text" id="description" name="description" data-length="100" value=" " maxlength="100">
                        <label for="input_text">Description</label>                        
                        <div id="description_error_message" class="red-text"></div>
                      </div>
                    </div>
                    <input type="hidden" id="id_description" name="id_description"/>
                    <input type="hidden" name="action" id="action" value="description_edit"/>
                    <button type='button' id='btnDescription' class='btn blue'>Update</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section: Social Media -->
  <section class="section section-bottom grey lighten-4">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <div class="row">
              <span class="card-title"><h5>Social Media</h5></span>
              </div>
              <div class="row">
                <div class="col s12">
                  <form id="form-social">
                    <div class="row">
                      <div class="input-field s12 m6">
                        <input type="text" id="facebook" name="facebook" value=" " maxlength="100">
                        <label>Facebook</label>
                        <div id="facebook_error_message" class="red-text"></div>
                      </div>
                      <div class="input-field s12 m6">
                        <input type="text" id="twitter" name="twitter" value=" " maxlength="100">
                        <label>Twitter</label>
                        <div id="twitter_error_message" class="red-text"></div>
                      </div>
                      <div class="input-field s12 m6">
                        <input type="text" id="youtube" name="youtube" value=" " maxlength="100">
                        <label>Youtube</label>
                        <div id="youtube_error_message" class="red-text"></div>
                      </div>
                    </div>
                    <input type="hidden" id="id_social" name="id_social"/>
                    <input type="hidden" name="action" id="action" value="social_edit"/>
                    <button type='button' id='btnSocial' class='btn blue'>Update</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php

  include("include/footer.php");
  
?>

<script>

  function isInputNumber(evt){

    var ch = String.fromCharCode(evt.which);
                                      
      if(!(/[0-9]/.test(ch))){
        evt.preventDefault();
      }            
  }

  $(document).ready(function () {

    getEvent();

    $('#btnEvent').click(function(){
      updateEvent();
    });

    $('#btnDescription').click(function(){
      updateDescription();
    });

    $('#btnSocial').click(function(){
      updateSocial();
    });

    var error_date = false;
    var error_hour = false;
    var error_minute = false;
    var error_second = false;
    var error_facebook = false;
    var error_twitter = false;
    var error_youtube = false;

    $("#date").focusout(function() {
      check_date();
    });

    $("#hour").focusout(function() {
      check_hour();
    });

    $("#minute").focusout(function() {
      check_minute();
    });

    $("#second").focusout(function() {
      check_second();
    });

    $("#facebook").focusout(function() {
      check_facebook();
    });

    $("#twitter").focusout(function() {
      check_twitter();
    });

    $("#youtube").focusout(function() {
      check_youtube();
    });

    function check_date() {

      var date_length = $("#date").val().length;
      var regEx = /^[0-9]{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])/;
      var date = $("#date").val();

      if( $.trim( $('#date').val() ) == '' ){
        $("#date_error_message").html("Date is a required field.");
        $("#date_error_message").show();
        error_date = true;
      }else if(!date.match(regEx)){
        $("#date_error_message").html("Enter the date in YYYY/MM/DD format.");
        $("#date_error_message").show();
        error_date = true;
      }
      else{
        $("#date_error_message").hide();
      }
    }

    function check_hour() {

      var hour_length = $("#hour").val();

      if( $.trim( $('#hour').val() ) == '' ){
        $("#hour_error_message").html("Hour is a required field.");
        $("#hour_error_message").show();
        error_hour = true;
      }else if( hour_length > 24) {
        $("#hour_error_message").html("Enter the hour in military (24-hour) format.");
        $("#hour_error_message").show();
        error_hour = true;
      }
      else{
        $("#hour_error_message").hide();
      }
    }

    function check_minute() {

      var minute_length = $("#minute").val();

      if( $.trim( $('#minute').val() ) == '' ){
        $("#minute_error_message").html("Minute is a required field.");
        $("#minute_error_message").show();
        error_minute = true;
      }else if( minute_length > 59) {
        $("#minute_error_message").html("Enter the minutes (0-59)");
        $("#minute_error_message").show();
        error_minute = true;
      }
      else{
        $("#minute_error_message").hide();
      }
    }

    function check_second() {

      var second_length = $("#second").val();

      if( $.trim( $('#second').val() ) == '' ){
        $("#second_error_message").html("Second is a required field.");
        $("#second_error_message").show();
        error_second = true;
      }else if( second_length > 59) {
        $("#second_error_message").html("Enter the seconds (0-59)");
        $("#second_error_message").show();
        error_second = true;
      }
      else{
        $("#second_error_message").hide();
      }
    }

    function check_date() {

      var date_length = $("#date").val().length;

      var regEx = /^[0-9]{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])/;
      var date = $("#date").val();

      if( $.trim( $('#date').val() ) == '' ){
        $("#date_error_message").html("Date is a required field.");
        $("#date_error_message").show();
        error_date = true;
      }else if(!date.match(regEx)){
        $("#date_error_message").html("Enter the date in YYYY/MM/DD format.");
        $("#date_error_message").show();
        error_date = true;
      }
      else{
        $("#date_error_message").hide();
      }
    }

    function check_facebook() {

      var pattern = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
      var facebook = $("#facebook").val();

      if( $.trim( $('#facebook').val() ) == '' ){
        $("#facebook_error_message").hide();
      }else if(!facebook.match(pattern)) {
        $("#facebook_error_message").html("Enter a valid URL.");
        $("#facebook_error_message").show();
        error_facebook = true;
      }
      else{
        $("#facebook_error_message").hide();
      }
    }

    function check_twitter() {

      var pattern = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
      var twitter = $("#twitter").val();

      if( $.trim( $('#twitter').val() ) == '' ){
        $("#twitter_error_message").hide();
      }else if(!twitter.match(pattern)) {
        $("#twitter_error_message").html("Enter a valid URL.");
        $("#twitter_error_message").show();
        error_twitter = true;
      }
      else{
        $("#twitter_error_message").hide();
      }
    }

    function check_youtube() {

      var pattern = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
      var youtube = $("#twitter").val();

      if( $.trim( $('#youtube').val() ) == '' ){
        $("#youtube_error_message").hide();
      }else if(!youtube.match(pattern)) {
        $("#youtube_error_message").html("Enter a valid URL.");
        $("#youtube_error_message").show();
        error_twitter = true;
      }
      else{
        $("#youtube_error_message").hide();
      }
    }

    function updateEvent(){

      error_date = false;
      error_hour = false;
      error_minute = false;
      error_second = false;

      check_date();
      check_hour();
      check_minute();
      check_second();

      if(error_date == false && error_hour == false && error_minute == false && error_second == false) {

        data=$('#form-eventDate').serialize();

        $.ajax({
          type:"POST",
          data: data,
          url:"general_action.php",
          dataType:"json",
          success:function(data){
            if(data.status) {
              getEvent();
              Materialize.toast('Event date and time updated successfully!', 3000, 'green');
            }else{
              Materialize.toast('Oops! Something went wrong.', 3000, 'red');
            }            
          },error:function(){
            Materialize.toast('Oops! Something went wrong.', 3000, 'red');
          }
        });
        return false;
      }else{
        Materialize.toast('Please check in on username field.', 3000, 'red');
        return false;
      }
    }

    function updateDescription(){
      
      data=$('#form-description').serialize();

      $.ajax({
        type:"POST",
        data: data,
        url:"general_action.php",
        dataType:"json",
        success:function(data){            
          if(data.status) {
            getEvent();
            Materialize.toast('Title and description were updated successfully!', 3000, 'green');
          }else{
            Materialize.toast('Oops! Something went wrong.', 3000, 'red');
          }        
        },error:function(){
          Materialize.toast('Oops! Something went wrong.', 3000, 'red');
        }
      });
      
      return false;

    }     

    function getEvent() {

      var id_general ="1";
      
      $.ajax({
          type: "POST",
          data: { action: 'general_fetch', id:id_general },
          url: "general_action.php",
          success: function (data) {
            var data = JSON.parse(data);

            $('#id_event').val(data['id']);
            $('#id_description').val(data['id']);
            $('#id_social').val(data['id']);

            $('#title').val(data['title']);
            $('#description').val(data['description']);

            $('#date').val(data['date']);
            $('#hour').val(data['hour']);
            $('#minute').val(data['minute']);
            $('#second').val(data['second']);

            $('#facebook').val(data['facebook']);
            $('#twitter').val(data['twitter']);
            $('#youtube').val(data['youtube']);
              
            // Display title
            $('#viewDate').text(data['date']);

            // Display description
            $('#viewTime').text(data['hour']+ ':' +data['minute']+ ':' +data['second']);

          }
      });
    }

    function updateSocial(){
      
      error_facebook = false;
      error_twitter = false;
      error_youtube = false;

      check_facebook();
      check_twitter();
      check_youtube();

      if(error_facebook == false && error_twitter == false && error_youtube == false) {

        data=$('#form-social').serialize();

        $.ajax({
          type:"POST",
          data: data,
          url:"general_action.php",
          dataType:"json",
          success:function(data){
            if(data.status) {
              getEvent();
              Materialize.toast('Event date and time updated successfully!', 3000, 'green');
            }else{
              Materialize.toast('Oops! Something went wrong.', 3000, 'red');
            }            
          },error:function(){
            Materialize.toast('Oops! Something went wrong.', 3000, 'red');
          }
        });
        return false;
      }else{
        Materialize.toast('Please check in on username field.', 3000, 'red');
        return false;
      }
    } 

  });

</script>