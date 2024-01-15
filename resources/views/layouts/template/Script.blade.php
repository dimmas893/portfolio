   <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
   <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
   <script src="{{ asset('assets/js/app.min.js') }}"></script>
   {{-- <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script> --}}
   <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
   {{-- <script src="{{ asset('assets/js/dashboard.js') }}"></script> --}}
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

   <script src="{{ asset('alert.js') }}"></script>
   @yield('vue')
   <script>
       // Tangkap pesan sukses jika ada
       let successMessage = @json(session('success'));

       // Periksa apakah pesan sukses ada dan tampilkan SweetAlert

       setTimeout(function() {
           if (successMessage) {
               Swal.fire({
                   icon: 'success',
                   title: 'Berhasil!',
                   text: successMessage,
                   showConfirmButton: false,
                   timer: 7000, // Atur durasi tampilan SweetAlert (ms)
               });
           }
       }, 1000);
       let error = @json(session('error'));

       // Periksa apakah pesan sukses ada dan tampilkan SweetAlert

       setTimeout(function() {
           if (error) {
               Swal.fire({
                   icon: 'error',
                   title: 'Berhasil!',
                   text: error,
                   showConfirmButton: false,
                   timer: 7000, // Atur durasi tampilan SweetAlert (ms)
               });
           }
       }, 1000);
   </script>
