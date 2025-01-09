<?php include "layout/header.php" ?>
<div class="row container-fluid div-table">
    <h1 class="h1 text-center text-warning">visualizar registro de atividadas da APi</h1>
    <p class="text-white text-center">Aqui você pode filtrar os registros por qualquer um dos campos, como status, data ou nome do filme</p>
    <table id="example" class="table table-dark table-striped table-bordered border border-secondary border-rounded rounded  border-1">
        <thead>
            <tr>
                <th class="text-warning">status</th>
                <th class="text-warning">mensagem</th>
                <th class="text-warning">data/hora</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $r) { ?>
                <tr>

                    <td><?php echo $r['status'] ?></td>
                    <td><?php echo $r['description'] ?></td>
                    <td><?php echo $r['date'] ?></td>
                </tr>

            <?php } ?>

            <!-- More rows as needed -->
        </tbody>
    </table>

</div>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<?php include "layout/footer.php" ?>
<script>
    $(document).ready(function() {
        $('.div-table').hide()
        async function getPassword() {
            const {
                value: password
            } = await Swal.fire({
                title: "Digite a senha de administrador para visualizar os logs",
                input: "password",
                inputLabel: "Senha:",
                inputPlaceholder: "Digite a senha",
                inputAttributes: {
                    maxlength: "10",
                    autocapitalize: "off",
                    autocorrect: "off"
                }
            });

            if (password != "1234") {
                Swal.fire(`Senha incorreta`);
                setTimeout(function() {
                    window.location.href = '/starwars';
                }, 2000);
            } else {
                // 3000 milissegundos = 3 segundos
                $('.div-table').fadeIn('slow')

            }
        }

        getPassword();
        $('#example').DataTable({
            "pageLength": 15,
        });

    })
</script>
<style>
    .dataTables_filter label,
    label {
        color: #856404;
        /* Cor clara para o label */
    }

    /* Personalizando a cor do campo de entrada de pesquisa */
    .dataTables_filter input {
        background-color: #343a40;
        /* Fundo escuro para o campo de pesquisa */
        color: #f8f9fa;
        /* Cor clara para o texto */
        border: 1px solid #495057;
        /* Cor do borda */
    }
    .dataTables_length label select option{
        background-color:white;

    }
    #example_info{
        color:white;
    }
    .h1 {
        font-family: 'StarJedi';
    }
</style>