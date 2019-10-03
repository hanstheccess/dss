<div class="panel-body">
    <?php
        foreach ($query->result() as $row) {
            echo "
            <form class='form-inline' action='".base_url()."alternatif/doEdit' method='post'>
                <input type='hidden' class='form-control' name='idAlt' value='".$row->id_alt."'>
                <label for='namaAlt'>Edit Alternatif :</label>
                <input type='text' class='form-control' name='namaAlt' value='".$row->nama_alt."'>
                <button type='submit' class='btn btn-default'>Edit</button>
            </form>
            ";
            echo "</tr>";
        } 
    ?>
</div>
</div></div></div></div></section>