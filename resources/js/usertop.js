if (navigator.geolocation) {
  // 現在の位置情報取得を実施
  navigator.geolocation.getCurrentPosition(
      // 位置情報取得成功時
      function (position) { 
          const latitude = position.coords.latitude;
          const longitude = position.coords.longitude;
          document.getElementById( "latitude" ).value = latitude 
          document.getElementById( "longitude" ).value = longitude 
      },
      // 位置情報取得失敗時
      function (position) { 
          var location = '<div id="location" class="alert alert-warning alert-dismissible fade show" role="alert">'
                       + '本ブラウザでは、現在地を所得することはできません。なお、対応ブラウザーはGoogleとなります。'
                       + '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                       + '<span aria-hidden="true">&times;</span>'
                       + '</button>'
                       + '</div>';
          document.getElementById("location").innerHTML = location;
      });
  } else {
      window.alert("本ブラウザではGeolocationが使えません");
  }

