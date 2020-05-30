<?php
/*******************************************************************************
 * The following code will
 * Store Agency data from import file.
 * There is only one table inserted and that is agency_info:
 * 1. Code field must be cantain data      
 * 2. Code field must be unique
 * *****************************************************************************
 */
if (isset($_GET['process_type']) && $_GET['process_type'] == 'execute_api_form') {
    $param['ProxyType']       =   $_POST['ProxyType'];
    $param['ProxyValue']      =   $_POST['ProxyValue'];
    $param['Amount']          =   $_POST['Amount'];
    $param['ReferenceText']   =   $_POST['ReferenceText'];
    $param['QRCodeSize']      =   $_POST['QRCodeSize'];
    $param['ExpiryDate']      =   $_POST['ExpiryDate'];
    
    $apResponse               =   get_api_response($param);
    
    $feedback   =   [
        'status'    => 'success',
        'message'   => 'Got response',
        'data'      => $apResponse,
    ];
    
    echo json_encode($feedback);
}

function get_api_response($param){
    $curl = curl_init();
// Set some options - we are passing in a useragent too here
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://api.ocbc.com:8243/transactional/paynowqr/1.0',
        CURLOPT_USERAGENT => 'PayNow QR',
        CURLOPT_POST => 1,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
        ],
        CURLOPT_POSTFIELDS => [
            'ProxyType'     => $param['ProxyType'],
            'ProxyValue'    => $param['ProxyValue'],
            'Amount'        => $param['Amount'],
            'ReferenceText' => $param['ReferenceText'],
            'QRCodeSize'    => $param['QRCodeSize'],
            'ExpiryDate'    => $param['ExpiryDate']
        ]
    ]);    
    
// Send the request & save response to $resp
    $resp = curl_exec($curl);
// Close request to clear up some resources
    curl_close($curl);
    return $resp;
}
?>