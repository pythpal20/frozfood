$(document).on('click', '.viewTable', async function () {
    var col = $("#vDefault");
    var btns = $("#buttonChangeView");

    var icon = btns.find("i.fa");
    icon.removeClass("fa-table").addClass("fa-list");

    // Toggle kelas pada tombol
    btns.removeClass("viewTable").addClass("viewList");

    col.removeClass('col-lg-6').addClass('col-lg-12');

    menuTable();
});

async function menuTable() {
    try {
        const response = await fetch(viewTable);
        if (!response.ok) {
            throw new Error("HTTP error! status: " + response.status);
        }
        const resultHtml = await response.text();
        document.getElementById("nest").innerHTML = resultHtml;
    } catch (error) {
        Swal.fire({
            title: 'Error',
            text: error.message,
            icon: 'error'
        });
    }
}

async function menuList() {
    try {
        const response = await fetch(viewList);
        if (!response.ok) {
            throw new Error("HTTP error! status: " + response.status);
        }
        const resultHtml = await response.text();
        document.getElementById("nest").innerHTML = resultHtml;
    } catch (error) {
        Swal.fire({
            title: 'Error',
            text: error.message,
            icon: 'error'
        });
    }
}

$(document).on('click', '.viewList', function () {
    var col = $("#vDefault");
    var btns = $("#buttonChangeView");

    var icon = btns.find("i.fa");
    icon.removeClass("fa-list").addClass("fa-table");

    // Toggle kelas pada tombol
    btns.removeClass("viewList").addClass("viewTable");

    col.removeClass('col-lg-12').addClass('col-lg-6');

    // Hapus kelas 'd-none' dari elemen 'nestable'
    $("#nestable").removeClass('d-none');

    // Panggil fungsi menuList()
    menuList();
    $('#nestable').nestable({
        group: 1
    }).on('change', updateOutput);
});

//tambah menu baru
$(document).ready(function () {
    $(".addMenu").click(function () {
        $("#newMenu").modal('show');
        $(".chosen-icon").chosen();

        $("#level").on('change', function () {
            var mlv = $(this).val();
            var title = $("#namaMenu").val();
            if (mlv == 'sub_menu_lv1') {
                $("#parid").removeClass('d-none');
                $("#dicon").addClass('d-none');
                $("#icon").val("");
            } else {
                $("#parid").addClass('d-none');
                $("#dicon").removeClass('d-none');
                $('#parentid').val("");

                if (checkForSpace(title)) {
                    $("#newMenu").modal('hide');
                    Swal.fire({
                        title: 'Nama menu salah',
                        text: 'Tidak boleh mengandung <spasi> untuk Header dan Main Menu',
                        icon: 'warning',
                        showCancelButton: false
                    }).then((namaMenu) => {
                        if (namaMenu.isConfirmed) {
                            $("#namaMenu").val("");
                            $("#newMenu").modal('show');
                        }
                    })
                }
            }
        });
    });

    function updateOutput(e) {
        var list = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            $.ajax({
                type: 'POST',
                url: changeOrder,
                data: {
                    menu_data: window.JSON.stringify(list.nestable('serialize'))
                },
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    if (response.status == 'success') {
                        console.log('Perubahan urutan menu disimpan.');
                        location.reload();
                    } else {
                        console.log('Gagal menyimpan perubahan urutan menu.');
                        Swal.fire(
                            'Gagal Re-order',
                            'Tidak ada perubahan',
                            'error'
                        );
                        location.reload();
                    }
                },
                error: function () {
                    console.log('Terjadi kesalahan saat melakukan request AJAX.');
                }
            });
        } else {
            console.log('Browser tidak mendukung JSON.');
        }
    }
    // activate Nestable for list 1
    $('#nestable').nestable({
        group: 1
    }).on('change', updateOutput);

    $('body').on('click', '.edit', function () {
        alert('ta da')
    });

    $('#nestable-menu').on('click', function (e) {
        var target = $(e.target),
            action = target.data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });


});

function checkForSpace(str) {
    return str.indexOf(' ') !== -1;
}

$(document).ready(function () {
    // Menambahkan kelas animated bounceInRight pada setiap elemen
    $('.dd-list .dd-item').each(function (index) {
        var elem = $(this);
        // Mengatur penundaan dengan jarak 1 detik per elemen
        setTimeout(function () {
            elem.addClass('animated bounceInRight');
        }, index * 1000); // Penundaan dalam milidetik
    });
});