<!DOCTYPE html>
<html lang="id">

<head>
    <!-- HTML Meta Tags -->
    <title>Form Gapkindo</title>
    <meta name="description" content="">

    <!-- Open Graph Meta Tags -->
    <meta property="og:url" content="https://gapkindo.org/form-tantangan">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Tantangan Industri Karet Alam">
    <meta property="og:description" content="Tantangan Industri Karet Alam">
    <meta property="og:image" content="https://gapkindo.org/guest/assets/img/logo-gapkindo.jpg">
    <!-- Load error, please check URL -->

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="gapkindo.org">
    <meta property="twitter:url" content="https://gapkindo.org/form-tantangan">
    <meta name="twitter:title" content="Tantangan Industri Karet Alam">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="https://gapkindo.org/guest/assets/img/logo-gapkindo.jpg">

    <!-- Meta Tags Generated via https://opengraph.dev -->
    <!-- CSS -->
    <link rel="stylesheet" href="https://raw.githack.com/mrbudbud/fontawesome-pro/master/src/css/all.css">


    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .floating-logo {
            position: fixed;
            top: 30px;
            left: 30px;
            width: 70px;
            height: auto;
            z-index: 999;
            opacity: 0.95;
            transition: all 0.3s ease;
        }

        /* Tablet */
        @media (max-width: 992px) {
            .floating-logo {
                width: 60px;
                top: 20px;
                left: 20px;
            }

            .editor {
                min-height: 301px;
            }
        }

        /* Mobile */
        @media (max-width: 768px) {
            .floating-logo {
                width: 50px;
                top: 10px;
                left: 10px;
                opacity: 0.85;
            }

            .container {
                margin-top: 80px;
            }

            .editor {
                min-height: 801px;
            }
        }

        /* Mobile kecil */
        @media (max-width: 480px) {
            .floating-logo {
                width: 40px;
                top: 8px;
                left: 8px;
            }
        }

        .floating-logo:hover {
            transform: scale(1.05);
        }

        .container {
            max-width: 800px;
            margin: 30px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 25px;
        }

        .left-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .prev-btn {
            background: #6c757d;
            color: white;
        }

        .next-btn {
            background: #17a2b8;
            color: white;
        }

        .add-btn {
            background: #007bff;
            color: white;
        }

        .submit-btn {
            background: #28a745;
            color: white;
        }

        .hidden {
            display: none;
        }

        .page-indicator {
            text-align: center;
            margin-bottom: 15px;
            font-weight: bold;
            color: #666;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;

            transition: all 0.2s ease;
            transform: scale(1);
        }

        /* Desktop */
        input,
        textarea {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 16px;
        }

        /* TEXTAREA DESKTOP FIX */
        textarea {
            min-height: 280px;
            max-height: 420px;
            resize: vertical;
            line-height: 1.5;
        }

        .ck-editor__editable {
            min-height: 280px;
            max-height: 420px;
            line-height: 1.6;
            font-size: 16px;
        }

        /* Saat hover */
        button:hover {
            transform: translateY(-2px);
            opacity: 0.95;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        /* Saat diklik */
        button:active {
            transform: scale(0.95);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        /* Optional: efek fokus */
        button:focus {
            outline: none;
        }

        #pagesContainer {
            position: relative;
            min-height: 350px;
        }

        @media (max-width:768px) {

            .prev-btn,
            .next-btn,
            .add-btn,
            .submit-btn {
                height: 48px;
            }

        }

        .complaint-page {
            width: 100%;
            backface-visibility: hidden;
            transform-origin: left center;
            transition: all 0.6s ease;
            opacity: 1;
        }

        /* Hidden normal */
        .hidden {
            display: none;
        }

        /* Animasi NEXT */
        .page-next-enter {
            animation: nextEnter 0.6s ease forwards;
        }

        .page-next-exit {
            animation: nextExit 0.6s ease forwards;
        }

        /* Animasi PREV */
        .page-prev-enter {
            animation: prevEnter 0.6s ease forwards;
        }

        .page-prev-exit {
            animation: prevExit 0.6s ease forwards;
        }

        /* KEYFRAMES */

        @keyframes nextExit {
            0% {
                transform: rotateY(0deg);
                opacity: 1;
            }

            100% {
                transform: rotateY(-90deg);
                opacity: 0;
            }
        }

        @keyframes nextEnter {
            0% {
                transform: rotateY(90deg);
                opacity: 0;
            }

            100% {
                transform: rotateY(0deg);
                opacity: 1;
            }
        }

        @keyframes prevExit {
            0% {
                transform: rotateY(0deg);
                opacity: 1;
            }

            100% {
                transform: rotateY(90deg);
                opacity: 0;
            }
        }

        @keyframes prevEnter {
            0% {
                transform: rotateY(-90deg);
                opacity: 0;
            }

            100% {
                transform: rotateY(0deg);
                opacity: 1;
            }
        }

        /* Progress Bar */
        .progress-wrapper {
            width: 100%;
            height: 10px;
            background: #ddd;
            border-radius: 20px;
            overflow: hidden;
            margin-bottom: 15px;
        }

        .progress-bar {
            height: 100%;
            width: 100%;
            background: linear-gradient(90deg, #044638, #03503f);
            transition: width 0.4s ease;
        }

        /* Counter */
        .page-counter {
            text-align: center;
            margin-bottom: 15px;
            color: #666;
            font-weight: bold;
        }

        /* NEXT */
        @keyframes nextExit {
            0% {
                transform: translateX(0) scale(1);
                opacity: 1;
                filter: blur(0);
            }

            100% {
                transform: translateX(-80px) scale(0.95);
                opacity: 0;
                filter: blur(5px);
            }
        }

        @keyframes nextEnter {
            0% {
                transform: translateX(80px) scale(0.95);
                opacity: 0;
                filter: blur(5px);
            }

            100% {
                transform: translateX(0) scale(1);
                opacity: 1;
                filter: blur(0);
            }
        }

        /* PREV */
        @keyframes prevExit {
            0% {
                transform: translateX(0) scale(1);
                opacity: 1;
                filter: blur(0);
            }

            100% {
                transform: translateX(80px) scale(0.95);
                opacity: 0;
                filter: blur(5px);
            }
        }

        @keyframes prevEnter {
            0% {
                transform: translateX(-80px) scale(0.95);
                opacity: 0;
                filter: blur(5px);
            }

            100% {
                transform: translateX(0) scale(1);
                opacity: 1;
                filter: blur(0);
            }
        }

        /* TOAST */

        #toast {
            position: fixed;

            top: 20px;
            left: 50%;

            transform: translateX(-50%) translateY(-20px);

            min-width: 350px;
            max-width: 600px;

            text-align: center;

            background: #333;
            color: white;

            padding: 16px 24px;
            border-radius: 12px;

            opacity: 0;

            transition: all 0.4s ease;

            z-index: 9999;

            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        #toast.show {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }

        #toast.success {
            background: #28a745;
        }

        #toast.error {
            background: #dc3545;
        }

        #toast.warning {
            background: #ffc107;
            color: #333;
        }

        /* LOADING */

        .loading-overlay {
            position: fixed;
            inset: 0;

            background: rgba(255, 255, 255, 0.8);

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

            z-index: 99999;

            backdrop-filter: blur(5px);
        }

        .spinner {
            width: 60px;
            height: 60px;

            border: 6px solid #ddd;
            border-top-color: #007bff;

            border-radius: 50%;

            animation: spin 0.8s linear infinite;
        }

        .loading-overlay p {
            margin-top: 15px;
            font-weight: bold;
            color: #333;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .loading-overlay.hidden {
            display: none !important;
        }

        /* Desktop Besar */
        @media (min-width: 1200px) {

            .container {
                max-width: 700px;
            }

            h2 {
                font-size: 32px;
            }

            button {
                font-size: 16px;
            }
        }


        /* Tablet */
        @media (max-width: 992px) {

            label {
                font-size: 17px;
            }

            .floating-logo {
                position: relative;

                width: 60px;
                top: 15px;
                left: 50%;
                transform: translateX(-50%);
            }

            .container {
                margin-top: 90px;
            }

            h2 {
                font-size: 28px;
            }

            button {
                font-size: 15px;
            }
        }


        /* Mobile */
        @media (max-width: 768px) {

            body {
                padding: 10px;
            }

            .floating-logo {
                position: relative;
                width: 45px;
                top: 10px;
                left: 10px;
                z-index: 1000;
            }

            .container {
                width: calc(100% - 20px);
                margin: 70px auto 15px auto;
                padding: 15px;
                border-radius: 12px;
            }


            h2 {
                font-size: 24px;
            }

            label {
                font-size: 17px;
            }

            input,
            textarea {
                font-size: 14px;
                padding: 12px;
            }

            .button-group {
                flex-direction: column;
                gap: 15px;
                align-items: stretch;
            }

            .left-buttons {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap;
            }

            .left-buttons button {
                flex: 1;
                min-width: 80px;
            }

            .submit-btn {
                width: 100%;
            }

            #toast {
                min-width: unset;
                width: calc(100% - 30px);
                max-width: 100%;
                font-size: 14px;
            }

            .page-counter {
                font-size: 14px;
            }

            .ck.ck-toolbar {
                flex-wrap: wrap !important;
                padding: 6px;
            }

            .ck.ck-toolbar__items {
                flex-wrap: wrap !important;
                row-gap: 4px;
            }

            .ck.ck-button {
                min-width: 34px;
                min-height: 34px;
            }

            .ck.ck-dropdown {
                margin-bottom: 4px;
            }

            .ck-editor__editable {
                min-height: 220px;
            }
        }


        /* Mobile kecil */
        @media (max-width: 480px) {

            .container {
                padding: 15px;
            }

            h2 {
                font-size: 20px;
            }

            .floating-logo {
                width: 40px;
            }

            button {
                padding: 12px;
                font-size: 14px;
            }

            input,
            textarea {
                font-size: 23px;
            }

            #toast {
                font-size: 13px;
                padding: 12px;
            }

            /* Editor */
            .ck-editor__editable {
                min-height: 180px;
            }

            /* Toolbar utama */
            .ck.ck-toolbar {
                flex-wrap: wrap !important;
            }

            /* Group tombol */
            .ck.ck-toolbar__items {
                flex-wrap: wrap !important;
            }

            /* Tombol toolbar */
            .ck.ck-button {
                min-width: 32px;
            }

            /* Dropdown heading/font */
            .ck.ck-dropdown {
                max-width: 100%;
            }
        }
    </style>

