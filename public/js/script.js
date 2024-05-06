function formLogout(target) {
    const form = document.getElementById('logoutForm');
    target.preventDefault;
    form.submit();
}

function formDelete(target) {
    const hapusModalForm = document.getElementById('hapusModalForm');
    hapusModalForm.action = target.dataset.url;
}

function getKelurahan(target) {
    $.ajax({
        url: `${target.dataset.url}/${target.value}`,
        type: "GET",
        dataType: "json",
        success: function(data) {
            console.log(data)
            var html = '<option value="" disabled selected>-- Pilih Kelurahan --</option>';
            data.forEach(function(item) {
                html += '<option value="'+item.id+'">'+item.nama+'</option>';
            });
            $('#kelurahan_id').html(html);
        }
    })
}

function changeLabelInputFile(target) {
    const label = target.nextElementSibling;
    label.innerHTML = target.files[0].name;
}

function addFotoColumn() {
    const fotoColumn = document.querySelectorAll('#fotoColumn');
    const x = fotoColumn.length;
    console.log(x)
    const html = `<div class="input-group mb-3" id="fotoColumn">
                    <div class="input-group-prepend">
                        <div class="input-group-text bg-lightblue">
                            <i class="fas fa-upload"></i>
                        </div>
                    </div>
                    <div class="custom-file">
                        <input type="file" id="inputFile_${x + 1}" name="foto[]" class="custom-file-input" onchange="changeLabelInputFile(this)" accept="image/png, image/jpg, image/jpeg">
                        <label class="custom-file-label text-truncate" for="inputFile_${x + 1}">
                            Pilih File...
                        </label>
                    </div>
                </div>`
                
    fotoColumn[x - 1].insertAdjacentHTML('afterend', html);
    console.log(fotoColumn[x - 1])
}

function showImageInModal(target) {
    const imageModalContent = document.getElementById('imageModalContent');
    imageModalContent.src = target.dataset.image;
}

function editModalKelForm(target) {
    const editKelurahanModalForm = document.getElementById('editKelurahanModalForm'); 
    const editNamaKelurahan = document.getElementById('editNamaKelurahan'); 
    const editNamaKecamatanId = document.getElementById('editNamaKecamatanId'); 

    editKelurahanModalForm.action = target.dataset.url;

    $.ajax({
        url: target.dataset.urlajax,
        type: "GET",
        dataType: "json",
        success: function(data) {
            console.log(data)
            editNamaKelurahan.value = data.nama;
            editNamaKecamatanId.value = data.kecamatan_id;
        }
    })
}

function editModalKecForm(target) {
    const editKecamatanModalForm = document.getElementById('editKecamatanModalForm'); 
    const editNamaKecamatan = document.getElementById('editNamaKecamatan');

    editKecamatanModalForm.action = target.dataset.url;
    editNamaKecamatan.value = target.dataset.nama;
}

function detailHasilPanen(target) {

    const luasLahan = document.querySelector("#luasLahan");
    const kelompokTani = document.querySelector("#kelompokTani");
    const alamatUbinan = document.querySelector("#alamatUbinan");
    const gkp = document.querySelector("#gkp");
    const gkg = document.querySelector("#gkg");
    const hasilProduksi = document.querySelector("#hasilProduksi");
    const detailHasilProduksi = document.querySelector("#detailHasilProduksi");
    const urlLokasi = document.querySelector("#urlLokasi");
    const kecamatan = document.querySelector("#kecamatan");
    const kelurahan = document.querySelector("#kelurahan");
    
    const detailFotoModalBody = document.querySelector("#detailFotoModalBody");

    $.ajax({
        url: target.dataset.urlajax,
        type: "GET",
        dataType: "json",
        success: function(data) {
            luasLahan.innerHTML = data.luas_lahan;
            kelompokTani.innerHTML = data.kelompok_tani;
            alamatUbinan.innerHTML = data.alamat_ubinan;
            gkp.innerHTML = data.gkp;
            gkg.innerHTML = data.gkg;
            hasilProduksi.innerHTML = data.hasil_produksi;
            detailHasilProduksi.innerHTML = data.detail_hasil_produksi;
            urlLokasi.href = data.url_lokasi;
            kecamatan.innerHTML = data.kecamatan.nama;
            kelurahan.innerHTML = data.kelurahan.nama;

            let html = ``;
            data.foto_hasil.forEach(function(item) {
                html += `<div class="col-12"><img src="${item.nama}" alt="" class="img-fluid mb-3" width="50%"></div>`;
            });

            detailFotoModalBody.innerHTML = html;
        }
    })
}