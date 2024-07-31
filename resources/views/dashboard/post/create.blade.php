@extends('dashboard.main')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-dark">Tambah Artikel</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('posts.create') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Judul</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Masukkan Judul Post..">
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="thumbnail" class="form-label">Thumbnail</label>
                                    <input type="file" name="thumbnail" class="form-control" id="thumbnail" multiple>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="form-group mb-3">
                                    <label for="categorie_id">--Pilih Categorie--</label>
                                    <select class="form-control select2" name="categorie_id" id="categorie_id">
                                        <option value="">Pilih Categorie</option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="form-group mb-3">
                                    <label for="sub_categorie_id">--Pilih Sub Categorie--</label>
                                    <select class="form-control select2" name="sub_categorie_id" id="sub_categorie_id">
                                        <option value="">Pilih Sub Categorie</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="texts">Konten</label>
                            <textarea name="texts" class="form-control" id="texts" rows="5" placeholder="Masukkan Konten Post.."></textarea>
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            <a class="btn btn-dark mx-3" href="{{ url('post') }}">Back</a>
                            <button type="submit" class="btn btn-dark">Simpan Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const categorieSelect = document.getElementById('categorie_id');
            const subCategorieSelect = document.getElementById('sub_categorie_id');
            const categories = @json($categories);

            categorieSelect.addEventListener('change', function () {
                const selectedCategorieId = this.value;
                subCategorieSelect.innerHTML = '<option value="">Pilih Sub Categorie</option>';

                if (selectedCategorieId) {
                    const selectedCategory = categories.find(category => category.id == selectedCategorieId);
                    if (selectedCategory && selectedCategory.sub_categories) {
                        selectedCategory.sub_categories.forEach(subCategory => {
                            const option = document.createElement('option');
                            option.value = subCategory.id;
                            option.textContent = subCategory.name;
                            subCategorieSelect.appendChild(option);
                        });
                    }
                }
            });

            // Initialize CKEditor
            CKEDITOR.replace('texts');
        });
    </script>
@endsection
