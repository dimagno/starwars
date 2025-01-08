<?php include "layout/header.php" ?>
<div class="row container-fluid">
    <h1 class="h1 text-center text-warning">visualizar registro de atividadas da APi</h1>
    <table id="example" class="table table-dark table-striped table-bordered border border-secondary border-1">
        <thead >
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
    $(document).ready(function(){
        $('#exemple').hide()
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
    .h1{
        font-family: 'StarJedi';
    }
</style>