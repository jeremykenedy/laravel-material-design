<script type="text/javascript">
	var filterData = function() {
		var input, filter, ul, li, a, i;
		input = document.getElementById('search_info');
    filter = input.value.toUpperCase();
    ul = document.getElementById("search_table");
    li = ul.getElementsByTagName('tr');
    h2 = ul.getElementsByTagName('h2');
    h1 = ul.getElementsByTagName('h1');
    for (i = 0; i < li.length; i++) {
      if (li[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
      	li[i].style.display = "";
      } else {
        li[i].style.display = "none";
      }
    }
    for (i = 0; i < h2.length; i++) {
      if (li[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
        h2[i].style.display = "";
      } else {
        h2[i].style.display = "none";
      }
    }
    for (i = 0; i < h1.length; i++) {
      if (li[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
        h1[i].style.display = "";
      } else {
        h1[i].style.display = "none";
      }
    }
	}
	$("#search_info").on("input", filterData);
</script>