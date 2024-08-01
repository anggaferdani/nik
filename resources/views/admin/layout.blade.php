<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="page" data-page="admin">
  <title>SAT Station</title>
  <!-- General CSS Files -->
   <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css')}}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/modules/jquery-selectric/selectric.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css')}}">
  <link rel="stylesheet" href="{{ asset('image-uploader/dist/image-uploader.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="{{ asset('assets/modules/izitoast/css/iziToast.min.css')}}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css')}}">
  <script src="{{ asset('image-uploader/src/image-uploader.js')}}"></script>

<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>

<!-- /END GA --></head>
<style>
  #preview img{
    box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
  }
  ::-webkit-resizer{
    display: none;
  }
  .modal-backdrop{
    display: none;
  }
  .modal{
    background: rgba(0, 0, 0, 0.5); 
  }
</style>
<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
     @include('admin.navbar')

      @include('admin.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          @yield('content')
        </section>
          @yield('modal')
      </div>
     @include('admin.footer')
    </div>
  </div>


  <!-- General JS Scripts -->
   <script src="{{ asset('assets/modules/jquery.min.js')}}"></script>
   <script src="{{ asset('assets/modules/popper.js')}}"></script>
   <script src="{{ asset('assets/modules/tooltip.js')}}"></script>
   <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
   <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
   <script src="{{ asset('assets/modules/moment.min.js')}}"></script>
   <script src="{{ asset('assets/js/stisla.js')}}"></script>


   <!-- JS Libraies -->
   <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js')}}"></script>
   <script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js')}}"></script>
  <script src="{{ asset('assets/modules/datatables/datatables.min.js')}}"></script>
   <script src="{{ asset('assets/modules/summernote/summernote-bs4.js')}}"></script>
   <script src="{{ asset('assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js')}}"></script>
   <script src="{{ asset('assets/modules/izitoast/js/iziToast.min.js')}}"></script>


   <!-- Page Specific JS File -->
   <script src="{{ asset('assets/js/page/forms-advanced-forms.js')}}"></script>
   <script src="{{ asset('assets/js/page/features-post-create.js')}}"></script>
   <script src="{{ asset('assets/js/page/modules-toastr.js')}}"></script>

   <!-- Template JS File -->
   <script src="{{ asset('assets/js/scripts.js')}}"></script>
   <script src="{{ asset('assets/js/custom.js')}}"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.5/sweetalert2.all.js" integrity="sha512-AINSNy+d2WG9ts1uJvi8LZS42S8DT52ceWey5shLQ9ArCmIFVi84nXNrvWyJ6bJ+qIb1MnXR46+A4ic/AUcizQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <script type="text/javascript">
    $('.delete').click(function(){
      Swal.fire({
        title: "Are you sure?",
        text: "Are you sure you want to delete this?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it",
        closeOnConfirm: false
      }).then((result) => {
        if(result.isConfirmed){
          $(this).closest("form").submit();
        }
      });
    });
  </script>

<script>
  $('.verify').click(function(event){
    event.preventDefault();
    var deleteUrl = $(this).attr('href');
    Swal.fire({
      title: "Apakah anda yakin?",
      text: "Apakah anda yakin ingin memverifikasi order ini?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes",
      closeOnConfirm: false
    }).then((result) => {
      if(result.isConfirmed){
          window.location.href = deleteUrl;
      }
    });
  });
</script>

  <script type="text/javascript">
    function formatNumber(input){
      var num = input.value.replace(/[^0-9]/g, '');

      var formattedNum = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(num);
      input.value = formattedNum;
    }
  </script>

   @if (Session::has('success'))
      <script>
          iziToast.success({
            title: 'Notifikasi',
            message: "{{Session::get('success')}}",
            position: 'topRight'
          });
      </script>
    @endif
   @if (Session::has('error'))
      <script>
          iziToast.error({
            title: 'Ada Kesalahan',
            message: "{{Session::get('error')}}",
            position: 'topRight'
          });
      </script>
    @endif
   @if (Session::has('warning'))
      <script>
          swal ( "Oops" ,  "{{Session::get('warning')}}" ,  "warning" )
      </script>
    @endif
   <script>
     $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
   </script>
</body>
</html>
