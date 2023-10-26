<html>
<div id="data">


</div>







</html>
<script>


var requestOptions = {
  method: 'GET',
  redirect: 'follow'
};

fetch("https://spaceseats.io/api/ticket/googleresultapi", requestOptions)
  .then(response => response.text())
  .then(result => {
    result = JSON.parse(result);
    var html = "<html>"+result.data+"</html>"
    console.log(html)
    // document.getElementById("data").innerHTML = result.data;
})
  .catch(error => console.log('error', error));




</script>