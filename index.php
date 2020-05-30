<?php include 'header.php'; ?>
<div class="row">
    <div class="col-md-7">
        <h2>PayNow QR<hr></h2>
        <form id="pay_now_qr_form">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">1. Proxy Type:</label>
                        <div class="radio">
                            <label><input type="radio" name="ProxyType" value="MSISDN" checked> Mobile number</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="ProxyType" value="NRIC"> National Registration Identity Card</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="ProxyType" value="UEN"> Unique Entity Number</label>
                        </div>                            
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pwd">2. Proxy Value:</label>
                        <input type="text" class="form-control" id="ProxyValue" placeholder="Enter Proxy Value" name="ProxyValue">
                        <span class="value_example_size">+6594XXX567 or S12XXX67A or T01LLXXXXA</span>
                    </div>
                </div>
            </div>                       
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pwd">3. Amount:</label>
                        <input type="text" class="form-control" id="Amount" placeholder="Enter Amount" name="Amount">
                        <span class="value_example_size">Amount to transfer over</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pwd">4. Reference Text:</label>
                        <input type="text" class="form-control" id="ReferenceText" placeholder="Enter Reference Text" name="ReferenceText">
                        <span class="value_example_size">Remarks</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pwd">5. QRCode Size:</label>
                        <input type="text" class="form-control" id="QRCodeSize" placeholder="Enter QRCode Size" name="QRCodeSize">
                        <span class="value_example_size">Preferred Width & Height in pixels of QR code image</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pwd">6. Expiry Date:</label>
                        <input type="text" class="form-control" id="ExpiryDate" placeholder="Enter Expiry Date" name="ExpiryDate">
                        <span class="value_example_size">The expiry date of the QR generated. Format: YYYYMMDD</span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-primary btn-block" onclick="execute_api_form();">Submit</button>
            </div>
        </form>
    </div>
    <div class="col-md-5">
        <div id="api_response_data"></div>
    </div>
</div>   
<?php include 'footer.php'; ?>

