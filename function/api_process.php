<?php
/*******************************************************************************
 * The following code will
 * Store Agency data from import file.
 * There is only one table inserted and that is agency_info:
 * 1. Code field must be cantain data      
 * 2. Code field must be unique
 * *****************************************************************************
 */
if (isset($_GET['process_type']) && $_GET['process_type'] == 'draw_qrcode') {
    $result         =   json_decode($_POST['data']);
    make_qrcode_data($result);
}
if (isset($_GET['process_type']) && $_GET['process_type'] == 'execute_api_form') {
    $status                   =   "error";
    $data                     =   "";
    $param['ProxyType']       =   $_POST['ProxyType'];
    $param['ProxyValue']      =   $_POST['ProxyValue'];
    $param['Amount']          =   $_POST['Amount'];
    $param['ReferenceText']   =   $_POST['ReferenceText'];
    $param['QRCodeSize']      =   $_POST['QRCodeSize'];
    $param['ExpiryDate']      =   $_POST['ExpiryDate'];
    
    $apResponse               =   get_api_response($param);
    
    $result                   = json_decode($apResponse);
    if(isset($result->Success) && $result->Success == 1){
        $status         =   "success";
        $data           =   $result->Results;
    }
    
    $feedback   =   [
        'status'    => $status,
        'message'   => 'Got response',
        'data'      => $data,
    ];
    
    echo json_encode($feedback);
}

function get_api_response($param){
    $curl = curl_init();
    $postData   =     [
            'ProxyType'     => $param['ProxyType'],
            'ProxyValue'    => $param['ProxyValue'],
            'Amount'        => $param['Amount'],
            'ReferenceText' => $param['ReferenceText'],
            'QRCodeSize'    => $param['QRCodeSize'],
            'ExpiryDate'    => $param['ExpiryDate']
        ];
// Set some options - we are passing in a useragent too here
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://api.ocbc.com:8243/transactional/paynowqr/1.0/payNowQR',
        CURLOPT_POST => 1,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Authorization: Bearer 18490360bf06439021a3ee431caa9a81'
        ],
        CURLOPT_POSTFIELDS => json_encode($postData)
    ]);    
    
// Send the request & save response to $resp
    $resp = curl_exec($curl);
// Close request to clear up some resources
    curl_close($curl);
    return $resp;
}

function make_qrcode_data($data){ ?>
<div class="row">
    <div class="col-md-8">
        <div class="table-responsive">          
            <table class="table">
                <tbody>
                    <tr>
                        <td>Proxy Type</td>
                        <td><?php echo $data->ProxyValue; ?></td>
                    </tr>
                    <tr>
                        <td>Amount</td>
                        <td><?php echo $data->Amount; ?></td>
                    </tr>
                    <tr>
                        <td>Reference Text</td>
                        <td><?php echo $data->ReferenceText; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-4">
        <?php echo $data->QRCodeData; ?>
    </div>
</div>
<?php } ?>