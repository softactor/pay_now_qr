        </div>
        <script type="text/javascript">
            
            function execute_api_form(){
                $('#api_response_data').html("");
                $('#api_processing_info').show();
                setTimeout(function(){
                    $.ajax({
                        url: baseUrl + "function/api_process.php?process_type=execute_api_form",
                        type    :'POST',
                        dataType:'json',
                        data    : $("#pay_now_qr_form").serialize(),
                        async   : false,
                        success: function(response){
                            if(response.status == "success"){
                                $.ajax({
                                    url: baseUrl + "function/api_process.php?process_type=draw_qrcode",
                                    type    :'POST',
                                    dataType:'html',
                                    data    : 'data='+JSON.stringify(response.data),
                                    async   : false,
                                    success: function(response){
                                        $('#api_processing_info').hide();
                                        $('#api_response_data').html(response);
                                    }
                                });
                            }else{
                                alert("Api Error!");
                            }
                        }
                    });
                }, 1000);    
            }
            
        </script>
    </body>
</html>