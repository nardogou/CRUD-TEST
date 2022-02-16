<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('companies.create') }}" class="btn btn-md btn-success mb-3">TAMBAH</a>
                        <a href="{{ route ('dashboard')}}" class="btn btn-md btn-success mb-3">Home</a>
<<<<<<< HEAD
                        <div class="row justify-content-end">
                                <form action="/companies"class="d-flex">
                            <div class="input-group ml-auto mb-2 "></div>
                                <input type="text" class="form-control mr-2 border-2" placeholder="Search.." name="search" 
                                value="{{request('search')}}">
                                <button class="btn btn-danger mb-3" type="submit">Search</button>
                            </div>
                             </form>
=======
>>>>>>> f9fbe03a5918e558779e2d7943fbf46d4f44b510
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Website</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($companies as $companie)
                                <tr>
<<<<<<< HEAD
                                    <td>{{ $companie->count() * ($companie->currentPage - 0) + $loop->iteration}}</td>
=======
                                    <td>{{$companie->id}}</td>
>>>>>>> f9fbe03a5918e558779e2d7943fbf46d4f44b510
                                    <td>{!! $companie->name !!}</td>
                                    <td>{{ $companie->email }}</td>
                                    <td class="text-center">
                                    <img src="{{ Storage::url('public/').$companie->logo }}" class="rounded" style="width: 100px"><td>
                                    {!! $companie->website !!}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route("companies.destroy", $companie->id) }}" method="POST">
                                            <a href="{{ route("companies.edit", $companie->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
<<<<<<< HEAD
                          <div class="d-flex justify-content-end">
                            {{ $companies->links() }}
                            </div>
=======
                          {{ $companies->links() }}
                    </div>
>>>>>>> f9fbe03a5918e558779e2d7943fbf46d4f44b510
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

</body>
</html>