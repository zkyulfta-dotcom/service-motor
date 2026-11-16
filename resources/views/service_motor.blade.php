<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BengkelPro — Sistem Manajemen Service Motor</title>
    <!-- Bootstrap 5 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts Plus Jakarta Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f1f5f9;
            color: #1e293b;
            overflow-x: hidden;
        }
        /* Sidebar Styling */
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%);
            color: #f8fafc;
            box-shadow: 4px 0 24px rgba(15, 23, 42, 0.08);
        }
        .brand-logo {
            padding: 1.75rem 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }
        .nav-menu .nav-link {
            color: #94a3b8;
            font-weight: 500;
            font-size: 0.92rem;
            padding: 0.85rem 1.25rem;
            margin: 0.3rem 1rem;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.2s ease;
            text-align: left;
        }
        .nav-menu .nav-link:hover {
            color: #ffffff;
            background-color: rgba(255, 255, 255, 0.06);
        }
        .nav-menu .nav-link.active {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            color: #ffffff;
            font-weight: 600;
            box-shadow: 0 4px 14px rgba(37, 99, 235, 0.4);
        }
        .step-badge {
            width: 24px;
            height: 24px;
            border-radius: 7px;
            background: rgba(255, 255, 255, 0.12);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 700;
        }
        .nav-link.active .step-badge {
            background: rgba(255, 255, 255, 0.25);
        }
        /* Main Content Card */
        .main-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.04);
        }
        .form-label {
            font-size: 0.85rem;
            font-weight: 600;
            color: #475569;
            margin-bottom: 0.45rem;
        }
        .form-control, .form-select {
            border-radius: 12px;
            padding: 0.75rem 1rem;
            font-size: 0.93rem;
            border: 1.5px solid #e2e8f0;
            background-color: #f8fafc;
            transition: all 0.2s ease;
        }
        .form-control:focus, .form-select:focus {
            background-color: #ffffff;
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }
        .radio-card {
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            padding: 0.75rem 1.1rem;
            background-color: #f8fafc;
            cursor: pointer;
            transition: all 0.2s;
            flex: 1;
        }
        .radio-card:has(input:checked) {
            border-color: #2563eb;
            background-color: #eff6ff;
        }
        .btn-submit {
            padding: 0.85rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.95rem;
            letter-spacing: 0.2px;
        }
    </style>
</head>
<body>

