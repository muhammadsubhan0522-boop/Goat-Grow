<?php require_once "../config/koneksi.php"; include "../layout/header.php"; include "../layout/sidebar.php"; ?>
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row align-items-center">
            <div class="col"><div class="page-pretitle">Hardware-in-the-Loop Emulation</div><h2 class="page-title">Virtual ESP32 IoT Telemetry Simulator</h2></div>
            <div class="col-auto"><span id="st" class="badge bg-secondary fs-5 px-3 py-2">DEVICE OFFLINE</span></div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-lg-4">
                <div class="card bg-dark text-white mb-3">
                    <div class="card-header border-secondary"><h3 class="card-title text-white"><i class="ti ti-cpu text-green me-2"></i>ESP32-WROOM-32D</h3></div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label text-light">Skenario Lingkungan Kandang</label>
                            <select id="mode" class="form-select bg-dark text-white border-secondary">
                                <option value="normal">1. Mikroklimat Optimal (26°C - 30°C)</option>
                                <option value="bahaya">2. Cuaca Ekstrem & Amonia Tinggi (Alarm)</option>
                            </select>
                        </div>
                        <button id="bStart" class="btn btn-success w-100 mb-2" onclick="startSim()"><i class="ti ti-player-play me-1"></i> Mulai Simulasi IoT</button>
                        <button id="bStop" class="btn btn-danger w-100" onclick="stopSim()" disabled><i class="ti ti-player-stop me-1"></i> Hentikan Simulasi</button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header"><h3 class="card-title"><i class="ti ti-terminal-2 me-2"></i>ESP32 Serial Monitor</h3></div>
                    <div id="log" class="card-body p-2 bg-dark text-green font-monospace small" style="height:160px;overflow-y:auto;">[READY] ESP32 Virtual Node siap...</div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row row-cards mb-3">
                    <div class="col-4"><div class="card"><div class="card-body"><div class="subheader">Suhu (DHT22)</div><div class="h1 mb-0" id="vS">-- °C</div></div></div></div>
                    <div class="col-4"><div class="card"><div class="card-body"><div class="subheader">Kelembapan</div><div class="h1 mb-0" id="vK">-- %</div></div></div></div>
                    <div class="col-4"><div class="card"><div class="card-body"><div class="subheader">Amonia (MQ-135)</div><div class="h1 mb-0" id="vA">-- ppm</div></div></div></div>
                </div>
                <div class="card"><div class="card-header"><h3 class="card-title">Live Telemetry Stream (Tersimpan ke MySQL)</h3></div><div class="card-body"><canvas id="cSim" height="125"></canvas></div></div>
            </div>
        </div>
    </div>
</div>
<script>
let tm = null;
const ch = new Chart(document.getElementById("cSim"), {
    type: "line",
    data: {
        labels: [],
        datasets: [
            { label: "Suhu (°C)", borderColor: "#d63939", data: [], tension: 0.3 },
            { label: "Kelembapan (%)", borderColor: "#206bc4", data: [], tension: 0.3 },
            { label: "Amonia (ppm)", borderColor: "#f59f00", data: [], tension: 0.3 }
        ]
    }
});
function gen() {
    const m = document.getElementById("mode").value;
    const suhu = (m == "normal" ? Math.random()*4 + 26 : Math.random()*4 + 33).toFixed(1);
    const kelembapan = (m == "normal" ? Math.random()*14 + 60 : Math.random()*8 + 81).toFixed(1);
    const amonia = (m == "normal" ? Math.random()*9 + 8 : Math.random()*10 + 26).toFixed(1);
    document.getElementById("vS").innerText = suhu + " °C";
    document.getElementById("vK").innerText = kelembapan + " %";
    document.getElementById("vA").innerText = amonia + " ppm";

    fetch("../api/simpan_simulasi.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ suhu, kelembapan, amonia })
    }).then(r => r.json()).then(res => {
        const box = document.getElementById("log");
        box.innerHTML += `<div>[${res.waktu}] T:${suhu}C H:${kelembapan}% NH3:${amonia}ppm [${res.status_kandang}]</div>`;
        box.scrollTop = box.scrollHeight;
        if (ch.data.labels.length > 10) { ch.data.labels.shift(); ch.data.datasets.forEach(d => d.data.shift()); }
        ch.data.labels.push(res.waktu);
        ch.data.datasets[0].data.push(suhu);
        ch.data.datasets[1].data.push(kelembapan);
        ch.data.datasets[2].data.push(amonia);
        ch.update();
    });
}
function startSim() {
    document.getElementById("bStart").disabled = true;
    document.getElementById("bStop").disabled = false;
    document.getElementById("st").className = "badge bg-success fs-5 px-3 py-2";
    document.getElementById("st").innerText = "ONLINE • STREAMING";
    gen();
    tm = setInterval(gen, 3000);
}
function stopSim() {
    clearInterval(tm);
    document.getElementById("bStart").disabled = false;
    document.getElementById("bStop").disabled = true;
    document.getElementById("st").className = "badge bg-secondary fs-5 px-3 py-2";
    document.getElementById("st").innerText = "DEVICE OFFLINE";
}
</script>
<?php include "../layout/footer.php"; ?>