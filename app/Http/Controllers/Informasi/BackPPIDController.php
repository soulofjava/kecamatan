<?php

/*
 * File ini bagian dari:
 *
 * OpenDK
 *
 * Aplikasi dan source code ini dirilis berdasarkan lisensi GPL V3
 *
 * Hak Cipta 2017 - 2024 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
 *
 * Dengan ini diberikan izin, secara gratis, kepada siapa pun yang mendapatkan salinan
 * dari perangkat lunak ini dan file dokumentasi terkait ("Aplikasi Ini"), untuk diperlakukan
 * tanpa batasan, termasuk hak untuk menggunakan, menyalin, mengubah dan/atau mendistribusikan,
 * asal tunduk pada syarat berikut:
 *
 * Pemberitahuan hak cipta di atas dan pemberitahuan izin ini harus disertakan dalam
 * setiap salinan atau bagian penting Aplikasi Ini. Barang siapa yang menghapus atau menghilangkan
 * pemberitahuan ini melanggar ketentuan lisensi Aplikasi Ini.
 *
 * PERANGKAT LUNAK INI DISEDIAKAN "SEBAGAIMANA ADANYA", TANPA JAMINAN APA PUN, BAIK TERSURAT MAUPUN
 * TERSIRAT. PENULIS ATAU PEMEGANG HAK CIPTA SAMA SEKALI TIDAK BERTANGGUNG JAWAB ATAS KLAIM, KERUSAKAN ATAU
 * KEWAJIBAN APAPUN ATAS PENGGUNAAN ATAU LAINNYA TERKAIT APLIKASI INI.
 *
 * @package    OpenDK
 * @author     Tim Pengembang OpenDesa
 * @copyright  Hak Cipta 2017 - 2024 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
 * @license    http://www.gnu.org/licenses/gpl.html    GPL V3
 * @link       https://github.com/OpenSID/opendk
 */

namespace App\Http\Controllers\Informasi;

use App\Http\Controllers\Controller;
use App\Http\Requests\PPIDRequest;
use App\Models\PPID;
use Conner\Tagging\Model\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class BackPPIDController extends Controller
{
    public function index()
    {
        $page_title = 'PPID';
        $page_description = 'Data PPID';

        return view('informasi.ppid.index', compact('page_title', 'page_description'));
    }

    public function getDataArtikel(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(PPID::all())
                ->addIndexColumn()
                ->addColumn('aksi', function ($row) {
                    $data['show_web'] = route('berita.detail', $row->slug);

                    if (! auth()->guest()) {
                        $data['edit_url'] = route('informasi.ppid.edit', $row->id);
                        $data['delete_url'] = route('informasi.ppid.destroy', $row->id);
                    }

                    return view('forms.aksi', $data);
                })
                ->editColumn('status', function ($row) {
                    if ($row->status == 0) {
                        return '<span class="label label-danger">Tidak Aktif</span>';
                    } else {
                        return '<span class="label label-success">Aktif</span>';
                    }
                })
                ->editColumn('dibuat', function ($row) {
                    return format_datetime($row->created_at);
                })
                ->rawColumns(['status'])
                ->make(true);
        }
    }

    public function create()
    {
        $page_title = 'PPID';
        $page_description = 'Tambah Data PPID';
        $categori = Tag::orderBy('name', 'ASC')->pluck('name', 'name')->map(function ($item) {
            return strtoupper($item);
        });

        return view('informasi.ppid.create', [
            'page_title' => $page_title,
            'page_description' => $page_description,
            'categori' => $categori
        ]);
    }

    public function store(PPIDRequest $request)
    {
        try {
            $input = $request->all();
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $path = Storage::putFile('public/ppid', $file);
                $filename = basename($path);

                $input['gambar'] = $filename;
            }

            $id = PPID::create($input);
            // tagging postingan
            $id->tag($input['kategori']);
        } catch (\Exception $e) {
            report($e);
            return back()->withInput()->with('error', 'Simpan data gagal!');
        }

        return redirect()->route('informasi.ppid.index')->with('success', 'Data berhasil disimpan!');
    }

    public function edit(PPID $artikel)
    {
        $page_title = 'PPID';
        $page_description = 'Ubah Data PPID';

        $categori = Tag::orderBy('name', 'ASC')->pluck('name', 'name')->map(function ($item) {
            return strtoupper($item);
        });

        // untuk list yang terpilih
        $categorinya = $artikel->tagged->pluck('tag_name')->toArray();
        return view('informasi.ppid.edit', [
            'artikel' => $artikel,
            'page_title' => $page_title,
            'page_description' => $page_description,
            'categori' => $categori,
            'categorinya' => $categorinya
        ]);
    }

    public function update(PPIDRequest $request, PPID $artikel)
    {
        try {
            $input = $request->all();

            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $path = Storage::putFile('public/ppid', $file);
                $filename = basename($path);

                Storage::delete('public/ppid/' . $artikel->getRawOriginal('gambar'));

                $input['gambar'] = $filename;
            }

            $artikel->update($input);
            // tag ulang postingan
            $artikel->retag($input['kategori']);
        } catch (\Exception $e) {
            report($e);

            return back()->withInput()->with('error', 'Data gagal dihapus!');
        }

        return redirect()->route('informasi.ppid.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy(PPID $artikel)
    {
        try {
            if ($artikel->delete()) {
                Storage::delete('public/ppid/' . $artikel->getRawOriginal('gambar'));
            }
        } catch (\Exception $e) {
            report($e);

            return redirect()->route('informasi.ppid.index')->with('error', 'Data gagal dihapus!');
        }

        return redirect()->route('informasi.ppid.index')->with('success', 'Data sukses dihapus!');
    }
}
