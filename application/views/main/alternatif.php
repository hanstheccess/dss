<div class="panel-body">
    <!-- <form class="form-inline" action="<?php //echo base_url();?>alternatif/create" method="post">
        <div class="form-group">
            <label for="newAlt">Alternatif Baru:</label>
            <input type="text" class="form-control" name="newAlt">
        </div>
        <button type="submit" class="btn btn-default">Alternatif Baru</button>
    </form>
    <br> -->
    <div class="table-responsive">
        <table id="herotable00" class="table table-bordered" style="width:100%">
            <thead>
            <tr>
                <th class="text-center" width="10%">Alternatif</th>
                <th class="text-center" width="60%">Nama Alternatif</th>
                <!-- <th class="text-center" width="15%">Edit</th>
                <th class="text-center" width="15%">Hapus</th> -->
            </tr>
            </thead>
            <tbody>
            <?php
                foreach ($query->result() as $row) {
                    echo "<tr>";
                    echo "<td class='text-center'>A".$row->id_alt."</td>";
                    echo "<td>".$row->nama_alt."</td>";
                    // echo "
                    // <td class='text-center'>
                    //     <form action='".base_url()."alternatif/edit' method='post'>
                    //         <input type='hidden' class='form-control' name='editAlt' value=".$row->id_alt.">
                    //         <button type='submit' class='btn btn-warning btn-xs'>
                    //             <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>
                    //             Edit
                    //         </button>
                    //     </form>
                    // </td>
                    // <td class='text-center'>
                    //     <form action='".base_url()."alternatif/delete' method='post'>
                    //         <input type='hidden' class='form-control' name='deleteAlt' value=".$row->id_alt.">
                    //         <button type='submit' class='btn btn-danger btn-xs'>
                    //             <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
                    //             Hapus
                    //         </button>
                    //     </form>
                    // </td>
                    // ";
                    echo "</tr>";
                } 
            ?>
            </tbody>
        </table>
    </div>
</div>
</div></div></div></div></section>