document.addEventListener('DOMContentLoaded', function() {
    
    const formAnggota = document.getElementById('form-tambah-anggota');
    
    if (formAnggota) {
        // Tambahkan ID 'form-tambah-anggota' ke elemen <form> Anda di view createAnggota.php
        formAnggota.addEventListener('submit', function(event) {
            
            let isValid = true;
            
            const namaDepan = document.getElementById('nama_depan');
            const errorNamaDepan = document.getElementById('error-nama-depan');
            
            if (namaDepan.value.trim() === '') {
                errorNamaDepan.textContent = 'Nama Depan wajib diisi.';
                namaDepan.classList.add('is-invalid'); // Kelas dari Bootstrap/CSS Framework
                isValid = false;
            } else if (!/^[a-zA-Z\s]+$/.test(namaDepan.value)) {
                errorNamaDepan.textContent = 'Nama Depan hanya boleh mengandung huruf.';
                namaDepan.classList.add('is-invalid');
                isValid = false;
            } else {
                errorNamaDepan.textContent = '';
                namaDepan.classList.remove('is-invalid');
            }

            const statusKawin = document.getElementById('status_pernikahan');
            const errorStatusKawin = document.getElementById('error-status-kawin');

            if (statusKawin.value === '') {
                errorStatusKawin.textContent = 'Status Pernikahan wajib dipilih.';
                statusKawin.classList.add('is-invalid');
                isValid = false;
            } else {
                errorStatusKawin.textContent = '';
                statusKawin.classList.remove('is-invalid');
            }

            if (!isValid) {
                event.preventDefault(); // Mencegah form terkirim jika tidak valid
                alert('Terdapat kesalahan input. Silakan periksa kembali formulir.');
            }
        });
    }

    // Gunakan fungsionalitas ini pada halaman input komponen gaji jika diperlukan
    const addButton = document.getElementById('add-row-komponen');
    const tableBody = document.getElementById('komponen-gaji-body');
    let rowCounter = 1;

    if (addButton && tableBody) {
        addButton.addEventListener('click', function() {
            rowCounter++;
            const newRow = tableBody.insertRow();
            
            // Asumsikan struktur tabel: Nama Komponen, Kategori, Nominal, Aksi
            newRow.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap">${rowCounter}</td>
                <td class="px-6 py-4"><input type="text" name="nama_komponen[]" class="form-control" required></td>
                <td class="px-6 py-4">
                    <select name="kategori[]" class="form-control" required>
                        <option value="Tunjangan">Tunjangan</option>
                        <option value="Gaji Pokok">Gaji Pokok</option>
                    </select>
                </td>
                <td class="px-6 py-4"><input type="number" name="nominal[]" class="form-control" required></td>
                <td class="px-6 py-4">
                    <button type="button" class="btn btn-sm btn-danger remove-row">Hapus</button>
                </td>
            `;
            
            // Tambahkan event listener untuk tombol hapus di baris baru
            newRow.querySelector('.remove-row').addEventListener('click', function() {
                newRow.remove();
            });
        });
    }
    
    // --- 3. Manipulasi Elemen Halaman (Contoh: Menghitung THP Dinamis) ---
    // Simulasi: Saat anggota dipilih di halaman createPenggajian, hitung THP sementara
    const selectAnggota = document.getElementById('id_anggota');
    const thpDisplay = document.createElement('p'); // Elemen baru untuk menampilkan THP
    
    if (selectAnggota) {
        thpDisplay.id = 'thp-preview';
        thpDisplay.classList.add('mt-3', 'font-bold', 'text-lg');
        selectAnggota.parentNode.appendChild(thpDisplay); // Sisipkan di bawah dropdown

        selectAnggota.addEventListener('change', function() {
            const id = this.value;
            const jabatan = this.options[this.selectedIndex].text.match(/\(([^)]+)\)/);
            
            if (id) {
                // Dalam aplikasi nyata, ini adalah panggilan AJAX ke Controller (misalnya ke Penggajian::hitungTakeHomePay)
                // Karena kita tidak bisa melakukan AJAX di sini, kita gunakan simulasi
                
                let gajiPokokSimulasi = 0;
                let tunjanganSimulasi = 0;
                
                if (jabatan && jabatan[1].toLowerCase() === 'ketua') {
                    gajiPokokSimulasi = 30000000;
                    tunjanganSimulasi = 15000000;
                } else if (jabatan && jabatan[1].toLowerCase().includes('wakil')) {
                    gajiPokokSimulasi = 25000000;
                    tunjanganSimulasi = 10000000;
                } else {
                    gajiPokokSimulasi = 20000000;
                    tunjanganSimulasi = 5000000;
                }
                
                const totalTHP = gajiPokokSimulasi + tunjanganSimulasi;
                
                thpDisplay.innerHTML = `
                    **Simulasi THP:** Rp ${totalTHP.toLocaleString('id-ID')} 
                    <span class="text-sm font-normal text-gray-500">(Gaji Pokok + Tunjangan)</span>
                `;
            } else {
                thpDisplay.textContent = '';
            }
        });
    }

});