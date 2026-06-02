<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Form Permasalahan</title>
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

            transition: 0.3s ease;
        }

        .floating-logo:hover {
            transform: scale(1.05);
        }

        .container {
            max-width: 600px;
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

        textarea {
            min-height: 120px;
            resize: vertical;
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
            perspective: 1200px;
            min-height: 320px;
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
            background: linear-gradient(90deg, #17a2b8, #007bff);
            transition: width 0.4s ease;
        }

        /* Counter */
        .page-counter {
            text-align: center;
            margin-bottom: 15px;
            color: #666;
            font-weight: bold;
        }

        /* Animasi lebih smooth */
        .complaint-page {
            width: 100%;
            backface-visibility: hidden;
            transform-origin: center;
            transition: all 0.5s ease;
            opacity: 1;
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
    </style>

</head>

<body>

    <img src="https://gapkindo.org/guest/assets/img/logo-gapkindo.jpg" alt="Logo" class="floating-logo">

    <div class="container">

        <h2>Form Permasalahan</h2>

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

                    <label>Permasalahan</label>
                    <textarea class="permasalahan" required></textarea>

                    <label>Harapan Anda</label>
                    <textarea class="harapan" required></textarea>

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

    <label>Permasalahan</label>
    <textarea class="permasalahan"></textarea>

    <label>Harapan Anda</label>
    <textarea class="harapan"></textarea>
  `;

            container.appendChild(newPage);

            currentPage = totalPages;

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
            saveDraft();

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

                // validasi format email
                const emailPattern =
                    /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                if (!emailPattern.test(email)) {

                    showToast(
                        "Email tidak valid",
                        "error"
                    );

                    return;

                }

                const pages = document.querySelectorAll(".complaint-page");

                let complaints = [];

                pages.forEach(page => {

                    const permasalahan =
                        page.querySelector(".permasalahan").value.trim();

                    const harapan =
                        page.querySelector(".harapan").value.trim();

                    // hanya kirim yang lengkap
                    if (permasalahan !== "" && harapan !== "") {

                        complaints.push({
                            permasalahan,
                            harapan
                        });

                    }

                });

                if (complaints.length === 0) {
                    showToast("Minimal isi 1", "warning");
                    return;
                }

                try {

                    showLoading();

                    const response = await fetch(
                        "http://127.0.0.1:8000/api/form", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "Accept": "application/json"
                            },
                            body: JSON.stringify({
                                email,
                                complaints
                            })
                        }
                    );

                    const result = await response.json();

                    console.log(result);

                    showToast("Berhasil", "success");

                    if (result.success) {

                        showToast(result.message, "success");

                        localStorage.removeItem("complaintDraft");

                        document.getElementById("complaintForm").reset();

                        setTimeout(() => {

                            window.location.href = "/terimaksih";

                        }, 1000);


                    } else {

                        showToast("Gagal menyimpan data", "error");

                    }

                } catch (error) {

                    console.log(error);

                    if (error.name === "AbortError") {

                        showToast("Request timeout", "error");

                    } else {

                        showToast("Gagal mengirim data", "error");

                    }

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
