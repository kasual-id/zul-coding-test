<!DOCTYPE html>
<html lang="id">
    <head>
        <title>Coding Test Zulkhaery (Tech Lead)</title>
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
        <script src="/js/jquery-3.6.0.min.js"></script>
        <script src="/js/bootstrap.bundle.min.js"></script>
        <style>
          .table-hover tbody tr:hover td {
              background:#f5f3cb;
          }
        </style>
    </head>
    <body class="bg-dark">
        <div class="container bg-light rounded mt-2">
            <div class="row p-2 pt-4">
                <div class="col-6">
                    <a href="/"><img src="/images/kasual.png" style="width:200px" /></a>
                </div>
                <div class="col-6">
                  <h1 class="lead float-right">Coding Challenge :<br />Zulkhaery (Tech Lead)</h1>
                </div>
            </div>
            <div class="row p-2 pt-5">
            @if (session('status'))
            <div class="col-12">
              <div class="alert alert-success">
                  {{ session('status') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            </div>
            @endif
                <div class="col-12">
                    <div class="row">
                      <div class="col-4">
                          <form action="search">
                          <input class="form-control col-9 d-inline" name="keyword" placeholder="Cari (no, first name, ...etc)" value="{{ $_GET['keyword'] ?? '' }}" />
                          <button type="submit" class="btn btn-secondary col-3 float-right d-inline">GO</button>
                          </form>
                        </div>
                        <div class="col-2">
                          @if(last(request()->segments()) == 'search')
                          <a href="/" class="d-inline-block text-danger mt-2"><i class="bi bi-arrow-left"></i> Kembali</a>
                          @endif
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#insertModal"><i class="bi bi-plus-lg"></i> Tambah Data</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-4">
            @yield('content')
            </div>
        </div>
        <div class="container p-0 text-light">
            &copy; 2022 Kasual.id
        </div>
    @include('modals.edit')
    @include('modals.delete')
    @include('modals.insert')
    </body>
</html>