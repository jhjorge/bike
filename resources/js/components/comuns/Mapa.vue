<template>
  <div class="">
    <p id="demo">Clique no botão para obter sua localização:</p>
    <button @click="getLocation()">Clique aqui</button>
    <div id="mapholder"></div>
  </div>
</template>
<script>
export default {
  name: "Mapa",

  methods: {
    getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          this.showPosition,
          this.showError
        );
      } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
      }
    },

    showPosition(position) {
      var latlon = position.coords.latitude + "," + position.coords.longitude;

      var img_url =
        "http://maps.googleapis.com/maps/api/staticmap?center=" +
        latlon +
        "&zoom=14&size=400x300&sensor=false";
      document.getElementById("mapholder").innerHTML =
        "<img src='" + img_url + "'>";
      console.log(img_url);
    },

    showError(error) {
      switch (error.code) {
        case error.PERMISSION_DENIED:
          x.innerHTML = "Usuário rejeitou a solicitação de Geolocalização.";
          break;
        case error.POSITION_UNAVAILABLE:
          x.innerHTML = "Localização indisponível.";
          break;
        case error.TIMEOUT:
          x.innerHTML = "O tempo da requisição expirou.";
          break;
        case error.UNKNOWN_ERROR:
          x.innerHTML = "Algum erro desconhecido aconteceu.";
          break;
      }
    },
  },
};
</script>