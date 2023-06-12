<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#00c1ed" fill-opacity="1" d="M0,128L48,138.7C96,149,192,171,288,181.3C384,192,480,192,576,165.3C672,139,768,85,864,96C960,107,1056,181,1152,213.3C1248,245,1344,235,1392,229.3L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
</svg>
<section id="footer">
    <div class="container text-dark">
        <div class="row">
            <div class="col">
                <h2 class="text-center">Tentang Kami</h2>
            </div>
        </div>
        <div class="row justify-content-evenly">
            <div class="col-md-12 pt-4 pb-4">
                Produk kami memiliki fitur fungsi darurat dengan menekan panic button.
                Saat panic button tersebut ditekan, perangkat akan mengirim keberadaan
                lokasi para nelayan yang telah ditangkap modul Global Positioning System (GPS)
                menggunakan komunikasi LoRa dan dipantau oleh operator melalui website ini yang terhubung
                dengan LoRaWAN gateway.
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="<?= base_url('assets/'); ?>device1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text text-dark">Gambar diatas adalah bentuk produk EndDevice yang kami buat</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="<?= base_url('assets/'); ?>device2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text text-dark">Gambar diatas adalah bentuk produk EndDevice yang kami buat</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="<?= base_url('assets/'); ?>alarmdevice.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text text-dark">Gambar diatas adalah bentuk produk dari Alarm Device yang kami buat</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end beranda -->
<!-- footer -->
<footer class="text-center text-white pt-5">Create with ❤ by <b>Panic Button Team</footer>
<!-- end footer -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>
</body>

</html>