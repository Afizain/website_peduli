<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-success">

    <div class="container">

        <div class="card my-5 mx-auto" style="max-width: 600px;">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Lengkapi Profile!</h1>
                            </div>
                                <form action="{{ route('profile.update') }}" method="POST" class="user">
                                    @csrf
                                    <div class="form-group">
                                            <input name="nama_lengkap" type="text" class="form-control form-control-user  @error('nama_lengkap')is-invalid @enderror" id="exampleNama" placeholder="Nama Lengkap">
                                        @error('nama_lengkap')
                                        <span class="invalid-feedback">{{ $message}}</span> 
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <input name="perumahan" type="text" class="form-control form-control-user  @error('perumahan')is-invalid @enderror" id="examplePerum" placeholder="Nama Perumahan">
                                        @error('perumahan')
                                        <span class="invalid-feedback">{{ $message}}</span> 
                                        @enderror
                                        </div>

                                        <div class="form-group">
                                            <input name="telp" type="text" class="form-control form-control-user  @error('telp')is-invalid @enderror" id="exampleTelp" placeholder="No. Telpon">
                                        @error('telp')
                                        <span class="invalid-feedback">{{ $message}}</span> 
                                        @enderror
                                        </div> 
                                        <div class="form-group">
                                            <input name="rt" type="text" class="form-control form-control-user  @error('rt')is-invalid @enderror" id="exampleRt" placeholder="RT">
                                        @error('rt')
                                        <span class="invalid-feedback">{{ $message}}</span> 
                                        @enderror
                                        </div> 
                                        <div class="form-group">
                                            <input name="rw" type="text" class="form-control form-control-user  @error('rw')is-invalid @enderror" id="exampleRw" placeholder="RW">
                                        @error('rw')
                                        <span class="invalid-feedback">{{ $message}}</span> 
                                        @enderror
                                        </div>                                   
                                        {{-- @foreach ($data_diri as $row)
                                        <h6 class="m-0 font-weight-bold text-dark">
                                            
                                            {{ $row->profile->no_telp }}
   
                                        @endforeach --}}
                                        <br>
                                        <button type="submit" class="btn btn-success btn-user btn-block">Submit</button>                   
    
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

   
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>