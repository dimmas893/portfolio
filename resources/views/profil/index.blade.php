@extends('layouts.template.Template')
@section('title')
    Profil
@endsection
<style>
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
@section('content')
    <div class="row" id="profil">
        <loading :active.sync="loading" :color="'#0074e4'" :loader="spinner" :height="70"
            :width="70" :can-cancel="true" :can-cancel="true" :is-full-page="true"></loading>
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="row mx-2 mt-3">
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Nama</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Github</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Profesi</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Profesi Detail</h6>
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
                                <tr>
                                    <td>@{{ datas.nama }}</td>
                                    <td>@{{ datas.github }}</td>
                                    <td>@{{ datas.profesi }}</td>
                                    <td>@{{ datas.profesi_detail }}</td>
                                    <td><img :src="datas.foto" alt="image"></td>
                                    <td>
                                        <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal"
                                            @click="editUser(datas)" data-bs-target="#editModal">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Edit -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true"
            data-bs-backdrop="static" data-bs-keyboard="false" ref="editUserModal">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editModalLabel">Edit Profil</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" v-model="nama" placeholder="Masukan Nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Profesi</label>
                            <input type="text" class="form-control" v-model="profesi" placeholder="Masukan Profesi">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Profesi Detail</label>
                            <textarea class="form-control" v-model="profesi_detail" cols="30" rows="10">Masukan profesi detail</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Github</label>
                            <input type="text" class="form-control" v-model="github" placeholder="Masukan Github">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Foto</label>
                            <input type="file" class="form-control" @change="galeryFunction" />
                            <img v-if="foto" v-bind:src="foto" class="form-control" alt="Image Preview">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" @click="updateProfil">Update</button>
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
    <script>
        var app = Vue.createApp({
            data() {
                return {
                    datas: {},
                    foto: null,
                    nama: null,
                    github: null,
                    profesi: null,
                    profesi_detail: null,
                    id: null,
                };
            },
            mounted() {
                this.loadData();
            },
            methods: {
                galeryFunction(event) {
                    const file = event.target.files[0];
                    if (file) {
                        this.convertToBase64(file).then((base64) => {
                            this.foto = base64;
                        });
                    } else {
                        this.foto = null;
                    }
                },

                editUser(data) {
                    this.id = data.id;
                    this.nama = data.nama;
                    this.github = data.github;
                    this.profesi = data.profesi;
                    this.profesi_detail = data.profesi_detail;
                    this.foto = data.foto;
                },
                setData(data) {
                    this.datas = data;
                    // this.totalPages = data.last_page;
                    // this.link = data.last_page;
                    // console.log(data)
                },
                loadData() {
                    this.loading = true;
                    axios.get("{{ url('profil/getData') }}")
                        .then((response) => {
                            this.setData(response.data);

                            // console.log(response)
                        })
                        .finally(() => {
                            this.loading = false;
                        });
                },
                convertToBase64(file) {
                    return new Promise((resolve) => {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            resolve(e.target.result);
                        };
                        reader.readAsDataURL(file);
                    });
                },
                updateProfil() {
                    Swal.fire({
                        title: "Konfirmasi",
                        text: "Apakah Anda yakin ingin menyimpan data ini?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Ya",
                        cancelButtonText: "Tidak",
                    }).then((result) => {
                        // Mengaktifkan kembali semua tombol "Delete" setelah proses selesai
                        if (result.isConfirmed) {
                            // Mengirim data ke backend Laravel
                            const formData = {
                                id: this.id,
                                nama: this.nama,
                                github: this.github,
                                profesi: this.profesi,
                                profesi_detail: this.profesi_detail,
                                foto: this.foto,
                            };
                            // Mengirim data ke backend Laravel
                            axios.put(`{{ url('profil') }}/${this.id}`, formData)
                                .then(response => {
                                    setTimeout(() => {
                                        Swal.fire({
                                            title: 'Success',
                                            text: response.data.message,
                                            icon: 'success'
                                        });
                                    }, 600);
                                    // console.log(response)
                                    // Redirect ke halaman dimmas atau lakukan yang lain
                                    // window.location.href = '{{ url('review') }}';
                                    $('#editModal').modal('hide');
                                    this.loadData();
                                })
                                .catch(error => {
                                    console.error(error);
                                });
                        }
                    });
                },

                image(event) {
                    const file = event.target.files[0];
                    if (file) {
                        this.convertToBase64(file).then((base64) => {
                            this.foto = base64;
                        });
                    } else {
                        this.foto = null;
                    }
                },
            },
        });

        const vm = app.mount('#profil');
    </script>
@endsection
