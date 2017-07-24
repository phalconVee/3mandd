// To conform clear all data in cart.
function clear_cart() {
    var result = confirm('Are you sure want to clear all items in cart?');

    var url;

    if (result) {
        url = "<?php echo site_url('ajax_controller/clear_cart/all')?>";
    } else {
        return false; // cancel button
    }

    $.ajax({
        type: 'POST',
        url: url,
        success:function(response){
            $("#cart_container").html(response);
            $("#myModal_cart").modal('show');
        }
    });
}

function remove_cart(itemid)
{
    $.ajax({
        type: 'POST',
        url: '<?php echo site_url("ajax_controller/remove_cart/'+itemid+'")?>',
        data: { id:itemid },
        success:function(response){
            $("#cart_container").html(response);
            $("#myModal_cart").modal('show');
        }
    });

}

function update_cart(itemid)
{
    var qty= document.getElementById(itemid+"_qty").value;
    $.ajax({
        type: 'POST',
        url: '<?php echo site_url("ajax_controller/update_cart/'+itemid+'/'+qty+'")?>',
        data: { id:itemid },
        success:function(response){
            $("#cart_container").html(response);
            $("#myModal_cart").modal('show');
        }
    });
}

var pid="";
$(document).ready(function() {

    $(".view_cart").click(function(event) {

        $.ajax({
            type: 'POST',
            url: '<?php echo site_url("ajax_controller/view_cart")?>',
            data: { id:'1' },
            success:function(response){
                $("#cart_container").html(response);
                $("#myModal_cart").modal('show');
            }
        });/* Ajax */

    });


    $(".add-to-cart").click(function(event) {

        var id = $(this).data('id');
        $("#item_qty_"+id).css("border-color","");
        $("#item_r_qty_"+id).css("border-color","");
        var qty = $("#item_qty_"+id).val();
        var return_qty = $("#item_r_qty_"+id).val();
        if(qty=="")
        {
            $("#item_qty_"+id).css("border-color","red");
            return;
        }
        if(return_qty=="")
        {
            $("#item_r_qty_"+id).css("border-color","red");
            return;
        }

        $.ajax({
            type: 'POST',
            url: '<?php echo site_url("ajax_controller/add_cart_item/'+id+'/'+qty+'/'+return_qty+'")?>',
            data: { id:id },
            success:function(response){
                $("#total_items").html(response);
                $(".view_cart").click();
            }
        });/* Ajax */

    });/* Add to cart clicked */

});/*document */


    $(document).ready(function() {
        $("#statesdrp").change(function(){
            $.ajax({
                type: "POST",
                url:  '<?php echo site_url("ajax_controller/populateLGA")?>',
                data: {id: $(this).val()},
                success: function(data){
                    $("#localsDrop").html(data);
                }

            });

        });
    });

var save_method; //for save method string

$(document).ready(function() {

    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        startDate: '-0m',
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,
    });

    //set input/textarea/select event when change value, remove class error and remove text help block
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

});

function add_new_address()
{
    save_method = 'add';
    $('#forms')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#myNew_address').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add New Address'); // Set Title to Bootstrap modal title

}

function save()
{
    save_method = 'add';
    /* $('#forms')[0].reset(); // reset form on modals
     $('.form-group').removeClass('has-error'); // clear error class
     $('.help-block').empty(); // clear error string*/

    $('#btnSave').text('SAVING...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('login/ajax_add_address_book')?>";
    }
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#forms').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
                window.location.href = '<?php echo base_url()?>products/singlepagecheckout/';
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('SAVE & CONTINUE'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('SAVE & CONTINUE'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable

        }
    });
}

function edit_address_book(id)
{
    save_method = 'update';
    $('#forms')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('login/edit_address/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="address_id"]').val(data.address_id);
            $('[name="firstname"]').val(data.firstname);
            $('[name="lastname"]').val(data.lastname);
            $('[name="address"]').val(data.address);
            $('[name="telephone"]').val(data.telephone);
            $('[name="state"]').val(data.state);
            $('[name="lga"]').val(data.lga);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Address Book'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error getting data from ajax');
        }
    });
}

