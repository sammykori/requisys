$(document).ready(function(){
    $('#stafftable').on("click", ".stfbtn", function(e){
        e.preventDefault();
        let staff_data = $(this).data("request");
        $('#searchFile').val(staff_data.file_name);
        $('#purpose').val(staff_data.purpose);
        $('#record_id').val(staff_data.id);



        $('.savechangesbtn').click(function(e){
            console.log($('.updateform').serialize());
            sendDataToServer($('.updateform').serialize(), '/updaterecords/');
        });


        function sendDataToServer(formdata, endpoint){
            $.ajaxSetup({
                headers:{ 'X-CSRF-TOKEN' : $('meta[name="_token"]').attr('content') }
            });

            $.ajax({
               method: 'POST',
               url: endpoint,
               data: formdata,
               success: function (data){
                   console.log(data.data);
               },
               error: function (error){
                   console.log(error);
               }

            });
        }


    })
});