<div class="container-fluid p-0">
    <div class="row g-0">
        
        <!-- SIDEBAR NAVIGASI KIRI -->
        <div class="col-lg-3 col-xl-2 sidebar d-flex flex-column">
            <div class="brand-logo d-flex align-items-center gap-3">
                <div class="bg-primary rounded-3 p-2 d-flex align-items-center justify-content-center">
                    <i class="bi bi-wrench-adjustable-circle-fill fs-4 text-white"></i>
                </div>
                <div>
                    <h6 class="mb-0 fw-bold text-white">BengkelPro</h6>
                    <small class="text-secondary" style="font-size: 0.75rem;">Service Management</small>
                </div>
            </div>

            <div class="px-3 pt-4 pb-2">
                <small class="text-uppercase text-secondary fw-bold px-2" style="font-size: 0.7rem; letter-spacing: 1px;">Menu Utama</small>
            </div>

            <div class="nav flex-column nav-pills nav-menu" id="v-pills-tab" role="tablist">
                <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#menu-pelanggan" type="button">
                    <span class="step-badge">1</span> Data Pelanggan
                </button>
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#menu-kendaraan" type="button">
                    <span class="step-badge">2</span> Data Kendaraan
                </button>
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#menu-daftar" type="button">
                    <span class="step-badge">3</span> Daftar Service
                </button>
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#menu-service" type="button">
                    <span class="step-badge">4</span> Data Service
                </button>
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#menu-pembayaran" type="button">
                    <span class="step-badge">5</span> Pembayaran
                </button>
            </div>

            <div class="mt-auto p-4 border-top border-secondary border-opacity-25">
                <div class="d-flex align-items-center gap-2 text-secondary small">
                    <span class="badge bg-success rounded-circle p-1"> </span>
                    <span>API Laravel Terhubung</span>
                </div>
            </div>
        </div>

        <!-- AREA KONTEN UTAMA KANAN -->
        <div class="col-lg-9 col-xl-10 p-4 p-md-5">
            <div class="mx-auto" style="max-width: 780px;">
                
                <!-- Top Info Bar -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h4 class="fw-bold mb-1">Panel Operasional Bengkel</h4>
                        <p class="text-muted small mb-0">Pilih menu di sebelah kiri untuk menginput dan mengelola transaksi service.</p>
                    </div>
                </div>

                <!-- Tab Content (Hanya 1 Form Aktif per Tampilan) -->
                <div class="tab-content" id="v-pills-tabContent">
                    
                    <!-- 1. FORM DATA PELANGGAN -->
                    <div class="tab-pane fade show active" id="menu-pelanggan">
                        <div class="main-card p-4 p-md-5">
                            <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
                                <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-4">
                                    <i class="bi bi-person-plus-fill fs-4"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-1">Data Pelanggan</h5>
                                    <p class="text-muted small mb-0">Registrasi identitas pelanggan baru ke dalam sistem.</p>
                                </div>
                            </div>

                            <form id="formPelanggan">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label class="form-label">Id Pelanggan</label>
                                        <input type="text" class="form-control" id="id_pelanggan" placeholder="Contoh: P001" required>
                                    </div>
                                    <div class="col-md-8">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama_lengkap" placeholder="Masukkan nama lengkap" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">No HP</label>
                                        <input type="text" class="form-control" id="no_hp" placeholder="0812xxxxxxxx" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Pekerjaan</label>
                                        <input type="text" class="form-control" id="pekerjaan" placeholder="Contoh: Mahasiswa / Wiraswasta" required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Alamat Pelanggan</label>
                                        <textarea class="form-control" id="alamat_pelanggan" rows="3" placeholder="Tuliskan alamat lengkap pelanggan..." required></textarea>
                                    </div>
                                </div>
                                <div class="mt-4 pt-2">
                                    <button type="submit" class="btn btn-primary btn-submit w-100">
                                        <i class="bi bi-check-circle me-2"></i>Simpan Data Pelanggan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- 2. FORM DATA KENDARAAN -->
                    <div class="tab-pane fade" id="menu-kendaraan">
                        <div class="main-card p-4 p-md-5">
                            <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
                                <div class="bg-success bg-opacity-10 text-success p-3 rounded-4">
                                    <i class="bi bi-bicycle fs-4"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-1">Data Kendaraan</h5>
                                    <p class="text-muted small mb-0">Input spesifikasi motor pelanggan sesuai dokumen STNK.</p>
                                </div>
                            </div>

                            <form id="formKendaraan">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">No Plat Kendaraan</label>
                                        <input type="text" class="form-control text-uppercase" id="no_plat_kendaraan" placeholder="Contoh: BL 1234 XX" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">No STNK</label>
                                        <input type="text" class="form-control" id="no_stnk" placeholder="Masukkan nomor STNK" required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Jenis Kendaraan</label>
                                        <div class="d-flex flex-column flex-sm-row gap-3">
                                            <label class="radio-card d-flex align-items-center gap-2 mb-0" for="jenisMatic">
                                                <input class="form-check-input mt-0" type="radio" name="jenis_kendaraan" id="jenisMatic" value="Matic" checked>
                                                <span class="fw-semibold small">Matic</span>
                                            </label>
                                            <label class="radio-card d-flex align-items-center gap-2 mb-0" for="jenisManual">
                                                <input class="form-check-input mt-0" type="radio" name="jenis_kendaraan" id="jenisManual" value="Manual Transmisi">
                                                <span class="fw-semibold small">Manual Transmisi</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Tahun Pembuatan Kendaraan</label>
                                        <input type="number" class="form-control" id="tahun_pembuatan" placeholder="Contoh: 2023" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Warna Kendaraan</label>
                                        <input type="text" class="form-control" id="warna_kendaraan" placeholder="Contoh: Hitam Doff" required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Nama Pemilik</label>
                                        <input type="text" class="form-control" id="nama_pemilik" placeholder="Masukkan nama pemilik kendaraan" required>
                                    </div>
                                </div>
                                <div class="mt-4 pt-2">
                                    <button type="submit" class="btn btn-success btn-submit w-100">
                                        <i class="bi bi-check-circle me-2"></i>Simpan Data Kendaraan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- 3. FORM DAFTAR SERVICE -->
                    <div class="tab-pane fade" id="menu-daftar">
                        <div class="main-card p-4 p-md-5">
                            <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
                                <div class="bg-warning bg-opacity-10 text-warning p-3 rounded-4">
                                    <i class="bi bi-clipboard2-plus-fill fs-4"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-1">Daftar Service</h5>
                                    <p class="text-muted small mb-0">Daftarkan antrean servis motor dan catat keluhan awal.</p>
                                </div>
                            </div>

                            <form id="formServicePelanggan">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">No Plat Kendaraan</label>
                                        <select class="form-select" id="selectPlat" required>
                                            <option value="">-- Pilih No Plat --</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Id Pelanggan</label>
                                        <select class="form-select" id="selectPelanggan" required onchange="isiNamaPelanggan(this)">
                                            <option value="">-- Pilih ID Pelanggan --</option>
                                        </select>
                                    </div>
                                    <div class="col-md-7">
                                        <label class="form-label">Nama Pelanggan (Otomatis)</label>
                                        <input type="text" class="form-control bg-secondary bg-opacity-10 fw-semibold" id="namaPelangganAuto" placeholder="Terisi otomatis setelah ID dipilih..." readonly>
                                    </div>
                                    <div class="col-md-5">
                                        <label class="form-label">Tanggal Servis</label>
                                        <input type="date" class="form-control" id="tanggal_servis" required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Keluhan Kendaraan</label>
                                        <textarea class="form-control" id="keluhan_kendaraan" rows="3" placeholder="Tuliskan keluhan motor yang dialami pelanggan..." required></textarea>
                                    </div>
                                </div>
                                <div class="mt-4 pt-2">
                                    <button type="submit" class="btn btn-warning btn-submit w-100 text-dark">
                                        <i class="bi bi-check-circle me-2"></i>Simpan Daftar Service
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- 4. FORM DATA SERVICE -->
                    <div class="tab-pane fade" id="menu-service">
                        <div class="main-card p-4 p-md-5">
                            <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
                                <div class="bg-info bg-opacity-10 text-info p-3 rounded-4">
                                    <i class="bi bi-tools fs-4"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-1">Data Service & Mekanik</h5>
                                    <p class="text-muted small mb-0">Input estimasi waktu pengerjaan, mekanik bertugas, dan sparepart.</p>
                                </div>
                            </div>

                            <form id="formDataService">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label">Id Servis Pelanggan</label>
                                        <select class="form-select" id="selectIdServis" required onchange="ambilKeluhanOtomatis(this.value)">
                                            <option value="">-- Pilih ID Servis Pelanggan --</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Keluhan Kendaraan (Otomatis)</label>
                                        <textarea class="form-control bg-secondary bg-opacity-10 fw-medium" id="autoKeluhan" rows="2" readonly placeholder="Keluhan akan muncul otomatis saat ID servis dipilih..."></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Estimasi Service</label>
                                        <input type="text" class="form-control" id="estimasi_service" placeholder="Contoh: 2 Jam" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Nama Mekanik</label>
                                        <input type="text" class="form-control" id="nama_mekanik" placeholder="Masukkan nama mekanik" required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Sparepart Pengganti</label>
                                        <input type="text" class="form-control" id="sparepart_pengganti" placeholder="Contoh: Oli Mesin, Kampas Rem, V-Belt">
                                    </div>
                                </div>
                                <div class="mt-4 pt-2">
                                    <button type="submit" class="btn btn-info btn-submit w-100 text-dark">
                                        <i class="bi bi-check-circle me-2"></i>Simpan Data Service
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- 5. FORM PEMBAYARAN SERVICE -->
                    <div class="tab-pane fade" id="menu-pembayaran">
                        <div class="main-card p-4 p-md-5">
                            <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
                                <div class="bg-dark bg-opacity-10 text-dark p-3 rounded-4">
                                    <i class="bi bi-wallet2 fs-4"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-1">Pembayaran Service</h5>
                                    <p class="text-muted small mb-0">Selesaikan transaksi dan pilih metode pembayaran pelanggan.</p>
                                </div>
                            </div>

                            <form id="formPembayaran">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label">Id Servis Pelanggan</label>
                                        <select class="form-select" id="selectIdServisBayar" required>
                                            <option value="">-- Pilih ID Servis Pelanggan --</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Jumlah Biaya Servis (Rp)</label>
                                        <input type="number" class="form-control form-control-lg fw-bold" id="jumlah_biaya_servis" placeholder="Contoh: 150000" required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Jenis Pembayaran</label>
                                        <div class="d-flex flex-column flex-sm-row gap-3">
                                            <label class="radio-card d-flex align-items-center gap-2 mb-0" for="bayarCash">
                                                <input class="form-check-input mt-0" type="radio" name="jenis_pembayaran" id="bayarCash" value="Cash / Tunai" checked>
                                                <span class="fw-semibold small">💵 Cash / Tunai</span>
                                            </label>
                                            <label class="radio-card d-flex align-items-center gap-2 mb-0" for="bayarNonCash">
                                                <input class="form-check-input mt-0" type="radio" name="jenis_pembayaran" id="bayarNonCash" value="Non Tunai">
                                                <span class="fw-semibold small">💳 Non Tunai</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 pt-2">
                                    <button type="submit" class="btn btn-dark btn-submit w-100">
                                        <i class="bi bi-check-circle me-2"></i>Simpan Pembayaran Service
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Logika Fetch API -->
<script>
    const baseUrl = "http://127.0.0.1:8000/api";

    document.addEventListener("DOMContentLoaded", () => {
        loadPelangganDropdown();
        loadKendaraanDropdown();
        loadIdServisDropdown();
    });

    let pelangganDataStore = [];
    async function loadPelangganDropdown() {
        try {
            let res = await fetch(`${baseUrl}/pelanggan`);
            let data = await res.json();
            pelangganDataStore = data;
            let select = document.getElementById("selectPelanggan");
            select.innerHTML = '<option value="">-- Pilih ID Pelanggan --</option>';
            data.forEach(item => {
                let opt = document.createElement("option");
                opt.value = item.id_pelanggan;
                opt.textContent = `${item.id_pelanggan} — ${item.nama_lengkap}`;
                select.appendChild(opt);
            });
        } catch (err) { console.error(err); }
    }

    function isiNamaPelanggan(selectObj) {
        let selectedId = selectObj.value;
        let found = pelangganDataStore.find(p => p.id_pelanggan == selectedId);
        document.getElementById("namaPelangganAuto").value = found ? found.nama_lengkap : "";
    }

    async function loadKendaraanDropdown() {
        try {
            let res = await fetch(`${baseUrl}/kendaraan`);
            let data = await res.json();
            let select = document.getElementById("selectPlat");
            select.innerHTML = '<option value="">-- Pilih No Plat --</option>';
            data.forEach(item => {
                let opt = document.createElement("option");
                opt.value = item.no_plat_kendaraan;
                opt.textContent = `${item.no_plat_kendaraan} (${item.nama_pemilik})`;
                select.appendChild(opt);
            });
        } catch (err) { console.error(err); }
    }

    async function loadIdServisDropdown() {
        try {
            let res = await fetch(`${baseUrl}/service-pelanggan`);
            let data = await res.json();
            let select1 = document.getElementById("selectIdServis");
            let select2 = document.getElementById("selectIdServisBayar");
            
            select1.innerHTML = '<option value="">-- Pilih ID Servis Pelanggan --</option>';
            select2.innerHTML = '<option value="">-- Pilih ID Servis Pelanggan --</option>';

            data.forEach(item => {
                let opt1 = document.createElement("option");
                opt1.value = item.id_servis_pelanggan;
                opt1.textContent = `ID Servis #${item.id_servis_pelanggan} — Plat: ${item.no_plat_kendaraan}`;
                select1.appendChild(opt1.cloneNode(true));
                select2.appendChild(opt1);
            });
        } catch (err) { console.error(err); }
    }

    async function ambilKeluhanOtomatis(idServis) {
        if (!idServis) {
            document.getElementById("autoKeluhan").value = "";
            return;
        }
        try {
            let res = await fetch(`${baseUrl}/service-pelanggan-detail/${idServis}`);
            let data = await res.json();
            document.getElementById("autoKeluhan").value = data.keluhan_kendaraan;
        } catch (err) { console.error(err); }
    }

    // 1. Submit Pelanggan
    document.getElementById("formPelanggan").addEventListener("submit", async (e) => {
        e.preventDefault();
        let payload = {
            id_pelanggan: document.getElementById("id_pelanggan").value,
            nama_lengkap: document.getElementById("nama_lengkap").value,
            no_hp: document.getElementById("no_hp").value,
            alamat_pelanggan: document.getElementById("alamat_pelanggan").value,
            pekerjaan: document.getElementById("pekerjaan").value
        };
        let res = await fetch(`${baseUrl}/pelanggan`, {
            method: "POST",
            headers: { "Content-Type": "application/json", "Accept": "application/json" },
            body: JSON.stringify(payload)
        });
        let result = await res.json();
        alert(result.message || "Data pelanggan berhasil disimpan!");
        if (res.ok) {
            document.getElementById("formPelanggan").reset();
            loadPelangganDropdown();
        }
    });

    // 2. Submit Kendaraan
    document.getElementById("formKendaraan").addEventListener("submit", async (e) => {
        e.preventDefault();
        let payload = {
            no_plat_kendaraan: document.getElementById("no_plat_kendaraan").value,
            jenis_kendaraan: document.querySelector('input[name="jenis_kendaraan"]:checked').value,
            no_stnk: document.getElementById("no_stnk").value,
            tahun_pembuatan: document.getElementById("tahun_pembuatan").value,
            nama_pemilik: document.getElementById("nama_pemilik").value,
            warna_kendaraan: document.getElementById("warna_kendaraan").value
        };
        let res = await fetch(`${baseUrl}/kendaraan`, {
            method: "POST",
            headers: { "Content-Type": "application/json", "Accept": "application/json" },
            body: JSON.stringify(payload)
        });
        let result = await res.json();
        alert(result.message || "Data kendaraan berhasil disimpan!");
        if (res.ok) {
            document.getElementById("formKendaraan").reset();
            loadKendaraanDropdown();
        }
    });

    // 3. Submit Daftar Service
    document.getElementById("formServicePelanggan").addEventListener("submit", async (e) => {
        e.preventDefault();
        let payload = {
            no_plat_kendaraan: document.getElementById("selectPlat").value,
            id_pelanggan: document.getElementById("selectPelanggan").value,
            keluhan_kendaraan: document.getElementById("keluhan_kendaraan").value,
            tanggal_servis: document.getElementById("tanggal_servis").value
        };
        let res = await fetch(`${baseUrl}/service-pelanggan`, {
            method: "POST",
            headers: { "Content-Type": "application/json", "Accept": "application/json" },
            body: JSON.stringify(payload)
        });
        let result = await res.json();
        alert(result.message || "Daftar service berhasil disimpan!");
        if (res.ok) {
            document.getElementById("formServicePelanggan").reset();
            document.getElementById("namaPelangganAuto").value = "";
            loadIdServisDropdown();
        }
    });

    // 4. Submit Data Service
    document.getElementById("formDataService").addEventListener("submit", async (e) => {
        e.preventDefault();
        let payload = {
            id_servis_pelanggan: document.getElementById("selectIdServis").value,
            estimasi_service: document.getElementById("estimasi_service").value,
            nama_mekanik: document.getElementById("nama_mekanik").value,
            sparepart_pengganti: document.getElementById("sparepart_pengganti").value
        };
        let res = await fetch(`${baseUrl}/data-service`, {
            method: "POST",
            headers: { "Content-Type": "application/json", "Accept": "application/json" },
            body: JSON.stringify(payload)
        });
        let result = await res.json();
        alert(result.message || "Data service berhasil disimpan!");
        if (res.ok) {
            document.getElementById("formDataService").reset();
            document.getElementById("autoKeluhan").value = "";
        }
    });

    // 5. Submit Pembayaran Service
    document.getElementById("formPembayaran").addEventListener("submit", async (e) => {
        e.preventDefault();
        let payload = {
            id_servis_pelanggan: document.getElementById("selectIdServisBayar").value,
            jumlah_biaya_servis: document.getElementById("jumlah_biaya_servis").value,
            jenis_pembayaran: document.querySelector('input[name="jenis_pembayaran"]:checked').value
        };
        let res = await fetch(`${baseUrl}/pembayaran-service`, {
            method: "POST",
            headers: { "Content-Type": "application/json", "Accept": "application/json" },
            body: JSON.stringify(payload)
        });
        let result = await res.json();
        alert(result.message || "Pembayaran service berhasil disimpan!");
        if (res.ok) {
            document.getElementById("formPembayaran").reset();
        }
    });
</script>
</body>
</html>