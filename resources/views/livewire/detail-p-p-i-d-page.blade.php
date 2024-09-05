<div>
    <div class="post">
        <img class="img-responsive" src="{{ is_img($artikel->gambar) }}" alt="{{ $artikel->slug }}">
    
        <div class="isi-artikel">
            <h3 style="margin-top: 5px; text-align: justify;"><b>{{ $artikel->judul }}</b></h3>
            <p><i class="fa fa-calendar"></i>&ensp;{{ format_date($artikel->created_at) }}&ensp;|&ensp;<i
                    class="fa fa-user"></i>&ensp;Administrator</p>
            <p>{!! $artikel->isi !!}</p>
            <hr />
            <div style="margin-top:-10px" class="sharethis-inline-share-buttons"></div>
        </div>
    </div>
</div>