</head>

<body>



    <div class="container">

        <img src="https://gapkindo.org/guest/assets/img/logo-gapkindo.jpg" alt="Logo" class="floating-logo">
        <br>

        <br>
        <h2 style="color: #044638;">Tantangan Industri Karet Alam Saat Ini</h2>

        <div class="progress-wrapper">
            <div class="progress-bar" id="progressBar"></div>
        </div>

        <div class="page-counter" id="pageCounter">
            1 / 1
        </div>

        <label>Email</label>
        <input type="email" id="email" placeholder="Masukkan email">

        <form id="complaintForm">
            @csrf
            <div id="pagesContainer">

                <div class="complaint-page">

                    <div class="page-indicator">
                        <br><br>
                    </div>

                    <label>Tantangan/Permasalahan</label>
                    <textarea class="permasalahan editor" style="height: 801px;"></textarea>

                    <label>Usul/Solusi/Harapan Anda (opsional)</label>
                    <textarea class="harapan editor" style="height: 801px;"></textarea>

                </div>

            </div>

            <div class="button-group">

                <div class="left-buttons">
                    <button type="button" class="prev-btn" onclick="prevPage()">
                        <i class="far fa-arrow-alt-left"></i>
                    </button>

                    <button type="button" class="next-btn" onclick="nextPage()">
                        <i class="far fa-arrow-alt-right"></i>
                    </button>

                    <button type="button" class="add-btn" onclick="addMore()">
                        <i class="fas fa-plus"></i> Add More
                    </button>
                </div>

                <button type="submit" class="submit-btn">
                    Submit <i class="fad fa-save"></i>
                </button>

            </div>

        </form>

    </div>

    <!-- Toast -->
    <div id="toast"></div>

    <!-- Loading Overlay -->
    <div id="loadingOverlay" class="loading-overlay hidden">
        <div class="spinner"></div>
        <p>Mengirim data...</p>
    </div>
    <!-- Javascript -->
    <script src="https://raw.githack.com/mrbudbud/fontawesome-pro/master/src/js/all.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

    <script>
        let editors = [];

        function initEditors() {

            document.querySelectorAll('.editor').forEach(el => {

                if (el.dataset.initialized) return;

                ClassicEditor
                    .create(el)
                    .then(editor => {

                        editors.push(editor);

                        el.dataset.initialized = true;

                    })
                    .catch(error => {
                        console.error(error);
                    });

            });

        }

        document.addEventListener('DOMContentLoaded', function() {
            initEditors();
            // validasi format email
            document.getElementById("email")
                .addEventListener("blur", function() {

                    const email = this.value.trim();

                    const emailPattern =
                        /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                    if (email !== "" && !emailPattern.test(email)) {

                        this.style.borderColor = "#dc3545";

                        showToast(
                            "Email tidak valid",
                            "error"
                        );

                        console.log("EMAIL BLUR");
                    } else {

                        this.style.borderColor = "#28a745";

                    }

                });
        });
    </script>

    <script>
        let currentPage = 0;

        function updateUI() {

            const totalPages =
                document.querySelectorAll(".complaint-page").length;

            // counter
            document.getElementById("pageCounter").innerText =
                `${currentPage + 1} / ${totalPages}`;

            // progress bar
            const progress =
                ((currentPage + 1) / totalPages) * 100;

            document.getElementById("progressBar")
                .style.width = progress + "%";

        }

        function showPage(index) {
            editors.forEach(editor => {
                editor.updateSourceElement();
            });

            const pages = document.querySelectorAll(".complaint-page");

            pages.forEach((page, i) => {

                if (i === index) {
                    page.classList.remove("hidden");
                } else {
                    page.classList.add("hidden");
                }

            });

        }

        function addMore() {

            const container = document.getElementById("pagesContainer");

            const totalPages = document.querySelectorAll(".complaint-page").length;

            const newPage = document.createElement("div");

            newPage.classList.add("complaint-page", "hidden");

            newPage.innerHTML = `
    <div class="page-indicator">
      <br><br>
      
    </div>

    <label>Tantangan/Permasalahan</label>
    <textarea class="permasalahan editor"></textarea>

    <label>Usul/Solusi/Harapan Anda (opsional)</label>
    <textarea class="harapan editor"></textarea>
  `;

            container.appendChild(newPage);

            currentPage = totalPages;
            // INISIALISASI CKEDITOR BARU
            initEditors();

            showPage(currentPage, "next");

        }


        function nextPage() {

            const pages = document.querySelectorAll(".complaint-page");

            if (currentPage < pages.length - 1) {

                currentPage++;

                showPage(currentPage, "next");

            }

        }

        function prevPage() {

            if (currentPage > 0) {

                currentPage--;

                showPage(currentPage, "prev");

            }

        }

        function showPage(index, direction = "next") {

            const pages = document.querySelectorAll(".complaint-page");

            pages.forEach((page, i) => {

                if (i === index) {

                    page.classList.remove("hidden");

                    if (direction === "next") {
                        page.classList.add("page-next-enter");
                    } else {
                        page.classList.add("page-prev-enter");
                    }

                    setTimeout(() => {
                        page.classList.remove(
                            "page-next-enter",
                            "page-prev-enter"
                        );
                    }, 600);

                } else {

                    if (!page.classList.contains("hidden")) {

                        if (direction === "next") {
                            page.classList.add("page-next-exit");
                        } else {
                            page.classList.add("page-prev-exit");
                        }

                        setTimeout(() => {

                            page.classList.add("hidden");

                            page.classList.remove(
                                "page-next-exit",
                                "page-prev-exit"
                            );

                        }, 600);

                    }

                }

            });
            updateUI();

        }

        document.getElementById("complaintForm")
            .addEventListener("submit", async function(e) {

                e.preventDefault();
                const confirmSubmit = confirm(
                    "Apa form sudah benar dan siap dikirim?"
                );

                if (!confirmSubmit) return;


                const email = document.getElementById("email").value.trim();

                if (email === "") {

                    showToast("Email wajib diisi", "warning");
                    return;

                }

                const pages = document.querySelectorAll(".complaint-page");
                editors.forEach(editor => {
                    editor.updateSourceElement();
                });

                // Tambahkan di sini
                if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    showToast("Format email tidak valid", "error");
                    return;
                }


                let complaints = [];

                pages.forEach(page => {

                    const permasalahanEl =
                        page.querySelector(".permasalahan");

                    const harapanEl =
                        page.querySelector(".harapan");

                    const permasalahan =
                        permasalahanEl ? permasalahanEl.value.trim() : "";

                    const harapan =
                        harapanEl ? harapanEl.value.trim() : "";

                    if (permasalahan !== "") {

                        complaints.push({
                            permasalahan,
                            harapan
                        });

                    }

                });
                console.log(complaints);

                if (complaints.length === 0) {
                    showToast("Minimal isi 1", "warning");
                    return;
                }

                try {

                    const response = await fetch("http://apps-gapkindo.gapkindo.org/api/form", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json"
                        },
                        body: JSON.stringify({
                            email,
                            complaints
                        })
                    });

                    // Ambil response sebagai text dulu
                    const text = await response.text();

                    // Cek apakah response sukses
                    if (!response.ok) {
                        throw new Error(`HTTP Error ${response.status}`);
                    }

                    // Parse JSON hanya jika response valid
                    const result = JSON.parse(text);

                    if (result.success) {

                        showToast(result.message || "Berhasil", "success");

                        localStorage.removeItem("complaintDraft");

                        document.getElementById("complaintForm").reset();

                        setTimeout(() => {
                            window.location.href = "https://gapkindo.org/";
                        }, 1000);

                    } else {

                        showToast(result.message || "Gagal menyimpan data", "error");

                    }

                } catch (error) {

                    console.error(error);

                    showToast(error.message, "error");

                } finally {

                    hideLoading();

                }

            });

        function showToast(message, type = "success") {

            const toast =
                document.getElementById("toast");

            toast.innerText = message;

            toast.className = "";
            toast.classList.add(type);
            toast.classList.add("show");

            setTimeout(() => {
                toast.classList.remove("show");
            }, 3000);
        }

        function showLoading() {

            document.getElementById("loadingOverlay")
                .classList.remove("hidden");

        }

        function hideLoading() {

            document.getElementById("loadingOverlay")
                .classList.add("hidden");

        }
    </script>


</body>

</html>
