// function initMap() {
//   const myLatLng = { lat: 33.5312, lng: -112.2202,lat: 47.667, lng: -117.438103, lat: 41.583599, lng: -93.629204};
//   const map = new google.maps.Map(document.getElementById("map"), {
//     zoom: 4,
//     center: myLatLng,
//   });

//   new google.maps.Marker({
//     position: myLatLng,
//     map,
//     title: "Hello World!",
//   });
// }

function initMap() {
  let name = window.location.search.replace('?name=','')
  let arr=[];
  name = name.replaceAll('%20',' ')

  var requestOptions = {
    method: 'GET',
    redirect: 'follow'
  };
  //https://app.ticketmaster.com/discovery/v2/events.json?apikey=C1zETHjzG9nLxALw3JlbfE4kfWx7TVXW&keyword=${this.$route.params.eventName}
  fetch("https://app.ticketmaster.com/discovery/v2/events.json?keyword="+name+"&apikey=LJmhFDOl5qTRvpDhR52BWgLY5nB7G6oH", requestOptions)
    .then(response => response.text())
    .then(result => {
      result = JSON.parse(result);
      
      for(let i=0; i<result._embedded.events.length; i++)
      {

        arr.push({
          lat : parseFloat(result._embedded.events[i]._embedded.venues[0].location.latitude),
          lng: parseFloat(result._embedded.events[i]._embedded.venues[0].location.longitude),
          address: result._embedded.events[i]._embedded.venues[0].address.line1, 
        })
       

      }
      console.log(arr)
      var map = new google.maps.Map(document.getElementById("map"), {
        zoom: 4,
        center: { lat: 37.09024, lng: -95.712891 },
      });
      
      // Add multiple markers to the map
      // var locations = arr;
    //   arr = [{
    //     "lat": 47.667,
    //     "lng": -117.438103,
    //     "address": "720 W Mallon Ave"
    // },{
    //   "lat" : 37.09024, 
    //   "lng" : -95.712891,
    //   "address": "720 W Mallon Ave"
    // }]
      
      for (var i = 0; i < arr.length; i++) {
        var marker = new google.maps.Marker({
          position: { lat: arr[i].lat, lng: arr[i].lng },
          map: map,
          title: arr[i].address,
        });
      }
    
    })
    .catch(error => console.log('error', error));


  }
    




  window.initMap = initMap;

