<?php
    $krt = 1;
    $id = 1;
    foreach ($query->result() as $row) {
        $print[$id][0] = $row->id_alt;
        $print[$id][$krt] = $row->nilai_rtg;
        $krt++;
        if ($krt>$countkrt) {
            $id++;
            $krt = 1;
        }   
    }
    // echo "<pre>"; print_r($query->result()); echo "</pre>";
?>
<div class="panel-body">
    <!-- <label for="newAlt">Rating Baru</label>
    <br>
    <table style="width:100%">
        <form class="form-inline" action="<?php //echo base_url();?>rating/create" method="post">
            <div class="form-group">
                <tr>
                    <td><input type='text' class='form-control' name='rtgAlt' value="A.."></td>
                    <?php
                        // for ($i=1; $i <= $countkrt; $i++) { 
                        //     echo "<td><input type='text' class='form-control' name='rtgK".$i."' value='K".$i."'></td>";
                        // }
                    ?>
                </tr>
            </div>
    </table>
            <button type="submit" class="btn btn-default">Rating Baru</button>
        </form>
    <br> -->
    <div class="table-responsive">
        <table id="herotable00" class="table table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">/</th>
                    <?php
                        for ($i=1; $i <=$countkrt; $i++) { 
                            echo "<th class='text-center'>K".$i."</th>";
                        }
                    ?>
                    <!-- <th class="text-center">Edit</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                    for ($i=1; $i <= count($print); $i++) { 
                        echo "<tr>";
                        echo "<td class='text-center'>A".$print[$i][0]."</td>";
                        for ($j=1; $j <= $countkrt; $j++) { 
                            echo "<td class='text-center'>".$print[$i][$j]."</td>";
                        }
                        // echo "
                        // <td class='text-center'>
                        //     <form action='".base_url()."alternatif/edit' method='post'>
                        //         <input type='hidden' class='form-control' name='editAlt' value=".$row->id_alt.">
                        //         <button type='submit' class='btn btn-warning btn-xs'>
                        //             <span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>
                        //             Edit
                        //         </button>
                        //     </form>
                        // </td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
</div></div></div></div></section>