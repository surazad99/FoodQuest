<html>
<head>

<script src="js/bootstrap.min.js"></script>
<script> 
jQuery(document).ready(function() {
        $(".status").bind('click', $.proxy(function(event) {
            var status = $(event.target).attr('id');
          alert(status);
    }, this));
});

</script>


<body>
	
</body>