@extends('layouts.market-app')

@section('content')
<div class="container">
    <form action="" method="POST" class="">
        <div class="container-table-cart pos-relative">
            <table class="table-shopping-cart">
                <tbody>
                    <tr class="table-head">
                        <th class="column-4 p-l-70">Halo {{ Auth::user()->nama_depan }}</th>
                    </tr>
                    
                    @csrf
                    <tr class="table-row">
                        <th class="column-1"><p>Nama</p>
                        </th>
                        <th class="column-2"><input type="text" name="nama_depan" value="{{ Auth::user()->nama_depan }}" class="sizefull s-text7 p-l-22 p-r-22">
                            <input type="text" name="nama_belakang" value="{{ Auth::user()->nama_belakang }}" class="sizefull s-text7 p-l-22 p-r-22"></th>
                    </tr>
                    <tr class="table-row">
                        <th class="column-1"><p>Tanggal Lahir</p>
                        </th>
                        <th class="column-2"><input type="text" name="birthday" value="{{ Auth::user()->birthday }} " class="sizefull s-text7 p-l-22 p-r-22"></th>
                    </tr>
                    <tr class="table-row">
                            <th class="column-1"><p>No. Telpon</p>
                            </th>
                            <th class="column-2"><input type="text" name="no_telp" value="{{ Auth::user()->no_telp }}" class="sizefull s-text7 p-l-22 p-r-22"></th>
                    </tr>
                    <tr class="table-row">
                            <th class="column-1"><p>Gender</p>
                            </th>
                            <th class="column-2"><input type="text" name="gender" value="{{ Auth::user()->gender }}" class="sizefull s-text7 p-l-22 p-r-22"></th>
                    </tr>
                    <tr class="table-row">
                            <th class="column-1"><p>Email</p>
                            </th>
                            <th class="column-2"><input type="text" name="email" value="{{ Auth::user()->email }}" class="sizefull s-text7 p-l-22 p-r-22"></th>
                    </tr> 
                    {{-- <button type="submit">submit btn</button> --}}
                </tbody>
            </table>
        </div>
    </form>
</div>
@endsection

