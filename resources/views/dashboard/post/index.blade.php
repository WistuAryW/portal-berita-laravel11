@extends('dashboard.main')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col mt-2 justify-content-start">
                    <h6 class="m-0 font-weight-bold text-dark">Data Artikel</h6>
                </div>
                <div class="col d-flex justify-content-end">
                    <div class="row ">
                        <div class="col-md-7">
                            <div class="default-select " id="default-select">
                                <select class="px-1 py-2" name="categorie_id" id="categorie_id">
                                    <option value="">Pilih Categori</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}"
                                            {{ request('categorie_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <a class="btn btn-dark" href="{{ url('create-post') }}">Tambah</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="bg-dark text-white">
                            <th>No</th>
                            <th width="20%">Judul</th>
                            <th>Konten</th>
                            <th>Categori</th>
                            <th>Views</th>
                            <th>comment</th>
                            <th>Pilihan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{!! Str::limit(strip_tags($post->title), 20) !!}</td>
                                <td>{!! Str::limit(strip_tags($post->content), 20) !!}</td> {{-- Batasi Panjang Konten --}}
                                <td>{{ $post->categorie->name }}</td>
                                <td>{{ $post->views }}</td>
                                <td>{{ $post->comments_count }}</td>
                                <td>{{ $post->editor_choice ? 'Yes' : 'No' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Detail</a>
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                        id="delete-form-{{ $post->id }}" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="confirmDelete({{ $post->id }})"
                                            class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $posts->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const categorieSelect = document.getElementById('categorie_id');
            categorieSelect.addEventListener('change', function() {
                const selectedCategorieId = this.value;
                const url = new URL(window.location.href);
                if (selectedCategorieId) {
                    url.searchParams.set('categorie_id', selectedCategorieId);
                } else {
                    url.searchParams.delete('categorie_id');
                }
                window.location.href = url.toString();
            });
        });
    </script>
@endsection
