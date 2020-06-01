        </div>
        <script type="text/javascript">
            
            function execute_api_form(){
                $.ajax({
                    url: baseUrl + "function/api_process.php?process_type=execute_api_form",
                    type    :'POST',
                    dataType:'json',
                    data    : $("#pay_now_qr_form").serialize(),
                    success: function(response){
                        console.log(response);
                        return false;
                        $('#api_response_data').html(response.data)
//                        if(response.status=='success'){
//                            $('#created_updated_op_op_details').html(response.createdUpdatedData)
//                            swal("Success", response.message, "success");
//                        }else{
//                            swal("Failed", response.message, "error");
//                        }
                    }
                });
            }
            
        </script>
    </body>
</html>