<?php 
$bg   = DB::table('header')->where('halaman','Global')->orderBy('id_header','DESC')->first();
 ?>
 <style>
.map-responsive{
    overflow:hidden;
    padding-bottom:56.25%;
    position:relative;
    height:0;
}
.map-responsive iframe{
    left:0;
    top:0;
    height:100%;
    width:100%;
    position:absolute;
}

</style>
<!--Inner Header Start-->
<div class="inner-header">
   <div class="header_wrap"> 
      <div class="container">
      
</div>
      <img src="{{ asset('uploads/image/'.$bg->gambar) }}">
   </div>
</div>
<!--Inner Header End--> 
<!--Contact Start-->
<section>
   <div class="container content">
 
   <div class="main-market-price-page">
    <div class="header-market-price">
        <div class="container">
            <div class="content-header">
                <div class="title">
                    <h2>Harga Pasar</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-market-price">
        <div class="container">
            <div class="filter-market-price">
                <form class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="sourcedata" id="srcdt" class="form-control">
                                <option value=""> Pilih Sumber Data </option>
                                                                <option value="infopangan.jakarta.go.id">infopangan.jakarta.go.id</option>
                                                                <option value="pertanian.go.id">pertanian.go.id</option>
                                                                <option value="Pusdatin">Pusdatin</option>
                                                                <option value="User">User</option>
                                                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <select name="plant" id="tanaman-market" class="form-control">
                                <option value="">Pilih Tanaman </option>
                                                                <option value="79">Bawang Merah</option>
                                                                <option value="71">Bayam</option>
                                                                <option value="9">Cabai Besar</option>
                                                                <option value="4">Cabai Keriting</option>
                                                                <option value="3">Cabai Rawit</option>
                                                                <option value="68">Chaisim</option>
                                                                <option value="1">Jagung</option>
                                                                <option value="74">Kacang Buncis</option>
                                                                <option value="73">Kacang Panjang</option>
                                                                <option value="28">Kangkung</option>
                                                                <option value="80">Kembang Kol</option>
                                                                <option value="70">Kentang</option>
                                                                <option value="78">Kubis</option>
                                                                <option value="76">Labu Air</option>
                                                                <option value="92739">Labu Madu</option>
                                                                <option value="69">Labu Madu</option>
                                                                <option value="67">Melon</option>
                                                                <option value="59">Oyong</option>
                                                                <option value="2">Paria</option>
                                                                <option value="84">Sawi Pahit</option>
                                                                <option value="77">Sawi Pakcoi, Caisim, Bayam, Kangkung</option>
                                                                <option value="72">Selada</option>
                                                                <option value="26">Seledri</option>
                                                                <option value="63">Semangka</option>
                                                                <option value="43">Terong</option>
                                                                <option value="19">Timun</option>
                                                                <option value="75">Tomat</option>
                                                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <select name="province" id="prov-market" class="form-control">
                                <option value=""> Pilih Provinsi </option>
                                                                <option value="11">Aceh</option>
                                                                <option value="51">Bali</option>
                                                                <option value="36">Banten</option>
                                                                <option value="17">Bengkulu</option>
                                                                <option value="34">Di Yogyakarta</option>
                                                                <option value="31">Dki Jakarta</option>
                                                                <option value="75">Gorontalo</option>
                                                                <option value="15">Jambi</option>
                                                                <option value="32">Jawa Barat</option>
                                                                <option value="33">Jawa Tengah</option>
                                                                <option value="35">Jawa Timur</option>
                                                                <option value="61">Kalimantan Barat</option>
                                                                <option value="63">Kalimantan Selatan</option>
                                                                <option value="62">Kalimantan Tengah</option>
                                                                <option value="64">Kalimantan Timur</option>
                                                                <option value="65">Kalimantan Utara</option>
                                                                <option value="19">Kepulauan Bangka Belitung</option>
                                                                <option value="21">Kepulauan Riau</option>
                                                                <option value="18">Lampung</option>
                                                                <option value="81">Maluku</option>
                                                                <option value="82">Maluku Utara</option>
                                                                <option value="52">Nusa Tenggara Barat</option>
                                                                <option value="53">Nusa Tenggara Timur</option>
                                                                <option value="94">Papua</option>
                                                                <option value="91">Papua Barat</option>
                                                                <option value="14">Riau</option>
                                                                <option value="76">Sulawesi Barat</option>
                                                                <option value="73">Sulawesi Selatan</option>
                                                                <option value="72">Sulawesi Tengah</option>
                                                                <option value="74">Sulawesi Tenggara</option>
                                                                <option value="71">Sulawesi Utara</option>
                                                                <option value="13">Sumatera Barat</option>
                                                                <option value="16">Sumatera Selatan</option>
                                                                <option value="12">Sumatera Utara</option>
                                                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="district" id="kab-market" class="form-control">
                                <option value=""> Pilih Kabupaten </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <button id="filter-market" class="btn btn-default btn-block" type="submit">
                                <i class="fa fa-filter"></i> Tampilkan</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table" id="market-price-table"></table>
            </div>
            <div class="page-market-price">
                <input type="hidden" id="current_page">
                <nav>
                    <ul class="pager">
                        <li class="previous">
                            <a href="javascript:void(0)" onclick="getMarketBy('prev')">
                                <span aria-hidden="true">
                                    <i class="fa fa-arrow-left"></i>
                                </span> Previous</a>
                        </li>
                        <li class="next">
                            <a href="javascript:void(0)" onclick="getMarketBy('next')">Next
                                <span aria-hidden="true">
                                    <i class="fa fa-arrow-right"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

