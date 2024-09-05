@push('css')
<style>
    .pills-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 5px;
    }

    .pill {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px 20px;
        background-color: #011B89;
        color: white;
        border-radius: 20px;
        cursor: pointer;
        text-align: center;
        flex: 1;
        margin: 5px;
    }

    .pill.active {
        background-color: #E08E0B;
        /* Optional: Change color for selected pill */
    }

    .no-category-message {
        font-style: italic;
        color: #555;
        text-align: center;
        margin: 20px 0;
    }

    .callout-info {
        background-color: #011B89;
        color: white;
        padding: 15px;
        border-radius: 5px;
        text-align: center;
    }
</style>
@endpush

<div>
    <div class="col">
        <div class="fat-arrow">
            <div class="flo-arrow"><i class="fa fa-globe fa-lg fa-spin"></i></div>
        </div>
        <div class="page-header" style="margin:0;">
            <span style="display: inline-flex; vertical-align: middle;"><strong>Halaman PPID</strong></span>
        </div>

        <div id="kecamatan">
            <div class="post clearfix">

                <div class="pills-container" style="margin-top: 15px;">
                    @foreach ($categori as $category)
                    <span class="pill {{ $selectedCategory === $category ? 'active' : '' }}"
                        wire:click="selectCategory('{{ $category }}')">
                        {{ $category }}
                    </span>
                    @endforeach
                </div>

                @if($selectedCategory === null)
                <div class="callout"
                    style="margin-top: 15px; background-color: #011B89; color: white; text-align: center;">
                    <p class="text-bold">Belum pilih kategori</p>
                </div>
                @else
                <!-- Search Field -->
                <div class="form-group" style="margin-top: 15px;">
                    <input type="text" class="form-control" placeholder="CARI DATA DI KATEGORI {{ $selectedCategory }}"
                        wire:model.live="mencari" style="text-align: center; width: 100%;">
                </div>
                @forelse ($artikel as $item)

                <div class="post" style="margin-top: 15px; margin-bottom: 5px; padding-top: 5px; padding-bottom: 5px;">
                    <div class="row">
                        <div class="col-sm-4">
                            <img class="img-responsive" src="{{ is_img($item->gambar) }}" alt="{{ $item->slug }}"
                                style="object-fit: cover; width: 223px; height: 126px;">
                        </div>
                        <div class="col-sm-8">
                            <h5 style="margin-top: 5px; text-align: justify;">
                                <b><a href="{{ url('berita/'.$item->slug) }}">{{ $item->judul }}</a></b>
                            </h5>
                            <p style="font-size:11px;">
                                <i class="fa fa-calendar"></i> {{ format_date($item->created_at) }}
                                &ensp;|&ensp;
                                <i class="fa fa-user"></i> Administrator
                            </p>
                            <p style="text-align: justify;">{{ strip_tags(substr($item->isi, 0, 250)) }}...</p>
                            <a href="{{ url('berita/'.$item->slug) }}" class="btn btn-sm btn-primary"
                                target="_blank">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="callout"
                    style="margin-top: 15px; background-color: #011B89; color: white; text-align: center;">
                    <p class="text-bold">Tidak ada data dengan kategori tersebut!</p>
                </div>
                @endforelse
                <!-- Load More Button -->
                @if($artikel->hasMorePages())
                <div class="text-center" style="margin-top: 15px;">
                    <button wire:click="loadMore" class="btn btn-primary">Load More</button>
                </div>
                @endif
                @endif
            </div>
        </div>
    </div>
</div>