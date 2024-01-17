@extends('layouts.template.Template')
@section('title')
    Project
@endsection
@section('content')
    <style>
        .hidden {
            display: none;
        }

        /* CSS */
        .search-icon {
            cursor: pointer;
        }

        .search-icon:hover {
            background-color: #e9ecef;
            /* Warna latar belakang saat dihover */
        }

        img {
            max-width: 100px;
            max-height: 100px;
            margin: 5px;
        }

        .gallery-container {
            display: flex;
            flex-wrap: nowrap;
            /* Ensures that the images won't wrap to the next line */
        }

        .gallery-image {
            max-width: 100px;
            max-height: 100px;
            margin-right: 5px;
            /* Adjust margin as needed */
        }
    </style>
    <div class="row" id="project">
        <loading :active.sync="loading" :color="'#0074e4'" :loader="spinner" :height="70"
            :width="70" :can-cancel="true" :can-cancel="true" :is-full-page="true"></loading>
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="row mx-2 mt-3">
                    <div class="col-lg-6 col-12 d-flex align-items-center">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Filter nama" v-model="search">
                            <div class="input-group-append">
                                <span class="input-group-text search-icon" @click="loadData">
                                    <i class="bi bi-search"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12 d-flex justify-content-end">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Create
                        </button>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">No</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Nama</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Stack</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Link</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Foto</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Action</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="loading">
                                    <td colspan="15" class="text-center text-muted mt-3">
                                        <p>Loading...</p>
                                    </td>
                                </tr>
                                <template v-else>
                                    <tr v-if="datas.length > 0" class="col-md-4 mt-4" v-for="(data, index) in datas"
                                        :key="datas.id">
                                        <td>@{{ calculateId(index) }} </td>
                                        <td>@{{ data.nama }}</td>
                                        <td>@{{ data.stack }}</td>
                                        <td>@{{ data.link }}</td>
                                        <td><img :src="data.foto" alt="image"></td>
                                        <!-- <td>@{{ data.password_value }}</td> -->
                                        <td>
                                            <button class="btn btn-danger mx-2" @click="deleteProject(data.id)">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                            <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal"
                                                @click="editProject(data)" data-bs-target="#editModal">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr v-else>
                                        <td colspan="15" class="text-center text-muted mt-3">
                                            <p>Data Not Found</p>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div v-if="datas.length > 0" class="row mx-2">
                    <div class="col-1 col-md-1">
                        <!-- Elemen di pojok kiri -->
                        <select v-model="perPage" style="width: 100%" @change="loadData" class="form-control">
                            <option value="10" selected>10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                    <!-- Elemen di pojok kanan -->
                    <div class="col-11 col-md-11 d-flex justify-content-end">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li v-if="currentPage > 1" :class="{ disabled: currentPage === 1 }">
                                    <a class="page-link" @click="filter(currentPage - 1)" href="#">
                                        Sebelumnya
                                    </a>
                                </li>
                                <li class="page-item" v-for="i in displayLink" :key="i"
                                    :class="{ active: currentPage === i, hidden: i === totalPages }">
                                    <a class="page-link" @click="filter(i)" href="#">
                                        @{{ i }}
                                    </a>
                                </li>
                                <li class="page-item" :class="{ active: currentPage === totalPages }">
                                    <a class="page-link" @click="filter(totalPages)" href="#">
                                        @{{ totalPages }}
                                    </a>
                                </li>
                                <li v-if="currentPage < totalPages" :class="{ disabled: currentPage === totalPages }">
                                    <a class="page-link" @click="filter(currentPage + 1)" href="#">
                                        Selanjutnya
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
            data-bs-backdrop="static" data-bs-keyboard="false" ref="userModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Create User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" v-model="formData.nama"
                                placeholder="Masukan Title">
                            <p class="text-danger" v-if="formErrors.nama">
                                @{{ formErrors.nama[0] }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Stack</label>
                            <input type="text" class="form-control" v-model="formData.stack"
                                placeholder="Masukan Stack">
                            <p class="text-danger" v-if="formErrors.stack">
                                @{{ formErrors.stack[0] }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Link</label>
                            <input type="text" class="form-control" v-model="formData.link"
                                placeholder="Masukan Link">
                            <p class="text-danger" v-if="formErrors.link">
                                @{{ formErrors.link[0] }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Foto</label>
                            <input type="file" class="form-control" @change="galeryFunction" />
                            <img v-if="formData.foto" v-bind:src="formData.foto" class="form-control"
                                alt="Image Preview">
                            <p class="text-danger" v-if="formErrors.foto">
                                @{{ formErrors.foto[0] }}
                            </p>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" @click="submitForm">Create</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Edit -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true"
            data-bs-backdrop="static" data-bs-keyboard="false" ref="editProjectModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editModalLabel">Edit Project</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form Edit -->
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control"v-model="editFormData.nama"
                                placeholder="Masukan Nama">
                            <p class="text-danger" v-if="editFormErrors.nama">
                                @{{ editFormErrors.nama[0] }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Stank</label>
                            <input type="text" class="form-control"v-model="editFormData.stack"
                                placeholder="Masukan Stack">
                            <p class="text-danger" v-if="editFormErrors.stack">
                                @{{ editFormErrors.stack[0] }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Link</label>
                            <input type="text" class="form-control"v-model="editFormData.link"
                                placeholder="Masukan Link">
                            <p class="text-danger" v-if="editFormErrors.link">
                                @{{ editFormErrors.link[0] }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Foto</label>
                            <input type="file" class="form-control" @change="galeryFunctionEdit" />
                            <img v-if="editFormData.foto" v-bind:src="editFormData.foto" class="form-control"
                                alt="Image Preview">
                            <p class="text-danger" v-if="editFormErrors.foto">
                                @{{ editFormErrors.foto[0] }}
                            </p>
                        </div>
                        <!-- End Form Edit -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" @click="updateProject">Update</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('vue')
    <script src="{{ asset('vue.js') }}"></script>
    <script src="{{ asset('axios.js') }}"></script>
    <script src="{{ asset('alert.js') }}"></script>
    <script src="{{ asset('overlay.js') }}"></script>
    <link href="{{ asset('overlay.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.0/papaparse.min.js"></script>
    <script>
        var app = Vue.createApp({
            data() {
                return {
                    datas: [],
                    link: [],
                    search: '',
                    currentPage: 1,
                    totalPages: 1,
                    perPage: 10,
                    token: '{{ csrf_token() }}',
                    loading: false,
                    formData: {
                        nama: '',
                        link: '',
                        stack: '',
                        foto: '',
                    },
                    editFormData: {
                        nama: '',
                        link: '',
                        stack: '',
                        foto: '',
                    },
                    formErrors: {},
                    editingProjectId: null,
                    editFormErrors: {},
                };
            },
            mounted() {
                this.loadData();
            },
            methods: {
                convertToBase64(file) {
                    return new Promise((resolve) => {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            resolve(e.target.result);
                        };
                        reader.readAsDataURL(file);
                    });
                },
                galeryFunction(event) {
                    const file = event.target.files[0];
                    if (file) {
                        this.convertToBase64(file).then((base64) => {
                            this.formData.foto = base64;
                        });
                    } else {
                        this.formData.foto = null;
                    }
                },
                galeryFunctionEdit(event) {
                    const file = event.target.files[0];
                    if (file) {
                        this.convertToBase64(file).then((base64) => {
                            this.editFormData.foto = base64;
                        });
                    } else {
                        this.editFormData.foto = null;
                    }
                },
                editProject(data) {
                    this.editingProjectId = data.id;
                    this.editFormData = {
                        nama: data.nama,
                        link: data.link,
                        stack: data.stack,
                        foto: data.foto,
                    };
                },
                updateProject() {
                    // Clear previous errors
                    this.editFormErrors = {};

                    // Send data to the backend using Axios
                    axios.put('{{ url('project') }}', {
                            id: this.editingProjectId,
                            ...this.editFormData,
                        })
                        .then(response => {
                            // Handle success response
                            setTimeout(() => {
                                Swal.fire({
                                    title: 'Success',
                                    text: response.data.message,
                                    icon: 'success'
                                });
                            }, 600);

                            // Reset form data
                            this.editFormData = {
                                nama: '',
                                link: '',
                                stack: '',
                                foto: '',
                            };


                            $('#editModal').modal('hide');
                            // Refresh data after update
                            this.loadData();
                        })
                        .catch(error => {
                            // Handle error response
                            if (error.response && error.response.status === 422) {
                                // Validation error response from the server
                                this.editFormErrors = error.response.data.errors;
                            } else {
                                console.error(error);
                                Swal.fire({
                                    title: 'Oops...',
                                    text: 'An error occurred while updating the user.',
                                    icon: 'error'
                                });
                            }
                        });
                },
                submitForm() {
                    // Clear previous errors
                    this.formErrors = {};

                    // Send data to the backend using Axios
                    axios.post('{{ url('project') }}', this.formData)
                        .then(response => {
                            // Handle success response
                            setTimeout(() => {
                                Swal.fire({
                                    title: 'Success',
                                    text: response.data.message,
                                    icon: 'success'
                                });
                            }, 600);
                            this.loadData()
                            // Reset form data
                            this.formData = {
                                nama: '',
                                link: '',
                                stack: '',
                                foto: '',
                            };
                            $('#exampleModal').modal('hide');
                        })
                        .catch(error => {
                            // Handle error response
                            if (error.response && error.response.status === 422) {
                                // Validation error response from the server
                                this.formErrors = error.response.data.errors;
                            } else {
                                console.error(error);
                                Swal.fire({
                                    title: 'Oops...',
                                    text: 'An error occurred while creating the user.',
                                    icon: 'error'
                                });
                            }
                        });
                },


                setData(data) {
                    this.datas = data.data;
                    this.totalPages = data.last_page;
                    this.link = data.last_page;
                    // console.log(data)
                },
                loadData() {
                    this.loading = true;
                    axios.get("{{ url('project/getData') }}?page=" +
                            this.currentPage +
                            "&perPage=" +
                            this.perPage +
                            "&search=" +
                            this.search
                        )
                        .then((response) => {
                            const currentPageBeforeFilter = this.currentPage;

                            // Simpan halaman saat ini sebelum filter
                            this.setData(response.data);

                            // Jika hanya ada satu halaman setelah filter, pindah ke halaman terakhir yang berisi data
                            if (response.data.last_page === 1) {
                                this.currentPage = response.data.last_page;
                            } else {
                                // Jika tidak, periksa apakah halaman saat ini masih valid
                                if (this.currentPage > response.data.last_page) {
                                    // Jika tidak valid, atur halaman saat ini ke halaman terakhir yang berisi data
                                    this.currentPage = response.data.last_page;
                                }
                            }
                            // Jika halaman sebelum filter berbeda dengan halaman saat ini, perbarui data
                            if (currentPageBeforeFilter !== this.currentPage) {
                                this.loadData();
                            }
                        })
                        .finally(() => {
                            this.loading = false;
                        });
                },
                deleteProject(id) {
                    const options = {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': this.token
                        }
                    };
                    // Menonaktifkan semua tombol "Delete" selain yang sedang diklik
                    Swal.fire({
                        title: "Konfirmasi",
                        text: "Apakah Anda yakin ingin menghapus produk ini?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Ya, Hapus",
                        cancelButtonText: "Tidak",
                    }).then((result) => {
                        // Mengaktifkan kembali semua tombol "Delete" setelah proses selesai
                        if (result.isConfirmed) {
                            axios
                                .delete("{{ url('project') }}/" +
                                    id, options)

                                .then((response) => {
                                    if (response.status === 200) {
                                        // Setelah penghapusan berhasil, periksa jumlah data yang tersisa
                                        if (this.datas.length === 1) {
                                            // Jika hanya ada satu data di halaman paginate, kembali ke halaman sebelumnya atau halaman saat ini - 1
                                            if (currentPageBeforeDelete > 1) {
                                                this.filter(currentPageBeforeDelete - 1);
                                            } else {
                                                this.loadData();
                                            }
                                        } else {
                                            // Jika masih ada data lain di halaman paginate, perbarui data
                                            this.loadData();
                                        }
                                    } else {
                                        Swal.fire("Gagal!", "Gagal menghapus produk.", "error");
                                    }

                                })
                                .finally(() => {

                                    setTimeout(function() {
                                        Swal.fire({
                                            title: "Selamat",
                                            text: "Data anda berhasil dihapus!",
                                            icon: "success"
                                        });
                                    }, 700);
                                })
                                .catch((error) => {
                                    console.error(error);
                                    Swal.fire(
                                        "Error!",
                                        "Terjadi kesalahan saat menghapus produk.",
                                        "error"
                                    );
                                });
                        }
                    });
                },
                loadDataRole() {
                    this.loading = true;
                    axios
                        .get("{{ url('role/dataMaster') }}")
                        .then((response) => {
                            this.setDataRole(response);
                        })
                        .finally(() => {
                            this.loading = false;
                        });
                },
                filter(page) {
                    this.currentPage = page; // Set halaman saat ini
                    this.loadData(); // Memuat data sesuai dengan halaman yang dipilih
                },
                calculateId(index) {
                    return (this.currentPage - 1) * this.perPage + index + 1;
                },
            },
            computed: {
                displayLink() {
                    const displayCount = 5;
                    const middleIndex = Math.ceil(displayCount / 2);
                    let startPage = this.currentPage - middleIndex + 1;
                    startPage = Math.max(1, startPage);

                    let endPage = Math.min(this.totalPages, startPage + displayCount - 1);
                    if (this.totalPages - startPage < middleIndex) {
                        startPage = Math.max(1, startPage - (middleIndex - (this.totalPages - startPage)));
                        endPage = Math.min(this.totalPages, startPage + displayCount - 1);
                    }

                    const links = [];
                    for (let i = startPage; i <= endPage; i++) {
                        links.push(i);
                    }

                    return links;
                }
            },
        });

        app.use(VueLoading.LoadingPlugin);
        app.component('loading', VueLoading.Component);

        const vm = app.mount('#project');

        // vm.simulateLoading();
    </script>
@endsection
