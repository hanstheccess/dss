<div class="panel-body">
    <!-- <form class="form-inline" action="<?php //echo base_url();?>kriteria/create" method="post">
        <div class="form-group">
            <label for="newKrt">Kriteria Baru:</label>
            <input type="text" class="form-control" name="newKrt">
        </div>
        <button type="submit" class="btn btn-default">Kriteria Baru</button>
    </form>
    <br> -->
    <div class="table-responsive">
        <table id="herotable" class="table table-bordered" style="width:100%">
            <thead>
            <tr>
                <th class="text-center" width="15%">Kriteria</th>
                <th class="text-center" width="70%">Nama Kriteria</th>
                <th class="text-center" width="15%">Bobot</th>
                <!-- <th class="text-center" width="15%">Edit</th>
                <th class="text-center" width="15%">Hapus</th> -->
            </tr>
            </thead>
            <tbody>
            <?php
                foreach ($query->result() as $row) {
                    echo "<tr>";
                    echo "<td class='text-center'>K".$row->id_krt."</td>";
                    echo "<td>".$row->nama_krt."</td>";
                    echo "<td class='text-center'>".$row->bobot_krt."</td>";
                    // echo "
                    // <td class='text-center'>
                    //     <form action='".base_url()."kriteria/edit' method='post'>
                    //         <input type='hidden' class='form-control' name='editKrt' value=".$row->id_krt.">
                    //         <button type='submit' class='btn btn-warning btn-xs'>
                    //             <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>
                    //             Edit
                    //         </button>
                    //     </form>
                    // </td>
                    // <td class='text-center'>
                    //     <form action='".base_url()."kriteria/delete' method='post'>
                    //         <input type='hidden' class='form-control' name='deleteKrt' value=".$row->id_krt.">
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