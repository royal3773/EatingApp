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
          var location ="<li>位置情報が取得できませんでした。</li>";
          document.getElementById("location").innerHTML = location;
      });
  } else {
      window.alert("本ブラウザではGeolocationが使えません");
  }
