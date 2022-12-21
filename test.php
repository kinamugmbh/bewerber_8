<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css" integrity="sha512-1k7mWiTNoyx2XtmI96o+hdjP8nn0f3Z2N4oF/9ZZRgijyV4omsKOXEnqL1gKQNPy2MTSP9rIEWGcH/CInulptA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<?php
$url = 'https://sg-bewerbung.demo.sugarcrm.eu/rest/v11_17';
$username = 'bewerber_8';
$password = 'Init0000';

//Login und Token holen
$auth_url = $url . '/oauth2/token';
$oauth2_token_arguments = array(
    "grant_type" => "password",
    "client_id" => "sugar",
    "client_secret" => "",
    "username" => $username,
    "password" => $password,
    "platform" => "base"
);

$auth_request = curl_init($auth_url);
curl_setopt($auth_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
curl_setopt($auth_request, CURLOPT_HEADER, false);
curl_setopt($auth_request, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($auth_request, CURLOPT_RETURNTRANSFER, true);
curl_setopt($auth_request, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($auth_request, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));

$json_encoded_data = json_encode($oauth2_token_arguments);
curl_setopt($auth_request, CURLOPT_POSTFIELDS, $json_encoded_data);

$json_response = curl_exec($auth_request);
$status = curl_getinfo($auth_request, CURLINFO_HTTP_CODE);

if ( $status != 200 ) {
    die("Error: call to URL $auth_url failed with status $status, response $json_response, curl_error " . curl_error($auth_request) . ", curl_errno " . curl_errno($auth_request));
}else{
    $response = json_decode($json_response,true);
    $oauth2_token = $response['access_token'];
}

function getContacts($firm, $oauth2_token, $url){
    $modules_url = $url . '/Contacts?filter[0][account_name][$equals]='. $firm .'&fields=name,account_name,email';
    $modules_request = curl_init($modules_url);
    curl_setopt($modules_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
    curl_setopt($modules_request, CURLOPT_HEADER, false);
    curl_setopt($modules_request, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($modules_request, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($modules_request, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "OAuth-Token: $oauth2_token"
    ));

    $modules_response = curl_exec($modules_request);
    $status = curl_getinfo($modules_request, CURLINFO_HTTP_CODE);

    if ( $status != 200 ) {
        die("Error: call to URL $modules_url failed with status $status, response $modules_response, curl_error " . curl_error($modules_request) . ", curl_errno " . curl_errno($modules_request));
    }else{
        $response = json_decode($modules_response,true);
        return $modules_response;
    }
}
curl_close($auth_request);
?>

<table id="mytable" class="display" style="width:75%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Firma</th>
                <th>Email</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Firma</th>
                <th>Email</th>
            </tr>
        </tfoot>
</table>

<script>
    document.body.style.backgroundColor = "lightgrey";
    $(document).ready(function() {
    var contactData = <?php echo getContacts('Sobrudt%20Security%20Systems', $oauth2_token, $url); ?>;
    console.log(contactData);
    $('#mytable').DataTable( {
        data: contactData['records'],
        //center all columns
        "columnDefs": [
            { "className": "dt-center", "targets": "_all" }
        ],
        columns: [
            { data: 'name', data: 'id',
                render: function ( data, type, row ) {
                    return '<a href="https://sg-bewerbung.demo.sugarcrm.eu/#Contacts/' + data + '">' + row.name + '</a>';
                }
            },
            { data: 'account_name' },
            { data: 'email' ,
                render: function ( data, type, row ) {
                    return '<a href="mailto:' + data[0]['email_address'] + '">' + data[0]['email_address'] + '</a>';
                }
            },
        ]
    } );
} );
</script>
