<link rel="stylesheet" href="<?= base_url('assets/game/') . $percobaan['unity_folder'] ?>TemplateData/style.css">
<section>
    <div class="container">
        <div class="row">
            <div class="col-12 p-5">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="petunjukumum" data-bs-toggle="tab" data-bs-target="#petunjukumum-pane" type="button" role="tab" aria-controls="petunjukumum-pane" aria-selected="true"><i class="fa-solid fa-book"></i> Petunjuk Umum</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="materi" data-bs-toggle="tab" data-bs-target="#materi-pane" type="button" role="tab" aria-controls="materi-pane" aria-selected="true"><i class="fa-solid fa-book"></i> Materi</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="petunjuk" data-bs-toggle="tab" data-bs-target="#petunjuk-pane" type="button" role="tab" aria-controls="petunjuk-pane" aria-selected="false"><i class="fa-solid fa-circle-info"></i> Lab Guide</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="eksperimen" data-bs-toggle="tab" data-bs-target="#eksperimen-pane" type="button" role="tab" aria-controls="eksperimen-pane" aria-selected="false"><i class="fa-solid fa-flask"></i> Eksperimen</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="analisa" data-bs-toggle="tab" data-bs-target="#analisa-pane" type="button" role="tab" aria-controls="analisa-pane" aria-selected="false"><i class="fa-solid fa-pen"></i> Ruang Analisa</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="petunjukumum-pane" role="tabpanel" aria-labelledby="petunjukumum" tabindex="0">
                                <div class="row p-5">
                                    <div class="col-4">
                                        <img src="<?= base_url('assets/img/backbtn.png') ?>" alt="" class="img-fluid" width="150">
                                        <h2 class="text-center">Back</h2>
                                    </div>
                                    <div class="col-4">
                                        <img src="<?= base_url('assets/img/playbtn.png') ?>" alt="" class="img-fluid" width="150">
                                        <h2 class="text-center">Play</h2>
                                    </div>
                                    <div class="col-4">
                                        <img src="<?= base_url('assets/img/nextbtn.png') ?>" alt="" class="img-fluid" width="150">
                                        <h2 class="text-center">Next</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="materi-pane" role="tabpanel" aria-labelledby="materi" tabindex="0">
                                <div class="row p-5">
                                    <div class="col-6">
                                        <p><?= $materi['isi_materi'] ?></p>
                                    </div>
                                    <div class="col-6">
                                        <img src="<?= base_url("assets/img/") . $materi['img_materi'] ?>" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="petunjuk-pane" role="tabpanel" aria-labelledby="petunjuk" tabindex="0">
                                <div class="row p-5">
                                    <div class="col-12">

                                        <p><?= $petunjuk['isi_petunjuk'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="eksperimen-pane" role="tabpanel" aria-labelledby="eksperimen" tabindex="0">
                                <div class="row p-5">
                                    <div class="col-12">
                                        <div id="" class="unity-desktop">
                                            <canvas id="unity-canvas"></canvas>
                                            <div id="unity-loading-bar">
                                                <div id="unity-logo"></div>
                                                <div id="unity-progress-bar-empty">
                                                    <div id="unity-progress-bar-full"></div>
                                                </div>
                                            </div>
                                            <div id="unity-warning"> </div>
                                            <div id="unity-footer">
                                                <div id="unity-webgl-logo"></div>
                                                <div id="unity-fullscreen-button"></div>
                                                <div id="unity-build-title">SIRLY</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    var base_url = "<?= base_url('assets/game/') . $percobaan['unity_folder'] ?>";
                                    var container = document.querySelector("#unity-container");
                                    var canvas = document.querySelector("#unity-canvas");
                                    var loadingBar = document.querySelector("#unity-loading-bar");
                                    var progressBarFull = document.querySelector("#unity-progress-bar-full");
                                    var fullscreenButton = document.querySelector("#unity-fullscreen-button");
                                    var warningBanner = document.querySelector("#unity-warning");

                                    // Shows a temporary message banner/ribbon for a few seconds, or
                                    // a permanent error message on top of the canvas if type=='error'.
                                    // If type=='warning', a yellow highlight color is used.
                                    // Modify or remove this function to customize the visually presented
                                    // way that non-critical warnings and error messages are presented to the
                                    // user.
                                    function unityShowBanner(msg, type) {
                                        function updateBannerVisibility() {
                                            warningBanner.style.display = warningBanner.children.length ? 'block' : 'none';
                                        }
                                        var div = document.createElement('div');
                                        div.innerHTML = msg;
                                        warningBanner.appendChild(div);
                                        if (type == 'error') div.style = 'background: red; padding: 10px;';
                                        else {
                                            if (type == 'warning') div.style = 'background: yellow; padding: 10px;';
                                            setTimeout(function() {
                                                warningBanner.removeChild(div);
                                                updateBannerVisibility();
                                            }, 5000);
                                        }
                                        updateBannerVisibility();
                                    }

                                    var buildUrl = base_url + "Build";
                                    var loaderUrl = buildUrl + "/WebGL.loader.js";
                                    var config = {
                                        dataUrl: buildUrl + "/WebGL.data",
                                        frameworkUrl: buildUrl + "/WebGL.framework.js",
                                        codeUrl: buildUrl + "/WebGL.wasm",
                                        streamingAssetsUrl: "StreamingAssets",
                                        companyName: "AeroDigitals",
                                        productName: "SIRLY",
                                        productVersion: "1.0",
                                        showBanner: unityShowBanner,
                                    };

                                    // By default Unity keeps WebGL canvas render target size matched with
                                    // the DOM size of the canvas element (scaled by window.devicePixelRatio)
                                    // Set this to false if you want to decouple this synchronization from
                                    // happening inside the engine, and you would instead like to size up
                                    // the canvas DOM size and WebGL render target sizes yourself.
                                    // config.matchWebGLToCanvasSize = false;

                                    if (/iPhone|iPad|iPod|Android/i.test(navigator.userAgent)) {
                                        // Mobile device style: fill the whole browser client area with the game canvas:

                                        var meta = document.createElement('meta');
                                        meta.name = 'viewport';
                                        meta.content = 'width=device-width, height=device-height, initial-scale=1.0, user-scalable=no, shrink-to-fit=yes';
                                        document.getElementsByTagName('head')[0].appendChild(meta);
                                        container.className = "unity-mobile";
                                        canvas.className = "unity-mobile";

                                        // To lower canvas resolution on mobile devices to gain some
                                        // performance, uncomment the following line:
                                        // config.devicePixelRatio = 1;


                                    } else {
                                        // Desktop style: Render the game canvas in a window that can be maximized to fullscreen:

                                        canvas.style.width = "960px";
                                        canvas.style.height = "600px";
                                    }

                                    canvas.style.background = "url('" + buildUrl + "/WebGL.jpg') center / cover";
                                    loadingBar.style.display = "block";

                                    var script = document.createElement("script");
                                    script.src = loaderUrl;
                                    script.onload = () => {
                                        createUnityInstance(canvas, config, (progress) => {
                                            progressBarFull.style.width = 100 * progress + "%";
                                        }).then((unityInstance) => {
                                            loadingBar.style.display = "none";
                                            fullscreenButton.onclick = () => {
                                                unityInstance.SetFullscreen(1);
                                            };
                                        }).catch((message) => {
                                            alert(message);
                                        });
                                    };

                                    document.body.appendChild(script);
                                </script>
                            </div>
                            <div class="tab-pane fade" id="analisa-pane" role="tabpanel" aria-labelledby="analisa" tabindex="0">
                                <div class="row p-5">
                                    <div class="col-12">
                                        <form action="<?= base_url('post-analisa') ?>" method="POST">
                                            <div class="form-group">
                                                <label for="">Nama</label>
                                                <input type="text" name="nama_analisa" id="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Apa yang terjadi ketika mentega dipanaskan menggunakan api?</label>
                                                <textarea name="isi_analisa" id="" cols="30" rows="2" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Menurut kalian apa faktor kunci yang menyebabkan suatu benda dapat berubah menjadi cair?</label>
                                                <textarea name="isi_analisa" id="" cols="30" rows="2" class="form-control"></textarea>
                                            </div>
                                            <input type="text" name="id_percobaan" value="<?= $percobaan['id_percobaan'] ?>" hidden>
                                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>