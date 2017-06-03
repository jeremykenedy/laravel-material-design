<script type="text/javascript">
  $(document).ready(function() {
    var mark = function() {
      var keyword = $("#highlight_info").val();
      $(".context").unmark({
        done: function() {
          $(".context").mark(keyword);
        }
      });
    };
    $("#highlight_info").on("input", mark);
    $("#highlight_info").on("change", mark); // duplicated for the close x change
  });
</script>