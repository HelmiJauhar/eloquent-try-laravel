<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function cekObject()
    {
        $mahasiswa = new mahasiswa();
        dump($mahasiswa);
    }

    public function insert()
    {
        $mahasiswa = new mahasiswa();
        $mahasiswa->nim = '19003036';
        $mahasiswa->nama = 'Sari Citra Lestari';
        $mahasiswa->tanggal_lahir = '2001-12-31';
        $mahasiswa->ipk = 3.5;
        $mahasiswa->save();

        dump($mahasiswa);
    }

    public function massAssignment()
    {
        Mahasiswa::create(
            [
                'nim' => '19021044',
                'nama' => 'Rudi Permana',
                'tanggal_lahir' => '2000-08-22',
                'ipk' => 2.5
            ]
            );
            return "Berhasil di proses";
    }

    public function massAssignment2()
    {
        $mahasiswa1 = Mahasiswa::create(
            [
                'nim' => '19002032',
                'nama' => 'Rina Kumala Sari',
                'tanggal_lahir' => '2000-06-28',
                'ipk' => 3.4
            ]
            );
        dump($mahasiswa1);
        $mahasiswa2 = Mahasiswa::create(
            [
                'nim' => '18012012',
                'nama' => 'James Situmorang',
                'tanggal_lahir' => '1999-04-02',
                'ipk' => 2.7
            ]
            );
        dump($mahasiswa2);
        $mahasiswa3 = Mahasiswa::create(
            [
                'nim' => '19005011',
                'nama' => 'Riana Putria',
                'tanggal_lahir' => '2000-11-23',
                'ipk' => 2.9
            ]
            );
        dump($mahasiswa3);
    }

    public function update()
    {
        $mahasiswa = Mahasiswa::find(3);
        $mahasiswa->tanggal_lahir = '2001-01-01';
        $mahasiswa->ipk = 2.9;
        $mahasiswa->save();
        dump($mahasiswa);
    }

    public function updateWhere()
    {
        $mahasiswa = Mahasiswa::where('nim','19003036')->first();
        $mahasiswa->tanggal_lahir = '2001-12-31';
        $mahasiswa->ipk = 4.0;
        $mahasiswa->save();
        dump($mahasiswa);
    }

    public function massUpdate()
    {
        Mahasiswa::where('nim','19003036')->first()->update([
            'tanggal_lahir' => '2000-04-20',
            'ipk' => 2.1
        ]);
        return "Berhasil di proses";
    }

    public function delete()
    {
        $mahasiswa = Mahasiswa::find(3);
        $mahasiswa->delete();
        dump($mahasiswa);
    }

    public function destroy()
    {
        $mahasiswa = Mahasiswa::destroy(1);
        dump($mahasiswa);
    }

    public function massDelete()
    {
        $mahasiswa = Mahasiswa::where('ipk','>',2)->delete();
        dump($mahasiswa);
    }

    public function all()
    {
        $result = Mahasiswa::all();
        foreach ($result as $mahasiswa){
            echo($mahasiswa->id). "<br>";
            echo($mahasiswa->nim). "<br>";
            echo($mahasiswa->nama). "<br>";
            echo($mahasiswa->tanggal_lahir). "<br>";
            echo($mahasiswa->ipk). "<br>";
            echo "<hr>";
        }
    }

    public function allView()
    {
        $mahasiswa = Mahasiswa::all();
        return view('tampil-mahasiswa',['mahasiswas' => $mahasiswa]);
    }

    public function getWhere()
    {
        $mahasiswas = Mahasiswa::where('ipk','<','3')
                    ->orderBy('nama','desc')->get();
        return view('tampil-mahasiswa',['mahasiswas' => $mahasiswas]);
    }

    public function testWhere()
    {
        $mahasiswa = Mahasiswa::where('nim','18012012')->get();
        dump($mahasiswa);
    }

    public function first()
    {
        $mahasiswa = Mahasiswa::where('ipk','<',3)->first();
        return view('tampil-mahasiswa',['mahasiswas' => [$mahasiswa]]);
    }

    public function find()
    {
        $mahasiswa = Mahasiswa::find(8);
        return view('tampil-mahasiswa',['mahasiswas' =>[$mahasiswa]]);
    }

    public function latest()
    {
        $mahasiswa = Mahasiswa::latest()->get();
        return view('tampil-mahasiswa',['mahasiswas' => $mahasiswa]);
    }

    public function limit()
    {
        $mahasiswa = Mahasiswa::latest()->limit(2)->get();
        return view('tampil-mahasiswa',['mahasiswas' => $mahasiswa]);
    }

    public function skipTake()
    {
        $mahasiswa = Mahasiswa::orderBy('ipk')->skip(1)->take(3)->get();
        return view('tampil-mahasiswa',['mahasiswas' => $mahasiswa]);
    }

    public function softDelete()
    {
        Mahasiswa::where('nim','18012012')->delete();
        return "Berhasil dihapus";
    }

    public function withTrashed()
    {
        $mahasiswas = Mahasiswa::withTrashed()->get();
        return view('tampil-mahasiswa',['mahasiswas' => $mahasiswas]);
    }

    public function restore()
    {
        Mahasiswa::withTrashed()->where('nim','18012012')->restore();
        return "Berhasil di restore";
    }

    public function forceDelete()
    {
        Mahasiswa::where('nim','19005011')->forceDelete();
        return "Berhasil di hapus secara permanen";
    }
}
