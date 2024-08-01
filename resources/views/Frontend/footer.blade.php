<link rel="stylesheet" href="{{asset('../Css/Frontend/footer.css')}}">
@php
    $companyProfile = App\Models\CompanyProfile::first();
    $layanans = App\Models\Layanan::where('status', 1)->get();
    $partners = App\Models\Partner::where('status', 1)->get();
@endphp

<div class="footer py-5">
    <div class="container">
        <div class="footer-top d-grid d-sm-flex justify-content-sm-between justify-content-center align-items-center">
            <a href="#" class="text-center mb-3 mb-sm-0">
                <img src="{{asset('../Images/logonik.png')}}" alt="">
            </a>
            <div class="follow-us d-flex align-items-center gap-4">
                <p class="text-white">Follow Us:</p>
                <div class="sosmed d-flex align-items-center gap-3">
                   <h4>
                        <a href="{{ $companyProfile->facebook }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 1024 1024"><path fill="white" d="M880 112H144c-17.7 0-32 14.3-32 32v736c0 17.7 14.3 32 32 32h736c17.7 0 32-14.3 32-32V144c0-17.7-14.3-32-32-32m-92.4 233.5h-63.9c-50.1 0-59.8 23.8-59.8 58.8v77.1h119.6l-15.6 120.7h-104V912H539.2V602.2H434.9V481.4h104.3v-89c0-103.3 63.1-159.6 155.3-159.6c44.2 0 82.1 3.3 93.2 4.8v107.9z"/></svg>
                        </a>
                   </h4>
                    <h4>
                        <a href="{{ $companyProfile->instagram }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="white" d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4zm9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8A1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5a5 5 0 0 1-5 5a5 5 0 0 1-5-5a5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3"/></svg>
                        </a>
                    </h4>
                    <h4>
                        <a href="{{ $companyProfile->tokopedia }}">
                            <img src="{{ asset('Images/tokopedia.png') }}" width="40" alt="">
                        </a>
                    </h4>
                    <h4>
                        <a href="{{ $companyProfile->linkedin }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="white" d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2zm-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93zM6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37z"/></svg>
                        </a>
                    </h4>
                </div>
            </div>
        </div>
        <div class="hr-white"></div>
        <div class="row text-white justify-content-sm-between justify-content-center">
            <div class="col-md-2 col-sm-5 col-12 text-sm-start text-center my-md-0 my-3">
                <h4 class="mb-3">Beranda</h4>
                <p>Tentang Sat Station</p>
                <p>Visi Misi</p>
            </div>
            <div class="col-md-3 col-sm-7 col-12 text-sm-start text-center my-md-0 my-3">
                <h4 class="mb-3">Layanan Kami</h4>
                <p>Navigasi</p>
                <p>Satelit</p>
            </div>
            <div class="col-md-2 col-sm-5 col-12 text-sm-start text-center my-md-0 my-3">
                <h4 class="mb-3">Produk</h4>
                <p>Thuraya</p>
                <p>Samyung</p>
                <p>Koden</p>
                <p>Iridium</p>
                <p>Starlink</p>
                <p>Hytera</p>
            </div>
            <div class="col-md-4 col-sm-7 col-10 my-md-0 my-3">
                {{-- <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Alamat Email Kamu" aria-label="Alamat Email Kamu" aria-describedby="button-addon2">
                    <button class="btn btn-email" type="button" id="button-addon2">Subscribe</button>
                </div> --}}
                <div class="email-footer my-3 d-flex align-items-start gap-3">
                    <div class="icon">
                        <h4>
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="white" d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2zm-2 0l-8 5l-8-5zm0 12H4V8l8 5l8-5z"/></svg>
                        </h4>
                    </div>
                    <div class="isi">
                        <p>{{ $companyProfile->email }}</p>
                        <p>{{ $companyProfile->email2 }}</p>
                    </div>
                </div>
                <div class="alamat-footer my-3 d-flex align-items-start gap-3">
                    <div class="icon">
                        <h5>
                            <i class="fa-solid fa-phone"></i>
                        </h5>
                    </div>
                    <div class="isi">
                        <p>{{ $companyProfile->wa }}</p>
                    </div>
                </div>
                <div class="alamat-footer my-3 d-flex align-items-start gap-3">
                    <div class="icon">
                        <h4>
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="white" d="M12 11.5A2.5 2.5 0 0 1 9.5 9A2.5 2.5 0 0 1 12 6.5A2.5 2.5 0 0 1 14.5 9a2.5 2.5 0 0 1-2.5 2.5M12 2a7 7 0 0 0-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 0 0-7-7"/></svg>
                        </h4>
                    </div>
                    <div class="isi">
                        <p>{{ $companyProfile->address }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="hr-white"></div>
        <div class="footer-middle row align-items-start">
            <h5 class="text-white mb-3" style="white-space: nowrap;">Klien Kami :</h5>
            <div class="our-partners">
                @foreach ($partners as $partner)
                <img src="/partner/logo/{{ $partner->logo }}" class="img-fluid" alt="">
                @endforeach
            </div>
        </div>

        
    </div>
</div>
<div class="license text-white text-center pt-3 pb-5">
    <p>Copyright © 1993 - 2023 Sat Station All Right Reserved.</p>
</div>