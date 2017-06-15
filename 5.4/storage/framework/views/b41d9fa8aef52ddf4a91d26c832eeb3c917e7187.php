<!-- JavaScript  
    ================================================== -->
<script type="text/javascript">

  $(".actionDelete").click(function(e) {
    e.preventDefault();

    var element = $(this);
    var id      = element.attr('data-url');
    var form    = $(element).parents('form');
    var text    = $('#delete').data("field-id");

    element.blur();

    swal(
      { title: "Confirm",  
      text: "Delete " + text + "?",
      type: "warning", 
      showLoaderOnConfirm: true,
      showCancelButton: true,   
      confirmButtonColor: "#DD6B55",  
      confirmButtonText: "Confirm",   
      cancelButtonText: "Cancel",  
      closeOnConfirm: false, 
    }, 
    function(isConfirm){  
      if (isConfirm) {   
        form.submit(); 
      }
    });
  });

</script>