<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FasmaPay - teste</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design for Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.2/css/mdb.min.css" rel="stylesheet">
</head>



<body class="bg-light">

    <div class="container mt-5">
        <form id="uploadForm" action="https://api.fasma.ao/?sudopay_key=32y3103G41fl1aJZzfQurvBhbv0CekolQRHM7JUDkncmFHxlOKqAL11PG2M2540608" method="post" enctype="multipart/form-data" class="text-center border border-light p-5" style="background-color: #fff;">

            <div class="input-group mb-3">
            <a href="../dashboard.php" class="fs-4 link-dark">&#8592;</a>
            </div>
            <p class="h4 mb-4">Carregar o comprovativo PDF</p>

            <div class="input-group mb-3">
                <div class="custom-file">

                <label class="custom-file-label" for="sudopay_file">Escolha o arquivo</label>
                <input type="file" class="custom-file-input"  id="sudopay_filet" name="sudopay_fileh" >
                    
                </div>
            </div>

            <div id="resultado" class="text-center mt-3"></div> <!-- Div de resultado -->

            <button class="btn btn-primary btn-block my-4" type="submit">Validar</button>

        </form>
    </div>

    <!-- Bootstrap JS, jQuery and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




<script>
    if (form = document.querySelector('form')) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var dados = new FormData(form);
            fetch(form.action, {
                    method: form.method,
                    body: dados
                })
                .then(res => {
                    if (!res.ok) throw new Error(res.status);
                    return res.json();
                })
                .then(data => {
                    if (data.STATUS == 200) {
                        // Constrói uma mensagem com todas as informações do JSON
                        var mensagem = "Aplicativo: " + data.APLICATIVO +
                            "\nDestinatário: " + data.DESTINATARIO +
                            "\nIBAN: " + data.IBAN +
                            "\nBanco: " + data.BANCO +
                            "\nMontante: " + data.MONTANTE +
                            "\nTransação: " + data.TRANSACAO +
                            "\nOperação: " + data.OPERACAO +
                            "\nTipo: " + data.TIPO +
                            "\nData: " + data.DATA.dataHora;

                        // Atualiza o conteúdo da página com a mensagem
                        document.getElementById('resultado').innerText = mensagem;
                    } else {
                        document.getElementById('resultado').innerText = "O documento é inválido.";
                    }
                })
                .catch((error) => {
                    alert("Erro: " + error.message);
                });
        });
    }
</script>

</script>

 </script>

 </body>

 </html>