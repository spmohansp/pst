$(document).ready(function () {


    $("body").on("keypress",".phone_no",function(e){

     // $(".phone_no").keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            $("#errmsg").html("Digits Only").show().fadeOut("slow");
            return false;
       }
    });
    $(".calculate_value").on("change paste keyup", function() {
        var starting_km = $("input[name='starting_km']").val();
        var ending_km = $("input[name='ending_km']").val();
        var total_km = parseFloat(ending_km)-parseFloat(starting_km);
        $("#total_km").val(total_km);

// time calculate
        var starting_time = $("input[name='starting_time']").val();
        var ending_time = $("input[name='ending_time']").val();
        start_actual_time = new Date(starting_time);
        end_actual_time = new Date(ending_time);
        var diff = end_actual_time - start_actual_time;
        var diffSeconds = diff/1000;
        var HH = Math.floor(diffSeconds/3600);
        var MM = Math.floor(diffSeconds%3600)/60;
        var total_time = HH+':'+MM;
        $("#total_time").val(total_time);

// ac type
        var type = $("#type option:selected").val();
        if (type=='ac') {
            var ac_amount = total_km;
        }else{
            var ac_amount = 0;
        }

        var extra_amount = $("input[name='extra_amount']").val();

// calcullate price
        var vehicles_id = $("#vehicles option:selected").val();
        $.ajax({
            type:"POST",
            data:{vehicles_id:vehicles_id,total_time:total_time,total_km:total_km},
            url:'../controller/calculate_value.php',
            success:function(data){
                // console.log(data);
                var data = JSON.parse(data);
                var bill_price = data;
                var total_price = parseFloat(bill_price)+parseFloat(ac_amount)+parseFloat(extra_amount);
                total_price.toPrecision(1);
                $("#bill_amount").val(total_price.toFixed(2));
            }
        })

    });




// entry choose vehicle select driver
    $("#vehicles").on("change", function(e) {
        e.preventDefault();
        var vehicle_id = $("#vehicles option:selected").val();
        $.ajax({
            type:"POST",
            data:{table:'vehicles',vehicle_id:vehicle_id},
            url:'../controller/get_data_controller.php',
            success:function(data){
                 var data = JSON.parse(data);
                if (data['status']=='success') {
                    var driver_id=data['id'];
                    if (driver_id) {
                        $("#driver").val(driver_id).change();
                        $( ".calculate_value" ).trigger( "change" );
                    }else{
                         $("#driver").val(driver_id).change();
                        $( ".calculate_value" ).trigger( "change" );
                    }
                }else{
                     $("#driver").val(driver_id).change();
                     $( ".calculate_value" ).trigger( "change" );
                }
            }
        })
    });






     $(".submit").on("click", function() {
           $("#ending_km").attr("required", "true");
           $("#destination_location").attr("required", "true");
            var total_km = $("input[name='total_km']").val();
             var driver = $("#driver option:selected").val();
             console.log(driver);
            var total_time = $("input[name='total_time']").val();
            var split_time=total_time.split(":");
            if (total_km<1) {
                $(".submit").attr("disabled", "disabled");
                alert("Check End KM");    
                $("#ending_km").focus(); 
            }else if (split_time[0]<0) {
                $(".submit").attr("disabled", "disabled"); 
                alert("Check End Time");   
                $("#ending_time").focus(); 
            }else if (driver=='') {
                $(".submit").attr("disabled", "disabled"); 
                alert("Checck Driver");   
            }else{
                $(".submit").removeAttr("disabled");    
            }
    });

    $(".save").on("click", function() {
           $("#ending_km").removeAttr("required");
           $("#destination_location").removeAttr("required");
            $(".submit").removeAttr("disabled");
    });
    
});
