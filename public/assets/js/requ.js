$(document).ready(function(){
    $('#stafftable').on("click", ".stfbtn", function(e){
        e.preventDefault();
        let staff_data = processData(this, "request");// $(this).data("request");
        $('#currentfile').text("Selected file " + staff_data.file_name);
        $('#purpose').val(staff_data.purpose);
        $('#record_id').val(staff_data.id);
    });

    $('#pendingtable').on('click', '.pendingview', function(){
        let pendingdata = processData(this, "pending");
        $('#file_name').text(pendingdata.file_name);
        $('#company_name').text(pendingdata.company);
        $('#service_type').text(pendingdata.service_type);
        $('#staff_name').text(pendingdata.name);
        $('#rank').text(pendingdata.rank);
        $('#email').text(pendingdata.email);
        $('#ext').text(pendingdata.extension);
        $('#record_identification').val(pendingdata.id);
        console.log(pendingdata);
    });


    $('.savechangesbtn').click(function(e){
        console.log($('.updateform').serialize());
        sendDataToServer($('.updateform').serialize(), '/updaterecords');
    });

    $('.approvebtn').click(function(){
        console.log($('#updatestatus').serialize());
        sendDataToServer($('#updatestatus').serialize(), '/updateapprovalstatus');
        $('.pendingmodal').modal('hide');

    });

    $('.disapprovebtn').click(function(){
        console.log($('#updatestatus').serialize());
        sendDataToServer($('#updatestatus').serialize(), '/disapprovalstatus');
        $('.pendingmodal').modal('hide');

    });


    function processData(id, data_attr){
        return $(id).data(data_attr);
    }


    function sendDataToServer(formdata, endpoint){
        $.ajaxSetup({
            headers:{ 'X-CSRF-TOKEN' : $('meta[name="_token"]').attr('content') }
        });

        $.ajax({
           method: 'POST',
           url: endpoint,
           data: formdata,
           success: function (data){
               alert(data.data);
              // console.log(data);
           },
           error: function (error){
               console.log(error);
           }

        });
    }
});