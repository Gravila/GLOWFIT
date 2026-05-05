// ================= NAV SEARCH =================
const searchToggle = document.getElementById("searchToggle");
const navSearchBox = document.querySelector(".nav-search");
const navSearch = document.getElementById("navSearch");

if (searchToggle && navSearch) {
  searchToggle.addEventListener("click", () => {
    navSearchBox.classList.toggle("active");
    navSearch.focus();
  });
}

// ================= DATA =================
let members = JSON.parse(localStorage.getItem("members")) || [];
let editIndex = null;

// ================= ELEMENT =================
const form = document.getElementById("memberForm");
const tableBody = document.getElementById("tableBody");
const searchInput = document.getElementById("search");
const filterSelect = document.getElementById("filter");

// Elemen form (hanya ada di halaman member)
const nama = document.getElementById("nama");
const email = document.getElementById("emailmember");
const hp = document.getElementById("noHP");
const usia = document.getElementById("usiamember");
const layanan = document.getElementById("layanan");
const tanggal = document.getElementById("tanggal");
const harga = document.getElementById("harga");
const durasiSelect = document.getElementById("durasi");

// ================= AUTO HARGA =================
const hargaPaket = { Basic: 100000, Premium: 200000, VIP: 350000 };

if (layanan && durasiSelect) {
  layanan.addEventListener("change", updateHarga);
  durasiSelect.addEventListener("change", updateHarga);
}

function updateHarga() {
  if (!layanan || !durasiSelect || !harga) return;
  const paket = layanan.value;
  const durasi = durasiSelect.value;
  if (!paket || !durasi) { harga.value = ""; return; }
  harga.value = hargaPaket[paket] * parseInt(durasi);
}

// ================= RENDER TABLE =================
const render = () => {
  if (!tableBody) return;

  const keyword = searchInput ? searchInput.value.toLowerCase() : "";
  const filter = filterSelect ? filterSelect.value : "";

  tableBody.innerHTML = "";

  const filtered = members
    .map((m, i) => ({ ...m, index: i }))
    .filter(m =>
      (m.nama.toLowerCase().includes(keyword) || m.kode.toLowerCase().includes(keyword)) &&
      (filter === "" || m.layanan === filter)
    );

  filtered.forEach(m => {
    const isIndexPage = !document.getElementById("memberForm");
    if (isIndexPage) {
      tableBody.innerHTML += `
        <tr>
          <td>${m.kode}</td><td>${m.nama}</td><td>${m.layanan}</td>
          <td>${m.tanggal}</td><td>Rp ${Number(m.harga).toLocaleString()}</td>
          <td><button data-action="delete" data-index="${m.index}">Hapus</button></td>
        </tr>`;
    } else {
      tableBody.innerHTML += `
        <tr>
          <td>${m.kode}</td><td>${m.nama}</td><td>${m.email}</td><td>${m.hp}</td>
          <td>${m.usia}</td><td>${m.layanan}</td><td>${m.tanggal}</td>
          <td>Rp ${Number(m.harga).toLocaleString()}</td><td>${m.durasi} Bln</td>
          <td>
            <button data-action="edit" data-index="${m.index}">Edit</button>
            <button data-action="delete" data-index="${m.index}">Hapus</button>
          </td>
        </tr>`;
    }
  });
  updateStats();
};

// ================= STATISTIK =================
const updateStats = () => {
  const totalEl = document.getElementById("total");
  const stokEl = document.getElementById("stok");

  if (totalEl) totalEl.textContent = members.length;

  if (stokEl) {
    const count = members.reduce((acc, m) => {
      acc[m.layanan] = (acc[m.layanan] || 0) + 1;
      return acc;
    }, {});
    stokEl.innerHTML = Object.entries(count).map(([k, v]) => `${k}: ${v}`).join("<br>");
  }
};

// ================= SUBMIT, EDIT, DELETE =================
if (form) {
  form.addEventListener("submit", (e) => {
    e.preventDefault();
    // Tambahkan fungsi validate() dan generateKode() milikmu di sini
    const data = {
      kode: editIndex === null ? "GF" + Math.floor(1000 + Math.random() * 9000) : members[editIndex].kode,
      nama: nama.value, email: email.value, hp: hp.value,
      usia: usia.value, layanan: layanan.value, durasi: durasiSelect.value,
      tanggal: tanggal.value, harga: harga.value
    };
    if (editIndex !== null) { members[editIndex] = data; editIndex = null; }
    else { members.push(data); }
    localStorage.setItem("members", JSON.stringify(members));
    form.reset(); render();
  });
}

if (tableBody) {
  tableBody.addEventListener("click", (e) => {
    const { index, action } = e.target.dataset;
    if (!action) return;
    if (action === "delete" && confirm("Hapus data?")) {
      members.splice(index, 1);
      localStorage.setItem("members", JSON.stringify(members));
      render();
    } else if (action === "edit" && nama) {
      const m = members[index];
      nama.value = m.nama; email.value = m.email; // ...dst mengisi form
      editIndex = index;
    }
  });
}

// ================= SEARCH & NAV =================
if (searchInput) searchInput.addEventListener("input", render);
if (filterSelect) filterSelect.addEventListener("change", render);
if (navSearch) {
  navSearch.addEventListener("input", () => {
    if (searchInput) searchInput.value = navSearch.value;
    render();
  });
}

render();