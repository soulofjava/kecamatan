@push('css')
<style>
    .pills-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        /* Distribute space evenly between pills */
        gap: 5px;
        /* Optional: adds spacing between pills */
    }

    .pill {
        display: flex;
        align-items: center;
        /* Center vertically */
        justify-content: center;
        /* Center horizontally */
        padding: 10px 20px;
        background-color: #011B89;
        /* Updated color */
        color: white;
        border-radius: 20px;
        cursor: pointer;
        text-align: center;
        flex: 1;
        /* Allow pills to grow and fill the available space */
        margin: 5px;
        /* Optional: adds margin around each pill */
    }
</style>
@endpush
<div>
    <div class="col">

        <div class="fat-arrow">
            <div class="flo-arrow"><i class="fa fa-globe fa-lg fa-spin"></i></div>
        </div>
        <div class="page-header" style="margin:0px 0px;">
            <span style="display: inline-flex; vertical-align: middle;"><strong class="">Halaman PPID</strong></span>
        </div>

        <div id="kecamatan">
            <div class="post clearfix">
                <div class="pills-container">
                    @foreach ($categori as $category)
                    <span class="pill">{{ $category }}</span>
                    @endforeach
                </div>

                @forelse ($artikel as $item)
                <div class="post" style="margin-bottom: 5px; padding-top: 5px; padding-bottom: 5px;">
                    <div class="row">
                        <div class="col-sm-4">
                            <img class="img-responsive" src="{{ is_img($item->gambar) }}" alt="{{ $item->slug }}">
                        </div>
                        <div class="col-sm-8">
                            <h5 style="margin-top: 5px; text-align: justify;"><b><a href="berita/{{ $item->slug }}">{{
                                        $item->judul }}</a></b></h5>
                            <p style="font-size:11px;"><i class="fa fa-calendar"></i>&ensp;{{
                                format_date($item->created_at)
                                }}&ensp;|&ensp;<i class="fa fa-user"></i>&ensp;Administrator</p>
                            <p style="text-align: justify;">{{ strip_tags(substr($item->isi, 0, 250)) }}...</p>
                            <a href="berita/{{ $item->slug }}" class="btn btn-sm btn-primary"
                                target="_blank">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="callout callout-info">
                    <p class="text-bold">Tidak ada berita kecamatan yang ditampilkan!</p>
                </div>
                @endforelse
                <div class="text-center">
                </div>
            </div>
        </div>

    </div>
</div>