<?php
$request = $_GET;
?>
<input type="hidden" name="excelid" value="<?= $request['excelid'];?>"/>
<!-- <input type="hidden" name="token" value="ya29.a0Aa4xrXOFYDH72zTLur4CxZwUHbkyp_KRaf3axUPBClHQKuhlgqFq8TTSMW8MtLWkqs6nNo5m_ohGpfyB-eywVI4NTim_uC62YdUKeXV3P3T_2-Z8vF0Nc2bkxDu4-179KZbESW1nb9OlZr1Ks0SKoHTQP0vPwPUuXRYaCgYKATASARESFQEjDvL9Cvbfpi8NZGb__NvKUY0Gaw0170"/> -->

<input type="hidden" name="token" value="<?= $request['token'];?>"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    var headers = { };

    headers["Content-Type"] ="application/json; charset=UTF-8;"; 
    headers['Authorization'] = 'Bearer '+$("input[name=token]").val();

    $.ajax({
        url: 'https://www.googleapis.com/drive/v2/files/'+$("input[name=excelid]").val(),
        dataType: 'json',
        type: 'PATCH',
        contentType: 'application/json',
        data: JSON.stringify( { "copyRequiresWriterPermission": true} ),
        processData: false,
        headers: headers,
        success: function( data, textStatus, jQxhr ){
          alert(JSON.stringify( data ));
        },
        error: function( jqXhr, textStatus, errorThrown ){
            alert( errorThrown );
        }
    });
</script>
