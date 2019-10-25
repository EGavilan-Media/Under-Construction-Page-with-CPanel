<?php
  include('include/header.php');
?>
  <!-- Section: Subscribers list -->
  <section class="section section-bottom grey lighten-4">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <table id='subscriberTable' >
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>E-Mail</th>
                    <th>Date Created</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
              </table>
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

  $(document).ready(function(){
      
    var dataTable = $('#subscriberTable').DataTable({
      'processing': true,
      'serverSide': true,
      'ajax': {
          url:'subscriber_action.php',
          type: 'POST',
          data: {action:'subscriber_fetch'}
      },
      'columns': [
          { data: 'id' },
          { data: 'email' },
          { data: 'sent' },
          { data: 'action' },                    
      ]
    });
    $("select").val('10');
    $('select').addClass("browser-default");

    $(document).on('click', '.delete_subscriber', function(){

      var id = $(this).attr('id');
      var result = confirm("Are you sure want to delete subscriber?");

      if (result == true) {
        $.ajax({
          type:"POST",
          data: {id:id, action:'delete'},
          url:"subscriber_action.php",
          dataType:"json",
          success:function(data){            
            if(data.status) {           
              Materialize.toast('Subscriber email deleted successfully!', 3000, 'green');
              dataTable.ajax.reload();
            }else{
              Materialize.toast('Oops! Something went wrong.', 3000, 'red');
            }        
          },error:function(){
            Materialize.toast('Oops! Something went wrong.', 3000, 'red');
          }
        });      
        return false;
      }
    });
  });
  
</script>