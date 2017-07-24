<!-- footer content -->
<footer>
    <div class="pull-right">
        3m&amp;d by <a href="https://bigbroslab.com">BigBros Lab</a>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->


<script>
    function get_unread_msgs() {
        $("#new_msg_box").html('<div class="privacy_loader"></div>');
        $.ajax({
            type: "POST",
            url: domain+"load_ajax/check_new_msg",
            cache: false,
            success: function(html) {
                $('#new_msg').html(html);
            }
        });
    }
</script>

