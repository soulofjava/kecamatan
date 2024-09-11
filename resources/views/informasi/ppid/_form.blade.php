<div class="row">
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header with-border">
                <a href="{{ route('informasi.ppid.index') }}"><button type="button" class="btn btn-info btn-sm"><i
                            class="fa fa-arrow-left"></i> Kembali</button></a>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label class="control-label" for="judul">Kategori Postingan</label>

                    {!! Form::select('kategori', $categori, $categorinya ?? [], ['placeholder' => 'Kategori Postingan',
                    'class' => 'form-control ktgr']) !!}
                    @if ($errors->has('kategori'))
                    <span class="help-block" style="color:red">{{ $errors->first('kategori') }}</span>
                    @endif
                    <!-- <span class="help-block"><code>Judul minimal 5 karakter dan maksimal 100 karakter</code></span> -->
                </div>
                <div id="su" class="form-group">
                    <label class="control-label" for="judul">Informasi Terkait </label>
                    <ul id="Kegiatan Dan Kinerja">
                        <li>Dokumen Rencana Strategis Perangkat Daerah (2021-2026)</li>
                        <li>Dokumen Rencana Strategis Perangkat Daerah (2021-2026)</li>
                        <li>Dokumen Rencana Kerja Perangkat Daerah tahun 2024</li>
                        <li>Tentang agenda terkait pelaksanaan tugas Perangkat Daerah di tahun 2024</li>
                        <li>Kinerja dalam bentuk Laporan Kinerja Instansi Pemerintah (LKjIP) tahun 2023</li>
                    </ul>
                    <ul id="Kinerja Ppid">
                        <li>Mengumumkan informasi tentang akses informasi publik dengan cara menghubungkan layanan
                            permohonan informasi publik pada
                            website Perangkat Daerah ke Sobopedia (https://sobopedia.wonosobokab.go.id/)</li>
                        <li>Memutakhirkan, menetapkan dan mengumumkan SK Daftar Informasi Publik Tahun 2024</li>
                        <li>Memutakhirkan, menetapkan dan mengumumkan SK Daftar Informasi yang Dikecualikan Tahun 2024
                        </li>
                        <li>Mengumumkan Register Permohonan Informasi Publik tahun 2023 dan 2024</li>
                    </ul>
                    <ul id="Penanganan Pengaduan">
                        <li>Mengumumkan informasi tentang tata cara penyampaian pengaduan masyarakat dengan
                            menghubungkan layanan pengaduan
                            masyarakat pada website perangkat daerah ke Lapor Bupati Wonosobo
                            (https://laporbupati.wonosobokab.go.id)</li>
                        <li>Mengumumkan informasi mengenai hasil penanganan pengaduan masyarakat</li>
                    </ul>
                    <ul id="Pengadaan Barang Dan Jasa">
                        <li>Mengumumkan informasi tentang tahap perencanaan Pengadaan Barang dan Jasa Perangkat Daerah
                            dengan menghubungkan website
                            perangkat daerah dengan website Sirup LKPP sesuai dengan ID OPD Masing-Masing
                            (https://sirup.lkpp.go.id/sirup/rekap/klpd/D151)</li>
                        <li>Mengumumkan informasi mengenai tahap Pemilihan/Progresnya dan Pelaksanaan/progresnya
                            Pengadaan Barang dan Jasa dengan
                            menghubungkan website Perangkat Daerah dengan Website LPSE Wonosobo
                            (https://lpse.wonosobokab.go.id/eproc4/lelang)</li>
                    </ul>
                    <ul id="Profil Opd">
                        <li>Mengumumkan informasi terkait alamat lengkap Perangkat Daerah, dengan mencakup nama jalan,
                            nomor, kota/kab, provinsi,
                            kode pos, no.tlp/fax dan alamat email/webmail</li>
                        <li>Mengumumkan informasi terkait tugas dan fungsi Perangkat Daerah</li>
                        <li>Mengumumkan informasi terkait Personil Perangkat Daerah</li>
                        <li>Mengumumkan informasi terkait struktur organisasi Perangkat Daerah sampai dengan dua tingkat
                            kebawah</li>
                    </ul>
                    <ul id="Profil Pimpinan">
                        <li>Mengumumkan informasi terkait profil singkat Pimpinan Perangkat Daerah</li>
                        <li>Mengumumkan informasi terkait LHKPN 2023 yang dilaporkan tahun 2024, dicetak dari
                            elhkpn.kpk.go.id (Ikhtisar) bagi
                            Pimpinan Perangkat Daerah</li>
                    </ul>
                    <ul id="Profil Ppid">
                        <li>Mengumumkan informasi terkait profil</li>
                        <li>Mengumumkan informasi tentang tugas PPID Perangkat Daerah</li>
                        <li>Mengumumkan informasi terkait SK PPID Perangkat Daerah</li>
                    </ul>
                    <ul id="Prosedur Gawat Darurat">
                        <li>Mengumumkan Informasi tentang Prosedur Peringatan dini dan Prosedur Evakuasi Keadaan Darurat
                            di Kantor Perangkat Daerah
                            (SOP atau Video Safety Briefing)</li>
                    </ul>
                    <ul id="Regulasi">
                        <li>Mengumumkan informasi mengenai daftar peraturan, keputusan dan/atau kebijakan yang telah
                            dikeluarkan/ditetapkan dan yang
                            akan dikeluarkan/ditetapkan dengan menghubungkan website perangkat daerah dengan website
                            JDIH Kabupaten Wonosobo
                            (https://jdih.wonosobokab.go.id/)</li>
                        <li>Mengumumkan informasi mengenai Daftar Rancangan Peraturan, keputusan dan/atau kebijakan yang
                            akan dikeluarkan/ditetapkan</li>
                    </ul>
                    <ul id="Transparansi Keuangan">
                        <li>Informasi Mengenai Transparansi Keuangan Perangkat Daerah, terdiri dari : (a) laporan
                            keuangan hasil audit Catatan Atas
                            Laporan Keuangan (CALK) 2023 (3 point), (b) informasi laporan keuangan hasil audit Daftar
                            Aset Tahun 2023 (3 point), (c)
                            informasi keuangan tahun 2024 dalam bentuk DPA (2 point), (d) Informasi keuangan tahun 2024
                            dalam bentuk RKA (2 point)</li>
                    </ul>
                </div>

                <div class="form-group">
                    <label class="control-label" for="judul">Judul Postingan</label>

                    {!! Form::text('judul', null, ['placeholder' => 'Judul Postingan', 'class' => 'form-control']) !!}
                    @if ($errors->has('judul'))
                    <span class="help-block" style="color:red">{{ $errors->first('judul') }}</span>
                    @endif
                    <!-- <span class="help-block"><code>Judul minimal 5 karakter dan maksimal 100 karakter</code></span> -->
                </div>

                <div class="form-group">
                    <label class="control-label" for="isi">Isi Postingan</label>

                    {!! Form::textarea('isi', null, ['class' => 'my-editor', 'placeholder' => 'Isi Postingan', 'style'
                    => 'width: 100%; height: 750px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd;
                    padding: 10px;']) !!}
                    @if ($errors->has('isi'))
                    <span class="help-block" style="color:red">{{ $errors->first('isi') }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="box box-primary">
            <div class="box-body">
                <div class="form-group">
                    <label class="control-label" for="gambar">Gambar</label>
                    <img src="{{ is_img($artikel->gambar ?? null) }}" id="showgambar"
                        style="width:100%; max-height:250px; float:left;" />

                    {!! Form::file('gambar', ['placeholder' => 'Gambar', 'class' => 'form-control', 'id' =>
                    'file-artikel', 'accept' => 'jpg,jpeg,png']) !!}
                    @if ($errors->has('gambar'))
                    <span class="help-block" style="color:red">{{ $errors->first('gambar') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label class="control-label" for="gambar">Status</label>

                    {!! Form::select('status', ['0' => 'Tidak Aktif', '1' => 'Aktif'], null, ['class' =>
                    'form-control']) !!}
                    @if ($errors->has('status'))
                    <span class="help-block" style="color:red">{{ $errors->first('status') }}</span>
                    @endif
                </div>
            </div>

            <div class="box-footer">
                @include('partials.button_reset_submit')
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.11/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    $(document).ready(function () {
        myFunction()
        $('.ktgr').change(function () {
            myFunction()
            document.getElementById('su').style.display = "block";
            var selectedCategory = $(this).val();
            if (selectedCategory === 'Kegiatan Dan Kinerja') {
                document.getElementById('Kegiatan Dan Kinerja').style.display = "block";
            } else if (selectedCategory === 'Kinerja Ppid') {
                document.getElementById('Kinerja Ppid').style.display = "block";
            } else if (selectedCategory === 'Penanganan Pengaduan') {
                document.getElementById('Penanganan Pengaduan').style.display = "block";
            } else if (selectedCategory === 'Pengadaan Barang Dan Jasa') {
                document.getElementById('Pengadaan Barang Dan Jasa').style.display = "block";
            } else if (selectedCategory === 'Profil Opd') {
                document.getElementById('Profil Opd').style.display = "block";
            } else if (selectedCategory === 'Profil Pimpinan') {
                document.getElementById('Profil Pimpinan').style.display = "block";
            } else if (selectedCategory === 'Profil Ppid') {
                document.getElementById('Profil Ppid').style.display = "block";
            } else if (selectedCategory === 'Prosedur Gawat Darurat') {
                document.getElementById('Prosedur Gawat Darurat').style.display = "block";
            } else if (selectedCategory === 'Regulasi') {
                document.getElementById('Regulasi').style.display = "block";
            } else if (selectedCategory === 'Transparansi Keuangan') {
                document.getElementById('Transparansi Keuangan').style.display = "block";
            } else {
                document.getElementById('su').style.display = "none";
            }
        });
    });

    function myFunction() {
        document.getElementById('su').style.display = "none";
        document.getElementById('Kegiatan Dan Kinerja').style.display = "none";
        document.getElementById('Kinerja Ppid').style.display = "none";
        document.getElementById('Penanganan Pengaduan').style.display = "none";
        document.getElementById('Pengadaan Barang Dan Jasa').style.display = "none";
        document.getElementById('Profil Opd').style.display = "none";
        document.getElementById('Profil Pimpinan').style.display = "none";
        document.getElementById('Profil Ppid').style.display = "none";
        document.getElementById('Prosedur Gawat Darurat').style.display = "none";
        document.getElementById('Regulasi').style.display = "none";
        document.getElementById('Transparansi Keuangan').style.display = "none";
    }

    $(function () {

        var fileTypes = ['jpg', 'jpeg', 'png']; //acceptable file types

        function readURL(input) {
            if (input.files && input.files[0]) {

                var extension = input.files[0].name.split('.').pop().toLowerCase(), //file extension from input file
                    isSuccess = fileTypes.indexOf(extension) > -1; //is extension in acceptable types

                if (isSuccess) { //yes
                    var reader = new FileReader();
                    reader.onload = function (e) {

                        $('#showgambar').attr('src', e.target.result);
                        $('#showgambar').removeClass('hide');
                        $('#showpdf').addClass('hide');

                    }

                    reader.readAsDataURL(input.files[0]);
                } else { //no
                    //warning
                    $("#file-artikel").val('');
                    alert('File tersebut tidak diperbolehkan.');
                }
            }
        }

        $("#file-artikel").change(function () {
            readURL(this);
        });
    });

    var editor_config = {
        path_absolute: "/",
        selector: "textarea.my-editor",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link gambar media",
        relative_urls: false,
        image_caption: true,
        file_browser_callback: function (field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;
            var cmsURL = editor_config.path_absolute + 'filemanager?field_name=' + field_name;

            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file: cmsURL,
                judul: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no"
            });
        }
    };

    tinymce.init(editor_config);
</script>
@endpush