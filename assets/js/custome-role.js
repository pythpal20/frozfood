$(document).ready(() => {
    $(".tambah").click(function () {
        $("#newRole").modal('show');
        $(".sippan").click(() => {
            $("#newRole").modal('hide');
            var form = $("#FormRole").serializeArray();
            var role = $("#nrole").val();
            var ket = $("#nketerangan").val();
            if (role == '' || ket == '') {
                swal.fire(
                    'Galat',
                    'Wajib isi field nama Role',
                    'warning'
                )
            } else {
                swal.fire({
                    title: "Simpan Role ?",
                    icon: 'question',
                    imageHeight: 200,
                    showCancelButton: true,
                    confirmButtonText: 'Simpan',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // $("#newRole").modal('show');
                        $.ajax({
                            url: addRole,
                            method: 'POST',
                            data: form,
                            success: function (data) {
                                // console.log();
                                alertSuccess;
                            },
                            error: function () {
                                alert('Error tidak terdefenisi');
                            }
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        document.getElementById("FormRole").reset();
                    }
                })
            }
        });
    });
    $table = $("#tb_role")
    $table.bootstrapTable({
        url: tabelRole,
        toolbar: '#toolbar',
        pagination: true,
        search: false,
        columns: [{
            field: 'no',
            title: '#'
        }, {
            field: 'role',
            title: 'Nama Role',
            sortable: 'true'
        }, {
            field: 'ket',
            title: 'Keterangan'
        }, {
            field: 'id',
            title: 'Act',
            align: 'center',
            formatter: tombol
        }]
    });

    function tombol(value, row) {
        return [
            '<button class="btn btn-sm btn-primary access" id-role ="' + value + '" rel="tooltip" title="Edit access role"><i class="fa fa-link"></i></button> ' +
            '<button class="btn btn-sm btn-info edit" id-role ="' + value + '" data-nama ="' + row.role + '" data-ket="' + row.ket + '" rel="tooltip" title="Edit Role"><i class="fa fa-edit"></i></button>'
        ]
    }
    $('body').on('click', '#tb_role .access', function () { //set access dari role 
        var str = $(this).attr('id-role');
        var key = "G@ruda7577"; // Kunci enkripsi acak, dapat diganti dengan kunci lain
        var encryptedData = encryptData(str, key);
        window.location.href = "<?= base_url('administrator/setAccess/'); ?>" + encryptedData
    });

    $('body').on('click', '#tb_role .edit', function () { // edit nama role
        var id = $(this).attr('id-role');
        var nama_role = $(this).data('nama');
        var keter = $(this).data('ket');

        $("#editRole").modal('show');
        $("#xid").val(id);
        $("#xrole").val(nama_role);
        $("#xketerangan").val(keter);

        $(".gatti").click(function () {
            var forms = $("#FormRoleEdit").serializeArray();
            var rolex = $("#xrole").val();
            var ketx = $("#xketerangan").val();
            if (rolex == '' || ketx == '') {
                swal.fire(
                    'Galat',
                    'Form Belum Lengkap',
                    'warning'
                )
            } else {
                $.ajax({
                    url: "<?= base_url('administrator/editRole') ?>",
                    method: 'POST',
                    data: forms,
                    success: function (data) {
                        // console.log(data)
                        swal.fire({
                            title: 'Berhasil Update',
                            text: 'Role Telah berhasil diubah',
                            showCancelButton: false,
                            confirmButtonText: 'Ok!, Terimakasih'
                        }).then((reslt) => {
                            if (reslt.isConfirmed) {
                                document.location.href = "<?= base_url('administrator/role'); ?>";
                            }
                        });
                    }
                });
            }
        });
    });

    function encryptData(data, key) {
        // Bangkitkan kunci enkripsi dari kunci acak dengan PBKDF2
        var salt = CryptoJS.lib.WordArray.random(128 / 8); // Salt acak
        var derivedKey = CryptoJS.PBKDF2(key, salt, {
            keySize: 256 / 32,
            iterations: 1000
        }); // Bangkitkan kunci acak

        // Enkripsi data dengan kunci acak dan vektor inisialisasi acak
        var iv = CryptoJS.lib.WordArray.random(128 / 8); // Vektor inisialisasi acak
        var encrypted = CryptoJS.AES.encrypt(data, derivedKey, {
            iv: iv
        });

        // Gabungkan salt, vektor inisialisasi, dan data terenkripsi menjadi satu string
        var saltHex = CryptoJS.enc.Hex.stringify(salt);
        var ivHex = CryptoJS.enc.Hex.stringify(iv);
        var encryptedHex = CryptoJS.enc.Hex.stringify(encrypted.ciphertext);
        return saltHex + ivHex + encryptedHex;
    }
});