</div>
   
</section>
<!--Contact End--> 

<script src="https://sipindo.id/js/app.js"></script>
    <script>
    function returnNull(params) {
        if (params == null) {
            return '<span class="text-center">-</span>'
        } else {
            return params['nama'];
        }
    }

    // market price indicator up down
    function returnUpDown(params) {
        if (params = 'rise') {
            return '<i class="text-success fa fa-arrow-up"></i>'
        } else if (params = 'fall') {
            return '<i class="text-danger fa fa-arrow-down"></i>'
        } else {
            return '<i class="text-info fa fa-arrow-right"></i>'
        }
    }

    // market price no data available
    function returnNoAvailableData() {
        $('#market-price-table').append('<tr><td colspan="5" class="text-center">No Data Available</td></tr>');
    }

    function formatDate(date) {
        var monthNames = [
            "January", "February", "March",
            "April", "May", "June", "July",
            "August", "September", "October",
            "November", "December"
        ];

        var day = date.getDate();
        var monthIndex = date.getMonth();
        var year = date.getFullYear();
        var hh = date.getHours();
        var mm = date.getMinutes();
        return day + ' ' + monthNames[monthIndex] + ' ' + year + ' - ' + hh + ':' + mm;
    }

    function sortTable() {
        var table, rows, switching, i, x, y, shouldSwitch;
        table = document.getElementById("market-price-table");
        switching = true;
        while (switching) {
            switching = false;
            rows = table.rows;
            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("TD")[0];
                y = rows[i + 1].getElementsByTagName("TD")[0];
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    shouldSwitch = true;
                    break;
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
            }
        }
    }

    function getMarket() {
        var cur_page = 1
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/get-market',
            method: 'GET',
            success: function (response) {
                var mkt = response['market-price'].data;
                $('#current_page').val(response['market-price']['current_page'] + cur_page);
                $('#market-price-table').empty()
                $('#market-price-table').append(
                    '<thead><tr><th>Nama Tanaman</th><th>Harga /kg</th><th>Tanggal</th><th>Wilayah</th><th class="text-center">Naik/Turun</th></tr></thead><tbody>'
                )
                for (var i = 0; i < mkt.length; i++) {
                    $('#market-price-table').append(
                        '<tr><td>' + mkt[i]['jenis_tanaman']['nama_tanaman'] + '</td><td>' + mkt[i][
                            'harga_perkg'
                        ] + '/kg</td><td>' + formatDate(new Date(mkt[i]['created_at'])) + '</td><td>' +
                        returnNull(mkt[i][
                            'wilkab'
                        ]) + '</td><td class="text-center">' + returnUpDown(mkt[i]['naik_turun']) +
                        '</td></tr>'
                    )
                }
                $('#market-price-table').append('</tbody');
                sortTable()
            }
        })
    }

    getMarket();

    function getMarketBy(statusParams) {
        var cur_page = $('#current_page').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/get-market?page=' + cur_page,
            method: 'GET',
            success: function (response) {
                var mkt = response['market-price'].data;
                if (statusParams == 'prev') {
                    $('#current_page').val(response['market-price']['current_page'] - 1);
                } else {
                    $('#current_page').val(response['market-price']['current_page'] + 1);
                }
                $('#market-price-table').empty()
                $('#market-price-table').append(
                    '<thead><tr><th>Nama Tanaman</th><th>Harga /kg</th><th>Tanggal</th><th>Wilayah</th><th class="text-center">Naik/Turun</th></tr></thead><tbody>'
                )
                for (var i = 0; i < mkt.length; i++) {
                    $('#market-price-table').append(
                        '<tr><td>' + mkt[i]['tanaman']['post_title'] + '</td><td>' + mkt[i][
                            'harga_perkg'
                        ] + '/kg</td><td>' + formatDate(new Date(mkt[i]['created_at'])) + '</td><td>' +
                        returnNull(mkt[i][
                            'wilkab'
                        ]) + '</td><td class="text-center">' + returnUpDown(mkt[i]['naik_turun']) +
                        '</td></tr>'
                    )
                }
                $('#market-price-table').append('</tbody');
            }
        })
    }

    $(document).ready(function () {

        $('#prov-market').change(function () {
            var prov_id = $('#prov-market').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/kabupaten-by-prov/' + prov_id,
                method: 'POST',
                data: {},
                success: function (response) {
                    $('#kab-market').empty();
                    var data = response.kabupaten;
                    $('#kab-market').append(
                        '<option value=""> Pilih Kabupaten </option>');
                    for (var i = 0; i < data.length; i++) {
                        $('#kab-market').append('<option value="' + data[i].id + '">' +
                            data[i].nama +
                            '</option>')
                    }
                }
            })
        })

        $('#filter-market-md').click(function (e) {
            e.preventDefault();
            var sdt = $('#srcdt').val();
            var prov = $('#prov-market').val();
            var kab = $('#kab-market').val();
            var tnm = $('#tanaman-market').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/filter-market',
                method: 'POST',
                data: {
                    provinsi: prov,
                    kabupaten: kab,
                    tanaman: tnm,
                    source_data: sdt
                },
                success: function (response) {
                    var mkt = response['market-price'].data;
                    $('#market-price-table').empty()
                    $('#market-price-table').append(
                        '<thead><tr><th>Nama Tanaman</th><th>Harga /kg</th><th>Tanggal</th><th>Wilayah</th><th class="text-center">Naik/Turun</th></tr></thead><tbody>'
                    )
                    if (mkt.length != 0) {
                        for (var i = 0; i < mkt.length; i++) {
                            $('#market-price-table').append(
                                '<tr><td>' + mkt[i]['tanaman']['post_title'] +
                                '</td><td>' + mkt[i]['harga_perkg'] + '/kg</td><td>' +
                                mkt[i]['created_at'] + '</td><td>' + returnNull(mkt[i][
                                    'wilkab'
                                ]) + '</td><td class="text-center">' + returnUpDown(mkt[
                                    i]['naik_turun']) + '</td></tr>'
                            )
                        }
                    } else {
                        returnNoAvailableData();
                    }
                    $('#market-price-table').append('</tbody');
                }
            })
        })

        $('#filter-market').click(function (e) {
            e.preventDefault();
            var sdt = $('#srcdt').val();
            var prov = $('#prov-market').val();
            var kab = $('#kab-market').val();
            var tnm = $('#tanaman-market').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/filter-market',
                method: 'POST',
                data: {
                    provinsi: prov,
                    kabupaten: kab,
                    tanaman: tnm,
                    source_data: sdt
                },
                success: function (response) {
                    var mkt = response['market-price'].data;
                    $('#market-price-table').empty()
                    $('#market-price-table').append(
                        '<thead><tr><th>Nama Tanaman</th><th>Harga /kg</th><th>Tanggal</th><th>Wilayah</th><th class="text-center">Naik/Turun</th></tr></thead><tbody>'
                    )
                    if (mkt.length != 0) {
                        for (var i = 0; i < mkt.length; i++) {
                            $('#market-price-table').append(
                                '<tr><td>' + mkt[i]['tanaman']['post_title'] +
                                '</td><td>' + mkt[i]['harga_perkg'] + '/kg</td><td>' +
                                mkt[i]['created_at'] + '</td><td>' + returnNull(mkt[i][
                                    'wilkab'
                                ]) + '</td><td class="text-center">' + returnUpDown(mkt[
                                    i]['naik_turun']) + '</td></tr>'
                            )
                        }
                    } else {
                        returnNoAvailableData();
                    }
                    $('#market-price-table').append('</tbody');
                    sortTable()
                }
            })
        })
    })
</script>