function editsave()
{
    save_method = 'update';
    /*$('#forms')[0].reset(); // reset form on modals
     $('.form-group').removeClass('has-error'); // clear error class
     $('.help-block').empty(); // clear error string*/

    $('#btnSave').text('SAVING...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;

    if(save_method == 'update') {
        url = "<?php echo site_url('login/ajax_update_address_book')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#forms').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
                //window.location.href = '<?php echo base_url()?>products/singlepagecheckout/' + encodeURIComponent(data.address_id)
                window.location.href = '<?php echo base_url()?>products/singlepagecheckout/';
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('SAVE & CONTINUE'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('SAVE & CONTINUE'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable

        }
    });
}

function delete_address_book(id)
{
    if(confirm('Are you sure to delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('login/ajax_delete_address_book')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}

function use_address(id_address, type)
{
    // id = address id
    // type = 2 =  if is set, is an approval to move to order summary
    $('#btnUse').text('LOADING...'); //change button text
    $('#btnUse').attr('disabled',true); //set button disable
    $.ajax({
        type: "POST",
        url: domain+"singlepagecheckout",
        data: "id_address="+id_address+"&type="+type,
        cache: false,
        success: function(data)
        {
            window.location.href = '<?php echo base_url('singlepagecheckout');?>?id_address='+ id_address+'&type='+type
        }
        //success: function (data) { $('body').prepend(data); }
    });

}

function proceed_2_pay(id_address, type)
{
    if(document.getElementById('bc').checked) {
        var host = document.getElementById("bc").value;
    }else{
        var host = document.getElementById("bc").value='';
    }

    if(document.getElementById('date').value == "" || document.getElementById('date').value == null) {
        alert("You didn't specify your preferred date of delivery date.");
        return false;
    }else{
        var date = document.getElementById("date").value;
    }

    var item_name       = document.getElementById("item_name").value;
    var total_cart_qty  = document.getElementById("total_cart_qty").value;
    var empty_qty       = document.getElementById("empty_qty").value;
    var empty_ret_qty   = document.getElementById("empty_ret_qty").value;
    var empty_value     = document.getElementById("empty_value").value;
    var full_value      = document.getElementById("full_value").value;
    var total_value     = document.getElementById("total_value").value;
    var empty_ret_value = document.getElementById("empty_ret_value").value;
    var balance_to_pay  = document.getElementById("balance_to_pay").value;
    var unit_type       = document.getElementById("unit_type").value;
    var pro_qty         = document.getElementById("pro_qty").value;

    $('#btnUse').text('LOADING...'); //change button text
    $('#btnUse').attr('disabled',true); //set button disable
    $.ajax({
        type: "POST",
        url: domain+"singlepagecheckout/pay",
        data: "id_address="+id_address+"&type="+type+"&crate="+"&host="+host+"&date="+date+"&balance_to_pay="+balance_to_pay+"&total_cart_qty="+total_cart_qty+"&item_name="+item_name+"&empty_qty="+empty_qty+"&empty_ret_qty="+empty_ret_qty+"&empty_value="+empty_ret_value+"&full_value="+full_value+"&total_value="+total_value+"&empty_ret_value="+empty_ret_value+"&unit_type="+unit_type+"&pro_qty="+pro_qty,
        dataType: "JSON",
        cache: false,
        success: function(data)
        {
            window.location.href = '<?php echo base_url();?>singlepagecheckout?id_address=' + encodeURIComponent(data.address_id) + '&type=' +
                encodeURIComponent(data.type) + '&item_name=' + encodeURIComponent(data.item_name) + '&balance_to_pay=' +
                encodeURIComponent(data.balance_to_pay) + '&total_cart_qty=' + encodeURIComponent(data.total_cart_qty) + '&empty_qty=' +
                encodeURIComponent(data.empty_qty) + '&host_charge=' + encodeURIComponent(data.host_charge) + '&invoice_no='+
                encodeURIComponent(data.invoice_no) + '&empty_ret_qty=' + encodeURIComponent(data.empty_ret_qty) + '&full_value='+
                encodeURIComponent(data.full_value) + '&host_service=' + encodeURIComponent(data.host_service) + '&total_value='+
                encodeURIComponent(data.total_value) + '&delivery_date=' + encodeURIComponent(data.delivery_date) + '&empty_ret_value='+
                encodeURIComponent(data.empty_ret_value) + '&unit_type=' + encodeURIComponent(data.unit_type) + '&pro_qty='+
                encodeURIComponent(data.pro_qty)
        }
    });
}
/**
 * Created by Chinyere on 1/17/2017.
 */
