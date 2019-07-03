<div class="row">
    @if (count($kados) > 0)
        @if ($query == "")
            
        @else
            <span class="col-12 s-text8 p-t-5 p-b-5 mb-3">Hasil pencarian terkait "<b class="color0">{{$query}}</b>"</span>
        @endif
        
        @foreach ($kados as $kado)
            <div class="col-6 col-md-4 col-lg-3 p-b-50">
                <!-- Block2 -->
                <div style="cursor:pointer;" class="block2" onclick="window.location='{{ route('kado.detail', $kado->id)}}';">
                    <div class="block2-img of-hidden pos-relative block2-labelsale">
                        <div class="image-wrapper">
                            <img class="foto-kado" src='{{ asset("images/kados/$kado->url")}}' alt="IMG-PRODUCT">
                        </div>

                        <div class="block2-overlay trans-0-4">
                            
                        </div>
                    </div>

                    <div class="block2-txt p-t-20">
                        <a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
                            {{$kado->nama_kado}}
                        </a>

                        {{-- <span class="block2-oldprice m-text7 p-r-5">
                            Rp {{number_format(1000000,2)}}
                        </span> --}}

                        <span class="block2-newprice m-text8 p-r-5">
                            Rp {{number_format($kado->harga_kado,2)}}
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <span class="col-12 s-text8 p-t-5 p-b-5">Tidak ditemukan pencarian terkait "<b class="color0">{{$query}}</b>"</span> 
    @endif
    
</div>
{{$kados->links()}}