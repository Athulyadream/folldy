


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="assets/js/bootstrap.bundle.min.js" ></script>

<script type="text/javascript" src="assets/js/custom.js"></script>

<script src="assets/dragscript/jquery.sortable.js"></script>
<script>
	$(function() {
		$('.sortable').sortable();

		$('.connected').sortable({
			connectWith: '.connected'
		});
	});
	
  $('.itemconnect').sortable().bind('dragend', function(e) {
		var elem = e.currentTarget;
		var htm = '<tr><td class="connected itemconnect"></td><td class="connected"> </td><td class="connected"> </td></tr>'
		$(elem).parent().after(htm);
		console.log(e);
	});
	
	$('.itemconnect').sortable().bind('dragstart', function(e) {
		var elem = e.currentTarget;
		$('tr:last').remove();
		
	});



</script>
</body>
</html>
