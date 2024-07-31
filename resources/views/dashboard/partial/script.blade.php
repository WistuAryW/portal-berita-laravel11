 <!-- Bootstrap core JavaScript-->
 <script src="admin/vendor/jquery/jquery.min.js"></script>
 <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="admin/js/sb-admin-2.min.js"></script>

 <!-- Page level plugins -->
 <script src="admin/vendor/datatables/jquery.dataTables.min.js"></script>
 <script src="admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

 <!-- Page level custom scripts -->
 <script src="admin/js/demo/datatables-demo.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<script type="text/javascript">
    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda tidak akan bisa mengembalikan data ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            } else {
                // Tindakan ketika pengguna membatalkan penghapusan
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Penghapusan dibatalkan',
                    showConfirmButton: false,
                    timer: 3000
                });
            }
        });
    }
</script>
