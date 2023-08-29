
fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/provinces.json`)
.then(response => response.json())
.then(provinces => {
  var data = provinces;
  var tampung ='<option>---Pilih---</option>';
  data.forEach(elment => {
    tampung += `<option data-reg="${elment.id}" value="${elment.name}">${elment.name}</option>`;
  });
  document.getElementById('provinsi').innerHTML = tampung;
});

const selectProvinsi = document.getElementById('provinsi');

selectProvinsi.addEventListener('change', (e) => {
  var provinsi = e.target.options[e.target.selectedIndex].dataset.reg;
  
  fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/regencies/${provinsi}.json`)
  .then(response => response.json())
  .then(regencies => {
    var data = regencies;
    var tampung ='<option>---Pilih---</option>';
    data.forEach(elment => {
      tampung += `<option data-dist="${elment.id}" value="${elment.name}">${elment.name}</option>`;
    });
    document.getElementById('kota').innerHTML = tampung;
  });
});

const selectKota = document.getElementById('kota');

selectKota.addEventListener('change', (e) => {
  var kota = e.target.options[e.target.selectedIndex].dataset.dist;
  
  fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/districts/${kota}.json`)
  .then(response => response.json())
  .then(districts => {
    var data = districts;
    var tampung ='<option>---Pilih---</option>';
    data.forEach(elment => {
      tampung += `<option data-vill="${elment.id}" value="${elment.name}">${elment.name}</option>`;
    });
    document.getElementById('kecamatan').innerHTML = tampung;
  });
});

const selectKecamatan = document.getElementById('kecamatan');

selectKecamatan.addEventListener('change', (e) => {
  var kecamatan = e.target.options[e.target.selectedIndex].dataset.vill;
  
  fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/villages/${kecamatan}.json`)
  .then(response => response.json())
  .then(villages => {
    var data = villages;
    var tampung ='<option>---Pilih---</option>';
    data.forEach(elment => {
      tampung += `<option value="${elment.name}">${elment.name}</option>`;
    });
    document.getElementById('kelurahan').innerHTML = tampung;
  });
});