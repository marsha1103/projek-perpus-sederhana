@include('admin.header')

<body>
    <!-- Sidenav -->
    @include('admin.sidebar')
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        {{-- @include('admin.navbar') --}}
        <!-- Header -->
        <!-- Header -->
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">Tables</h6>
                            {{-- <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">Tables</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tables</li>
                                </ol>
                            </nav> --}}
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                            <a href="{{ route('p.create') }}" class="btn btn-sm btn-neutral">Tambah Data</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h3 class="mb-0">Data Pengunjung</h3>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name">Id</th>
                                        <th scope="col" class="sort" data-sort="budget">Nama</th>
                                        <th scope="col" class="sort" data-sort="budget">IdLibray</th>
                                        <th scope="col" class="sort" data-sort="budget">Password</th>
                                        <th scope="col" class="sort" data-sort="budget">Email</th>
                                        <th scope="col" class="sort" data-sort="completion">Action</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach ($pengunjungs as $pengunjung)
                                        <tr>
                                            <td class="budget">
                                                {{ $pengunjung->id }}
                                            </td>
                                            <td class="budget">
                                                {{ $pengunjung->nama }}
                                            </td>
                                            <td class="budget">
                                               {{ $pengunjung->idLibrary }}
                                           </td>
                                           <td class="budget">
                                            {{ $pengunjung->password }}
                                        </td>
                                            <td class="budget">
                                                {{ $pengunjung->email }}
                                            </td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#"
                                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <form class="dropdown-item"
                                                            action="{{ route('p.edit', $pengunjung->id) }}" method="GET">
                                                            <button type="submit"
                                                                class="btn btn-primary">Edit</button>
                                                        </form>
                                                        <form class="dropdown-item"
                                                            action="{{ route('p.destroy', $pengunjung->id) }}"
                                                            method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer py-4">
                            <nav aria-label="...">
                                <ul class="pagination justify-content-end mb-0">
                                    <li class="page-item disabled">
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Argon Scripts -->
        <!-- Core -->
        @include('admin.foot')
</body>

</html>
