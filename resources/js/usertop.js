if (navigator.geolocation) {
  // 現在の位置情報取得を実施
  navigator.geolocation.getCurrentPosition(
      // 位置情報取得成功時
      function (pos) { 
          const latitude = pos.coords.latitude;
          const longitude = pos.coords.longitude;
          document.getElementById( "latitude" ).value = latitude 
          document.getElementById( "longitude" ).value = longitude 
      },
      // 位置情報取得失敗時
      function (pos) { 
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

