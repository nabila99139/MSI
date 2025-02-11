<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="main-wrapper">
        <div class="container-fluid">
            <div class="d-flex flex-column">
                <div class="d-flex">
                    <div class="p-0">Masukkan OTR :</div>
                    <div class="p-0"><input type="text" id="otr" onchange="kontrak()"></div>
                </div>
                <div class="d-flex">
                    <div class="p-0">Masukkan DP :</div>
                    <div class="p-0"><input type="text" id="dp" onchange="kontrak()"></div>
                </div>
                <div class="d-flex">
                    <div class="p-0">Masukkan Jangka Waktu :</div>
                    <div class="p-0"><input type="text" id="jangka_waktu" onchange="kontrak()"></div>
                    <div class="p-0">per bulan</div>
                </div>
                <div class="d-flex">
                    <div class="p-0">Pokok Utang :</div>
                    <div class="p-0"><input type="text" id="pokok_utang" class="border-0" readonly></div>
                </div>
                <div class="d-flex">
                    <div class="p-0">Bunga :</div>
                    <div class="p-0"><input type="text" id="bunga" class="border-0" readonly></div>
                    <div class="p-0">%</div>
                </div>
                <div class="d-flex">
                    <div class="p-0">Angsuran per bulannya :</div>
                    <div class="p-0"><input type="text" id="angsuran" class="border-0" readonly></div>
                    <div class="p-0">per bulan</div>
                </div>
                <div class="d-flex">
                    <div class="p-0">Soal Nomor 2 : </div>
                    <div class="p-0"><input type="text" id="total_angsuran_14Agt"></div>
                </div>
                <div class="d-flex">
                    <div class="p-0">Soal Nomor 3 : </div>
                    <div class="p-0">jawaban erupa query di controller</div>
                </div>
                
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        function kontrak() {
            var otr = $('#otr').val();
            var dp = $('#dp').val();
            var jangka_waktu = $('#jangka_waktu').val();

            $.ajax({
                url: "{{ route('contract_hitung') }}",
                data: {
                    otr: otr,
                    dp: dp,
                    jangka_waktu: jangka_waktu,
                    _token: "{{ csrf_token() }}"
                },
                type: "POST",
                success: function(response) {
                    console.log("Response:", response);
                    $('#pokok_utang').val(response.pokok_utang);
                    $('#bunga').val(response.bunga);
                    $('#angsuran').val(response.angsuran);
                    $('#total_angsuran_14Agt').val(response.total_angsuran_14Agt);
                    $('#total_angsuran_lompat_bulan').val(response.total_angsuran_lompat_bulan);
                },
                error: function(xhr, status, error) {
                    console.log("Error:", xhr);
                }
            });
        }
    </script>


</body>

</html>
