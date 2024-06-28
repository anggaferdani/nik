<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('../Css/Frontend/createorder.css')}}"> 
<link rel="stylesheet" href="{{asset('../Css/Frontend/global.css')}}"> 
  </head>
  <body>

    <div class="container">
        <div class="button-kembali d-flex align-items-center gap-2 text-white my-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="white" d="M224 128a8 8 0 0 1-8 8H59.31l58.35 58.34a8 8 0 0 1-11.32 11.32l-72-72a8 8 0 0 1 0-11.32l72-72a8 8 0 0 1 11.32 11.32L59.31 120H216a8 8 0 0 1 8 8"/></svg>
            <p>kembali</p>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="border-order p-4 text-white">
                    <div class="gambar-layanan d-flex align-items-center">
                        <div class="text-center">
                            <div class="d-flex justify-content-center">
                                {{-- <img class="blur-bottom w-50" src="{{ asset('storage/image/'.$item->gambarproduk[0]->gambar) }}" alt=""> --}}
                                <img src="{{ asset('Images/thuraya.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="text-white">
                    <h1>Thuraya</h1>
                    <p>FDU - XT</p>
                </div>
                <div class="form-order my-3">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Alamat Email Kamu" aria-label="Alamat Email Kamu" aria-describedby="button-addon2">
                        <button class="btn text-white" type="button" id="button-addon2">Qty</button>
                    </div>
                </div>
                <div class="form-order my-3">
                    <textarea type="text" class=" form-control" placeholder="Ketik alamat pemesanan" aria-label="Ketik alamat pemesanan" aria-describedby="button-addon2"></textarea>
                </div>
                <div class=" my-3">
                    <label for="formFile" class="form-label">Upload bukti pembayaran</label>
                    <div class="form-order d-flex justify-content-between align-items-center">
                        <div class='d-flex align-items-center' id="profile-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 32 32"><g fill="white"><path d="M1.5 32h29c.827 0 1.5-.673 1.5-1.5v-29c0-.827-.673-1.5-1.5-1.5h-29C.673 0 0 .673 0 1.5v29c0 .827.673 1.5 1.5 1.5M1 1.5a.5.5 0 0 1 .5-.5h29a.5.5 0 0 1 .5.5v29a.5.5 0 0 1-.5.5h-29a.5.5 0 0 1-.5-.5z"/><path d="M20.5 12.5c1.103 0 2-.897 2-2s-.897-2-2-2s-2 .897-2 2s.897 2 2 2m0-3a1.001 1.001 0 1 1-1 1c0-.551.448-1 1-1"/><path d="M4.5 25h23a.5.5 0 0 0 .5-.5v-20a.5.5 0 0 0-.5-.5h-23a.5.5 0 0 0-.5.5v20a.5.5 0 0 0 .5.5m.5-1v-5.638c.022-.016.047-.025.067-.045l5.116-5.116a.704.704 0 0 1 .972 0l7.521 7.521a.498.498 0 0 0 .699.008l3.866-3.672a.684.684 0 0 1 .957-.015L27 20.095l.001.001V24zM27 5v13.618l-2.081-2.266a1.67 1.67 0 0 0-1.191-.495h-.001a1.67 1.67 0 0 0-1.185.486l-3.504 3.328l-7.176-7.177c-.639-.638-1.749-.637-2.386 0L5 16.971V5z"/></g></svg>
                        </div>
                        <div class="custom-file-input">
                            <input class="form-control" type="file" id="formFile">
                            <label for="formFile" class="file-label">Choose file</label>
                            <span class="file-name" id="fileName">No file chosen</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    <script>
        document.getElementById('formFile').addEventListener('change', function() {
  var fileName = this.files.length ? this.files[0].name : '';
  document.getElementById('fileName').textContent = fileName;
});

    </script>
  </body>
</html>